<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\GambarModels;
use App\Models\PostinganModels;
use App\Models\TmpImg;
use CodeIgniter\HTTP\ResponseInterface;
use Faker\Extension\Helper;

class Postingan extends BaseController
{
    public function __construct() {
        $this->PostinganModels = new PostinganModels();

        $this->GambarModels = new GambarModels();

        $this->TmpImgModels = new TmpImg();

        $this->session = \Config\Services::session();

        $this->validation = \Config\Services::validation();

        $this->filesystem = new Helper("filesystem");
    }
    public function index()
    {
        return view('postingan/index') ;
    }

    public function detail()
    {
        return view('postingan/detail') ;
    }

    public function buat()
    {
        $request = $this->request->getPost();

        $validationRules = [
            'judul' => 'required|alpha_numeric_space|max_length[256]',
            'deskripsi' => 'required|alpha_numeric_space',
            'tag' => 'required',
        ];

        $validationMessages = [
            'judul' => [
                'required' => 'Judul wajib diisi',
                'alpha_numeric_space' => 'Judul hanya boleh diisi huruf dan angka',
                'max_length[256]' => 'Maksimal 256 Kata'
            ],
            'deskripsi' => [
                'required' => 'Deskripsi wajib diisi',
                'alpha_numeric_space' => 'Deskripsi hanya boleh diisi huruf dan angka',
            ],
            'tag' => [
                'required' => 'Tag wajib diisi',
            ]
        ];

        $this->validation->setRules($validationRules, $validationMessages);

        if (!$this->validation->run($request)) {
            $this->session->set($this->validation->getErrors());
            return redirect()->to('/postingan');
        }

        $id_gambar['id_gambar'] = 0;

        foreach ($request['img'] as $tmp_id) {
            $Tmp_img = $this->TmpImgModels->where("id", $tmp_id)->first();

            $folder = uniqid() . '-' . date('Y-m-d');

            directory_mirror(
                FCPATH . 'upload/tmp_img/' . $Tmp_img['folder'] . "/",
                FCPATH . 'upload/gambar_postingan/' . $folder
            );

            unlink(FCPATH . 'upload/tmp_img/' . $Tmp_img['folder'] . "/" . $Tmp_img['img']);
            rmdir(FCPATH . 'upload/tmp_img/' . $Tmp_img['folder']);

            $data = [
                "id_gambar" => $id_gambar['id_gambar'],
                "lokasi" => 'upload/gambar_postingan/' . $folder . "/" . $Tmp_img['img']
            ];

            $this->GambarModels->insert($data);

            $id_list = $this->GambarModels->getInsertID();
            $id_gambar = $this->GambarModels->where("id_list", $id_list)->first();
            $this->TmpImgModels->where("id", $tmp_id)->delete();
        }

        $data_postingan = [
            "id_user" => 0,
            "judul" => $request['judul'],
            "deskripsi" => $request['deskripsi'],
            "tag" => $request['tag'],
            "id_gambar" => $id_gambar['id_gambar']
        ];

        $this->PostinganModels->insert($data_postingan);

        return redirect()->to('/');
    }

}

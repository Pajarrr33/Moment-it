<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\GambarModels;
use App\Models\PostinganModels;
use App\Models\TmpImg;
use App\Models\UserModel;
use App\Models\LikeModels;
use App\Models\KomentarModels;
use App\Models\AlbumModels;
use App\Models\AlbumItemsModels;
use CodeIgniter\HTTP\ResponseInterface;
use Faker\Extension\Helper;

class Postingan extends BaseController
{
    public function __construct() {
        $this->PostinganModels = new PostinganModels();

        $this->GambarModels = new GambarModels();

        $this->TmpImgModels = new TmpImg();

        $this->UserModels = new UserModel();

        $this->LikeModels = new LikeModels();

        $this->CommentModels = new KomentarModels();

        $this->AlbumModels = new AlbumModels();

        $this->AlbumItemsModels = new AlbumItemsModels();

        $this->session = \Config\Services::session();

        $this->validation = \Config\Services::validation();

        $this->filesystem = new Helper("filesystem");
    }

    public function index()
    {
        $data['title'] = "Post";
        $data['user'] = $this->UserModels->where('id_user',$this->session->get('id_user'))->first();
        return view('postingan/index',$data) ;
    }

    public function edit($id_postingan)
    {
        $data['title'] = "Edit Post";
        $data['postingan'] = $this->PostinganModels->where('id_postingan',$id_postingan)->first();
        $data['gambar'] = $this->GambarModels->where('id_postingan',$id_postingan)->findAll();
        $data['user'] = $this->UserModels->where('id_user',$this->session->get('id_user'))->first();
        // var_dump($data['gambar']);
        // die ;
        return view('postingan/edit',$data) ;
    }

    public function detail($id_postingan)
    {
        $data['title'] = "Detail Post";

        $data['user'] = $this->UserModels->where('id_user',$this->session->get('id_user'))->first();
        
        $data['postingan'] = $this->PostinganModels->where('id_postingan',$id_postingan)->first();
        $data['poster'] = $this->UserModels->where('id_user',$data['postingan']['id_user'])->first();
        $data['gambar'] = $this->GambarModels->where('id_postingan',$id_postingan)->findAll();
        $data['like'] = $this->LikeModels->where('id_user',$this->session->get('id_user'))->where('id_postingan',$id_postingan)->first();
        
        $data['comment'] = $this->CommentModels->where('id_postingan',$id_postingan)->findAll();
        $data['user_comment'] = $this->UserModels->findAll();

        $data['album'] = $this->AlbumModels->where('id_user',$this->session->get('id_user'))->findAll();
        $data['album_items'] = $this->AlbumItemsModels->findAll();

        return view('postingan/detail',$data) ;
    }

    public function create()
    {
        $request = $this->request->getPost();

        if (!$this->validate('postingan',$request)) {
            $this->session->setFlashdata('error',$this->validation->getErrors());
            return redirect()->to('/postingan');
        }

        $data_postingan = [
            "id_user" => $this->session->get('id_user'),
            "judul" => $request['judul'],
            "deskripsi" => $request['deskripsi'],
            "tag" => $request['tag'],
        ];

        $this->PostinganModels->insert($data_postingan);
        $postingan_id = $this->PostinganModels->getInsertID();
        
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
                "id_postingan" => $postingan_id,
                "folder" => $folder,
                "img" => $Tmp_img['img']
            ];

            $this->GambarModels->insert($data);

            $this->TmpImgModels->where("id", $tmp_id)->delete();
        }

        return redirect()->to('/');
    }

    public function update($id_postingan)
    {
        $request = $this->request->getPost();
        $old_img = $data['gambar'] = $this->GambarModels->where('id_postingan',$id_postingan)->findAll();

        if (!$this->validate('postingan',$request)) {
            $this->session->setFlashdata('error',$this->validation->getErrors());
            return redirect()->back();
        }

        $data_postingan = [
            "judul" => $request['judul'],
            "deskripsi" => $request['deskripsi'],
            "tag" => $request['tag'],
        ];

        $this->PostinganModels->update_data($id_postingan, $data_postingan);

        foreach($old_img as $oldimg) {
            $this->GambarModels->where('id_postingan',$id_postingan)->delete();

            unlink(FCPATH . 'upload/gambar_postingan/' . $oldimg['folder'] . "/" . $oldimg['img']);
            rmdir(FCPATH .'upload/gambar_postingan/' . $oldimg['folder']);
        }

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
                "id_postingan" => $id_postingan,
                "folder" => $folder,
                "img" => $Tmp_img['img']
            ];

            $this->GambarModels->insert($data);

            $this->TmpImgModels->where("id", $tmp_id)->delete();
        }

        return redirect()->to('/detail-postingan/' . $id_postingan);
    }

    public function delete($id_postingan)
    {
        $old_img = $data['gambar'] = $this->GambarModels->where('id_postingan',$id_postingan)->findAll();

        foreach($old_img as $oldimg) {
            $this->GambarModels->where('id_postingan',$id_postingan)->delete();

            unlink(FCPATH . 'upload/gambar_postingan/' . $oldimg['folder'] . "/" . $oldimg['img']);
            rmdir(FCPATH .'upload/gambar_postingan/' . $oldimg['folder']);
        }

        $this->PostinganModels->where('id_postingan',$id_postingan)->delete();

        return redirect()->to('/');
    }
}

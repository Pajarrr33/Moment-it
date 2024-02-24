<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KomentarModels;
use CodeIgniter\HTTP\ResponseInterface;

class Comment extends BaseController
{
    public function __construct()
    {
        $this->CommentModels = new KomentarModels();

        $this->session = \Config\Services::session();
    }

    public function create($id_postingan)
    {
        $request = $this->request->getPost();

        if (!$this->validate('komentar',$request)) {
            $this->session->set($this->validation->getErrors());
            return redirect()->to('/detail-postingan/' . $id_postingan);
        }

        $data = [
            'id_postingan' => $id_postingan,
            'id_user' => $this->session->get('id_user'),
            'isi' => $request['komentar']
        ];

        $this->CommentModels->insert($data);
        return redirect()->to('/detail-postingan/' . $id_postingan);
    }

    public function update($id_postingan,$id_komentar)
    {
        $request = $this->request->getPost();

        if (!$this->validate('komentar',$request)) {
            $this->session->set($this->validation->getErrors());
            return redirect()->to('/detail-postingan/' . $id_postingan);
        }

        $data = [
            'isi' => $request['komentar']
        ];

        $this->CommentModels->update_data($id_komentar, $data);
        return redirect()->to('/detail-postingan/' . $id_postingan);
    }

    public function delete($id_postingan,$id_komentar)
    {
        $this->CommentModels->where('id_komentar',$id_komentar)->delete();

        return redirect()->to('/detail-postingan/' . $id_postingan);
    }
}

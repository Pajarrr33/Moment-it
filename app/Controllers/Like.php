<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LikeModels;
use CodeIgniter\HTTP\ResponseInterface;

class Like extends BaseController
{
    public function __construct() {
        $this->LikeModels = new LikeModels();

        $this->session = \Config\Services::session();
    }

    public function add($id_postingan)
    {
        $data =  [
            'id_postingan' => $id_postingan,
            'id_user' => $this->session->get('id_user')
        ];

        $this->LikeModels->insert($data);

        return redirect()->to('/detail-postingan/' . $id_postingan);
    }

    public function remove($id_postingan,$id_like)
    {
        $this->LikeModels->where('id_like',$id_like)->delete();

        return redirect()->to('/detail-postingan/' . $id_postingan);
    }
}

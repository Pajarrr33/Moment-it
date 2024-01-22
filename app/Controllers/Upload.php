<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TmpImg;
use CodeIgniter\HTTP\ResponseInterface;

class Upload extends BaseController
{
    public function __construct() {
       $this->Tmpmodel = new TmpImg();
    }

    public function upload()
    {
        $img = $this->request->getFile('img');
        if(!$img)
        {
            return 'Error' ;
        }

        date_default_timezone_set('Asia/Jakarta');

        $imgekstension = $img->guessExtension();
        $randomName = uniqid('img-' , true);
        $folder = uniqid() . '-' . date('Y-m-d') ;
        $img->move(ROOTPATH . 'public/upload/tmp_img/' . $folder,$randomName . "." . $imgekstension);

        // Remove the index.html file if it exists
        if (is_file(ROOTPATH . 'public/upload/tmp_img/' . $folder . '/index.html')) {
            unlink(ROOTPATH . 'public/upload/tmp_img/' . $folder . '/index.html');
        }

        $data =  [
            'folder' => 'public/upload/tmp_img/' . $folder . "/",
            'img' => $randomName . "." . $imgekstension
        ];

        $this->Tmpmodel->insert($data);

        $tmp_id = $this->Tmpmodel->getInsertID();

        $tmp_id_str = (string) $tmp_id;

        return $tmp_id_str;
    }
}

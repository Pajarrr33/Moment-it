<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Upload extends BaseController
{
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

        return $folder;
    }
}

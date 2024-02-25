<?php

namespace App\Database\Seeds;

use App\Models\GambarModels;
use App\Models\PostinganModels;
use CodeIgniter\Database\Seeder;
use App\Models\UserModel;

class Postingan extends Seeder
{
    public function run()
    {
        $user_model = new UserModel();

        $user = $user_model->findAll();

        foreach($user as $u) 
        {
            $postingan_models = new PostinganModels();

            $postingan = $postingan_models->findAll();

            foreach($postingan as $p) 
            {
                $gambar_models = new GambarModels();

                $gambar = $gambar_models->where('id_postingan',$p['id_postingan'])->first();

                // var_dump($gambar['folder']);
                // die ;

                $data = [
                    'id_user' => $u['id_user'],
                    'judul' => $p['judul'],
                    'deskripsi' => $p['deskripsi'],
                    'tag' => $p['tag'],
                ];

                $postingan_models->insert($data);

                $folder = uniqid() . '-' . date('Y-m-d');

                directory_mirror(
                    FCPATH . 'upload/gambar_postingan/' . $gambar['folder'] . "/",
                    FCPATH . 'upload/gambar_postingan/' . $folder
                );

                $data_gambar = [
                    'id_postingan' => $postingan_models->getInsertID(),
                    'folder' => $folder,
                    'img' => $gambar['img'],
                ];

                $gambar_models->insert($data_gambar);
            }
        }
    }
}

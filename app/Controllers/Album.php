<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AlbumItemsModels;
use App\Models\AlbumModels;
use App\Models\GambarModels;
use CodeIgniter\HTTP\ResponseInterface;

class Album extends BaseController
{
   public function __construct()
   {
        $this->session = \Config\Services::session();

        $this->AlbumModels = new AlbumModels();

        $this->AlbumItemsModels = new AlbumItemsModels();

        $this->GambarModels = new GambarModels();

        $this->validation = \Config\Services::validation();
   }

   public function add_album($id_postingan)
   {
     $request = $this->request->getPost();

     if (!$this->validate('album',$request)) {
          $this->session->set($this->validation->getErrors());
          return redirect()->to('/detail-postingan/' . $id_postingan);
     }

     $data = [
          "id_user" => $this->session->get('id_user'),
          'album_name' => $request['album_name'],
     ];

     $this->AlbumModels->insert($data);

     $id_album = $this->AlbumModels->getInsertID();

     $album_items = [
          "id_album" => $id_album,
          'id_postingan' => $id_postingan
     ];

     $this->AlbumItemsModels->insert($album_items);

     return redirect()->to('/detail-postingan/' . $id_postingan);
   }

   public function update_album($id_album)
   {
     $request = $this->request->getPost();

     if (!$this->validate('album',$request)) {
          $this->session->set($this->validation->getErrors());
          return redirect()->to('/album/' . $this->session->get('username') . '/' . $id_album);
     }

     $this->AlbumModels->update_data($id_album,$request);
     return redirect()->to('/album/' . $this->session->get('username') . '/' . $id_album);
   }

   public function delete_album($id_album)
   {
     $album = $this->AlbumModels->where('id_album',$id_album)->first();

     $this->AlbumItemsModels->where('id_album',$id_album)->delete();

     $this->AlbumModels->where('id_album',$id_album)->delete();

     return redirect()->to('/profile/' . $this->session->get('username'));
   }

   public function add_items($id_postingan,$id_album)
   {
     $album_items = [
          "id_album" => $id_album,
          'id_postingan' => $id_postingan
     ];

     $this->AlbumItemsModels->insert($album_items);

     return redirect()->to('/detail-postingan/' . $id_postingan);
   }

   public function remove_items($id_items,$id_postingan)
   {
     $this->AlbumItemsModels->where("id_items",$id_items)->delete();

     return redirect()->to('/detail-postingan/' . $id_postingan);
   }
}

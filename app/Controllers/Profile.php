<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AlbumModels;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\GambarModels;
use App\Models\PostinganModels;
use App\Models\UserModel;
use App\Models\AlbumItemsModels;
use App\Models\TmpImg;

class Profile extends BaseController
{
    public function __construct()
    {
        $this->PostinganModels = new PostinganModels();

        $this->GambarModels = new GambarModels();

        $this->UserModels = new UserModel();

        $this->TmpImgModels = new TmpImg();

        $this->session = \Config\Services::session();

        $this->AlbumModels = new AlbumModels();

        $this->AlbumItemsModels = new AlbumItemsModels();

        $this->validation = \Config\Services::validation();
    }

    public function profile($username)
    {
        $data['user'] = $this->UserModels->where('id_user',$this->session->get('id_user'))->first();
        $data['profile'] = $this->UserModels->where('username',$username)->first();

        $start =  0;
        $limit = 15;
        $data['postingan'] = $this->PostinganModels->where('id_user',$data['profile']['id_user'])->findAll($limit, $start);
        $data['gambar'] = $this->GambarModels->findAll();
        $data['album'] = $this->AlbumModels->where('id_user',$this->session->get('id_user'))->findAll();
        $data['album_items'] = $this->AlbumItemsModels->findAll();
        $data['title'] = $data['profile']['username'] . " Profile";

        return view('profile/profile',$data);
    }

    public function moreprofile()
    {
        $request = $this->request->getPost();
        $data['profile'] = $this->UserModels->where('username',$request['username'])->first();

        $limit = 15;
        $start =  $request['start'] * $limit;
        $data['postingan'] = $this->PostinganModels->where('id_user',$data['profile']['id_user'])->findAll($limit, $start);
        $data['gambar'] = $this->GambarModels->findAll();

        return view('/profile/more-profile',$data);
    }

    public function edit($id_user)
    {
        $data['user'] = $this->UserModels->where('id_user',$this->session->get('id_user'))->first();
        $data['profile'] = $this->UserModels->where('id_user',$id_user)->first();
        $data['title'] = "Edit" . $data['profile']['username'] . " Profile";
        return view('profile/edit',$data);
    }

    public function update($id_user)
    {
        $request = $this->request->getPost();
        $user = $this->UserModels->where('id_user',$id_user)->first();

        if (!$this->validate('profile',$request)) {
            $this->session->set('error',$this->validation->getErrors());
            return redirect()->to('/edit-profile/' . $id_user);
        }

        unlink(FCPATH . 'upload/profile/' . $user['folder'] . "/" . $user['profile_picture']);
        rmdir(FCPATH .'upload/profile/' . $user['folder']);

        $gambar = $this->TmpImgModels->where("id", $request['img'][0])->first();

        $folder = uniqid() . '-' . date('Y-m-d');

        directory_mirror(
            FCPATH . 'upload/tmp_img/' . $gambar['folder'] . "/",
            FCPATH . 'upload/profile/' . $folder
        );

        unlink(FCPATH . 'upload/tmp_img/' . $gambar['folder'] . "/" . $gambar['img']);
        rmdir(FCPATH . 'upload/tmp_img/' . $gambar['folder']);

        $data = [
            'username' => $request['username'],
            'email' => $request['email'],
            'bio' => $request['Bio'],
            'folder' => $folder,
            'profile_picture' => $gambar['img']
        ];

        $this->UserModels->update_data($id_user,$data);

        $this->TmpImgModels->where("id",$request['img'][0])->delete();

        return redirect()->to('/profile/' . $user['username']);
    }

    public function delete($id_user)
    {
        $user = $this->UserModels->where('id_user',$id_user)->first();
        $postingan = $this->PostinganModels->where('id_user',$id_user)->findAll();

        if($postingan)
        {
            foreach($postingan as $p){
                $gambar = $this->GambarModels->where('id_postingan',$p['id_postingan'])->findAll();

                foreach($gambar as $g) {
                    unlink(FCPATH . 'upload/gambar_postingan/' . $g['folder'] . "/" . $g['img']);
                    rmdir(FCPATH . 'upload/gambar_postingan/' . $g['folder']);

                    $this->GambarModels->where('id_list',$g['id_list'])->delete();
                }
            };

            $this->PostinganModels->where('id_user',$id_user)->delete();
        }
        
        unlink(FCPATH . 'upload/profile/' . $user['folder'] . "/" . $user['profile_picture']);
        rmdir(FCPATH . 'upload/profile/' . $user['folder']);

        $this->UserModels->where('id_user',$id_user)->delete();

        return redirect()->to('/logout');
    }

    public function user_album($username,$id_album)
    {
        $album = $this->AlbumModels->where("id_album",$id_album)->first();

        $album_items = $this->AlbumItemsModels->where("id_album",$id_album)->findAll();

        $postingan = $this->PostinganModels->findAll();

        $gambar = $this->GambarModels->findAll();

        $user = $this->UserModels->where('id_user',$this->session->get('id_user'))->first();

        $title = $album['album_name'] . " Album";

        $data = [
            'album' => $album,
            'album_items' => $album_items,
            'postingan' => $postingan,
            'gambar' => $gambar,
            'user' => $user,
            'title' => $title
        ];

        return view('profile/album',$data);
    }
}

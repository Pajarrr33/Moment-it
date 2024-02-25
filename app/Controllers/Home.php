<?php

namespace App\Controllers;
use App\Models\PostinganModels ;
use App\Models\GambarModels ;
use App\Models\UserModel;

class Home extends BaseController
{
    public function __construct()
    {
        $this->session = \Config\Services::session();

        $this->PostinganModels = new PostinganModels();

        $this->GambarModels = new GambarModels();

        $this->UserModels = new UserModel();
    }

    public function index(): string
    {
        if(!$this->session->get('Islogin'))
        {
            return view('index');
        }
        
        $request = $this->request->getMethod();

        if($request == 'get')
        {
            $data['title'] = "Home";
            $start =  0;
            $limit = 15;
            $data['postingan'] = $this->PostinganModels->findAll($limit, $start);
            $data['gambar'] = $this->GambarModels->findAll();
            $data['user'] = $this->UserModels->where('id_user',$this->session->get('id_user'))->first();
            
            return view('home',$data);
        }
        else
        {
            $post = $this->request->getPost();

            if($post['search'])
            {
                $postingan = $this->PostinganModels->search($post['search']);
            }
            else
            {
                $postingan = $this->PostinganModels;
            }

            $data['title'] = "Pencarian";
            $data['dicari'] = $post['search'];
            $start =  0;
            $limit = 15;
            $data['postingan'] = $postingan->findAll($limit, $start);
            $data['gambar'] = $this->GambarModels->findAll();
            $data['user'] = $this->UserModels->where('id_user',$this->session->get('id_user'))->first();
            
            return view('postingan/pencarian',$data);
        }
    }

    public function getmore()
    {
        $request = $this->request->getPost();
        $limit = 15;
        $start =  $request['start'] * $limit;
        $data['postingan'] = $this->PostinganModels->findAll($limit, $start);
        $data['gambar'] = $this->GambarModels->findAll();

        return view('postingan/more-postingan',$data) ;
    }

    public function getmoresearch()
    {
        $request = $this->request->getPost();

        if($request['search'])
        {
            $postingan = $this->PostinganModels->search($request['search']);
        }
        else
        {
            $postingan = $this->PostinganModels;
        }

        $limit = 15;
        $start =  $request['start'] * $limit;
        $data['postingan'] = $postingan->findAll($limit, $start);
        $data['gambar'] = $this->GambarModels->findAll();

        return view('postingan/more-postingan',$data) ;
    }
}

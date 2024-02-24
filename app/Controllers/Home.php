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
            $data['postingan'] = $this->PostinganModels->paginate(15 ,'postingan');
            $data['pager'] = $this->PostinganModels->pager;
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

            $data['dicari'] = $post['search'];
            $data['postingan'] = $postingan->paginate(10,'postingan');
            $data['pager'] = $this->PostinganModels->pager;
            $data['gambar'] = $this->GambarModels->findAll();
            $data['user'] = $this->UserModels->where('id_user',$this->session->get('id_user'))->first();
            
            return view('postingan/pencarian',$data);
        }
    }

    public function FetchPost()
    {
        $page = $this->request->getVar('page') ?? 1 ;
        $data['postingan'] = $this->PostinganModels->paginate(10,'postingan',$page);
        $data['pager'] = $this->PostinganModels->pager;
        $data['gambar'] = $this->GambarModels->findAll();
        $data['user'] = $this->UserModels->where('id_user',$this->session->get('id_user'))->first();
        $view = view('postingan/pencarian',$data);

        return $this->response->setJSON([
            'posts' => $view
        ]);
    }
}

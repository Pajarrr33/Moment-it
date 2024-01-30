<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class Auth extends BaseController
{
    public function __construct()
    {
        $this->Usermodel = new UserModel() ;

        $this->validation = \Config\Services::validation();

        $this->session = \Config\Services::session();
    }

    public function login()
    {
        return view('auth/login');
    }

    public function register()
    {
        return view('auth/register');
    }

    public  function valid_login()
    {
         $data = $this->request->getPost();

         $validationRules = [
            'email' => 'required|valid_email',
            'password' => 'required|min_length[8]|alpha_numeric_punct',
        ];

        $validationMessages = [
            'email'=> [
                'required' => 'Email wajib diisi',
                'valid_email' => 'Email tidak valid'
            ],
            'password' => [
                'required' => 'Password wajib diisi',
                'min_length' => 'Password harus terdiri dari 8 kata',
                'alpha_numeric_punct' => 'Password hanya boleh mengandung angka, huruf, dan karakter yang valid'
            ],
        ];
 
        $this->validation->setRules($validationRules, $validationMessages);

        if (!$this->validation->run($data)) {
            $this->session->setFlashdata('error',$this->validation->getErrors());
            return redirect()->to('/login');
        }
 
        $user = $this->Usermodel->where('email',$data['email'])->first();

        if(!$user)
        {
            $this->session->setFlashdata('error','Email belum terdaftar');
            return redirect()->to('/login');
        }

        if(!password_verify($data['password'] . $user['salt'],$user['password']))
        {
            $this->session->setFlashdata('error','Password salah belum terdaftar');
            return redirect()->to('/login');
        }

        $this->session->set([
            'id_user' => $user['id_user'],
            'username' => $user['username'],
            'Islogin' => true
        ]);

        return redirect()->to('/');
    }

    public function valid_register()
    {
        //tangkap data dari form 
        $data = $this->request->getPost();

        $validationRules = [
            'username' => 'required|alpha_numeric_space|is_unique[user.username]',
            'email' => 'required|valid_email',
            'password' => 'required|min_length[8]|alpha_numeric_punct',
            'password2' => 'required|matches[password]'
        ];

        $validationMessages = [
            'username' => [
                'required' => 'Username wajib diisi',
                'alpha_numeric_space' => 'Username hanya boleh mengandung huruf dan angka',
                'is_unique' => 'Username sudah dipakai'
                ],
            'email'=> [
                'required' => 'Email wajib diisi',
                'valid_email' => 'Email tidak valid'
            ],
            'password' => [
                'required' => 'Password wajib diisi',
                'min_length' => 'Password harus terdiri dari 8 kata',
                'alpha_numeric_punct' => 'Password hanya boleh mengandung angka, huruf, dan karakter yang valid'
            ],
            'password2' => [
                'required' => 'Repeat password wajib diisi',
                'matches' => 'Repeat password tidak cocok'
            ]
        ];

        $this->validation->setRules($validationRules, $validationMessages);

        if (!$this->validation->run($data)) {
            $this->session->setFlashdata('error',$this->validation->getErrors());
            return redirect()->to('/register');
        }
        //buat salt
        $salt = uniqid('', true);

        //hash password digabung dengan salt
        $password = password_hash($data['password'] . $salt,PASSWORD_BCRYPT);

        //masukan data ke database
        $this->Usermodel->save([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => $password,
            'salt' => $salt,
        ]);

        //arahkan ke halaman login
        session()->setFlashdata('login', 'Anda berhasil mendaftar, silahkan login');
        return redirect()->to('/login');
    }

    public function logout()
    {
        //hancurkan session 
        //balikan ke halaman login
        $this->session->destroy();
        return redirect()->to('/login');
    }
}


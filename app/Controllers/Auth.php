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

        $this->email = \Config\Services::email();
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

        if (!$this->validate('login',$data)) {
            $this->session->setFlashdata('error',$this->validation->getErrors());
            return redirect()->to('/login');
        }
 
        $user = $this->Usermodel->where('email',$data['email'])->first();

        if(!$user)
        {
            $this->session->setFlashdata('error',[
                'email' => 'Email belum terdaftar'
            ]);
            return redirect()->to('/login');
        }

        if($user['active_code'] != "" && $user['is_active'] != '1')
        {
            $this->session->setFlashdata('error',[
                'email' => 'Email belum diverifikasi,silahkan verifikasi terlebih dahulu'
            ]);
            return redirect()->to('/login');
        }

        if(!password_verify($data['password'] . $user['salt'],$user['password']))
        {
            $this->session->setFlashdata('error',[
                'password' => 'Password salah'
            ]);
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

        //cek apakah data memenuhi persyaratan
        if (!$this->validate('register', $data)) {
            $this->session->setFlashdata('error',$this->validation->getErrors());
            return redirect()->to('/register');
        }
        //buat salt
        $salt = uniqid('', true);

        //hash password digabung dengan salt
        $password = password_hash($data['password'] . $salt,PASSWORD_BCRYPT);

        //buat folder untuk Foto profile
        $folder = uniqid() . '-' . date('Y-m-d');

        $active_code = password_hash(uniqid(),PASSWORD_BCRYPT);

        //duplikat image default profile ke folder pribadi user
        directory_mirror(
            FCPATH . 'img/default_profile/',
            FCPATH . 'upload/profile/' . $folder
        );

        //masukan data ke database
        $this->Usermodel->save([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => $password,
            'salt' => $salt,
            'folder' => $folder,
            'profile_picture' => 'pfp.png',
            'active_code' => $active_code,
            'is_active' => '0',
        ]);

        $data = [
            'email' => $data['email'],
            'active_code' => $active_code
        ];

        $this->email->setTo($data['email']);
        $this->email->setFrom('moment7833@gmail.com','Moment it');
        $this->email->setSubject('Email Validation');
        $this->email->setMessage(view('auth/email_verification',$data));

        $this->email->send() ;

        //arahkan ke halaman login
        session()->setFlashdata('login', 'You have successfully registered, please check your email to activate your account');
        return redirect()->to('/login');
    }

    public function verification($active_code)
    {
        $user = $this->Usermodel->where('active_code',$active_code)->first();

        if(!$user)
        {
            return redirect()->to('/');
        }

        $data = [
            'active_code' => null,
            'is_active'=> '1'
        ];
        $this->Usermodel->update_data($user['id_user'],$data);
        session()->setFlashdata('login', 'Your account have successfully verified, please login to look your account');
        return redirect()->to('/login');
    }

    public function email_validation()
    {
        return view('auth/email_verification.php');
    }

    public function logout()
    {
        //hancurkan session 
        //balikan ke halaman login
        $this->session->destroy();
        return redirect()->to('/login');
    }
}


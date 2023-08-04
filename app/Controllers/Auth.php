<?php

namespace App\Controllers;
use App\Models\Model_Auth;

class Auth extends BaseController
{

    public function __construct()
    {
        helper('form');
        $this->Model_Auth= new Model_Auth();
    }
    public function index()
    {
       $data = array( 
           'title' => 'login'
       );
       return view('login', $data);
    }

    public function login()
    {
        if ($this->validate([
            'username' => [
                'label' => 'Username',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi !!!'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi !!!'
                ]
            ],
        ])) {
            //jika Valid
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            $cek = $this->Model_Auth->login($username, $password);
                if ($cek){
                    //jika datanya cocok
                    session()->set('nama_user', $cek['nama_user']);
                    session()->set('username', $cek['username']);
                    session()->set('password', $cek['password']);
                    session()->set('level', $cek['level']);
                    session()->set('foto_user', $cek['foto_user']);
                    //login
                } else {
                    //jika datanya tidak cocok
                    session()->setFlashdata('pesan', 'Login Gagal, Username atau Password tidak sesuai');
                    return redirect()->to(base_url('auth/index'));

                }
    }else{
            //jika tidak Valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('auth/index'));

        }
    }

    public function logout()
    {
        session()->remove('nama_user');
        session()->remove('username');
        session()->remove('password');
        session()->remove('level');
        session()->remove('foto_user');

        session()->setFlashdata('sukses', 'Logout Berhasil !!!');
        return redirect()->to(base_url('auth/index'));

    }
}

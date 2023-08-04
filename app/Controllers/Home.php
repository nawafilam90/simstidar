<?php

namespace App\Controllers;

use App\Models\ModelProdi;
use App\Models\ModelMahasiswa;
use App\Models\ModelDosen;
use App\Models\ModelUser;

class Home extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->ModelProdi = new ModelProdi();
        $this->ModelMahasiswa = new ModelMahasiswa();
        $this->ModelDosen = new ModelDosen();
        $this->ModelUser = new ModelUser();

    }
    public function index()
    {

        $data= [
            'jml_prodi' => $this->ModelProdi->jml_prodi(),
            'jml_mhs' => $this->ModelMahasiswa->jml_mhs(),
            'jml_dsn' => $this->ModelDosen->jml_dsn(),
            'jml_user' => $this->ModelUser->jml_user(),
            'title' => 'Home',
            'isi'   => 'home'

        ];
        return view('layout/wrapper', $data);
    }

}

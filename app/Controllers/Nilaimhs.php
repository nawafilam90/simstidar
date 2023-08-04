<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\ModelKelas;
use App\Models\ModelTA;
use App\Models\ModelMatkul;
use App\Models\ModelProdi;
use App\Models\ModelDosen;
use App\Models\ModelMahasiswa;
use App\Models\ModelNilai;


class Nilaimhs extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->ModelKelas = new ModelKelas();
        $this->ModelTA = new ModelTA();
        $this->ModelMatkul = new ModelMatkul();
        $this->ModelProdi = new ModelProdi();
        $this->ModelDosen = new ModelDosen();
        $this->ModelMahasiswa = new ModelMahasiswa();
        $this->ModelNilai = new ModelNilai();
        
    }
    
    public function index()
    {
        $mhs = $this->ModelNilai->datamahasiswa();
        $data= [
        'title'     => 'Nilai Akademik',
        'ta_aktif'  => $this->ModelTA->ta_aktif(),
        'nilai'     => $this->ModelNilai->allDatamhs($mhs['id_mhs']),
        'mhs'       => $mhs,
        'isi'       => 'mhs/nilai_mhs'
        ];
        return view('layout/wrapper', $data);

    }

    
   

   
    
    

}
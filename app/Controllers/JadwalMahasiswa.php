<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\ModelJadwal;
use App\Models\ModelTA;


class JadwalMahasiswa extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->ModelJadwal = new ModelJadwal();
        $this->ModelTA = new ModelTA();



    }
    
    public function index()
    {
        $mhs = $this->ModelJadwal->datamhs();

        $data= [
        'title'     => 'Jadwal Pelajaran',
        'ta_aktif'  => $this->ModelTA->ta_aktif(),
        'jadwal'    => $this->ModelJadwal->jadwalmhs($mhs['id_prodi']),
        'isi'       => 'mhs/jadwal_mhs'
        ];
        return view('layout/wrapper', $data);

    }
    
    


}
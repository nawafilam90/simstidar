<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\ModelJadwal;
use App\Models\ModelTA;


class JadwalDosen extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->ModelJadwal = new ModelJadwal();
        $this->ModelTA = new ModelTA();



    }
    
    public function index()
    {
        $dosen = $this->ModelJadwal->datadosen();

        $data= [
        'title'     => 'Jadwal Mengajar',
        'ta_aktif'  => $this->ModelTA->ta_aktif(),
        'jadwal' => $this->ModelJadwal->jadwaldosen($dosen['id_dosen']),
        'isi'       => 'dosen/jadwal_dosen'
        ];
        return view('layout/wrapper', $data);

    }
    
    


}
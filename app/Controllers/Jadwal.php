<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\ModelJadwal;
use App\Models\ModelMatkul;
use App\Models\ModelProdi;
use App\Models\ModelTA;
use App\Models\ModelDosen;


class Jadwal extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->ModelJadwal = new ModelJadwal();
        $this->ModelMatkul = new ModelMatkul();
        $this->ModelProdi = new ModelProdi();
        $this->ModelTA = new ModelTA();
        $this->ModelDosen = new ModelDosen();



    }
    
    public function index()
    {
        $data= [
        'title'     => 'Jadwal Kuliah',
        'ta_aktif'  => $this->ModelTA->ta_aktif(),
        'prodi'     => $this->ModelProdi->allData(),
        'isi'       => 'admin/jadwal'
        ];
        return view('layout/wrapper', $data);

    }
    
    public function detail_jadwal($id_prodi)
    { 

        $data= [
        'title'  => 'Jadwal Kuliah',
        'ta_aktif'  => $this->ModelTA->ta_aktif(),
        'prodi'  => $this->ModelProdi->detail_Data($id_prodi),
        'jadwal' => $this->ModelJadwal->allData($id_prodi),
        'matkul' => $this->ModelJadwal->matkul($id_prodi),
        'dosen' => $this->ModelDosen->allData(),
        'kelas' => $this->ModelJadwal->kelas($id_prodi),
        'isi'    => 'admin/detail_jadwal'
        ];
        return view('layout/wrapper', $data);
    }

    public function add($id_prodi)
    {
            $data = [
                'id_prodi'      => $id_prodi,
                'id_kelas'     => $this->request->getPost('id_kelas'),
                'id_matkul'     => $this->request->getPost('id_matkul'),
                'id_dosen'      => $this->request->getPost('id_dosen'),
                'id_ta'         => $this->request->getPost('id_ta'),
                'hari'          => $this->request->getPost('hari'),
                'waktu'         => $this->request->getPost('waktu')


            ];
            $this->ModelJadwal->add($data);
            session()->setFlashdata('sukses', 'Data berhasil ditambahkan !!!');
            return redirect()->to(base_url('jadwal/detail_jadwal/' . $id_prodi));
    }

    public function edit($id_prodi, $id_jadwal)
    {
        $data = [
            'id_jadwal' => $id_jadwal,
            'hari'      => $this->request->getPost('hari'),
            'waktu'     => $this->request->getPost('waktu')

        ];
        $this->ModelJadwal->edit($data);
        session()->setFlashdata('sukses', 'Data berhasil dirubah !!!');
        return redirect()->to(base_url('jadwal/detail_jadwal/' . $id_prodi));
    }

    public function delete($id_prodi, $id_jadwal)
    {
        $data = [
            'id_jadwal' => $id_jadwal,
        ];
        $this->ModelJadwal->delete_data($data);
        session()->setFlashdata('sukses', 'Data berhasil dihapus !!!');
        return redirect()->to(base_url('jadwal/detail_jadwal/' . $id_prodi));
    }

    public function jadwal_mhs()
    { 
        $mhs = $this->ModelJadwal->datamhs();
        $data= [
        'title'  => 'Jadwal Kuliah',
        'ta_aktif'  => $this->ModelTA->ta_aktif(),
        'prodi'  => $this->ModelProdi->detail_Data($id_prodi),
        'jadwal' => $this->ModelJadwal->jadwalmhs($mhs['id_prodi']),
        'matkul' => $this->ModelJadwal->matkul($id_prodi),
        'dosen' => $this->ModelDosen->allData(),
        'kelas' => $this->ModelJadwal->kelas($id_prodi),
        'isi'    => 'admin/jadwal_mhs'
        ];
        return view('layout/wrapper', $data);
    }



}
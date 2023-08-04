<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\ModelKelas;
use App\Models\ModelTA;
use App\Models\ModelMatkul;
use App\Models\ModelProdi;
use App\Models\ModelDosen;
use App\Models\ModelMahasiswa;
use App\Models\ModelPresensi;


class Presensi extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->ModelKelas = new ModelKelas();
        $this->ModelTA = new ModelTA();
        $this->ModelMatkul = new ModelMatkul();
        $this->ModelProdi = new ModelProdi();
        $this->ModelDosen = new ModelDosen();
        $this->ModelPresensi = new ModelPresensi();
        
    }
    
    public function index()
    {
        $data= [
        'title'     => 'Presensi Akademik',
        'ta_aktif'  => $this->ModelTA->ta_aktif(),
        'prodi'     => $this->ModelProdi->allData(),
        'kelas'     => $this->ModelKelas->allData(),
        'isi'       => 'admin/presensi'
        ];
        return view('layout/wrapper', $data);

    }

    public function filterkelas()
    {
        $prodi = $this->request->getPost('prodi');
        $angkatan = $this->request->getPost('angkatan');
        $modelpresensi = new ModelPresensi();
        $filterKelas = $modelpresensi->filterKelas($prodi,$angkatan);
        $data= [
        'title'     => 'Presensi Akademik',
        'ta_aktif'  => $this->ModelTA->ta_aktif(),
        'fprodi'     => $this->ModelProdi->allData(),
        'kelas'     => $filterKelas,
        'prodi'     => $prodi,
        'angkatan'   => $angkatan,
        'isi'       => 'admin/presensi_filter'
        ];
        return view('layout/wrapper', $data);

    }
    
    public function presensi_kelas($id_kelas)
    { 

        $rmbl = $this->ModelKelas->detailData($id_kelas);
        $data= [
        'title'         => 'Presensi Kelas : ' . '<label class="text-teal">'. $rmbl['nama_kelas'] .' - ' . $rmbl['matkul'] . '</label>',
        'kelas'        => $this->ModelKelas->detailData($id_kelas),
        'mhs'           => $this->ModelKelas->mhs(),
        'anggotakelas'  => $this->ModelKelas->anggotakelas($id_kelas),
        'jml'           => $this->ModelKelas->jml_anggota($id_kelas),
        'isi'            => 'admin/presensi_kelas'
        ];
        return view('layout/wrapper', $data);    
    
    }

    public function isi_presensi_kelas($id_kelas)
    { 

        $rmbl = $this->ModelKelas->anggotakelas($id_kelas);
        foreach ($rmbl as $key => $value) {
        $data= [
        'id_anggota_kelas'  => $this->request->getPost($value['id_anggota_kelas'] . 'id_anggota_kelas'),
        'p1'                => $this->request->getPost($value['id_anggota_kelas'] . 'p1'),
        'p2'                => $this->request->getPost($value['id_anggota_kelas'] . 'p2'),
        'p3'                => $this->request->getPost($value['id_anggota_kelas'] . 'p3'),
        'p4'                => $this->request->getPost($value['id_anggota_kelas'] . 'p4'),
        'p5'                => $this->request->getPost($value['id_anggota_kelas'] . 'p5'),
        'p6'                => $this->request->getPost($value['id_anggota_kelas'] . 'p6'),
        'p7'                => $this->request->getPost($value['id_anggota_kelas'] . 'p7'),
        'p8'                => $this->request->getPost($value['id_anggota_kelas'] . 'p8'),
        'p9'                => $this->request->getPost($value['id_anggota_kelas'] . 'p9'),
        'p10'                => $this->request->getPost($value['id_anggota_kelas'] . 'p10'),
        'p11'                => $this->request->getPost($value['id_anggota_kelas'] . 'p11'),
        'p12'                => $this->request->getPost($value['id_anggota_kelas'] . 'p12'),
        'p13'                => $this->request->getPost($value['id_anggota_kelas'] . 'p13'),
        'p14'                => $this->request->getPost($value['id_anggota_kelas'] . 'p14'),
        'nilai_kehadiran'    => $this->request->getPost($value['id_anggota_kelas'] . 'kehadiran'),
        'jml_pertemuan'      => $this->request->getPost('jml_pertemuan'),
        

        ];
        $this->ModelPresensi->simpanpresensi($data);
        }
        session()->setFlashdata('sukses', "Presensi berhasil diperbarui !!!");
        return redirect()->to(base_url('presensi/presensi_kelas/'.$id_kelas));

    
    }


}
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


class Nilai extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->ModelKelas = new ModelKelas();
        $this->ModelTA = new ModelTA();
        $this->ModelMatkul = new ModelMatkul();
        $this->ModelProdi = new ModelProdi();
        $this->ModelDosen = new ModelDosen();
        $this->ModelNilai = new ModelNilai();
        
    }
    
    public function index()
    {
        $dosen = $this->ModelNilai->datadosen();
        $data= [
        'title'     => 'Nilai Akademik',
        'ta_aktif'  => $this->ModelTA->ta_aktif(),
        'prodi'     => $this->ModelProdi->allData(),
        'kelas'     => $this->ModelNilai->allData($dosen['id_dosen']),
        'isi'       => 'dosen/nilai'
        ];
        return view('layout/wrapper', $data);

    }

    
    public function nilai_kelas($id_kelas)
    { 

        $rmbl = $this->ModelKelas->detailData($id_kelas);
        $data= [
        'title'         => 'Nilai Kelas : ' . '<label class="text-teal">'. $rmbl['nama_kelas'] .' - ' . $rmbl['matkul'] . '</label>',
        'kelas'        => $this->ModelKelas->detailData($id_kelas),
        'mhs'           => $this->ModelKelas->mhs(),
        'anggotakelas'  => $this->ModelKelas->anggotakelas($id_kelas),
        'jml'           => $this->ModelKelas->jml_anggota($id_kelas),
        'isi'            => 'dosen/nilai_kelas'
        ];
        return view('layout/wrapper', $data);    
    
    }

    public function input_nilai($id_kelas)
    { 

        $rmbl = $this->ModelKelas->anggotakelas($id_kelas);
        foreach ($rmbl as $key => $value) {
        $absen = $this->request->getPost($value['id_anggota_kelas'] . 'presensi');
        $tugas = $this->request->getPost($value['id_anggota_kelas'] . 'tugas');
        $uts = $this->request->getPost($value['id_anggota_kelas'] . 'uts');
        $uas = $this->request->getPost($value['id_anggota_kelas'] . 'uas');
        $na = ($absen * 15 / 100) + ($tugas * 15 / 100) + ($uts * 30 / 100) + ($uas * 40 / 100);
        //$bobot = $na / 100 * 4;
        if ($na >= 91) {
            $nh = 'A';
            $bobot = '4.00';
        } elseif($na < 91 && $na >= 85){
            $nh = 'A-';
            $bobot = '3.75';
        } elseif($na < 86 && $na >= 80){
            $nh = 'B+';
            $bobot = '3.50';
        } elseif($na < 81 && $na >= 75){
            $nh = 'B';
            $bobot = '3.25';
        } elseif($na < 76 && $na >= 70){
            $nh = 'B-';
            $bobot = '3.00';
        } elseif($na < 71 && $na >= 65){
            $nh = 'C+';
            $bobot = '2,75';
        } elseif($na < 66 && $na >= 60){
            $nh = 'C';
            $bobot = '2,50';
        } elseif($na < 61 && $na >= 55){
            $nh = 'C-';
            $bobot = '2,25';
        } elseif($na < 56 && $na >= 50){
            $nh = 'D';
            $bobot = '2,00';
        } else{
            $nh = 'E';
            $bobot = '1,00';
        }

        
        $data= [
        'id_anggota_kelas'  => $this->request->getPost($value['id_anggota_kelas'] . 'id_anggota_kelas'),
        'nilai_kehadiran'   => $this->request->getPost($value['id_anggota_kelas'] . 'presensi'),
        'nilai_tugas'       => $this->request->getPost($value['id_anggota_kelas'] . 'tugas'),
        'nilai_uts'         => $this->request->getPost($value['id_anggota_kelas'] . 'uts'),
        'nilai_uas'         => $this->request->getPost($value['id_anggota_kelas'] . 'uas'),
        'nilai_akhir'       => number_format($na, 2),       
        'nilai_huruf'       => $nh,
        'nilai_bobot'       => round($bobot, 2),
        ];
        $this->ModelNilai->simpannilai($data);
        }
        session()->setFlashdata('sukses', "Nilai berhasil diperbarui !!!");
        return redirect()->to(base_url('nilai/nilai_kelas/'.$id_kelas));

    
    }


}
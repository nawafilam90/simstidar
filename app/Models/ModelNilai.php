<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelNilai extends Model
{

  public function datadosen()
  {
    return $this->db->table('dosen')
    ->where('nidn', session()->get('username'))
    ->get()->getRowArray(); 
  }

  public function allData($id_dosen)
  {
    return $this->db->table('kelas')
    ->join('prodi', 'prodi.id_prodi = kelas.id_prodi', 'left')
    ->join('dosen', 'dosen.id_dosen = kelas.id_dosen', 'left')
    ->join('th_akademik', 'th_akademik.id_ta = kelas.id_ta', 'left')
    ->join('matkul', 'matkul.id_matkul = kelas.id_matkul', 'left')
    ->where('kelas.id_dosen', $id_dosen)
    ->get()->getResultArray(); 
  }
 
  
  public function simpannilai($data) 
  {
    $this->db->table('anggota_kelas')
    ->where('id_anggota_kelas', $data['id_anggota_kelas'])
    ->update($data);
  }



  public function datamahasiswa()
  {
    return $this->db->table('mahasiswa')
    ->where('nim', session()->get('username'))
    ->get()->getRowArray(); 
  }

  public function allDatamhs($id_mhs)
  {
    return $this->db->table('anggota_kelas')
    ->join('mahasiswa', 'mahasiswa.id_mhs = anggota_kelas.id_mhs', 'left')
    ->join('kelas', 'kelas.id_kelas = anggota_kelas.id_kelas', 'left')
    ->join('matkul', 'matkul.id_matkul = kelas.id_matkul', 'left')
    ->join('dosen', 'dosen.id_dosen = kelas.id_dosen', 'left')
    ->join('prodi', 'prodi.id_prodi = kelas.id_prodi', 'left')
    ->where('anggota_kelas.id_mhs', $id_mhs)
    ->get()->getResultArray(); 
  }

  public function khs(){
    return $this->db->table('anggota_kelas')
    ->join('mahasiswa','mahasiswa.id_mhs = anggota_kelas.id_mhs', 'left')
    ->join('dosen', 'dosen.id_dosen = anggota_kelas.id_dosen', 'left')
    ->join('kelas', 'kelas.id_kelas = anggota_kelas.id_kelas', 'left')
    ->join('matkul','matkul.id_matkul = anggota_kelas.id_matkul', 'left')
    ->join('prodi', 'prodi.id_prodi = anggota_kelas.id_prodi', 'left')
    ->join('th_akademik', 'th_akademik.id_ta = anggota_kelas.id_ta', 'left')
    ->where('anggota_kelas.id_mhs', session()->get('username'))
  }
   
}
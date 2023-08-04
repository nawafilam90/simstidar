<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKelas extends Model
{
  public function allData() 
  {
    return $this->db->table('kelas')
    ->join('prodi', 'prodi.id_prodi = kelas.id_prodi', 'left')
    ->join('dosen', 'dosen.id_dosen = kelas.id_dosen', 'left')
    ->join('th_akademik', 'th_akademik.id_ta = kelas.id_ta', 'left')
    ->join('matkul', 'matkul.id_matkul = kelas.id_matkul', 'left')
    ->orderBy('kelas.id_ta', 'DESC')
    ->get()->getResultArray(); 
  }

  public function detailData($id_kelas) 
  {
    return $this->db->table('kelas')
    ->join('prodi', 'prodi.id_prodi = kelas.id_prodi', 'left')
    ->join('dosen', 'dosen.id_dosen = kelas.id_dosen', 'left')
    ->join('th_akademik', 'th_akademik.id_ta = kelas.id_ta', 'left')
    ->join('matkul', 'matkul.id_matkul = kelas.id_matkul', 'left')
    ->where('id_kelas', $id_kelas)
    ->get()->getRowArray(); 
  }

  public function add($data) 
  {
    $this->db->table('kelas')->insert($data);
  }

  public function edit($data) 
  {
    $this->db->table('kelas')
    ->where('id_kelas', $data['id_kelas'])
    ->update($data);
  }

  public function delete_data($data) 
  {
    
    $this->db->table('kelas')
    ->where('id_kelas', $data['id_kelas'])
    ->delete($data);
  }


  public function mhs() 
  {
    return $this->db->table('mahasiswa')
    ->join('prodi', 'prodi.id_prodi = mahasiswa.id_prodi', 'left')
    ->orderBy('id_mhs', 'DESC')
    ->get()->getResultArray(); 
  }

  public function jml_anggota($id_kelas) 
  {
    return $this->db->table('anggota_kelas')
    ->where('id_kelas', $id_kelas)
    ->countAllResults(); 
  }

  public function add_anggota_kelas($data) 
  {
    $this->db->table('anggota_kelas')
    ->insert($data);
  }

  public function anggotakelas($id_kelas) 
  {
    return $this->db->table('anggota_kelas')
    ->join('mahasiswa', 'mahasiswa.id_mhs = anggota_kelas.id_mhs', 'left')
    ->where('anggota_kelas.id_kelas', $id_kelas)
    ->orderBy('anggota_kelas.id_mhs', 'DESC')
    ->get()->getResultArray(); 
  }

  public function delete_anggotakelas($data) 
  {
    $this->db->table('anggota_kelas')
    ->where('id_anggota_kelas', $data['id_anggota_kelas'])
    ->delete($data);
  }

  public function delete_semua_anggotakelas($data) 
  {
      $this->db->table('anggota_kelas')
      ->delete($data);
  }

   
}
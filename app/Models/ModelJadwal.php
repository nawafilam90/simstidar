<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelJadwal extends Model
{
  
  public function allData($id_prodi) 
  {
    return $this->db->table('jadwal')
    ->join('matkul','matkul.id_matkul = jadwal.id_matkul', 'left')
    ->join('prodi','prodi.id_prodi = jadwal.id_prodi', 'left')
    ->join('dosen','dosen.id_dosen = jadwal.id_dosen', 'left')
    ->join('kelas','kelas.id_kelas = jadwal.id_kelas', 'left')
    ->where('jadwal.id_prodi', $id_prodi)
    ->orderBy('matkul.smt', 'ASC')
    ->orderBy('jadwal.hari', 'DESC')
    ->get()->getResultArray(); 
  }

  public function datadosen()
  {
    return $this->db->table('dosen')
    ->where('nidn', session()->get('username'))
    ->get()->getRowArray(); 
  }
  
  public function jadwaldosen($id_dosen) 
  {
    return $this->db->table('jadwal')
    ->join('matkul','matkul.id_matkul = jadwal.id_matkul', 'left')
    ->join('prodi','prodi.id_prodi = jadwal.id_prodi', 'left')
    ->join('dosen','dosen.id_dosen = jadwal.id_dosen', 'left')
    ->join('kelas','kelas.id_kelas = jadwal.id_kelas', 'left')
    ->where('jadwal.id_dosen', $id_dosen)
    ->orderBy('matkul.smt', 'ASC')
    ->orderBy('jadwal.hari', 'DESC')
    ->get()->getResultArray(); 
  }

  public function datamhs()
  {
    return $this->db->table('mahasiswa')
    ->where('nim', session()->get('username'))
    ->get()->getRowArray(); 
  }
  
  public function jadwalmhs($mhs) 
  {
    return $this->db->table('jadwal')
    ->join('matkul','matkul.id_matkul = jadwal.id_matkul', 'left')
    ->join('prodi','prodi.id_prodi = jadwal.id_prodi', 'left')
    ->join('dosen','dosen.id_dosen = jadwal.id_dosen', 'left')
    ->join('kelas','kelas.id_kelas = jadwal.id_kelas', 'left')
    ->where('jadwal.id_prodi', $mhs)
    ->orderBy('matkul.smt', 'ASC')
    ->orderBy('jadwal.hari', 'DESC')
    ->get()->getResultArray(); 
  }



  public function matkul($id_prodi) 
  {
    return $this->db->table('matkul')
    ->where('id_prodi' , $id_prodi)
    ->orderBy('smt', 'ASC')
    ->get()->getResultArray(); 
  }

  public function kelas($id_prodi) 
  {
    return $this->db->table('kelas')
    ->join('matkul','matkul.id_matkul = kelas.id_matkul', 'left')
    ->join('prodi','prodi.id_prodi = kelas.id_prodi', 'left')
    ->join('dosen','dosen.id_dosen = kelas.id_dosen', 'left')
    ->join('th_akademik','th_akademik.id_ta = kelas.id_ta', 'left')
    ->where('kelas.id_prodi' , $id_prodi)
    ->orderBy('kelas.id_prodi', 'ASC')
    ->get()->getResultArray(); 
  }


  public function add($data) 
  {
    $this->db->table('jadwal')->insert($data);
  }

  public function edit($data) 
  {
    $this->db->table('jadwal')
    ->where('id_jadwal', $data['id_jadwal'])
    ->update($data);
  }

  
  public function delete_data($data) 
  {
    $this->db->table('jadwal')
    ->where('id_jadwal', $data['id_jadwal'])
    ->delete($data);
  }


}


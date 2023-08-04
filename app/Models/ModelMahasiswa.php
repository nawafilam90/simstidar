<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelMahasiswa extends Model
{
  public function allData() 
  {
    return $this->db->table('mahasiswa')
    ->join('prodi', 'prodi.id_prodi = mahasiswa.id_prodi', 'left')
    ->orderBy('id_mhs', 'DESC')
    ->get()->getResultArray(); 
  }

  public function detail_data($id_mhs) 
  {
    return $this->db->table('mahasiswa')
    ->join('prodi', 'prodi.id_prodi = mahasiswa.id_prodi', 'left')
    ->join('user', 'user.username = mahasiswa.nim', 'left')
    ->where('id_mhs', $id_mhs)
    ->get()->getRowArray(); 
  }

  public function add($data) 
  {
    $this->db->table('mahasiswa')->insert($data);
  }

  public function edit($data) 
  {
    $this->db->table('mahasiswa')
    ->where('id_mhs', $data['id_mhs'])
    ->update($data);
  }

  public function delete_data($data) 
  {
    $this->db->table('mahasiswa')
    ->where('id_mhs', $data['id_mhs'])
    ->delete($data);
  }

  public function jml_mhs() 
  {
    return $this->db->table('mahasiswa')->countAllResults();
  }

}
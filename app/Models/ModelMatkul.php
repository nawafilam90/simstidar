<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelMatkul extends Model
{
  public function allData() 
  {
    return $this->db->table('matkul')
    ->join('prodi', 'prodi.id_prodi = matkul.id_prodi', 'left')
    ->orderBy('id_matkul', 'DESC')
    ->get()->getResultArray(); 
  }

  public function allDataMatkul($id_prodi) 
  {
    return $this->db->table('matkul')
    ->where('id_prodi' , $id_prodi)
    ->orderBy('smt', 'ASC')
    ->get()->getResultArray(); 
  }


  public function add($data) 
  {
    $this->db->table('matkul')->insert($data);
  }

  public function delete_data($data) 
  {
    $this->db->table('matkul')
    ->where('id_matkul', $data['id_matkul'])
    ->delete($data);
  }


}
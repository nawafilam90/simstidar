<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelTA extends Model
{
  public function allData() 
  {
    return $this->db->table('th_akademik')
    ->orderBy('id_ta', 'DESC')
    ->get()->getResultArray(); 
  }

  public function add($data) 
  {
    $this->db->table('th_akademik')->insert($data);
  }

  public function edit($data) 
  {
    $this->db->table('th_akademik')
    ->where('id_ta', $data['id_ta'])
    ->update($data);
  }

  public function delete_data($data) 
  {
    $this->db->table('th_akademik')
    ->where('id_ta', $data['id_ta'])
    ->delete($data);
  }

  public function reset_status_ta() 
  {
    $this->db->table('th_akademik')->update(['status' => 0]);
  }

  public function ta_aktif() 
  {
    return $this->db->table('th_akademik')
    ->where('status',1)
    ->get()
    ->getRowArray();
  }

}
<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_Auth extends Model
{
  public function login($username, $password)
  {
    return $this->db->table('user')->where([
        'username' => $username,
        'password' => $password,
    ])->get()->getRowArray();  
  }
}
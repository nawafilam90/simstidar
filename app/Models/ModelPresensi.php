<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPresensi extends Model
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
 
  public function filterKelas($prodi,$angkatan) 
  {
    return $this->db->table('kelas')
    ->join('prodi', 'prodi.id_prodi = kelas.id_prodi', 'left')
    ->join('dosen', 'dosen.id_dosen = kelas.id_dosen', 'left')
    ->join('th_akademik', 'th_akademik.id_ta = kelas.id_ta', 'left')
    ->join('matkul', 'matkul.id_matkul = kelas.id_matkul', 'left')
    ->where('kelas.id_prodi', $prodi)
    ->where('kelas.angkatan', $angkatan)
    ->get();
  }

  public function simpanpresensi($data) 
  {
    $this->db->table('anggota_kelas')
    ->where('id_anggota_kelas', $data['id_anggota_kelas'])
    ->update($data);
  }

   
}
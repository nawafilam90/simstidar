<?php

namespace App\Controllers;

use App\Models\ModelMahasiswa;
use App\Models\ModelUser;


class Mahasiswa extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->ModelMahasiswa = new ModelMahasiswa();
        $this->ModelUser = new ModelUser();
    }
    
    public function index()
    {
        $data= [
        'title'     => 'Mahasiswa',
        'mahasiswa'     => $this->ModelMahasiswa->allData(),
        'isi'       => 'admin/mahasiswa'
        ];
        return view('layout/wrapper', $data);
    }
    
    public function biodata_mhs($id_mhs)
    {
        $data= [
        'title'         => 'Biodata Mahasiswa',
        'mahasiswa'     => $this->ModelMahasiswa->detail_data($id_mhs),
        'user'          => $this->ModelUser->allData(),
        'isi'           => 'admin/biodata_mhs'
        ];
        return view('layout/wrapper', $data);
    }

    
    public function add()
    {
        $validation = \Config\Services::validation();
        
        if ($this->validate([
            'nim'    => [
                'label'     => 'NIM',
                'rules'     => 'required|is_unique[mahasiswa.nim]',
                'errors'    => [
                            'required' => '{field} Harus diisi !',
                            'is_unique' => '{field} Sudah ada !'                        
                        ]
                ],
            ])){
                //jika valid
                $data = array(
                    'nim' => $this->request->getPost('nim'),
                    'nama_mhs' => $this->request->getPost('nama_mhs'),
                    'jk' => $this->request->getPost('jk'),
                    'tempat_lahir' => $this->request->getPost('tempat_lahir'),
                    'tgl_lahir' => $this->request->getPost('tgl_lahir'),
                    'alamat' => $this->request->getPost('alamat'),
                    'rt_rw' => $this->request->getPost('rt_rw'),
                    'provinsi' => $this->request->getPost('provinsi'),
                    'kabupaten' => $this->request->getPost('kabupaten'),
                    'kecamatan' => $this->request->getPost('kecamatan'),
                    'kelurahan' => $this->request->getPost('kelurahan'),
                    'nik' => $this->request->getPost('nik'),
                    'no_hp' => $this->request->getPost('no_hp'),
                    'email' => $this->request->getPost('email'),
                    'nama_ayah' => $this->request->getPost('nama_ayah'),
                    'alamat_ayah' => $this->request->getPost('alamat_ayah'),
                    'pendidikan_ayah' => $this->request->getPost('pendidikan_ayah'),
                    'pekerjaan_ayah' => $this->request->getPost('pekerjaan_ayah'),
                    'penghasilan_ayah' => $this->request->getPost('penghasilan_ayah'),
                    'nama_ibu' => $this->request->getPost('nama_ibu'),
                    'alamat_ibu' => $this->request->getPost('alamat_ibu'),
                    'pendidikan_ibu' => $this->request->getPost('pendidikan_ibu'),
                    'pekerjaan_ibu' => $this->request->getPost('pekerjaan_ibu'),
                    'penghasilan_ibu' => $this->request->getPost('penghasilan_ibu'),
                    'id_prodi' => $this->request->getPost('id_prodi'),
                    'angkatan' => $this->request->getPost('angkatan'),


                );
                $this->ModelMahasiswa->add($data);
                session()->setFlashdata('sukses', 'Data berhasil ditambahkan !!!');
                return redirect()->to(base_url('mahasiswa'));
        
        } else {
            //jika tidak valid
            session()->setFlashdata('error', $validation->getError('nim'));
            return redirect()->to(base_url('mahasiswa'));

        }
        

    }

    public function edit($id_mhs)
    {
                $data = array(
                        'id_mhs'   => $id_mhs,
                        'nim' => $this->request->getPost('nim'),
                        'nama_mhs' => $this->request->getPost('nama_mhs'),
                        'jk' => $this->request->getPost('jk'),
                        'tempat_lahir' => $this->request->getPost('tempat_lahir'),
                        'tgl_lahir' => $this->request->getPost('tgl_lahir'),
                        'alamat' => $this->request->getPost('alamat'),
                        'rt_rw' => $this->request->getPost('rt_rw'),
                        'provinsi' => $this->request->getPost('provinsi'),
                        'kabupaten' => $this->request->getPost('kabupaten'),
                        'kecamatan' => $this->request->getPost('kecamatan'),
                        'kelurahan' => $this->request->getPost('kelurahan'),
                        'nik' => $this->request->getPost('nik'),
                        'no_hp' => $this->request->getPost('no_hp'),
                        'email' => $this->request->getPost('email'),
                        'nama_ayah' => $this->request->getPost('nama_ayah'),
                        'alamat_ayah' => $this->request->getPost('alamat_ayah'),
                        'pendidikan_ayah' => $this->request->getPost('pendidikan_ayah'),
                        'pekerjaan_ayah' => $this->request->getPost('pekerjaan_ayah'),
                        'penghasilan_ayah' => $this->request->getPost('penghasilan_ayah'),
                        'nama_ibu' => $this->request->getPost('nama_ibu'),
                        'alamat_ibu' => $this->request->getPost('alamat_ibu'),
                        'pendidikan_ibu' => $this->request->getPost('pendidikan_ibu'),
                        'pekerjaan_ibu' => $this->request->getPost('pekerjaan_ibu'),
                        'penghasilan_ibu' => $this->request->getPost('penghasilan_ibu'),
                        'id_prodi' => $this->request->getPost('id_prodi'),
                        'angkatan' => $this->request->getPost('angkatan'),
                        
                    );
                $this->ModelMahasiswa->edit($data);
                session()->setFlashdata('sukses', 'Data berhasil dirubah !!!', 10);
                return redirect()->to(base_url('mahasiswa/biodata_mhs/'.$id_mhs));
    }

    public function delete($id_mhs)
    {
        $data = [
            'id_mhs' => $id_mhs,
        ];
        $this->ModelMahasiswa->delete_data($data);
        session()->setFlashdata('sukses', 'Data berhasil dihapus !!!');
        return redirect()->to(base_url('mahasiswa'));
    }


    public function upload()
    {
        $validation = \Config\Services::validation();

        $valid = $this->validate(
            [
            'fileimport'    => [
                'label'     => 'Import Mahasiswa',
                'rules'     => 'uploaded[fileimport]|ext_in[fileimport,xls,xlsx]',
                'errors'    => [
                        'uploaded' => '{field} Harus diisi !',
                        'ext_in' => '{field} Harus ekstensi, xls, xlsx !'
                    ]
                ]
            ]
        );
                
        if(!$valid) {
            //jika tidak valid
            session()->setFlashdata('error', $validation->getError('fileimport'));
            return redirect()->to(base_url('mahasiswa'));
        
        } else {
            //jika valid
            $file_excel = $this->request->getFile('fileimport');
            $ext = $file_excel->getClientExtension();
            if ($ext == 'xls') {
                $render = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
            } else {
                $render = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            }

            $spreadsheet = $render->load($file_excel);
            $data = $spreadsheet->getActiveSheet()->toArray();

            $pesan_error = [];
            $jumlaherror = 0;
            $jumlahsukses = 0;

            foreach($data as $x => $row) {
                if ($x == 0) {
                    continue;
                }
                $nim = $row[0];
                $nama_mhs = $row[1];
                $jk = $row[2];
                $tempat_lahir = $row[3];
                $tgl_lahir = $row[4];
                $alamat = $row[5];
                $rt_rw = $row[3];
                $provinsi = $row[7];
                $kabupaten = $row[8];
                $kecamatan = $row[9];
                $kelurahan = $row[10];
                $nik = $row[11];
                $no_hp = $row[12];
                $email = $row[13];
                $nama_ayah = $row[14];
                $alamat_ayah = $row[15];
                $pendidikan_ayah = $row[16];
                $pekerjaan_ayah = $row[17];
                $penghasilan_ayah = $row[18];
                $nama_ibu = $row[19];
                $alamat_ibu = $row[20];
                $pendidikan_ibu = $row[21];
                $pekerjaan_ibu = $row[22];
                $penghasilan_ibu = $row[23];
                $id_prodi = $row[24];
                $angkatan = $row[25];

                $db = \Config\Database::connect();

                $ceknim = $db->table('mahasiswa')->getWhere(['nim' => $nim])->getResult();

                if (count($ceknim) > 0) {
                    $jumlaherror++;
                } else {
                    $datasimpan = [
                        'nim' => $nim,
                        'nama_mhs' => $nama_mhs,
                        'jk' => $jk,
                        'tempat_lahir' => $tempat_lahir,
                        'tgl_lahir' => $tgl_lahir,
                        'alamat' => $alamat,
                        'rt_rw' => $rt_rw,
                        'provinsi' => $provinsi,
                        'kabupaten' => $kabupaten,
                        'kecamatan' => $kecamatan,
                        'kelurahan' => $kelurahan,
                        'nik' => $nik,
                        'no_hp' => $no_hp,
                        'email' => $email,
                        'nama_ayah' => $nama_ayah,
                        'alamat_ayah' => $alamat_ayah,
                        'pendidikan_ayah' => $pendidikan_ayah,
                        'pekerjaan_ayah' => $pekerjaan_ayah,
                        'penghasilan_ayah' => $penghasilan_ayah,
                        'nama_ibu' => $nama_ibu,
                        'alamat_ibu' => $alamat_ibu,
                        'pendidikan_ibu' => $pendidikan_ibu,
                        'pekerjaan_ibu' => $pekerjaan_ibu,
                        'penghasilan_ibu' => $penghasilan_ibu,
                        'id_prodi' => $id_prodi,
                        'angkatan' => $angkatan

                    ];
                    $db->table('mahasiswa')->insert($datasimpan);
                    $jumlahsukses++;
                }

            }

            session()->setFlashdata('sukses', "$jumlaherror Data tidak bisa disimpan, periksa NIM mungkin sudah ada <br> $jumlahsukses Data berhasil disimpan");
            return redirect()->to(base_url('mahasiswa'));
        }
    }



}
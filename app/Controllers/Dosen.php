<?php

namespace App\Controllers;

use App\Models\ModelDosen;

class Dosen extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->ModelDosen = new ModelDosen();
    }
    
    public function index()
    {
        $data= [
        'title'     => 'Dosen',
        'dosen'     => $this->ModelDosen->allData(),
        'isi'       => 'admin/dosen'
        ];
        return view('layout/wrapper', $data);
    }
    
    public function add()
    {
        $validation = \Config\Services::validation();
        
        if ($this->validate([
            'nidn'    => [
                'label'     => 'NIDN',
                'rules'     => 'required|is_unique[dosen.nidn]',
                'errors'    => [
                            'required' => '{field} Harus diisi !',
                            'is_unique' => '{field} Sudah ada !'                        
                        ]
                ],
            ])){
                //jika valid
                $data = array(
                    'nidn' => $this->request->getPost('nidn'),
                    'nama_dosen' => $this->request->getPost('nama_dosen'),
                    'pendidikan' => $this->request->getPost('pendidikan'),
                );
                $this->ModelDosen->add($data);
                session()->setFlashdata('sukses', 'Data berhasil ditambahkan !!!');
                return redirect()->to(base_url('dosen'));
        
        } else {
            //jika tidak valid
            session()->setFlashdata('error', $validation->getError('nidn'));
            return redirect()->to(base_url('dosen'));

        }
        

    }

    public function edit($id_dosen)
    {
                $data = array(
                        'id_dosen'   => $id_dosen,
                        'nidn'       => $this->request->getPost('nidn'),
                        'nama_dosen' => $this->request->getPost('nama_dosen'),
                        'pendidikan' => $this->request->getPost('pendidikan'),
                    );
                $this->ModelDosen->edit($data);
                session()->setFlashdata('sukses', 'Data berhasil dirubah !!!', 10);
                return redirect()->to(base_url('dosen'));
    }

    public function delete($id_dosen)
    {
        $data = [
            'id_dosen' => $id_dosen,
        ];
        $this->ModelDosen->delete_data($data);
        session()->setFlashdata('sukses', 'Data berhasil dihapus !!!');
        return redirect()->to(base_url('dosen'));
    }


    public function upload()
    {
        $validation = \Config\Services::validation();

        $valid = $this->validate(
            [
            'fileimport'    => [
                'label'     => 'Import Dosen',
                'rules'     => 'uploaded[fileimport]|ext_in[fileimport,xls,xlsx]',
                'errors'    => [
                        'uploaded' => '{field} Harus diisi !',
                        'ext_in' => '{field} Harus ekstensi, xls, xlsx !'
                    ]
                ]
            ],
        );
                
        if(!$valid) {
            //jika tidak valid
            session()->setFlashdata('error', $validation->getError('fileimport'));
            return redirect()->to(base_url('dosen'));
        
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
                $nidn = $row[0];
                $nama_dosen = $row[1];
                $pendidikan = $row[2];

                $db = \Config\Database::connect();

                $ceknidn = $db->table('dosen')->getWhere(['nidn' => $nidn])->getResult();

                if (count($ceknidn) > 0) {
                    $jumlaherror++;
                } else {
                    $datasimpan = [
                        'nidn' => $nidn,
                        'nama_dosen' => $nama_dosen,
                        'pendidikan' => $pendidikan
                    ];
                    $db->table('dosen')->insert($datasimpan);
                    $jumlahsukses++;
                }

            }

            session()->setFlashdata('sukses', "$jumlaherror Data tidak bisa disimpan, periksa NIDN mungkin sudah ada <br> $jumlahsukses Data berhasil disimpan");
            return redirect()->to(base_url('dosen'));
        }
    }


}
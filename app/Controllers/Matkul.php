<?php

namespace App\Controllers;

use App\Models\ModelMatkul;
use App\Models\ModelProdi;

class Matkul extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->ModelMatkul = new ModelMatkul();
        $this->ModelProdi = new ModelProdi();

    }
    
    public function index()
    {
        $data= [
        'title'     => 'Mata Kuliah',
        'prodi'  => $this->ModelProdi->allData(),
        'isi'       => 'admin/matkul'
        ];
        return view('layout/wrapper', $data);
    }
    
    public function detail_matkul($id_prodi)
    { 
        $data= [
        'title'  => 'Mata Kuliah',
        'prodi'  => $this->ModelProdi->detail_Data($id_prodi),
        'matkul' => $this->ModelMatkul->allDataMatkul($id_prodi),
        'isi'    => 'admin/detail_matkul'
        ];
        return view('layout/wrapper', $data);
    }

    public function add($id_prodi)
    {
        if ($this->validate([
            'kode_matkul'   => [
            'label'         => 'Kode Mata Kuliah',
            'rules'         => 'required|is_unique[matkul.kode_matkul]',
            'errors'        => [
                        'required' => '{field} Harus diisi !',
                        'is_unique' => '{field} Sudah ada !'
                        ]
                ],
            ])){
                //jika valid
                $smt = $this->request->getPost('smt');
                if ($smt == 1 || $smt == 3 || $smt == 5 || $smt == 7) {
                    $semester = 'Ganjil';
                } else {
                    $semester = 'Genap';
                }
            $data = [
                'id_prodi'      => $id_prodi,
                'kode_matkul'   => $this->request->getPost('kode_matkul'),
                'matkul'        => $this->request->getPost('matkul'),
                'sks'           => $this->request->getPost('sks'),
                'kategori'      => $this->request->getPost('kategori'),
                'smt'           => $this->request->getPost('smt'),
                'semester'      => $semester,

            ];
            $this->ModelMatkul->add($data);
            session()->setFlashdata('sukses', 'Data berhasil ditambahkan !!!', 10);
            return redirect()->to(base_url('matkul/detail_matkul/' . $id_prodi));
        } else {
            //jika tidak valid
            session()->setFlashdata('error', 'Kode Prodi sudah ada, cek kembali !!!', 10);
            return redirect()->to(base_url('matkul/detail_matkul/' . $id_prodi));
        }
    }

    public function delete($id_prodi, $id_matkul)
    {
        $data = [
            'id_matkul' => $id_matkul,
        ];
        $this->ModelMatkul->delete_data($data);
        session()->setFlashdata('sukses', 'Data berhasil dihapus !!!');
        return redirect()->to(base_url('matkul/detail_matkul/' . $id_prodi));
    }



    public function upload()
    {
        $validation = \Config\Services::validation();

        $valid = $this->validate(
            [
            'fileimport'    => [
                'label'     => 'Import Matkul',
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
            return redirect()->to(base_url('matkul'));
        
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
                $id_prodi       = $row[0];
                $kode_matkul    = $row[1];
                $matkul         = $row[2];
                $sks            = $row[3];
                $kategori       = $row[4];
                $smt            = $row[5];
                $semester       = $row[6];


                $db = \Config\Database::connect();

                $cekkodematkul = $db->table('matkul')->getWhere(['kode_matkul' => $kode_matkul])->getResult();

                if (count($cekkodematkul) > 0) {
                    $jumlaherror++;
                } else {
                    $datasimpan = [
                        'id_prodi'      => $id_prodi,
                        'kode_matkul'   => $kode_matkul,
                        'matkul'        => $matkul,
                        'sks'           => $sks,
                        'kategori'      => $kategori,
                        'smt'           => $smt,
                        'semester'      => $semester

                    ];
                    $db->table('matkul')->insert($datasimpan);
                    $jumlahsukses++;
                }

            }

            session()->setFlashdata('sukses', "$jumlaherror Data tidak bisa disimpan, periksa kode matkul mungkin sudah ada<br> $jumlahsukses Data berhasil disimpan");
            return redirect()->to(base_url('matkul'));
        }
    }


}
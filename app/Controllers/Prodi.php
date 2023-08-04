<?php

namespace App\Controllers;

use App\Models\ModelProdi;
use App\Models\ModelFakultas;
use App\Models\ModelDosen;

class Prodi extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->ModelProdi = new ModelProdi();
        $this->ModelFakultas = new ModelFakultas();
        $this->ModelDosen = new ModelDosen();

    }
    
    public function index()
    {
        $data= [
        'title'     => 'Program Studi',
        'prodi'     => $this->ModelProdi->allData(),
        'fakultas'  => $this->ModelFakultas->allData(),
        'dosen'     => $this->ModelDosen->allData(),
        'isi'       => 'admin/prodi'
        ];
        return view('layout/wrapper', $data);

    }
    
    public function add()
    {
        if ($this->validate([
        'kode_prodi'    => [
            'label'     => 'Kode Program Studi',
            'rules'     => 'required|is_unique[prodi.kode_prodi]',
            'errors'    => [
                    'required' => '{field} Harus diisi !',
                    'is_unique' => '{field} Sudah ada !'
                    ]
            ],
        ])){
            //jika valid
        $data = [
            'id_fakultas'   => $this->request->getPost('id_fakultas'),
            'kode_prodi'    => $this->request->getPost('kode_prodi'),
            'prodi'         => $this->request->getPost('prodi'),
            'jenjang'       => $this->request->getPost('jenjang'),
            'ka_prodi'       => $this->request->getPost('ka_prodi'),

        ];
        $this->ModelProdi->add($data);
        session()->setFlashdata('sukses', 'Data berhasil ditambahkan !!!', 10);
        return redirect()->to(base_url('prodi'));
    } else {
        //jika tidak valid
        session()->setFlashdata('error', 'Kode Prodi sudah ada, cek kembali !!!', 10);
        return redirect()->to(base_url('prodi'));

    }
            
    }

    public function edit($id_prodi) 
    {
        $data= [
            'title'     => 'Edit Program Studi',
            'fakultas'  => $this->ModelFakultas->allData(),
            'prodi'     => $this->ModelProdi->detail_Data($id_prodi),
            'dosen'     => $this->ModelDosen->allData(),
            'isi'       => 'admin/prodi'
            ];
            return view('layout/wrapper', $data);
    }

    public function update($id_prodi) 
    {
        $data = [
            'id_prodi'      => $id_prodi,
            'id_fakultas'   => $this->request->getPost('id_fakultas'),
            'kode_prodi'    => $this->request->getPost('kode_prodi'),
            'prodi'         => $this->request->getPost('prodi'),
            'jenjang'       => $this->request->getPost('jenjang'),
            'ka_prodi'      => $this->request->getPost('ka_prodi'),

        ];
        $this->ModelProdi->edit($data);
        session()->setFlashdata('sukses', 'Data berhasil dirubah !!!');
        return redirect()->to(base_url('prodi'));
    }

    public function delete($id_prodi)
    {
        $data = [
            'id_prodi' => $id_prodi,
        ];
        $this->ModelProdi->delete_data($data);
        session()->setFlashdata('sukses', 'Data berhasil dihapus !!!');
        return redirect()->to(base_url('prodi'));
    }

}
<?php

namespace App\Controllers;

use App\Models\ModelTA;

class TA extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->ModelTA = new ModelTA();
    }
    
    public function index()
    {
        $data= [
        'title'     => 'Tahun Akademik',
        'ta'        => $this->ModelTA->allData(),
        'isi'       => 'admin/ta'
        ];
        return view('layout/wrapper', $data);
    }
    
    public function add()
    {
        $data = [
            'ta'        => $this->request->getPost('ta'),
            'semester'  => $this->request->getPost('semester'),

        ];
        $this->ModelTA->add($data);
        session()->setFlashdata('sukses', 'Data berhasil ditambahkan !!!', 10);
        return redirect()->to(base_url('TA'));

    }

    public function edit($id_ta)
    {
        $data = [
            'id_ta'     => $id_ta,
            'ta'        => $this->request->getPost('ta'),
            'semester'  => $this->request->getPost('semester'),

        ];
        $this->ModelTA->edit($data);
        session()->setFlashdata('sukses', 'Data berhasil dirubah !!!');
        return redirect()->to(base_url('TA'));
    }

    public function delete($id_ta)
    {
        $data = [
            'id_ta' => $id_ta,
        ];
        $this->ModelTA->delete_data($data);
        session()->setFlashdata('sukses', 'Data berhasil dihapus !!!');
        return redirect()->to(base_url('TA'));
    }

    //setting Tahun Akademik
    public function setting()
    {
        $data= [
        'title'     => 'Tahun Akademik',
        'ta'        => $this->ModelTA->allData(),
        'isi'       => 'admin/ta_setting'
        ];
        return view('layout/wrapper', $data);
    }

    public function set_status_ta($id_ta)
    {
        //reset status TA
        $this->ModelTA->reset_status_ta();
        //setting status TA
        $data = [
            'id_ta'     => $id_ta,
            'status'    => 1

        ];
        $this->ModelTA->edit($data);
        session()->setFlashdata('sukses', 'Tahun akademik berhasil diatur !!!');
        return redirect()->to(base_url('TA/setting'));
    }


}
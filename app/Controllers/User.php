<?php

namespace App\Controllers;

use App\Models\ModelUser;
use App\Models\ModelMahasiswa;

class User extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->ModelUser = new ModelUser();
        $this->ModelMahasiswa = new ModelMahasiswa();
    }
    
    public function index()
    {
        $data= [
        'title'     => 'User',
        'user'  => $this->ModelUser->allData(),
        'isi'       => 'admin/user'
        ];
        return view('layout/wrapper', $data);
    }

    public function user_detail($id_user)
    {
        $data= [
        'title'     => 'User Akun',
        'user'  => $this->ModelUser->detail_data($id_user),
        'isi'       => 'admin/user_detail'
        ];
        return view('layout/wrapper', $data);
    }
    
    public function add()
    {
        $validation = \Config\Services::validation();
        
        if ($this->validate([
            'username'    => [
                'label'     => 'Username',
                'rules'     => 'required',
                'errors'    => [
                        'required' => '{field} Harus diisi !',
                        
                        ]
                ],

            'foto_user'    => [
                'label'     => 'Foto User',
                'rules'     => 'uploaded[foto_user]|max_size[foto_user,1024]|mime_in[foto_user,image/jpeg,image/jpg,image/png,]',
                'errors'    => [
                        'uploaded' => '{field} Harus diisi !',
                        'max_size' => '{field} Maksimal 1024 KB !',
                        'mime_in' => 'Format {field} Harus JPEG, JPG, PNG !'
                        ]
                ],
            ])){

                //Mengambil foto dari form input
                $foto_user = $this->request->getFile('foto_user');
                
                //Merubah nama file foto
                $ext = $foto_user->getClientExtension();
                $dot = '.';
                $name_file = $_POST['username'].$dot.$ext;

                //jika valid
                $data = array(
                    'nama_user' => $this->request->getPost('nama_user'),
                    'username' => $this->request->getPost('username'),
                    'password' => $this->request->getPost('password'),
                    'level' => $this->request->getPost('level'),
                    'foto_user' => $name_file,
                );
                //Memindahkan file foto dari form input ke folder foto directory
                $foto_user->move('foto', $name_file);
                $this->ModelUser->add($data);
                session()->setFlashdata('sukses', 'Data berhasil ditambahkan !!!', 10);
                return redirect()->to(base_url('user'));
        
        } else {
            //jika tidak valid
            session()->setFlashdata('error', $validation->getError('foto_user'));
            return redirect()->to(base_url('user'));

        }
        

    }

    public function edit($id_user)
    {
        $validation = \Config\Services::validation();
        
        if ($this->validate([
            'foto_user'    => [
                'label'     => 'Foto User',
                'rules'     => 'max_size[foto_user,1024]|mime_in[foto_user,image/jpeg,image/jpg,image/png,]',
                'errors'    => [
                        'max_size' => '{field} Maksimal 1024 KB / 1 MB !',
                        'mime_in' => 'Format {field} Harus JPEG, JPG, PNG !'
                        ]
                ],
            ])){

                //Mengambil foto dari form input
                $foto_user = $this->request->getFile('foto_user');
                
                if ($foto_user->getError() == 4){
                    $data = array(
                        'id_user'   => $id_user,
                        'nama_user' => $this->request->getPost('nama_user'),
                        'username' => $this->request->getPost('username'),
                        'password' => $this->request->getPost('password'),
                        'level' => $this->request->getPost('level'),
                    );
                    $this->ModelUser->edit($data);

                } else {
                    //Meghapus foto lama
                    $user = $this->ModelUser->detail_data($id_user);
                    if ($user['foto_user'] == "") {
                    } else
                    if ($user['foto_user'] != "") {
                        unlink('foto/' . $user['foto_user']);
                    }
                    //Merubah nama file foto
                    $ext = $foto_user->getClientExtension();
                    $dot = '.';
                    $name_file = $_POST['username'].$dot.$ext;
    
                    //jika valid
                    $data = array(
                        'id_user'   => $id_user,
                        'nama_user' => $this->request->getPost('nama_user'),
                        'username' => $this->request->getPost('username'),
                        'password' => $this->request->getPost('password'),
                        'level' => $this->request->getPost('level'),
                        'foto_user' => $name_file,
                    );
                    //Memindahkan file foto dari form input ke folder foto directory
                    $foto_user->move('foto', $name_file);
                    $this->ModelUser->edit($data);
                }
                session()->setFlashdata('sukses', 'Data berhasil dirubah !!!', 10);
                return redirect()->to(base_url('user'));
        } else {
            //jika tidak valid
            session()->setFlashdata('error', $validation->getError('foto_user'));

            return redirect()->to(base_url('user'));
        }

    }


    public function mhs_gantifoto($id_user)
    {
        $validation = \Config\Services::validation();
        $mahasiswa = $this->ModelUser->detail_data($id_user);
        if ($this->validate([
            'foto_user'    => [
                'label'     => 'Foto User',
                'rules'     => 'max_size[foto_user,1024]|mime_in[foto_user,image/jpeg,image/jpg,image/png,]',
                'errors'    => [
                        'max_size' => '{field} Maksimal 1024 KB / 1 MB !',
                        'mime_in' => 'Format {field} Harus JPEG, JPG, PNG !'
                        ]
                ],
            ])){

                //Mengambil foto dari form input
                $foto_user = $this->request->getFile('foto_user');
                
                if ($foto_user->getError() == 4){
                    $data = array(
                        'id_user'   => $id_user,
                        //'nama_user' => $this->request->getPost('nama_user'),
                        //'username' => $this->request->getPost('username'),
                        'password' => $this->request->getPost('password'),
                        //'level' => $this->request->getPost('level'),
                    );
                    $this->ModelUser->edit($data);

                } else {
                    //Meghapus foto lama
                    $user = $this->ModelUser->detail_data($id_user);
                    if ($user['foto_user'] == "") {
                    } else
                    if ($user['foto_user'] != "") {
                        unlink('foto/' . $user['foto_user']);
                    }
                    //Merubah nama file foto
                    $ext = $foto_user->getClientExtension();
                    $dot = '.';
                    $name_file = $_POST['username'].$dot.$ext;
    
                    //jika valid
                    $data = array(
                        'id_user'   => $id_user,
                        //'nama_user' => $this->request->getPost('nama_user'),
                        //'username' => $this->request->getPost('username'),
                        'password' => $this->request->getPost('password'),
                        //'level' => $this->request->getPost('level'),
                        'foto_user' => $name_file,
                    );
                    //Memindahkan file foto dari form input ke folder foto directory
                    $foto_user->move('foto', $name_file);
                    $this->ModelUser->edit($data);
                }
                session()->setFlashdata('sukses', 'Data berhasil dirubah !!!', 10);
                return redirect()->to(base_url('Mahasiswa/biodata_mhs/'.$mahasiswa['id_mhs']));
        } else {
            //jika tidak valid
            session()->setFlashdata('error', $validation->getError('foto_user'));

            return redirect()->to(base_url('Mahasiswa/biodata_mhs/'.$mahasiswa['id_mhs']));
        }

    }

    public function mhs_edituser($id_user)
    {
        $validation = \Config\Services::validation();
        $user = $this->ModelUser->detail_data($id_user);
        if ($this->validate([
            'foto_user'    => [
                'label'     => 'Foto User',
                'rules'     => 'max_size[foto_user,1024]|mime_in[foto_user,image/jpeg,image/jpg,image/png,]',
                'errors'    => [
                        'max_size' => '{field} Maksimal 1024 KB / 1 MB !',
                        'mime_in' => 'Format {field} Harus JPEG, JPG, PNG !'
                        ]
                ],
            ])){

                //Mengambil foto dari form input
                $foto_user = $this->request->getFile('foto_user');
                
                if ($foto_user->getError() == 4){
                    $data = array(
                        'id_user'   => $id_user,
                        //'nama_user' => $this->request->getPost('nama_user'),
                        //'username' => $this->request->getPost('username'),
                        'password' => $this->request->getPost('password'),
                        //'level' => $this->request->getPost('level'),
                    );
                    $this->ModelUser->edit($data);

                } else {
                    //Meghapus foto lama
                    $user = $this->ModelUser->detail_data($id_user);
                    if ($user['foto_user'] == "") {
                    } else
                    if ($user['foto_user'] != "") {
                        unlink('foto/' . $user['foto_user']);
                    }
                    //Merubah nama file foto
                    $ext = $foto_user->getClientExtension();
                    $dot = '.';
                    $name_file = $_POST['username'].$dot.$ext;
    
                    //jika valid
                    $data = array(
                        'id_user'   => $id_user,
                        //'nama_user' => $this->request->getPost('nama_user'),
                        //'username' => $this->request->getPost('username'),
                        'password' => $this->request->getPost('password'),
                        //'level' => $this->request->getPost('level'),
                        'foto_user' => $name_file,
                    );
                    //Memindahkan file foto dari form input ke folder foto directory
                    $foto_user->move('foto', $name_file);
                    $this->ModelUser->edit($data);
                }
                session()->setFlashdata('sukses', 'Data berhasil dirubah !!!', 10);
                return redirect()->to(base_url('User/user_detail/'.$user['id_user']));
        } else {
            //jika tidak valid
            session()->setFlashdata('error', $validation->getError('foto_user'));

                return redirect()->to(base_url('User/user_detail/'.$user['id_user']));
        }

    }


    public function delete($id_user)
    {
        $user = $this->ModelUser->detail_data($id_user);
        //Meghapus foto
        if ($user['foto_user'] == "") {
            } else 
        if ($user['foto_user'] != "") {
        unlink('foto/' . $user['foto_user']);
        }

        $data = [
            'id_user' => $id_user,
        ];
        $this->ModelUser->delete_data($data);

        session()->setFlashdata('sukses', 'Data berhasil dihapus !!!');
        return redirect()->to(base_url('user'));
    }


    public function upload()
    {
        $validation = \Config\Services::validation();

        $valid = $this->validate(
            [
            'fileimport'    => [
                'label'     => 'Import User',
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
            return redirect()->to(base_url('user'));
        
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
                $namauser = $row[0];
                $username = $row[1];
                $password = $row[2];
                $level = $row[3];
                $foto = $row[4];

                $db = \Config\Database::connect();

                $cekusername = $db->table('user')->getWhere(['username' => $username])->getResult();

                if (count($cekusername) > 0) {
                    $jumlaherror++;
                } else {
                    $datasimpan = [
                        'nama_user' => $namauser,
                        'username' => $username,
                        'password' => $password,
                        'level' => $level,
                        'foto_user' => $foto
                    ];
                    $db->table('user')->insert($datasimpan);
                    $jumlahsukses++;
                }

            }

            session()->setFlashdata('sukses', "$jumlaherror Data tidak bisa disimpan, periksa username mungkin sudah ada<br> $jumlahsukses Data berhasil disimpan");
            return redirect()->to(base_url('user'));
        }
    }






}
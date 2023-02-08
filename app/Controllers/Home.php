<?php

namespace App\Controllers;

use App\Models\UserModel;

class Home extends BaseController
{
    protected $helpers = ['form'];
    public function index()
    {
        
        $data = ['notif' => $this->session->getFlashdata('notifName')];

        return view('login', $data);

    }

    public function daftar()
    {
      $data = ['notif' => $this->session->getFlashdata('notifName')];
        return view('daftar', $data);
    }

    public function daftarsave()
    {
    	 
        $ceknim = $this->userModel->where('nim', $this->request->getVar('nim'))->find();
        if (empty($ceknim)) {
          $cekuser = $this->userModel->where('username', $this->request->getVar('username'))->find();
          if (empty($cekuser)) {
              $dataBerkas = $this->request->getFile('rekom');
              print_r($dataBerkas);
                $validationRule = [
                      'rekom' => [
                          'label' => 'Image File',
                          'rules' => 'uploaded[rekom]'
                              . '|is_image[rekom]'
                              . '|mime_in[rekom,image/jpg,image/jpeg,image/gif,image/png,image/webp, ]'
                              . '|max_size[rekom, 1000]',
                      ],
                  ];
                   if (! $this->validate($validationRule)) {
                         $this->session->setFlashdata('notifName', 'Ukuran file terlalu besar atau jenis file bukan gambar.');
                         return redirect()->to('/daftar');
                    }else{
                          $dataBerkas = $this->request->getFile('rekom');
                          $randomName = $dataBerkas->getRandomName();
                          $dataBerkas->move('rekom', $randomName);
                           $data = [
                            'username' => $this->request->getVar('username'),
                            'password' => $this->request->getVar('password'),
                            'nim' => $this->request->getVar('nim'),
                            'level' => 'peserta',
                            'email' => $this->request->getVar('email'),
                            'nama' => $this->request->getVar('nama'),
                            'ttl' => $this->request->getVar('ttl'),
                            'no_hp' => $this->request->getVar('nohp'),
                            'alamat' => $this->request->getVar('alamat'),
                            'jurusan' => $this->request->getVar('jurusan'),
                            'asal_sekolah' => $this->request->getVar('asalsekolah'),
                            'file_rekom' => $randomName,
                            'status' => '0'
                          ];
                          $userModel = new UserModel();
                          $user = $userModel->insert($data);
                           $this->session->setFlashdata('notifName', 'Data dalam proses verifikasi.');
                          return redirect()->to('/');
                    }
          }else{
             $this->session->setFlashdata('notifName', 'Username sudah ada');
             return redirect()->to('/daftar');
          }
        }else{
           $this->session->setFlashdata('notifName', 'NIM sudah ada.');
            return redirect()->to('/daftar');;
        }
       

      
    }

    public function prosesLogin(){
        $user = $this->request->getVar('username');
        $pass = $this->request->getVar('pass');
        $cek = $this->userModel->where('username', $user)->find();
        if (!empty($cek)) {
          $cekP = $this->userModel->where('username', $user)->where('password', $pass)->find();
          if (!empty($cekP)) {
            if ($cekP[0]['status'] == 0) {
               $this->session->setFlashdata('notifName', 'Maaf, data kamu sedang di proses oleh staf.');
               return redirect()->to('/');
            }
            $level = $cekP[0]['level'];
            $data = ['id_user' => $cekP[0]['id_user'], 
                      'nama' => $cekP[0]['nama'],
                      'gambar' => $cekP[0]['photo'],
                      'level' => $cekP[0]['level']
                    ];
            $this->session->set($data);
            $pembim = $this->userModel->where('id_user', $cekP[0]['id_staf'])->findAll();
            if ($cekP[0]['id_staf'] != '0') {
              $data1 = ['nm_staf' => $pembim[0]['nama'], 
                      'no_staf' => $pembim[0]['no_hp'],
                    ];
            $this->session->set($data1);
            }
            if ($level == 'staf') {
            return redirect()->to('/staf');

            }else{
              return redirect()->to('/peserta');
            }
          }else{
            $this->session->setFlashdata('notifName', 'Password salah');
            return redirect()->to('/');
          }
        }else{
          $this->session->setFlashdata('notifName', 'username dan password salah');
          return redirect()->to('/');
        }
    }

    public function logout(){
      $this->session->destroy();
      return redirect()->to('/');
    }
}

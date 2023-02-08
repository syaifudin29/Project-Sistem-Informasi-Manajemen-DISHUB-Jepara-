<?php

namespace App\Controllers\Peserta;

use App\Controllers\BaseController;

class Profil extends BaseController
{
    // private $id_user = 3;
    public function index()
    {
    	$user = $this->userModel->getUserProfile($this->id_user)->getResult();

    	$data = ['menu' => 'profil',
    			'user'  => $user
    			];

        return view('peserta/profil', $data);
    }
    public function update()
    {
    	$user = $this->userModel->getUserProfile($this->id_user)->getResult();

    	$data = ['nama' => $this->request->getVar('nama'),
    			 'ttl' => $this->request->getVar('ttl'),
                 'nim' => $this->request->getVar('nim'),
    			 'alamat' => $this->request->getVar('alamat'),
                 'email' => $this->request->getVar('email'),
    			 'jurusan' => $this->request->getVar('jurusan'),
    			 'asal_sekolah' => $this->request->getVar('asal_sekolah')
    			];
    	$this->userModel->update($this->id_user, $data);
    	return redirect()->to('/peserta/profil/');
        
    }
    public function photo()
    {
    	$dataBerkas = $this->request->getFile('gambar');
      	$randomName = $dataBerkas->getRandomName();
      	$dataBerkas->move('gambar', $randomName);
      	 $data = [
        'photo' => $randomName
      ];
        $this->session->set('gambar', $randomName);
    	$this->userModel->update($this->id_user, $data);
    	return redirect()->to('/peserta/profil/');
        
    }
}

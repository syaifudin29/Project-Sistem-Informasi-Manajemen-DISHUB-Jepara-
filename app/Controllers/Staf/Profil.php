<?php

namespace App\Controllers\Staf;

use App\Controllers\BaseController;

class Profil extends BaseController
{
    public function index()
    {
    	$user = $this->userModel->where('id_user', $this->id_user)->findAll();

    	$data = ['menu' => 'profil',
    			'user'  => $user
    			];

        return view('staf/profile', $data);
    }
    public function update()
    {
    	$user = $this->userModel->getUserProfile($this->id_user)->getResult();

    	$data = ['nama' => $this->request->getVar('nama'),
    			 'ttl' => $this->request->getVar('ttl'),
                 'nim' => $this->request->getVar('nim'),
    			 'alamat' => $this->request->getVar('alamat'),
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
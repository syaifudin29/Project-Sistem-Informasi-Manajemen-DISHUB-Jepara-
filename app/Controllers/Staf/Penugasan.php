<?php

namespace App\Controllers\Staf;

use App\Controllers\BaseController;

class Penugasan extends BaseController
{
    public function index()
    {
    	$user = $this->userModel->where('status', '1')->where('id_staf', $this->session->get('id_user'))->findAll();
    	$tugas = $this->TugasModel->getTugas()->getResult();
    	$data = ['menu' => 'penugasan',
    			 'user' => $user,
    			 'tugas' => $tugas,
    			 'tanggal' => date('Y-m-d')
    			]; 
        return view('staf/penugasan', $data);
    }

    public function tanggal($tgl){
    	$user = $this->userModel->where('status', '1')->where('id_staf', $this->session->get('id_user'))->findAll();
    	$tugas = $this->TugasModel->getTugasTanggal($tgl)->getResult();
    	$data = ['menu' => 'penugasan',
    			 'user' => $user,
    			 'tugas' => $tugas,
    			 'tanggal' => $tgl
    			];
        return view('staf/penugasan', $data);
    }

    public function tambah(){
    	$dataBerkas = $this->request->getFile('file_staf');
      	$randomName = $dataBerkas->getRandomName();
      	$dataBerkas->move('tugas', $randomName);
    	$data = [
    			'id_user' => $this->request->getVar('id_user'),
    			'id_staf' => session()->get('id_user'),
    			'judul' => $this->request->getVar('judul'),
    			'keterangan' => $this->request->getVar('keterangan'),
    			'file_staf' => $randomName,
    			'status' => 'belum',
    		];
    	$this->TugasModel->insert($data);
    	return redirect()->to('/staf/penugasan');
    }

    public function hapus($id){
    	$this->TugasModel->delete($id);
    	return redirect()->to('/staf/penugasan');
    }

    public function prosesTugas(){
    	$id = $_POST['id_tugas'];
    	if ($_POST['aksi'] == 'ulangi') {
    		$data = [
    				'file_peserta' => "",
    				'status' => 'belum'
    				];

    		$this->TugasModel->update($id, $data);
    		return redirect()->to('/staf/penugasan');
    	}else{
			$data = [
				'status' => 'sudah'
			];

    		$this->TugasModel->update($id, $data);
    		return redirect()->to('/staf/penugasan');
    	}
    }

}

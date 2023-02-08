<?php

namespace App\Controllers\Peserta;

use App\Controllers\BaseController;

class Tugas extends BaseController
{

    public function index()
    {
    	$tugas = $this->TugasModel->where('id_user', $this->id_user)->orderBy('id_tugas', 'DESC')->findAll();
    	$data = ['menu' => 'tugas',
    			'tugas' => $tugas
    			];
        return view('peserta/tugas', $data);
    }
    public function simpan()
    {
    	$dataBerkas = $this->request->getFile('file_peserta');
      	$randomName = $dataBerkas->getRandomName();
      	$dataBerkas->move('tugas', $randomName);
    	$id_tugas = $this->request->getVar('id_tugas');
    	$data = [
    			'file_peserta' => $randomName,
    			'status' => 'proses',
    		];
    	$this->TugasModel->update($id_tugas, $data);
    	return redirect()->to('/peserta/tugas/');
    }
}

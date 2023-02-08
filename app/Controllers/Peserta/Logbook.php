<?php

namespace App\Controllers\Peserta;

use App\Controllers\BaseController;

class Logbook extends BaseController
{
	// private $id_user = 4;

    public function index()
    {
    	$logbook = $this->LogModel->where('id_user', $this->id_user)->findAll();
    	$data = ['menu' => 'logbook',
    			'logbook' => $logbook,
    			];
        return view('peserta/logbook', $data);
    }
    public function tambah(){
    	$id = $this->request->getVar('id_logbook');
    	$data = [
    				'kegiatan' => $this->request->getVar('kegiatan')
    			];
    	$this->LogModel->update($id, $data);
    	return redirect()->to('/peserta/logbook/');
    }
}

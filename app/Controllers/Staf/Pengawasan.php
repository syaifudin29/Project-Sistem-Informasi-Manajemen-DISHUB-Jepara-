<?php

namespace App\Controllers\Staf;

use App\Controllers\BaseController;

class Pengawasan extends BaseController
{
    public function index()
    {
    	$tgl = date('Y-m-d');
    	$logbook = $this->LogModel->getUserLog($tgl)->getResult();
    		$data = ['menu' 	=> 'pengawasan',
    				'logbook' 	=> $logbook,
    				'tgl' 		=> $tgl 
    				];
        return view('staf/pengawasan', $data);
    }

     public function tanggal($tgl)
    {
    	$logbook = $this->LogModel->getUserLog($tgl)->getResult();
    		$data = ['menu' 	=> 'pengawasan',
    				'logbook' 	=> $logbook,
    				'tgl' 		=> $tgl 
    				];
        return view('staf/pengawasan', $data);
    }

    public function tambah(){
    	$id = $this->request->getVar('id_logbook');
    	$data = [
    				'nilai' => $this->request->getVar('nilai')
    			];
    	$this->LogModel->update($id, $data);
    	$tgl = $this->request->getVar('tgl');
    	return redirect()->to('/staf/pengawasan/'.$tgl);
    }

     public function update(){
    	$id = $this->request->getVar('id_logbook');
    	$tgl = $this->request->getVar('tgl');
    	$data = [
    				'nilai' => $this->request->getVar('nilai')
    			];
    	$this->LogModel->update($id, $data);
    	return redirect()->to('/staf/pengawasan/'.$tgl);
    }


}

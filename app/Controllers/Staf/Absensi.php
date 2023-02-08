<?php

namespace App\Controllers\Staf;

use App\Controllers\BaseController;

class Absensi extends BaseController
{
    public function index()
    {

    	$absensi = $this->AbsensiModel->getAbsensiDist();
    	$data = ['menu' => 'absensi',
    			 'absensi' => $absensi->getResult()
    	];
        return view('staf/absensi', $data);
    }

    public function tambah(){
    	$user = $this->userModel->where('status', '1')->where('id_staf', session()->get('id_user'))->find();
    	$tgl = $this->request->getVar('tgl');
    	$tang = $this->AbsensiModel->where('tgl', $tgl)->where('id_staf', session()->get('id_user'))->findAll();
    	if (empty($tang)) {
    		foreach ($user as $key) {
    		$data = [ 
    			'tgl' => $tgl,
    			'id_user' => $key['id_user'],
    			'keterangan' => '0',
                'id_staf' => session()->get('id_user')
    		];
    		$this->AbsensiModel->insert($data);
    		}
    		return redirect()->to('/staf/');
    	}else{
    		return redirect()->to('/staf/');
    	}
    }
    public function tampilAbsensi($tgl){
    	$absensi = $this->AbsensiModel->join('user', 'user.id_user=absensi.id_user')->where('tgl', $tgl)->where('absensi.id_staf', session()->get('id_user'))->findAll();
    	$data = ['menu' => 'absensi',
    			 'tgl' => $tgl,
    			 'absensi' => $absensi
    	];
        return view('staf/tampil_absensi', $data);
    }

     public function delete($tgl){
        $data = $this->AbsensiModel->where('tgl', $tgl)->findAll();
        foreach ($data as $key) {
            $this->AbsensiModel->delete($key['id_absensi']);
        }
        return redirect()->to('/staf/absensi');
     }
}

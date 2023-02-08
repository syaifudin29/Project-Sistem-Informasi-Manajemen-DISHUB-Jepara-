<?php

namespace App\Controllers\Peserta;

use App\Controllers\BaseController;

class Absensi extends BaseController
{	
	// private $id_user = 4;
    
    public function index()
    {
    	$absensi = $this->AbsensiModel->where('id_user', $this->id_user)->orderBy('id_absensi', 'DESC')->findAll();
    	$data = ['menu' => 'absensi',
    			 'absensi' => $absensi
    			];
        return view('peserta/absensi', $data);
    }

    public function aksi(){
    	date_default_timezone_set("Asia/Jakarta");
    	echo date("Y-m-d H:i:s");
    	echo "<br>";
    	$id_absensi = $_POST['id_absensi'];
    	$aksi = $_POST['aksi']; 

    	$data = ['absen' => date("Y-m-d H:i:s"),
    			'keterangan' => $aksi
    			];
    	
        $this->AbsensiModel->update($id_absensi, $data);

    	if ($aksi == 2) {
            $datas = ['tgl' => date("Y-m-d H:i:s"),
                'id_user' => $this->id_user
                ];
           $this->LogModel->insert($datas);
        }
    	
    	return redirect()->to('/peserta/');
    }
}

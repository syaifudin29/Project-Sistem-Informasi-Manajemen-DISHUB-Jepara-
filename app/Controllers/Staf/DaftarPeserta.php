<?php

namespace App\Controllers\Staf;

use App\Controllers\BaseController;

class DaftarPeserta extends BaseController
{
    public function index()
    {
      
      $cPeserta = $this->userModel->where('status', '0')->findAll();
      $oldPeserta = $this->userModel->where('status', '2')->where('level', 'peserta')->findAll();
      $Peserta = $this->userModel->join('magang', 'magang.id_user=user.id_user')->where('status', '1')->where('id_staf', session()->get('id_user'))->findAll();
      $Bidang = $this->BidangModel->findAll();
      
      $data = ['menu' => 'daftarpeserta',
          'cPeserta' => $cPeserta,
          'oldPeserta' => $oldPeserta,
          'peserta' => $Peserta,
          'bidang' => $Bidang
      ];
        
        return view('staf/daftar_peserta', $data);

    }
    public function updatePeserta(){
    $id = $this->request->getVar('id_user');
    $data = [
        'nama' => $this->request->getVar('nama'),
        'ttl' => $this->request->getVar('ttl'),
        'no_hp' => $this->request->getVar('nohp'),
        'alamat' => $this->request->getVar('alamat'),
        'jurusan' => $this->request->getVar('jurusan'),
        'asal_sekolah' => $this->request->getVar('asalsekolah'),
      ];
      $this->userModel->update($id, $data);
      $idm = $this->request->getVar('id_magang');
      $data1 = [
    'awal' => $this->request->getVar('awal'),
        'akhir' => $this->request->getVar('akhir'),
        'id_bidang' => $this->request->getVar('id_bidang'),

      ];
      $this->MagangModel->update($idm, $data1);
      return redirect()->to('/staf/daftar_peserta');
    }
    public function calon($nama)
    {
      $cPeserta = $this->userModel->where('id_user', $nama)->findAll();
      $staf = $this->userModel->where('level', 'staf')->findAll();
      $Bidang = $this->BidangModel->findAll();

      $data = ['menu' => 'daftarpeserta',
          'user' => $cPeserta,
          'bidang' => $Bidang,
          'staf'  => $staf
      ];
      return view('staf/calon_peserta', $data);
      
    }
    public function calonTerima(){
      $id = $this->request->getVar('id_user');
      $action = $this->request->getVar('action');
      if ($action == 1) {
        $data = [ 'id_user' => $this->request->getVar('id_user'),
          'awal' => $this->request->getVar('tgl_awal'),
          'akhir' => $this->request->getVar('tgl_akhir'),
          'id_bidang' => $this->request->getVar('id_bidang')
      ];
      $this->MagangModel->insert($data);


      
      $dataUpdate = ['status' => '1', 'id_staf' => $this->request->getVar('id_staf')];

      $this->userModel->update($id, $dataUpdate);
      return redirect()->to('/sendnotif/'.$id);
      
      }else{
         $this->userModel->delete($id);
         return redirect()->to('/staf/daftar_peserta');
      }

    }

    public function deletePeserta($id)
    {
        print_r($id);
        $this->userModel->delete($id);
        return redirect()->to('/staf/daftar_peserta');
    }
}

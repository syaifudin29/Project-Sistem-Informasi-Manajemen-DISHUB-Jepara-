<?php

namespace App\Controllers\Staf;

use App\Controllers\BaseController;

class Sertifikasi extends BaseController
{
    public function index()
    {
        $kriteria = $this->KriteriaModel->findAll();

        $no=0;
        $data = [];
        $peserta1 = $this->userModel->where('level', 'peserta')->findAll();
        foreach ($peserta1 as $key) {
            $cek = count($this->NilaiModel->select('DISTINCT(id_user), id_staf')->where('id_user', $key['id_user'])->findAll());

            if ($cek==0) {
                $a[$no++] = ['id_user' => $key['id_user'], 'nama' => $key['nama'], 'id_staf' => $key['id_staf'], 'status' => 0];
            }
            else if($cek==1){
                $a[$no++] = ['id_user' => $key['id_user'], 'nama' => $key['nama'],'id_staf' => $key['id_staf'],  'status' => 1];
            }else{
                $dataku = $this->NilaiModel->select('DISTINCT(id_user), id_staf')->where('id_user', $key['id_user'])->findAll();
                $a[$no++] = ['id_user' => $key['id_user'], 'nama' => $key['nama'],'id_staf1' => $dataku[0]['id_staf'], 'id_staf2' => $dataku[1]['id_staf'],  'status' => 2];
            }
            // array_push($a, [$data]);
            // print_r($a);
        }
        if(empty($peserta1)){
            $a = [];
        }
   






     //    $peserta2 = $this->NilaiModel->select('nama, user.id_user')->join('user', 'nilai.id_user=user.id_user')->where('level', 'peserta')->findAll();
     //    dd($peserta1);




        $data = ['menu'        => 'sertifikasi',
                 'kriteria'    => $kriteria,
                 'peserta'    => $a
                ];
        return view('staf/sertifikat', $data);
    }
     public function peserta($id)
    {
        //mengecek
        $absensi = $this->AbsensiModel->where('id_user', $id)->findAll();
        if (empty($absensi)) {
            return redirect()->to('/staf/sertifikasi');
        }

        $absesni = $this->AbsensiModel->where('id_user', $id)->findAll();
        $hadir = 0;
        $absen = 0;
        $jumlah = count($absesni)*2;
        foreach ($absesni as $key) {
            if ($key['keterangan'] == 2) {
                $hadir = $hadir+2;
            }else if($key['keterangan'] == 1){
                 $absen = $absen+2;   
            }   
        }

        $total = ($hadir/$jumlah)*100;
        $displin = number_format($total);

        //nilai log (tanggung jawab)
        $log = $this->LogModel->where('id_user', $id)->findAll();
        $nilai = 0;
        foreach ($log as $key) {
            $nilai = $nilai+$key['nilai'];
        }
        
        if (empty($log)) {
            $tanggung = 0;
        }else{
            $jumlah = count($log)*100;
            $total = ($nilai/$jumlah)*100;
            $tanggung =  $total;
        }

        $nilai = $this->NilaiModel->where('id_user', $id)->where('id_staf', session()->get('id_user'))->findAll();
        $nilaiKriteria = $this->NilaiModel->join('kriteria', 'nilai.id_kriteria = kriteria.id_kriteria')->where('id_user', $id)->where('id_staf', session()->get('id_user'))->findAll();
        $user = $this->userModel->where('id_user', $id)->findAll();
        $kriteria = $this->KriteriaModel->findAll();
        $data = ['menu'        => 'sertifikasi',
                 'kriteria'    => $kriteria,
                 'user'        => $user,
                 'nilai'        => $nilai,
                 'nilaiKriteria' => $nilaiKriteria,
                 'disiplin'     => $displin,
                 'tanggung'     => $tanggung
                ];
        return view('staf/sertifikat_peserta', $data);
    }
    public function aksi()
    {
        $aksi = $this->request->getVar('action');
        if ($aksi == "simpan") {
             $data = [
                'kriteria' => $this->request->getVar('kriteria'),
                'deskripsi' => $this->request->getVar('deskripsi'),
            ];
            $this->KriteriaModel->insert($data);
        }else{
            $id = $this->request->getVar('id_kriteria');
            $data = [
                'kriteria' => $this->request->getVar('kriteria'),
                'deskripsi' => $this->request->getVar('deskripsi'),
            ];
            $this->KriteriaModel->update($id, $data);
        }
       return redirect()->to('/staf/sertifikasi');
    }
    public function delete($id)
    {
        $this->KriteriaModel->delete($id);
       return redirect()->to('/staf/sertifikasi');
    }
    public function nilai(){
     
        $kriteria = $this->KriteriaModel->findAll();
        $nom=0;
        if ($_POST['aksi'] == 'simpan') {
        foreach ($kriteria as $key) {
            $data = [
                    'id_user' => $_POST['id_user'],
                    'id_staf' => session()->get('id_user'),
                    'id_kriteria' => $key['id_kriteria'],
                    'nilai' => $_POST['kriteria'][$nom]
                    ];
            $nom++;
            $this->NilaiModel->insert($data);

        }
        $data = ['id_user' => $_POST['id_user'],
                 'tanggal' => date('Y-m-d')
                ];
        $this->SertifikatModel->insert($data);

        $datas = ['status' => '2'];
        $this->userModel->update($_POST['id_user'], $datas);
        }else{
            $nilai = $this->NilaiModel->where('id_user', $_POST['id_user'])->where('id_staf', session()->get('id_user'))->findAll();
            
            foreach ($nilai as $keys) {
                $data = [
                        'nilai' => $_POST['kriteria'][$nom]
                        ];
                $nom++;
                $this->NilaiModel->update($keys['id_nilai'], $data);
            }
        }
        return redirect()->to('/staf/sertifikasi');
    }

    public function hitung(){
        //nilai 
        $absesni = $this->AbsensiModel->where('id_user', 4)->findAll();
        $hadir = 0;
        $absen = 0;
        $jumlah = count($absesni)*2;
        foreach ($absesni as $key) {
            if ($key['keterangan'] == 2) {
                $hadir = $hadir+2;
            }else if($key['keterangan'] == 1){
                 $absen = $absen+2;   
            }   
        }
        // echo $hadir;
        // echo $jumlah;
        $total = ($hadir/$jumlah)*100;
        $displin = number_format($total);

        //nilai log (tanggung jawab)

        $log = $this->LogModel->where('id_user', 4)->findAll();
        

        $nilai = 0;
        foreach ($log as $key) {
            $nilai = $nilai+$key['nilai'];
        }
        $jumlah = count($log)*100;
        $total = ($nilai/$jumlah)*100;
        $tanggung =  $total;

    }
}

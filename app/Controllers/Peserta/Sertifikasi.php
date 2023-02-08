<?php

namespace App\Controllers\Peserta;

use App\Controllers\BaseController;

class Sertifikasi extends BaseController
{
    public function index()
    {
        $nilai = $this->NilaiModel->where('id_user', $this->id_user)->join('kriteria', 'kriteria.id_kriteria = nilai.id_kriteria')->findAll();
        $kriteria = $this->KriteriaModel->findAll();

       $status = $this->NilaiModel->select('DISTINCT(id_user), id_staf')->where('id_user', $this->id_user)->find();

        $data = ['menu' => 'sertifikasi', 'nilai' => $nilai, 'status' => count($status), 'kriteria' => $kriteria];
        return view('peserta/sertifikasi', $data);
    }

    public function nilai(){
        function bln($bln){
        switch ($bln) {
            case 1:
                return "Januari";
                break;
            case 2:
                return "Februari";
                break;
            case 3:
                return "Maret";
                break;
            case 4:
                return "April";
                break;
            case 5:
                return "Mei";
                break;
            case 6:
                return "Juni";
                break;
            case 7:
                return "Juli";
                break;
            case 8:
                return "Agustus";
                break;
            case 9:
                return "September";
                break;
            case 10:
                return "Oktober";
                break;
            case 11:
                return "November";
                break;
            case 12:
                return "Desember";
                break;
            default:
                # code...
                break;
        }
    }   


        $jml = 0;
        $tot=0;
        
        $nonilai = 0;
        // dd($nilaimodel);
        $kriteria = $this->KriteriaModel->findAll();
        foreach ($kriteria as $keys) {
            $juml=0;
            $nilaimodel = $this->NilaiModel->where('id_user', $this->id_user)->where('id_kriteria', $keys['id_kriteria'])->findAll();
            foreach ($nilaimodel as $kenil) {
                $juml=$juml+$kenil['nilai'];
            }
            $tot=$tot+($juml/2);
            $kriteria[$nonilai++] = ['kriteria' => $keys['kriteria'], 'nilai' => $juml/2];
        }
        
  


        $nilai = $this->NilaiModel->where('id_user', $this->id_user)->join('kriteria', 'kriteria.id_kriteria = nilai.id_kriteria')->findAll();
        $tanggal = $this->SertifikatModel->where('id_user', $this->id_user)->findAll();
        $tanggalan = date('d', strtotime($tanggal[0]['tanggal']))." ".bln(date('m', strtotime($tanggal[0]['tanggal'])))." ".date('Y', strtotime($tanggal[0]['tanggal']));
        $diri = $this->userModel->where('id_user', $this->id_user)->findAll();
        
        $data = ['menu'         => 'sertifikasi', 
                 'nilai'        => $nilai,
                 'diri'         => $diri,
                 'kriteria'     => $kriteria,
                 'tanggal'      => $tanggalan
                     ];
        
        return view('peserta/nilai', $data);

    }

    public function sertifikat(){

    function bln($bln){
        switch ($bln) {
            case 1:
                return "Januari";
                break;
            case 2:
                return "Februari";
                break;
            case 3:
                return "Maret";
                break;
            case 4:
                return "April";
                break;
            case 5:
                return "Mei";
                break;
            case 6:
                return "Juni";
                break;
            case 7:
                return "Juli";
                break;
            case 8:
                return "Agustus";
                break;
            case 9:
                return "September";
                break;
            case 10:
                return "Oktober";
                break;
            case 11:
                return "November";
                break;
            case 12:
                return "Desember";
                break;
            default:
                # code...
                break;
        }
    }

    function nilket($nil){
        if ($nil <= 35.99) {
                return "Tidak Memuaskan";
        }else if($nil <= 51.99){
                return "Kurang Memuaskan";
        }else if($nil <= 67.99){
                return "Cukup Memuaskan";
        }else if($nil <= 83.99){
                return "Memuaskan";
        }else{
                return "Sangat Memuaskan";
        }
    }



    $id = $this->id_user;
    $user = $this->userModel->where('id_user', $id)->findAll();
    $nama = $user[0]['nama'];
    $nim = $user[0]['nim'];
    $jurusan = $user[0]['jurusan'];
    $kampus = $user[0]['asal_sekolah'];
    
    $jml = 0;
    $tot=0;
    
    // dd($nilaimodel);
    $kriteria = $this->KriteriaModel->findAll();
    foreach ($kriteria as $keys) {
        $juml=0;
        $nilaimodel = $this->NilaiModel->where('id_user', $this->id_user)->where('id_kriteria', $keys['id_kriteria'])->findAll();
        foreach ($nilaimodel as $kenil) {
            $juml=$juml+$kenil['nilai'];
        }
        $tot=$tot+($juml/2);
    }
    
    $nilai = nilket($tot/7);
    

    $magang = $this->MagangModel->where('id_user', $id)->findAll();
    $tanggal_aw = date('d', strtotime($magang[0]['awal']))." ".bln(date('m', strtotime($magang[0]['awal'])));
    $tanggal_ak = date('d', strtotime($magang[0]['akhir']))." ".bln(date('m', strtotime($magang[0]['awal'])))." ".date('Y', strtotime($magang[0]['akhir'])); 

    $sertif = $this->SertifikatModel->where('id_user', $id)->findAll();
    $tang_ser = date('d', strtotime($sertif[0]['tanggal']))." ".bln(date('m', strtotime($sertif[0]['tanggal'])))." ".date('Y', strtotime($sertif[0]['tanggal']));
    $id_ser = $sertif[0]['id_sertifikat'];



    $gambar = "gambar/sertifikat.jpg";
    $image = imagecreatefromjpeg($gambar);
    $white = imageColorAllocate($image, 255, 255, 255);
    $black = imageColorAllocate($image, 0, 0, 0);
    $font = "Candarai.ttf";
    
    //nama
    $size = 80;
    //definisikan lebar gambar agar posisi teks selalu ditengah berapapun jumlah hurufnya
    $image_width = imagesx($image);  
    //membuat textbox agar text centered
    $text_box = imagettfbbox($size,0,$font,$nama);
    $text_width = $text_box[2]-$text_box[0]; // lower right corner - lower left corner
    $text_height = $text_box[3]-$text_box[1];
    $x = ($image_width/2) - ($text_width/2);
    //generate sertifikat beserta namanya
    imagettftext($image, $size, 0, intval($x), 660, $black, $font, $nama);
    
    //nomor
    $size = 35;
    $no_s = "No. ".$id_ser." / 2056 / 2022";
    $image_width = imagesx($image);  
    //membuat textbox agar text centered
    $text_box = imagettfbbox($size,0,$font, $no_s);
    $text_width = $text_box[2]-$text_box[0]; // lower right corner - lower left corner
    $text_height = $text_box[3]-$text_box[1];
    $x = ($image_width/2) - ($text_width/2);
    $font = "./times.ttf";
    imagettftext($image, $size, 0, intval($x), 520, $black, $font, $no_s);


    $size = 30;
    
    $text = "NIM : ".$nim;
    $text_box = imagettfbbox($size,0,$font, $text);
    $text_width = $text_box[2]-$text_box[0]; // lower right corner - lower left corner
    $text_height = $text_box[3]-$text_box[1];
    $x = ($image_width/2) - ($text_width/2);
    //nim 
    imagettftext($image, 30, 0, intval($x), 710, $black, $font, $text);

    $text = "Program Studi S1 - ".$jurusan;
    $text_box = imagettfbbox($size,0,$font, $text);
    $text_width = $text_box[2]-$text_box[0]; // lower right corner - lower left corner
    $text_height = $text_box[3]-$text_box[1];
    $x = ($image_width/2) - ($text_width/2);
    imagettftext($image, 30, 0, intval($x), 760, $black, $font, $text);

    $text = $kampus;
    $text_box = imagettfbbox($size,0,$font, $text);
    $text_width = $text_box[2]-$text_box[0]; // lower right corner - lower left corner
    $text_height = $text_box[3]-$text_box[1];
    $x = ($image_width/2) - ($text_width/2);
    imagettftext($image, 30, 0, intval($x), 810, $black, $font, $text);

    $text = "Telah Melaksanakan Paktek Kerja Lapangan dengan ".$nilai;
    $text_box = imagettfbbox($size,0,$font, $text);
    $text_width = $text_box[2]-$text_box[0]; // lower right corner - lower left corner
    $text_height = $text_box[3]-$text_box[1];
    $x = ($image_width/2) - ($text_width/2);
    imagettftext($image, 30, 0, intval($x), 860, $black, $font, $text);

    $text = "Terhitung Tanggal ".$tanggal_aw." s/d ".$tanggal_ak;
    $text_box = imagettfbbox($size,0,$font, $text);
    $text_width = $text_box[2]-$text_box[0]; // lower right corner - lower left corner
    $text_height = $text_box[3]-$text_box[1];
    $x = ($image_width/2) - ($text_width/2);
    imagettftext($image, 30, 0, intval($x), 910, $black, $font, $text);

    $text = "di DINAS PERHUBUNGAN KABUPATEN JEPARA";
    $text_box = imagettfbbox($size,0,$font, $text);
    $text_width = $text_box[2]-$text_box[0]; // lower right corner - lower left corner
    $text_height = $text_box[3]-$text_box[1];
    $x = ($image_width/2) - ($text_width/2);    
    imagettftext($image, 30, 0, intval($x), 960, $black, $font, $text);


    imagettftext($image, 26, 0, 1260, 1020, $black, $font, "Jepara, ".$tang_ser);

    //tampilkan di browser
    $this->response->setContentType('image/png');
    imagejpeg($image);
    imagedestroy($image);
    }
}

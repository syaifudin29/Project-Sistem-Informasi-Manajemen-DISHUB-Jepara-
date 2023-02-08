<?php

namespace App\Models;

use CodeIgniter\Model;

class TugasModel extends Model
{
    protected $table = 'tugas';
    protected $primaryKey = 'id_tugas';
    protected $allowedFields = ['id_tugas', 'id_user', 'id_staf', 'judul', 'keterangan', 'file_staf', 'file_peserta', 'status'];
    

  	public function getTugas()
    {             
        $query =  $this->db->table('tugas')->select('tugas.*, user.id_user, user.nama')->join('user', 'user.id_user = tugas.id_user')->where('tugas.id_staf', session()->get('id_user'))->orderBy('id_tugas', 'DESC')->get(); 
        return $query;
    }

    public function getTugasTanggal($tgl)
    {             
        $query =  $this->db->table('tugas')->select('tugas.*, user.id_user, user.nama')->join('user', 'user.id_user = tugas.id_user')->where('tgl', $tgl)->where('tugas.id_staf', session()->get('id_user'))->orderBy('id_tugas', 'DESC')->get(); 
        return $query;
    }

    public function getAbsensiTgl(){
    	$query =  $this->db->table('absensi')->join('user', 'user.id_user = absensi.id_user')->get();  
        return $query;
    }

}
<?php

namespace App\Models;

use CodeIgniter\Model;

class AbsensiModel extends Model
{
    protected $table = 'absensi';
    protected $primaryKey = 'id_absensi';
    protected $allowedFields = ['id_absensi', 'id_user', 'tgl', 'absen', 'keterangan', 'id_staf'];
    private $kelas = 'absensi';

  	public function getAbsensiDist()
    {             
        $query =  $this->db->query('select distinct tgl from absensi where id_staf = '.session()->get('id_user'));  
        return $query;
    }

    public function getAbsensiTgl(){
    	$query =  $this->db->table('absensi')->join('user', 'user.id_user = absensi.id_user')->get();  
        return $query;
    }

}
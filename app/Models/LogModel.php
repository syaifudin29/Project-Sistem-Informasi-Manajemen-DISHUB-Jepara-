<?php

namespace App\Models;

use CodeIgniter\Model;

class LogModel extends Model
{
    protected $table = 'logbook';
    protected $primaryKey = 'id_logbook';
    protected $allowedFields = ['id_logbook', 'id_user','id_staf', 'tgl', 'kegiatan', 'nilai'];

    public function getUserLog($tgl){
    	$query =  $this->db->table('logbook')->join('user', 'user.id_user = logbook.id_user')->where('kegiatan !=', '')->where('tgl', $tgl)->where('user.id_staf', session()->get('id_user'))->get();  
        return $query;
    }
}
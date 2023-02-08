<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id_user';
    protected $allowedFields = ['id_user', 'username', 'password','nim', 'level', 'nama', 'ttl', 'no_hp', 'alamat', 'jurusan', 'asal_sekolah','email', 'file_rekom', 'status', 'photo','id_staf'];

    public function getPesertaMagang()
    {             
        $query =  $this->db->table('user')
         ->join('magang', 'magang.id_user = user.id_user')
         ->where('status', '1')
         ->get();  
        return $query;
    }

     public function getUserProfile($id)
    {             
        $query =  $this->db->table('user')
         ->join('magang', 'magang.id_user = user.id_user')
         ->where('user.id_user', $id)
         ->get();  
        return $query;
    }

}
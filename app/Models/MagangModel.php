<?php

namespace App\Models;

use CodeIgniter\Model;

class MagangModel extends Model
{
    protected $table = 'magang';
    protected $primaryKey = 'id_magang';
    protected $allowedFields = ['id_magang', 'id_user', 'awal', 'akhir', 'id_bidang'];

    

}
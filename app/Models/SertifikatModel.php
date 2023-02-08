<?php

namespace App\Models;

use CodeIgniter\Model;

class SertifikatModel extends Model
{
    protected $table = 'sertifikat';
    protected $primaryKey = 'id_sertifikat';
    protected $allowedFields = ['id_user', 'tanggal'];

    

}
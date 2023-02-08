<?php

namespace App\Models;

use CodeIgniter\Model;

class NilaiModel extends Model
{
    protected $table = 'nilai';
    protected $primaryKey = 'id_nilai';
    protected $allowedFields = ['id_nilai', 'id_user', 'id_staf', 'id_kriteria', 'nilai', 'status'];


}
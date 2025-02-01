<?php

namespace App\Models;

use CodeIgniter\Model;

class MajorModel extends Model
{
    protected $table = 'tbl_major';
    protected $primaryKey = 'major_id';
    protected $allowedFields = ['major_title', 'major_acronym', 'member_count'];
}

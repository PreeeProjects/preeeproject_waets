<?php

namespace App\Models;

use CodeIgniter\Model;

class TracerStudyHeaderModel extends Model
{
    protected $table = 'tbl_tracer_study_header';
    protected $primaryKey = 'id';
    protected $allowedFields = ['year_graduated_id', 'year_graduated', 'caption', 'date'];
}

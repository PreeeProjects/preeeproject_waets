<?php

namespace App\Models;

use CodeIgniter\Model;

class SchoolYearModel extends Model
{
    protected $table = 'tbl_school_year';
    protected $primaryKey = 'year_graduated_id';
    protected $allowedFields = ['year_graduated', 'date_added'];
}

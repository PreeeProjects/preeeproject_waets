<?php

namespace App\Models;

use CodeIgniter\Model;

class AssistanceModel extends Model
{
    protected $table = 'tbl_assistance';
    protected $primaryKey = 'assistance_id';
    protected $allowedFields = ['title', 'what', 'when', 'where', 'qualification', 'details'];
}

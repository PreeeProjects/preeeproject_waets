<?php

namespace App\Models;

use CodeIgniter\Model;

class DashboardModel extends Model
{
    protected $table = 'tbl_dashboard';
    protected $primaryKey = 'dashboard_id';
    protected $allowedFields = ['title', 'image_1', 'image_2', 'image_3', 'image_4', 'image_5'];
}

<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminMasterKeyModel extends Model
{

    protected $table = 'tbl_admin_master_key';
    protected $primaryKey = 'id';
    protected $allowedFields = ['full_name', 'user_name', 'password', 'status'];

}

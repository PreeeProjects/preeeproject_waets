<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'tbl_users';
    protected $primaryKey = 'user_id';
    protected $allowedFields = ['username', 'password', 'tupt_id', 'email', 'first_name', 'last_name', 'middle_initial', 'full_name', 'address', 'major_id', 'major', 'year_graduated_id', 'year_graduated', 'phone_number', 'bio', 'work', 'profile_path', 'profile_pic', 'user_type', 'tracer_study_header_id', 'is_tracer_study', 'is_approve', 'status'];
}

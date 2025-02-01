<?php

namespace App\Models;

use CodeIgniter\Model;

class ForumModel extends Model
{
    protected $table = 'tbl_forum';
    protected $primaryKey = 'forum_id';
    protected $allowedFields = ['forum_name', 'major_id', 'description', 'forum_photo', 'created_by','date', 'status'];
}

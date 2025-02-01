<?php

namespace App\Models;

use CodeIgniter\Model;

class ForumPostModel extends Model
{
    protected $table = 'tbl_forum_post';
    protected $primaryKey = 'forum_post_id';
    protected $allowedFields = ['forum_id', 'post_type', 'image', 'caption', 'posted_by', 'date'];
}

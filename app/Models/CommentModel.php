<?php

namespace App\Models;

use CodeIgniter\Model;

class CommentModel extends Model
{
    protected $table = 'tbl_forum_comments';
    protected $primaryKey = 'comment_id';
    protected $allowedFields = ['forum_post_id', 'user_id', 'user_name', 'user_image_path', 'comment'];
}

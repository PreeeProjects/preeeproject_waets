<?php

namespace App\Models;

use CodeIgniter\Model;

class ForumCommentSubModel extends Model
{
    protected $table = 'tbl_forum_comments_sub';
    protected $primaryKey = 'forum_comments_sub_id';
    protected $allowedFields = ['comment_id', 'forum_post_id', 'user_id', 'user_name', 'user_image_path', 'comment_reply'];
}

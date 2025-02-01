<?php

namespace App\Models;

use CodeIgniter\Model;

class NotificationModel extends Model
{
    protected $table = 'tbl_notification';
    protected $primaryKey = 'notification_id';
    protected $allowedFields = ['audience', 'user_id', 'context', 'content', 'date_time'];
}

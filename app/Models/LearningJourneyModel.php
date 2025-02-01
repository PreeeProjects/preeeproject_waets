<?php

namespace App\Models;

use CodeIgniter\Model;

class LearningJourneyModel extends Model
{
    protected $table = 'tbl_learning_journey';
    protected $primaryKey = 'folder_id';
    protected $allowedFields = ['folder_name', 'user_id', 'created_by', 'image_1', 'image_2', 'image_3', 'image_4', 'image_5'];
}

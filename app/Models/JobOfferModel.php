<?php

namespace App\Models;

use CodeIgniter\Model;

class JobOfferModel extends Model
{
    protected $table = 'tbl_job_offer';
    protected $primaryKey = 'job_offer_id';
    protected $allowedFields = ['post_type', 'caption', 'image', 'date'];
}

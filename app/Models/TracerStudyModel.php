<?php

namespace App\Models;

use CodeIgniter\Model;

class TracerStudyModel extends Model
{
    protected $table = 'tbl_tracer_study';
    protected $primaryKey = 'tracer_study_id';
    protected $allowedFields = ['email', 'full_name', 'address', 'mobile_number', 'civil_status', 'sex', 'birthdate', 'region', 'province', 'residence', 'year_graduated', 'degree', 'university', 'award', 'course_reason', 'exam_passed_name', 'exam_passed_date', 'exam_passed_rating', 'training_title', 'training_duration', 'training_credits_earned', 'training_institution', 'is_employed', 'not_employed_reason', 'employed_employment_status', 'employed_skill_acquired', 'employed_occupation', 'employed_business_line', 'employed_work_place', 'is_first_job', 'first_job_reson_for_staying', 'is_first_job_course_related', 'reason_for_changing', 'first_job_duration', 'first_job_referral', 'first_job_land_duration', 'first_job_level_position', 'current_job_level_position', 'first_job_income', 'is_job_curriculum_related', 'useful_competencies', 'course_related_first_job', 'course_related_land_job_duration', 'tracer_study_header_id', 'school_year', 'course_related_income'];
}

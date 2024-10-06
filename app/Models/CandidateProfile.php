<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class CandidateProfile extends Model
{
    // protected $fillable = [
    //     'user_id', 'profession', 'experience', 'hourly_rate', 'total_projects', 'english_level', 'availability', 'img'
    // ];

    protected $table = "candidate_profile";

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
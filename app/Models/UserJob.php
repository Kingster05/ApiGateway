<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserJob extends Model
{
    protected $table = 'user_jobs'; // Assuming your table name is 'user_jobs'

    protected $fillable = [
        'user_id', // Assuming there's a user_id column in your table
        'job_title',
        'company_name',
        // Add other fillable attributes as needed
    ];

    // Define relationships with other models if necessary
    // For example, if a user job belongs to a user:
    public function user()
    {
        return $this->belongsTo(User::class); // Assuming User model exists
    }

    // Add any custom methods or scopes you need
    // For example, a scope to filter jobs by title:
    public function scopeByJobTitle($query, $jobTitle)
    {
        return $query->where('job_title', $jobTitle);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\ProjectStatus;
use App\Models\User;
use App\Models\Proposal;

class Project extends Model
{
    /** @use HasFactory<\Database\Factories\ProjectFactory> */
    use HasFactory;

    public function casts()
    {

        return [
            'tech_stack' => 'array',
            'status' => ProjectStatus::class,
            'ends_at' => 'datetime',
        ];
    
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function proposals()
    {
        return $this->hasMany(Proposal::class);
    }
}

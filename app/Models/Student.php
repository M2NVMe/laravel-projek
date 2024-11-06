<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public function grade(): BelongsTo
    {
        return $this->belongsTo(Grade::class);
    }
    public function department(): BelongsTo {
        return $this->belongsTo(Department::class);
    }
}


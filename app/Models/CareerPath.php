<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CareerPath extends Model
{
    use HasFactory;
    protected $table = 'career_paths';
    protected $primaryKey = 'id';

    public function careers(): HasMany
    {
        return $this->hasMany(Career::class, 'career_path_id');
    }
}

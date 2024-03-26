<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActionHeader extends Model
{
    use HasFactory;
    protected $table = 'action_header';
    protected $primaryKey = 'id';
}

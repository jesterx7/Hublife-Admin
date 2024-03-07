<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormHeader extends Model
{
    use HasFactory;
    protected $table = 'form_header';
    protected $primaryKey = 'id';
}

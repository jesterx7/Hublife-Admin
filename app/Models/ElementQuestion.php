<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ElementQuestion extends Model
{
    use HasFactory;
    protected $table = 'element_questions';
    protected $primaryKey = 'id';

    public function elementAnswers(): HasMany
    {
        return $this->hasMany(ElementAnswer::class, 'element_question_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ElementAnswer extends Model
{
    use HasFactory;
    protected $table = 'element_answers';
    protected $primaryKey = 'id';

    public function element(): BelongsTo
    {
        return $this->BelongsTo(Element::class, 'element_id');
    }
}

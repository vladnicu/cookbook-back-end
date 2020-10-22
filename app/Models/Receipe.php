<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'serves',
        'difficulty',
        'prep_time',
        'cook_time'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    // TODO trebuie sa fac cast si la created at daca il returnez?
    protected $casts = [
        'serves' => 'integer',
        'prep_time' => 'integer',
        'cook_time' => 'integer',
    ];

}

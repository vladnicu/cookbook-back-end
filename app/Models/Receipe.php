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
        'total_time',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    // TODO trebuie sa fac cast si la created at daca il returnez?
    protected $casts = [
        'serves' => 'integer',
        'total_time' => 'integer',
    ];


    public function ingredients() {
        return $this->hasMany(Ingredient::class);
    }

    public function steps() {
        return $this->hasMany(Step::class);
    }

}

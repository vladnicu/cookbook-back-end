<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Step extends Model
{
    use HasFactory;

    protected $fillable = [
        'text'
    ];

    public function receipe() {
        return $this->belongsTo(Receipe::class);
    }

}

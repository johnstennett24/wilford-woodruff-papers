<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    use HasFactory;

    public function person()
    {
        return $this->belongsTo(Subject::class);
    }

    public function mother()
    {
        return $this->belongsTo(Wife::class);
    }

    public function toArray()
    {
        return [
            'name' => $this->name,
            'gender' => $this->gender,
            'birthdate' => $this->birthdate,
            'birthplace' => $this->birthplace,
        ];
    }
}

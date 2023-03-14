<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wife extends Model
{
    use HasFactory;

    public function person()
    {
        return $this->belongsTo(Subject::class);
    }

    public function children()
    {
        return $this->hasMany(Child::class);
    }

    public function toArray()
    {
        return [
            'name' => $this->name,
            'marriage_year' => $this->marriage_year,
            'mother' => $this->mother,
            'father' => $this->father,
            'children' => $this->children,
        ];
    }
}

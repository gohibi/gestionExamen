<?php

namespace App\Models;

use App\Models\Filiere;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;

    protected $fillable=[
        "firstname",
        "lastname",
        "email",
        "mobile",
        "filiere_id",
    ];

    /**
     * Get the filiere that owns the Student
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function filiere()
    {
        return $this->belongsTo(Filiere::class,"filiere_id");
    }
}

<?php

namespace App\Models;

use App\Models\Examen;
use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Resultat extends Model
{
    use HasFactory;

    protected $fillable =[
        "note",
        "grade",
        "examen_id",
        "student_id",
    ];

    /**
     * Get thn student that owns the Resultat
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function examen()
    {
        return $this->belongsTo(Examen::class);
    }
}

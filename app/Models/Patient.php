<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $fillable = [
        'patient',
        'medrec_num',
        'goal',
        'criteria',
        'diagnosis',
        'complaint',
        'observasi',
        'terapeutik',
        'edukasi',
        'kolaborasi',
    ];
}

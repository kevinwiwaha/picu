<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Major;
use App\Models\Intervention;
use App\Models\Minor;


class diagnosis extends Model
{
    use HasFactory;
    protected $fillable = ['diagnosis_name', 'goal', 'criteria'];
    public function interventions()
    {
        return $this->belongsToMany(Intervention::class);
    }
    public function majors()
    {
        return $this->belongsToMany(Major::class);
    }
    public function minors()
    {
        return $this->belongsToMany(Minor::class);
    }
}

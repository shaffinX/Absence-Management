<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class project extends Model
{
    protected $table = "project";
    protected $fillable = [
        'projectname', 'description', 'contactprofessional', 'toolsconcerns',
        'cio', 'estload', 'startdate', 'enddate', 'status', 'commentpro',
    ];
    public $timestamps = false;
    use HasFactory;
}

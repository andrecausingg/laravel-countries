<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flag extends Model
{
    use HasFactory;
    protected $table = 'flags';
    protected $primaryKey = 'id';
    protected $fillable = [
        'flag_name',
        'flag_official',
        'flag_desc',
        'flag_population',
        'flag_timezone',
        'flag_continents'
    ];

}

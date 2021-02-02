<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $table = 'urls';
    public $timestamps = true;

    protected $fillable = [
        'link',
        'hw',
        'ch',
        'hr',
        'hc'
    ];
}

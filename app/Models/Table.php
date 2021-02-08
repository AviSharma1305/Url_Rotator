<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;

    protected $table = 'urlGroups';
    public $timestamps = true;

    protected $fillable = [
        "name"
    ];

    public function comments()
    {
        return $this->hasMany(Project::class);
    }
}

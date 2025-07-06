<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';

    public $timestamps = false;

    protected $fillable = ['name', 'status'];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}

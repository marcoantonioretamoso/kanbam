<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table = 'type';

    public $timestamps = false;

    protected $fillable = ['name', 'status'];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'task';

    public $timestamps = false;

    protected $fillable = [
        'description',
        'priority',
        'status',
        'category_id',
        'type_id',
        'user_id',
    ];
    //constantes
    const ALTA = 1;
    const MEDIA_ALTA = 2;
    const MEDIA = 3;
    const BAJA = 4;
    const ACTIVO = 1;
    const INACTIVO = 0;
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

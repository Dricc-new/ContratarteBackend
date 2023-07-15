<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{
    use HasFactory;

    protected $table = 'entities';
    protected $fillable = [
        'id',
        'reeup',
        'name',
        'email',
    ];

    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }
}

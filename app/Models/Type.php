<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;
    protected $table = 'types';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'name',
    ];

    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }
}

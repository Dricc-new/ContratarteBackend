<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $table = 'events';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'name',
    ];

    public function records()
    {
        return $this->hasMany(Record::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;
    protected $table = 'tables';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'name',
    ];
    

    public function elements()
    {
        return $this->hasMany(Element::class);
    }
}

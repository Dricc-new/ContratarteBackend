<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Element extends Model
{
    use HasFactory;
    protected $table = 'elements';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'table_id',
        'name',
    ];
    
    public function table()
    {
        return $this->belongsTo(Table::class);
    }

    public function modifications(){
        return $this->hasMany(Modification::class);
    }
}

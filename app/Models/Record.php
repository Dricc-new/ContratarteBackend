<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;
    protected $table = 'records';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'event_id',
        'user_id',
        'date',
    ];
    
    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function modifications(){
        return $this->hasMany(Modification::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Modification extends Model
{
    use HasFactory;
    protected $table = 'modifications';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'record_id',
        'element_id',
        'fill_id',
        'date',
    ];
    
    public function record()
    {
        return $this->belongsTo(Record::class);
    }
    
    public function element()
    {
        return $this->belongsTo(Element::class);
    }

    public function cell(){
            return DB::table($this->element->table->name)->where('id','=',$this->fill_id)->first();
    }
}

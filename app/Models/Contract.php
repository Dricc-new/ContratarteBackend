<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;
    protected $table = 'contracts';
    protected $fillable = [
        'id',
        'entity_id',
        'number',
        'type_id',
        'start_date',
        'end_date',
    ];
    
    public function entity()
    {
        return $this->belongsTo(Entity::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function attachments()
    {
        return $this->hasMany(Attachment::class);
    }
}

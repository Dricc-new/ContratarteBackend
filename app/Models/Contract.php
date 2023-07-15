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
        'enterprise_id',
        'number',
        'type_id',
        'start_date',
        'end_date',
    ];
    
    public function enterprise()
    {
        return $this->belongsTo(Enterprise::class);
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

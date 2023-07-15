<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    use HasFactory;
    protected $table = 'attachments';
    protected $fillable = [
        'id',
        'attachmenttype_id',
        'contract_id',
        'filename',
    ];
    
    public function contract()
    {
        return $this->belongsTo(Contract::class);
    }

    public function attachmenttype()
    {
        return $this->belongsTo(Attachmenttype::class);
    }
    use HasFactory;
}

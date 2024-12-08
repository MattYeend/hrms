<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'start',
        'end',
        'licence_id',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'start' => 'datetime',
        'end' => 'datetime'
    ];

    public function licence(){
        return $this->belongsTo(Licence::class, 'licence_id');
    }
}

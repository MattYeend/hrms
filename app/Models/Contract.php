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

    public function licence(){
        return $this->hasOne(Licence::class, 'licence_id');
    }
}

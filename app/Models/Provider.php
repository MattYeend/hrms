<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'first_line',
        'second_line',
        'town',
        'city',
        'county',
        'country',
        'post_code',
        'provider_contact_id',
        'created_at',
        'updated_at'
    ];

    public function learning(){
        return $this->hasMany(Learning::class);
    }

    public function providerContact(){
        return $this->belongsTo(ProviderContact::class, 'provider_contact_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddressBook extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_line',
        'second_line',
        'town',
        'city',
        'county',
        'country',
        'post_code',
        'head_office',
        'address_contact_id',
        'created_at',
        'updated_at'
    ];

    public function addressContact(){
        return $this->belongsTo(AddressContact::class, 'address_contact_id');
    }
}

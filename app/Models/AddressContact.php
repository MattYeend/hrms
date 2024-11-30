<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddressContact extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'position',
        'main_contact',
        'secondary_contact',
        'created_at',
        'updated_at'
    ];

    public function addressBook(){
        return $this->hasOne(AddressBook::class, 'address_contact_id');
    }
}

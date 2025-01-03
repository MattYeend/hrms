<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'pay_day',
        'active',
        'work_weekends',
        'contract_id',
        'company_contact_id',
        'company_relationship_manager',
        'created_by',
        'created_at',
        'updated_by',
        'updated_at',
        'deleted_by',
        'deleted_at'
    ];

    public function contract(){
        return $this->hasOne(Contract::class, 'company_id');
    }

    public function companyContact(){
        return $this->belongsTo(CompanyContact::class, 'company_contact_id');
    }

    public function companyRelationshipManager(){
        return $this->belongsTo(User::class, 'company_relationship_manager');
    }

    public function addressBook(){
        return $this->belongsTo(AddressBook::class, 'address_book_id');
    }

    public function createdBy(){
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy(){
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function deletedBy(){
        return $this->belongsTo(User::class, 'deleted_by');
    }
}

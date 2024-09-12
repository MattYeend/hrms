<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'profile_picture',
        'phone',
        'salary',
        'first_line',
        'second_line',
        'town',
        'city',
        'county',
        'country',
        'post_code',
        'full_or_part',
        'department_id',
        'roles_id',
        'seniority_id',
        'job_id',
        'holiday_entitlement_id',
        'contact_id',
        'created_by',
        'created_at',
        'updated_by',
        'updated_at',
        'deleted_by',
        'deleted_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function achievements(){
        return $this->belongsToMany(Achievements::class);
    }

    public function department(){
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function role()
    {
        return $this->belongsTo(Roles::class, 'roles_id', 'id');
    }

    public function isSuperAdmin()
    {
        return $this->role && $this->role->name === 'Super Admin';
    }

    public function isAdmin()
    {
        return $this->role && $this->role->name === 'Admin';
    }

    public function seniority(){
        return $this->belongsTo(Seniority::class, 'seniority_id');
    }

    public function job(){
        return $this->belongsTo(Job::class, 'job_id');
    }

    public function holidayEntitlement(){
        return $this->belongsTo(HolidayEntitlement::class, 'holiday_entitlement_id');
    }

    public function contact(){
        return $this->belongsTo(UserContact::class, 'contact_id');
    }

    public function leave(){
        return $this->hasMany(Leave::class);
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

    public function goals(){
        return $this->belongsToMany(Goals::class);
    }

    public function interests(){
        return $this->belongsToMany(Interests::class);
    }

    public function languages(){
        return $this->belongsToMany(Languages::class);
    }

    public function learnings(){
        return $this->belongsToMany(Learning::class);
    }

    public function notes(){
        return $this->belongsToMany(Notes::class);
    }

    public function tiles(){
        return $this->belongsToMany(Tiles::class);
    }
}

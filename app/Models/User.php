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
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'password',
        'profile_picture',
        'cv_path',
        'cover_letter_path',
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
        'region',
        'timezone',
        'dark_mode',
        'start_date',
        'end_date',
        'office_based',
        'remote_based',
        'hybrid_based',
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

    public function blogs(){
        return $this->hasMany(Blogs::class);
    }

    public function blogComments(){
        return $this->hasMany(BlogComments::class);
    }

    public function blogLikes(){
        return $this->hasMany(BlogLikes::class);
    }

    public function cSuite(){
        $cSuiteCodes = [
            'OWN', // OWNER
            'CEO', // Chief Executive Officer
            'COO', // Chief Operations Officer
            'CFO', // Chief Financial Officer
            'CTO', // Chief Technology Officer
            'CMO', // Chief Marketing Officer
            'CIO', // Chief Information Officer
            'CCO', // Chief Compliance Officer
            'CRO', // Chief Risk Officer
            'CDO', // Chief Data Officer
            'CCO', // Chief Customer Officer
            'CSO', // Chief Strategy Officer
            'CEO', // Chief Engineering Officer
            'CHRO' // Chief HR Officer
        ];
        return $this->job && in_array($this->job->code, $cSuiteCodes);
    }

    public function meetings(){
        return $this->belongsToMany(Meetings::class);
    }

    public function getShortName(): string{
        return $this->first_name;
    }

    public function getName(): string{
        return $this->first_name . ' ' . $this->last_name;
    }

    public function getFullNameLong(): string {
        return $this->first_name . ($this->middle_name ? ' ' . $this->middle_name : '') . ' ' . $this->last_name;
    }

    public function getFullNameShort(): string{
        return $this->first_name[0] . ' ' . $this->last_name;
    }

    public function rotas(){
        return $this->hasMany(Rotas::class);
    }

    public function hrStaff(){
        $hrStaffCodes = [
            'CHRO', // Chief HR Officer
            'CEO', // Chief Executive Officer
            'COO', // Chief Operations Officer
            'CFO', // Chief Financial Officer
            'CTO', // Chief Technology Officer
            'CMO', // Chief Marketing Officer
            'CIO', // Chief Information Officer
            'CCO', // Chief Compliance Officer
            'CRO', // Chief Risk Officer
            'CDO', // Chief Data Officer
            'CCO', // Chief Customer Officer
            'CSO', // Chief Strategy Officer
            'CEO' // Chief Engineering Officer
        ];
        return $this->job && in_array($this->job->code, $hrStaffCodes);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;
use App\Enums\BlogStatus;
use App\Enums\BlogApprovalStatus;

class Blogs extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'system_level',
        'company_level',
        'blog_type_id',
        'author',
        'status',
        'approval_status',
        'approved_by', 
        'created_at',
        'updated_by',
        'updated_at',
        'deleted_by',
        'deleted_at'
    ];

    protected static function boot(){
        parent::boot();

        static::creating(function ($blog) {
            $blog->slug = self::createUniqueSlug($blog->title);
        });

        static::updating(function ($job) {
            if ($blog->isDirty('title')) {
                $blog->slug = self::createUniqueSlug($blog->title);
            }
        });
    }

    private static function createUniqueSlug($title){
        $slug = Str::slug($title);
        $count = static::where('slug', 'LIKE', "{$slug}%")->count();
        return $count ? "{$slug}-{$count}" : $slug;
    }

    protected $casts = [
        'status' => BlogStatus::class,
        'approval_status' => BlogApprovalStatus::class,
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function blogType(){
        return $this->belongsTo(BlogTypes::class, 'blog_type_id');
    }

    public function blogCategories(){
        return $this->hasMany(blogCategories::class);
    }

    public function comments(){
        return $this->hasMany(BlogComments::class);
    }

    public function likes(){
        return $this->hasMany(BlogLikes::class);
    }

    public function author(){
        return $this->belongsTo(User::class, 'author');
    }

    public function updatedBy(){
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function deletedBy(){
        return $this->belongsTo(User::class, 'deleted_by');
    }

    public function approvedBy(){
        return $this->belongsTo(User::class, 'approved_by');
    }
}
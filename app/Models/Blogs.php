<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Blogs extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'text',
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
        static::creating(function($blog){
            $blog->slug = self::createUniqueSlug($blog->name);
        });
        static::updating(function($blog){
            if($blog->isDirty('title')){
                $blog->slug = self::createUniqueSlug($blog->name);
            }
        });
    }

    private static function createUniqueSlug($name){
        $slug = Str::slug($name);
        $count = static::where('slug', 'LIKE', "%$slug%")->count();
        return $count ? "{$slug}-{$count}" : $slug;
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
        return $this->belongsTo(User::class, 'created_by');
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
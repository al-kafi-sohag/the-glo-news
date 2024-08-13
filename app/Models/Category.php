<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends BaseModel
{
    use HasFactory, SoftDeletes;

    public $guarded = [];

    public function subCategories(): HasMany
    {
        return $this->hasMany(SubCategory::class, 'c_id');
    }

    public function header_subCategories(): HasMany
    {
        return $this->hasMany(SubCategory::class, 'c_id')->where('is_header', 1);
    }

    public function posts(): HasMany
    {
        return $this->hasMany(PostCategory::class, 'category_id');
    }


    public function activeSubCategories(): HasMany
    {
        return $this->hasMany(SubCategory::class, 'c_id')->where('status', 1);
    }
}

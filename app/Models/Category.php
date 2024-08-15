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
    public function featuredBg(){
        if($this->is_featured == 1){
            return 'badge badge-success';
        }else{
            return 'badge badge-danger';
        }
    }
    public function featuredTitle(){
        if($this->is_featured == 1){
            return 'Yes';
        }else{
            return 'No';
        }
    }
    public function latestBg(){
        if($this->is_latest == 1){
            return 'badge badge-success';
        }else{
            return 'badge badge-danger';
        }
    }
    public function latestTitle(){
        if($this->is_latest == 1){
            return 'Yes';
        }else{
            return 'No';
        }
    }
    public function headerBg(){
        if($this->is_header == 1){
            return 'badge badge-success';
        }else{
            return 'badge badge-danger';
        }
    }
    public function headerTitle(){
        if($this->is_header == 1){
            return 'Yes';
        }else{
            return 'No';
        }
    }
    public function statusBg(){
        if($this->status == 1){
            return 'badge badge-success';
        }else{
            return 'badge badge-danger';
        }
    }
    public function statusTitle(){
        if($this->status == 1){
            return 'Active';
        }else{
            return 'Deactive';
        }
    }
    public function statusIcon(){
        if($this->status == 1){
            return 'btn-warning';
        }else{
            return 'btn-success';
        }
    }
}

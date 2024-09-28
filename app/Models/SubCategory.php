<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;

class SubCategory extends BaseModel
{
    use HasFactory, SoftDeletes, Sluggable;

    public $guarded = [];



    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'c_id');

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

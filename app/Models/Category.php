<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends BaseModel
{
    use HasFactory, SoftDeletes;

    public $guarded = [];


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
}

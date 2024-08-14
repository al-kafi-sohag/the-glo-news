<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;



class Author extends  BaseModel



{
    use HasFactory, SoftDeletes;

    public $guarded = [];

    public function type()
{
    switch ($this->type) {
        case 1:
            return 'Staff Reporter';
        case 2:
            return 'Senior Reporter';
        case 3:
            return 'Junior Staff Reporter';
        case 4:
            return 'Correspondent';
        case 5:
            return 'Investigative Reporter';
        case 6:
            return 'Political Reporter';
        case 7:
            return 'Crime Reporter';
        case 8:
            return 'Entertainment Reporter';
        case 9:
            return 'Sports Reporter';
        case 10:
            return 'Technology Reporter';
        case 11:
            return 'Health Reporter';
        case 12:
            return 'Business Reporter';
        case 13:
            return 'Feature Writer/Reporter';
        case 14:
            return 'Photojournalist';
        case 15:
            return 'Video Journalist (VJ)';
        default:
            return 'Unknown Reporter Type';
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

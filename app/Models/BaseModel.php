<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    public function created_user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function updated_user()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
    public function deleted_user()
    {
        return $this->belongsTo(User::class, 'deleted_by');
    }
    public function creater()
    {
        return $this->morphTo();
    }
    public function updater()
    {
        return $this->morphTo();
    }
    public function deleter()
    {
        return $this->morphTo();
    }

    public function scopeActivated($query){
        return $query->where('status',1);
    }
    public function scopeFeatured($query){
        return $query->where('is_featured',1);
    }
    public function scopeMenu($query){
        return $query->where('is_menu',1);
    }
}

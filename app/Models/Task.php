<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['name','description','completed','category_id','user_id','priority_id','status_id'];

    protected $table = 'tasks';

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function priority(){
        return $this->belongsTo(Priority::class);
    }
    public function status(){
        return $this->belongsTo(Status::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}

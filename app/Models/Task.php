<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['name','description','completed','category_id'];

    protected $table = 'tasks';

    public function category(){
        return $this->belongsTo(Category::class);
    }
}

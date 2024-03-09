<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'name', 'color'];
    protected $table = 'category';
    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }
}

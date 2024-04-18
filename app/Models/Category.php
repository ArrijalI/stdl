<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['id', 'name', 'color'];
    protected $table = 'categories';
    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'name', 'due_date', 'due_time', 'category', 'description', 'status'];
    protected $table = 'task';
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'name', 'due_date', 'due_time', 'priority', 'category_id', 'description', 'status'];
    protected $table = 'tasks';
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}

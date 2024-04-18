<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'heading',
        'text',
        'user_id',
    ];
    public function creator()
    {
        return $this->belongsTo(User::class);
    }
    public function participants()
    {
        return $this->belongsToMany(User::class);
    }

}

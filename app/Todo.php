<?php

namespace App;

use App\Step;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable = ['title', 'description', 'completed', 'user_id'];
    
    /**
     * One to Many relationship
     */
    public function steps()
    {
        return $this->hasMany(Step::class);
    }
}

<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\Lesson as Authenticatable;

class Lesson extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'body', 'some_bool',
    ];

    /**
     * @return mixed
     */
    public function tags()
    {
    	return $this->belongsToMany(Tag::class);
    }

}

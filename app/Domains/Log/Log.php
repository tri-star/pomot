<?php

namespace Pomot\Domains\Log;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    //
    protected $fillable = [
        'title',
        'description',
    ];


    /**
     * @return Tag[]
     */
    public function tags()
    {
        return $this->hasMany(Tag::class);
    }

}

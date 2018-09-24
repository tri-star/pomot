<?php

namespace Pomot\Domains\Log;

use Illuminate\Database\Eloquent\Model;
use Pomot\Domains\Exceptions\DomainException;

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
    public function tags() : \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Tag::class);
    }


    public function setTitleAttribute(string $value)
    {
        if(is_null($value)) {
            throw new DomainException('タイトルは必須です');
        }
        if(in_array($value, ['', null], true)) {
            throw new DomainException('タイトルは必須です');
        }
    }


    public function setDescriptionAttribute(string $value)
    {
        if(in_array($value, ['', null], true)) {
            throw new DomainException('説明は必須です');
        }
    }

}

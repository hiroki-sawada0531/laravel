<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Person extends Model
{
    public function getData()
    {
        return $this->id . ': ' . $this->name . ' (' . $this->age . ')';
    }

    public function scopeNameEqual($query, $str)
    {
        return $query->where('name', $str);
    }

    public function scopeAgeGreaterThan($quary, $n)
    {
        return $quary->where('age','>=', $n);
    }

    public function scopeAgeLessThan($quary, $n)
    {
        return $quary->where('age', '<=', $n);
    }

    protected static function boot()
    {
    parent::boot();

    static::addGlobalScope('age', function (Builder $builder) {
        $builder->where('age', '>', 20);
    });
    }

}

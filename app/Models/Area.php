<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Area extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function instructors()
    {
        return $this->hasMany(User::class);
    }

    public function pnf()
    {
        return $this->belongsTo(PNF::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public static function getOptions()
    {
        $areas = self::all(['id', 'name']);

        $options = $areas->mapWithKeys(fn($area) => [$area->id => $area->name])
            ->sortKeys()
            ->all();

        return $options;
    }
}

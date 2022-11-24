<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Instructor;
use App\Models\Shared\QueryScopes;
use Carbon\Carbon;
use Illuminate\Support\Str;

class Course extends Model
{
    use HasFactory, QueryScopes;

    /**
     * The attributes that are not mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = ['id'];

    protected static $searchColumn = 'name';

    public function instructor()
    {
        return $this->belongsTo(Instructor::class);
    }

    public function students()
    {
        return $this->belongsToMany(Course::class, 'registries')
            ->withTimestamps()
            ->withPivot(['id', 'approval']);
    }

    public function area() 
    {
        return $this->belongsTo(Area::class);
    }

    public function getStartTimeAttribute($startTime) 
    {
        return $this->formatTime($startTime);
    }

    public function getEndTimeAttribute($endTime) 
    {
        return $this->formatTime($endTime);
    }

    public function getStartInsAttribute($startIns) 
    {
        return $this->formatDate($startIns);
    }

    public function getEndInsAttribute($endIns) 
    {
        return $this->formatDate($endIns);
    }

    public function getStartCourseAttribute($startCourse) 
    {
        return $this->formatDate($startCourse);
    }

    public function getEndCourseAttribute($endCourse) 
    {
        return $this->formatDate($endCourse);
    }

    public function getExcerptAttribute()
    {
        return Str::words($this->description, 8);
    }

    private function formatDate($format)
    {
        $date = Carbon::createFromFormat('Y-m-d', $format);

        return $date->format('d/m/Y');
    }

    private function formatTime($format) {
        $time = Carbon::createFromFormat('H:i:s', $format);

        return $time->format('g:i A');
    }
}

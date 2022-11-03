<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Registry;

class Payment extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function registry()
    {
        return $this->belongsTo(Registry::class);
    }
}

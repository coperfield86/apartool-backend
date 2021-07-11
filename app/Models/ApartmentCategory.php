<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ApartmentCategory extends Model
{
    use HasFactory, SoftDeletes;

    public $primaryKey = 'apartment_id';
    public $timestamps = false;

    protected $fillable = [
        'apartment_id',
        'title',
        'description'
    ];
}

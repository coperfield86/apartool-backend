<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApartmentCategory extends Model
{
    use HasFactory;

    public $primaryKey = 'apartment_id';
    public $timestamps = false;

    protected $fillable = [
        'apartment_id',
        'title',
        'description'
    ];
}

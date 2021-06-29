<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'iso2',
        'iso3'
    ];

    public $timestamps = false;

    public function getId(): int
    {
        return $this->id;
    }
}

<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'status',
        'author'
    ];

    protected function author(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => ucfirst($value),
        );
    }

    protected function createdAt(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) =>  Carbon::parse($value)->diffForHumans() ?? Carbon::now()->diffForHumans(),
        );
    }

    protected function updatedAt(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => Carbon::parse($value)->diffForHumans() ?? Carbon::now()->diffForHumans(),
        );
    }
}

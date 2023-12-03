<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = [
      'name',
      'address',
      'is_open',
      'latitude',
      'longitude',
    ];

    protected $casts = [
      'is_open' => 'bool',
      'latitude' => 'decimal',
      'longitude' => 'decimal',
    ];

    public function scopeAddDistance(
        Builder $query,
        array $coordinates,
    ): void {
        $query
            ->when(is_null($query->getQuery()->columns), static fn (Builder $query) => $query->select('*'))
            ->selectRaw('
                ST_Distance(
                    ST_SRID(Point(longitude, latitude), 4326),
                    ST_SRID(Point(?, ?), 4326)
                ) AS distance
            ', $coordinates);
    }
}

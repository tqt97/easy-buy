<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $user_id
 * @property int $vehicle_id
 * @property int $zone_id
 * @property \Illuminate\Support\Carbon|null $start_time
 * @property \Illuminate\Support\Carbon|null $stop_time
 * @property int|null $total_price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Parking newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Parking newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Parking query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Parking whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Parking whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Parking whereStartTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Parking whereStopTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Parking whereTotalPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Parking whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Parking whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Parking whereVehicleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Parking whereZoneId($value)
 *
 * @mixin \Eloquent
 */
class Parking extends Model
{
    protected $fillable = ['user_id', 'vehicle_id', 'zone_id', 'start_time', 'stop_time', 'total_price'];

    protected function casts(): array
    {
        return [
            'start_time' => 'datetime',
            'stop_time' => 'datetime',
        ];
    }

    public function zone()
    {
        return $this->belongsTo(Zone::class);
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function scopeActive($query)
    {
        return $query->whereNull('stop_time');
    }

    public function scopeStopped($query)
    {
        return $query->whereNotNull('stop_time');
    }

    protected static function booted()
    {
        static::addGlobalScope('user', function (Builder $builder) {
            $builder->where('user_id', auth()->id());
        });
    }
}

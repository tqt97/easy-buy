<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property int $price_per_hour
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Zone newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Zone newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Zone query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Zone whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Zone whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Zone whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Zone wherePricePerHour($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Zone whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class Zone extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price_per_hour'];
}

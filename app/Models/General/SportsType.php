<?php

namespace App\Models\General;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\General\SportsType
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SportsType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SportsType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SportsType query()
 * @method static \Illuminate\Database\Eloquent\Builder|SportsType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SportsType whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SportsType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SportsType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SportsType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SportsType extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];
}

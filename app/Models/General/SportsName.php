<?php

namespace App\Models\General;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\General\SportsName
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SportsName newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SportsName newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SportsName query()
 * @method static \Illuminate\Database\Eloquent\Builder|SportsName whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SportsName whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SportsName whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SportsName whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SportsName whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SportsName extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];
}

<?php

namespace App\Models\General;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\General\BankAccount
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property string $account_number
 * @property string|null $account_ibn
 * @property string|null $ach_wire_routing_number
 * @property string|null $swift_code
 * @property string|null $account_type
 * @property string|null $bank_name
 * @property string|null $bank_address
 * @property string|null $bank_code
 * @property string|null $country_name
 * @property string|null $city_name
 * @property int|null $country_id
 * @property int|null $city_id
 * @property int|null $currency_id
 * @property string|null $institute_number
 * @property string|null $transit_number
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\General\Currency|null $currency
 * @method static \Illuminate\Database\Eloquent\Builder|BankAccount newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BankAccount newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BankAccount query()
 * @method static \Illuminate\Database\Eloquent\Builder|BankAccount whereAccountIbn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankAccount whereAccountNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankAccount whereAccountType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankAccount whereAchWireRoutingNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankAccount whereBankAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankAccount whereBankCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankAccount whereBankName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankAccount whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankAccount whereCityName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankAccount whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankAccount whereCountryName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankAccount whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankAccount whereCurrencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankAccount whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankAccount whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankAccount whereInstituteNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankAccount whereSwiftCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankAccount whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankAccount whereTransitNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankAccount whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class BankAccount extends Model
{
    use HasFactory;

    protected $fillable = ['title','description','account_number','account_ibn','ach_wire_routing_number','swift_code','account_type','bank_name',
        'bank_address','bank_code','country_name','city_name','country_id','city_id','currency_id','institute_number','transit_number'];

    function currency(){
        return $this->belongsTo(Currency::class,'currency_id');
    }
}

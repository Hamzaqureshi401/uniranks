<?php

namespace App\Providers;

use App\Models\Fairs\Fair;
use App\Models\General\Countries;
use App\Models\Institutes\School;
use App\Models\Institutes\University;
use App\Models\University\UniversityEvent;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Request;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
//        if (env('APP_ENV') === 'production') {
//            URL::forceScheme('https');
//        }
        Paginator::useBootstrapFive();
        Schema::defaultStringLength(191);
        Relation::morphMap([
            \AppConst::EVENT_TYPE_UNIVERSITY_EVENT => UniversityEvent::class,
            \AppConst::EVENT_TYPE_SCHOOL_FAIR => Fair::class,
            'school'=>School::class,
            \AppConst::PT_EARNED_FOR_STUDENT=>User::class,
            'university'=>University::class,
        ]);
        $this->countryInfo();
    }

    private function countryInfo()
    {
        if (!empty(session('country_info'))) return session('country_info');

        if (session()->get('user-ip') == null) {
            session()->put(['user-ip' => geoip(Request::getClientIp())]);
        }

        if (!Schema::hasTable('countries')) return [];


        $user_country = Str::lower(getUserCountryCode());
        $country = Countries::whereRaw('Lower(code)  = ?', [$user_country])->first();
        $suggested_language = "";
        if (Schema::hasTable('languages') && Schema::hasTable('country_languages') && !empty($country)) {
            $user_country = $country->country_name;
            $country?->load(['languages' => fn($q) => $q->where([['name', '!=', 'english'],['available',1]])]);
            $suggested_language = $country?->languages->first();
        }

        $data = [
            'name' => Str::upper($user_country),
            'id' => $country?->id,
            'code'=>$country?->code ?? "",
            'dial_code'=>$country?->country_code ?? "",
            'suggested_language' => $suggested_language,
        ];
        session()->put('country_info', $data);
        return $data;
    }
}

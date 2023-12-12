<?php

namespace Database\Seeders;

use App\Models\General\Currency;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CurrenciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Currency::truncate();
        $currencies = [
            [
                'name'=>'United States Dollar',
                'code'=>'USD',
            ],
            [
                'name'=>'U.A.E. Diagram',
                'code'=>'AED',
            ],
            [
                'name'=>'Euro',
                'code'=>'EUR',
            ],
            [
                'name'=>'Pound Sterling',
                'code'=>'GBP',
            ],
            [
                'name'=>'Indian Rupee',
                'code'=>'INR',
            ],
            [
                'name'=>'Philippine Peso',
                'code'=>'PHP',
            ],
            [
                'name'=>'Brazilian Real',
                'code'=>'BRL',
            ],
            [
                'name'=>"Property's Currency",
                'code'=>'Â£$',
            ],
            [
                'name'=>'Argentine Peso',
                'code'=>'ARS',
            ],
            [
                'name'=>'Australian Dollar',
                'code'=>'AUD',
            ],
            [
                'name'=>'Azerbaijani New Manats',
                'code'=>'AZN',
            ],
            [
                'name'=>'Bahrain Dinar',
                'code'=>'BHD',
            ],
            [
                'name'=>'Bulgarian Lev',
                'code'=>'BGN',
            ],
            [
                'name'=>'Canadian Dollar',
                'code'=>'CAD',
            ],
            [
                'name'=>'CFA Franc BCEAO',
                'code'=>'XOF',
            ],
            [
                'name'=>'Chilean Peso',
                'code'=>'CLP',
            ],
            [
                'name'=>'Chinese Yuan',
                'code'=>'CNY',
            ],
            [
                'name'=>"Columbian Peso",
                'code'=>'COP',
            ],
            [
                'name'=>'Czech Koruna',
                'code'=>'CZK',
            ],
            [
                'name'=>'Danish Krone',
                'code'=>'DKK',
            ],
            [
                'name'=>'Egyptian Pund',
                'code'=>'EGP',
            ],
            [
                'name'=>'Fijian Dollar',
                'code'=>'FJD',
            ],
            [
                'name'=>'Georgian Lari',
                'code'=>'GEL',
            ],
            [
                'name'=>'Hong Kong Dollar',
                'code'=>'HKD',
            ],
            [
                'name'=>'Hungarian Forint',
                'code'=>'HUF',
            ],
            [
                'name'=>'Indonesian Rupiah',
                'code'=>'IDR',
            ],
            [
                'name'=>'Japansese Yen',
                'code'=>'YPY',
            ],
            [
                'name'=>"Jordanian Dinar",
                'code'=>'JOD',
            ],
            [
                'name'=>'Kazakhstani Tenge',
                'code'=>'KZT',
            ],
            [
                'name'=>'Korean Won',
                'code'=>'KRW',
            ],
            [
                'name'=>'Kuwaiti Dinar',
                'code'=>'KWD',
            ],
            [
                'name'=>'Malaysian Ringgit',
                'code'=>'MYR',
            ],
            [
                'name'=>'Mexican Peso',
                'code'=>'MXN',
            ],
            [
                'name'=>'Moldovan Leu',
                'code'=>'MDL',
            ],
            [
                'name'=>'Namibian Dollar',
                'code'=>'NAD',
            ],
            [
                'name'=>'New Israeli Sheqel',
                'code'=>'ILS',
            ],
            [
                'name'=>'New Taiwan Dollar',
                'code'=>'TWD',
            ],
            [
                'name'=>"New Zealand Dollar",
                'code'=>'NZD',
            ],
            [
                'name'=>'Norwegian Krone',
                'code'=>'NOK',
            ],
            [
                'name'=>'Omani Rial',
                'code'=>'OMR',
            ],
            [
                'name'=>'Pakistani Rupee',
                'code'=>'PKR',
            ],
            [
                'name'=>'Turkish Lira',
                'code'=>'TRY',
            ],
        ];

        Currency::upsert($currencies,['code'],['name']);
    }
}

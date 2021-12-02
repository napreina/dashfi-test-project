<?php

namespace Database\Seeders;

use App\Models\Currency\Currency;
use Illuminate\Database\Seeder;

class InitialCurrencySeeder extends Seeder
{
    /**
     * Run the Currency table seeds.
     *
     * @return void
     */
    public function run()
    {
        Currency::truncate();
        echo "Start currency seeding...\n";
        echo "Initialize data...\n";
        $currencies = array(
            [
                "name"      =>  "US Dollar",
                "code"      =>  "USD",
                "symbol"    =>  "$"
            ],
            [
                "name"      =>  "Euro",
                "code"      =>  "EUR",
                "symbol"    =>  "€"
            ],
            [
                "name"      =>  "Chinese Yuan",
                "code"      =>  "CNY",
                "symbol"    =>  "¥"
            ],
            [
                "name"      =>  "Canadian Dollar",
                "code"      =>  "CAD",
                "symbol"    =>  "$"
            ],
            [
                "name"      =>  "Hong Kong Dollar",
                "code"      =>  "HKD",
                "symbol"    =>  "$"
            ],
        );

        echo "Add each currency...\n";

        $currencyData = array();
        foreach($currencies as $currency) {
            array_push($currencyData, $currency);

            echo "--".$currency['name']." added ...\n";
        }

        echo "Store currencies...\n";
        Currency::insert($currencyData);
        echo count($currencyData)." currencies has been stored succesfully.\n";
    }
}

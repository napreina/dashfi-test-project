<?php

namespace App\Services\Currency;

use Exception;

class ExchangerService {
    public function fixerIoCurrencyService(Array $data, $endpoint='convert') {
        $access_key = env("FIXER_IO_API_KEY");

        $from   = $data['from'];
        $to     = $data['to'];
        $amount = $data['amount'];

        try {
            // initialize CURL:
            // $ch = curl_init('http://data.fixer.io/api/'.$endpoint.'?access_key='.$access_key.'&from='.$from.'&to='.$to.'&amount='.$amount.'');
            // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $endpoint = 'latest';
            $ch = curl_init('http://data.fixer.io/api/'.$endpoint.'?access_key='.$access_key.'');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            // get the JSON data:
            $json = curl_exec($ch);
            curl_close($ch);

            // Decode JSON response:
            $conversionResult = json_decode($json, true);

            if($conversionResult['success']) {
                $rates = $conversionResult['rates'];
                $amount_exchanged = $rates[$to]/$rates[$from]*$amount;
                return [
                    "status"    => "success",
                    "data"      => [
                        "from"  => $from,
                        "to"    => $to,
                        "amount"=> $amount,
                        "amount_exchanged"  => $amount_exchanged
                    ],
                    "message"   => "Success"
                ];
            } else {
                return [
                    "status"    => "failed",
                    "data"      => null,
                    "message"   => $conversionResult['error']['info']
                ];
            }
        } catch (Exception $e) {
            return [
                "status"    => "failed",
                "data"      => null,
                "message"   => $e->getMessage()
            ];
        }
    }

}
?>

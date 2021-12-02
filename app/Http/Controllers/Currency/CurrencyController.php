<?php

namespace App\Http\Controllers\Currency;

use App\Http\Controllers\Controller;
use App\Http\Requests\Currency\CurrencyExchangeRequest;
use App\Models\Currency\Currency;
use App\Services\Currency\ExchangerService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CurrencyController extends Controller
{
    public function currencyList() {
        $currencies = Currency::get();
        return response()->json([
            "success"   => true,
            "data"      => $currencies,
            "message"   => "Currency List"
        ], Response::HTTP_OK);
    }

    public function exchanger(CurrencyExchangeRequest $request) {
        $data   = $request->validated();
        $service = new ExchangerService();
        $result = $service->fixerIoCurrencyService($data, "convert");

        if($result['status'] == "success")
            return response()->json([
                "success"   => true,
                "data"      => $result['data'],
                "message"   => $result['message']
            ], Response::HTTP_OK);
        else
            return response()->json([
                "success"   => false,
                "data"      => $result['data'],
                "message"   => $result['message']
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
    }
}

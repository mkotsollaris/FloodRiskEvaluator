<?php
/** @Author: Menelaos Kotsollaris
 * menelaos@mkotsollaris.com
 * All rights reserved ©
 */
/**
 * This class is using the http://www.ecb.europa.eu/stats/eurofxref/eurofxref-daily.xml API.
 * $currency = new Currency();
   $currency->getCurrencyBalance(CurrencyEnum::USD, CurrencyEnum::CAD);
 */
class Currency
{
//    /** 2D array holding the currency conversions as per Currency, Rate */
//    private $currencyArray;
//
//    /**FIXME: Very costly loading & reference of the API. Maybe needed to have an asynchronous service here.*/
//    public function Currency()
//    {
//        $this->currencyArray = array();
//        $XML = simplexml_load_file("http://www.ecb.europa.eu/stats/eurofxref/eurofxref-hist.xml");
//        foreach ($XML->Cube->Cube->Cube as $_rate)
//        {
//            array_push($this->currencyArray, array($_rate["currency"], $_rate["rate"]));
//        }
//    }
//
//    /**
//     * @param $initialCurrency : the first currency that we want to convert
//     * @param $resultingCurrency : the resulting currency
//     *
//     * e.g. (USD to CAD)
//     * @return float:
//     * @throws Exception: Wrong argument exception
//     */
//    public function getCurrencyBalance($initialCurrency, $resultingCurrency)
//    {
//        //case-sensitive comparison
//        if (in_array($initialCurrency, CurrencyEnum::currencyEnumArray) && in_array($resultingCurrency, CurrencyEnum::currencyEnumArray))
//        {
//            for ($i = 0; $i < sizeof($this->currencyArray); $i++)
//            {
//                if ($initialCurrency == $this->currencyArray[$i][0])
//                {
//                    $initialRate = $this->currencyArray[$i][1];
//                }
//                if ($resultingCurrency == $this->currencyArray[$i][0])
//                {
//                    $resultingRate = $this->currencyArray[$i][1];
//                }
//            }
//            $result  = (floatval($initialRate) / floatval($resultingRate));
//
//            return  $result;
//        }
//        else throw new Exception();
//    }
//
//}
//
//abstract class CurrencyEnum
//{
//    const USD = "USD";
//    const JPY = "JPY";
//    const BGN = "BGN";
//    const CZK = "CZK";
//    const DKK = "DKK";
//    const GBP = "GBP";
//    const HUF = "HUF";
//    const PLN = "PLN";
//    const RON = "RON";
//    const SEK = "SEK";
//    const CHF = "CHF";
//    const NOK = "NOK";
//    const HRK = "HRK";
//    const RUB = "RUB";
//    const Turkish_TRY = "TRY";
//    const AUD = "AUD";
//    const BRL = "BRL";
//    const CAD = "CAD";
//    const CNY = "CNY";
//    const HKD = "HKD";
//    const IDR = "IDR";
//    const ILS = "ILS";
//    const INR = "INR";
//    const KRW = "KRW";
//    const MXN = "MXN";
//    const MYR = "MYR";
//    const NZD = "NZD";
//    const PHP = "PHP";
//    const SGD = "SGD";
//    const THB = "THB";
//    const ZAR = "ZAR";
//
//    const currencyEnumArray = array(CurrencyEnum::USD, CurrencyEnum::JPY, CurrencyEnum::BGN, CurrencyEnum::CZK, CurrencyEnum::DKK, CurrencyEnum::GBP,
//        CurrencyEnum::HUF, CurrencyEnum::PLN, CurrencyEnum::RON, CurrencyEnum::SEK, CurrencyEnum::CHF, CurrencyEnum::NOK, CurrencyEnum::HRK,
//        CurrencyEnum::RUB, CurrencyEnum::Turkish_TRY, CurrencyEnum::AUD, CurrencyEnum::BRL, CurrencyEnum::CAD, CurrencyEnum::CNY,
//        CurrencyEnum::HKD, CurrencyEnum::IDR, CurrencyEnum::ILS, CurrencyEnum::INR, CurrencyEnum::KRW, CurrencyEnum::MXN, CurrencyEnum::MYR,
//        CurrencyEnum::NZD, CurrencyEnum::PHP, CurrencyEnum::SGD, CurrencyEnum::THB, CurrencyEnum::ZAR);
//
}
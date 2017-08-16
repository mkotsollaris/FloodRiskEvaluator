<?php
/** @Author: Menelaos Kotsollaris
 * menelaos@mkotsollaris.com
 * All rights reserved ©
 */
/**
 * A container for the given URL from the user.
 */
require_once("SubCoreParameter.php");
require_once("CoreParameter.php");

abstract class AcceptableRequestUtilities
{
    public function AcceptableRequestUtilities()
    {
    }


    /**
     * Checks if the given pair (key,value) is right (in the appropriate range of values)
     *
     * @param $key   : the given key
     * @param $value : the key's value
     *
     * @return boolean: returns true or throws exception
     * @throws Exception:
     */
    public static function isAcceptableSimpleValue($key, $value)
    {
        if (strcasecmp($key, AcceptableURLParameters::REQUEST) == 0)
        {
            if ((strcasecmp($value, AcceptableURLParameters::GETCAPABILITIES) == 0 ||
                strcasecmp($value, AcceptableURLParameters::GETAGGREGATIONDAMAGE) == 0 ||
                strcasecmp($value, AcceptableURLParameters::GETDAMAGE) == 0)
            )
                return true;
            else throw new Exception("Wrong Request Value: $value");
        }
        elseif (strcasecmp($key, AcceptableURLParameters::ID) == 0)
        {
            if ($value < 0) throw new Exception("Out of Range for given key: $key and value: " . $value);
            else return true;
        }
        elseif (strcasecmp($key, AcceptableURLParameters::BC) == 0)
        {
            if ($value > 0) return true;
            else throw new Exception("Out of Range for given key: $key and value: " . $value);
        }
        elseif (strcasecmp($key, AcceptableURLParameters::BO) == 0)
        {
            if (BuildingOccupancy::isValid($value))
                return true;
            else throw new Exception("Out of Range for given key: $key and value: " . $value);
        }
        elseif (strcasecmp($key, AcceptableURLParameters::FT) == 0)
        {
            if ($value == 0 || $value == 1 || $value == 2 || $value == 3 || $value == 4
                || $value == 5 || $value == 6 || $value == 7 || $value == 8
            ) return true;
            else throw new Exception("Out of Range for given key: $key and value: " . $value);
        }
        elseif (strcasecmp($key, AcceptableURLParameters::YB) == 0)
        {
            if ($value >= 1800 && $value <= date("Y"))
                return true;
            else throw new Exception("Out of Range for given key: $key and value: " . $value);
        }
        elseif (strcasecmp($key, AcceptableURLParameters::ST) == 0)
        {
            if ($value == 0 || $value == 1 || $value == 2 || $value == 3 || strcasecmp($value, "S"))
                return true;
            else throw new Exception("Out of Range for given key: $key and value: " . $value);
        }
        elseif (strcasecmp($key, AcceptableURLParameters::BA) == 0)
        {
            if ($value == 0 || $value == 1 || $value == 2)
                return true;
            else throw new Exception("Out of Range for given key: $key and value: " . $value);
        }
        elseif (strcasecmp($key, AcceptableURLParameters::GA) == 0)
        {
            if ($value == 0 || $value == 1 || $value == 2 || $value == 3 || $value == 4)
                return true;
            else throw new Exception("Out of Range for given key: $key and value: " . $value);
        }
        elseif (strcasecmp($key, AcceptableURLParameters::WD) == 0)
        {
            if ($value >= 0 && $value <= 23)
                return true;
            else throw new Exception("Out of Range for given key: $key and value: " . $value);
        }
        elseif (strcasecmp($key, AcceptableURLParameters::WP) == 0)
        {
            if ($value >= 0 && $value <= 100)
            {
                return true;
            }
            else throw new Exception("Out of Range for given key: $key and value: " . $value);
        }
        elseif (strcasecmp($key, AcceptableURLParameters::BQ) == 0)
        {
            if (BuildingQuality::isValid($value))
                return true;
            else throw new Exception("Out of Range for given key: $key and value: " . $value);
        }
        elseif (strcasecmp($key, AcceptableURLParameters::BV) == 0)
        {
            if ($value > 0 || $value == null)
                return true;
            else throw new Exception("Out of Range for given key: $key and value: " . $value);
        }
        elseif (strcasecmp($key, AcceptableURLParameters::DC) == 0)
        {
            if ($value > 100 && $value < 999) return true;
            else throw new Exception("Out of Range for given key: $key and value: " . $value);
        }
        else if (strcasecmp($key, AcceptableURLParameters::FORMAT) == 0)
        {
            if (strcasecmp($value, AcceptableURLParameters::XML) == 0 ||
                strcasecmp($value, AcceptableURLParameters::JSON) == 0
            ) return true;
            else throw new Exception("Wrong format for the key: $key and value: " . $value);
        }
        throw new Exception("Unknown key:" . $key . ", with value:" . $value);
    }

    /**
     * Same with the isAcceptableSimpleValue but does not accept the "WP" and "WD" option.
     *
     * @param $key   : the given key
     * @param $value : the key's value
     *
     * @return bool
     * @throws Exception
     */
    private static function isAcceptableAggrValue($key, $value)
    {
        return (self::isAcceptableSimpleValue($key, $value) &&
            strcasecmp($key, AcceptableURLParameters::WP) != 0 &&
            strcasecmp($key, AcceptableURLParameters::WD) != 0);
    }

    public static function parseRequest($str)
    {
        $coreParameterObject = new CoreParameter();
        /** subCore contains Optional parameters too.. */
        $subCoreParametersArray = array();
        # split on outer delimiter
        $pairs = explode('&', $str);
        # loop through each pair
        foreach ($pairs as $i)
        {
            if (!isset($i)) continue;
            # split into $key and value
            $explodeArray = explode('=', $i, 2);
            if (sizeof($explodeArray) <= 1)
            {
                continue;
            }
            $key = $explodeArray[0];
            $value = $explodeArray[1];
            if (strcasecmp($key, AcceptableURLParameters::REQUEST) == 0) return $value;
            throw new Exception("Request: $key = \"$value\" is not acceptable.");
        }
    }

    /**
     * @param $URLString : the user-given URL
     *
     * @return AcceptableRequestContainer
     * @throws Exception
     */
    public static function parseAggrURL($URLString)
    {
        $coreParameterObject = new CoreParameter();
        /** subCore contains Optional parameters too.. */
        //$aggregationParameterObject = new AggregateParameter();
        $wpArray = array();
        $wdArray = array();
        $subCoreParametersArray = array();
        # split on outer delimiter
        $pairs = explode('&', $URLString);
        # loop through each pair
        foreach ($pairs as $i)
        {
            if (!isset($i)) continue;
            # split into $key and value
            $explodeArray = explode('=', $i, 2);
            if (sizeof($explodeArray) <= 1)
            {
                continue;
            }
            $key = $explodeArray[0];
            $value = $explodeArray[1];
            if (strcasecmp($key, AcceptableURLParameters::WP) == 0)
            {
                array_push($wpArray, $value);
            }
            else if (strcasecmp($key, AcceptableURLParameters::WD) == 0)
            {
                array_push($wdArray, $value);
            }
            if (strcasecmp($key, AcceptableURLParameters::REQUEST) == 0 ||
                strcasecmp($key, AcceptableURLParameters::GETAGGREGATIONDAMAGE) == 0 ||
                strcasecmp($key, AcceptableURLParameters::FORMAT) == 0
            )
            {
                if (AcceptableRequestUtilities::isAcceptableAggrValue($key, $value))
                {
                    $coreParameterObject->updateKey($key, $value);
                    continue;
                }
            }
            /**
             * Everytime you have an ID create new AcceptableRequest object.
             * We also need to check if the previous object is an an accepted request by itself
             */
            if (AcceptableRequestUtilities::isAcceptableAggrValue($key, $value))
            {
                if (strcasecmp($key, AcceptableURLParameters::ID) == 0)
                {
                    $subCoreObject = new SubCoreParameter();
                    $subCoreObject->updateKey($key, $value);
                    array_push($subCoreParametersArray, $subCoreObject);
                }
                else
                {
                    $wantedObject = end($subCoreParametersArray);
                    $wantedObject->updateKey($key, $value);
                }
            }
        }
        if (sizeof($wdArray) != sizeof($wpArray)) throw new Exception("Number of given WP (" . sizeof($wpArray) .
            ") is not equal with the number of given WD (" . sizeof($wdArray) . ")");
        $totalWPCounter = 0;
        for ($i = 0; $i < sizeof($wpArray); $i++)
        {
            $totalWPCounter += $wpArray[$i];
        }
        if ($totalWPCounter > 100
        ) throw new Exception("The total number of Water percentage must sum to 100. Given value: $totalWPCounter");
        $appendedSubCoreArray = array();
        for ($i = 0; $i < sizeof($subCoreParametersArray); $i++)
        {
            for ($j = 0; $j < sizeof($wdArray); $j++)
            {

                $newSubRequest = SubCoreParameter::copy($subCoreParametersArray[$i]);
                $newSubRequest->setWD($wdArray[$j]);
                $newSubRequest->setWP($wpArray[$j]);
                array_push($appendedSubCoreArray, $newSubRequest);
            }
        }
        //echo sizeof($appendedSubCoreArray);
        return new AcceptableRequestContainer($coreParameterObject, $appendedSubCoreArray);
    }

    /**
     * Checks if the given string is appropriate and stores the key,value variables in a AcceptableRequestContainer
     * object.
     *
     * @param $str : the user-given URL
     *
     * @return array: An AcceptableRequestContainer object
     * @throws Exception :
     */
    public static function parseURL($str)
    {
        $coreParameterObject = new CoreParameter();
        /** subCore contains Optional parameters too.. */
        $subCoreParametersArray = array();
        # split on outer delimiter
        $pairs = explode('&', $str);
        # loop through each pair
        foreach ($pairs as $i)
        {
            if (!isset($i)) continue;
            # split into $key and value
            $explodeArray = explode('=', $i, 2);
            if (sizeof($explodeArray) <= 1)
            {
                continue;
            }
            $key = $explodeArray[0];
            $value = $explodeArray[1];
            if (strcasecmp($key, AcceptableURLParameters::REQUEST) == 0 ||
                strcasecmp($key, AcceptableURLParameters::GETAGGREGATIONDAMAGE) == 0 ||
                strcasecmp($key, AcceptableURLParameters::FORMAT) == 0
            )
            {
                if (AcceptableRequestUtilities::isAcceptableSimpleValue($key, $value))
                {
                    $coreParameterObject->updateKey($key, $value);
                }
            }
            /**
             * Everytime you have an ID create new AcceptableRequest object.
             * We also need to check if the previous object is an an accepted request by itself
             */
            else if (strcasecmp($key, AcceptableURLParameters::ID) == 0)
            {
                if (AcceptableRequestUtilities::isAcceptableSimpleValue($key, $value))
                {
                    $subCoreObject = new SubCoreParameter();
                    $subCoreObject->updateKey($key, $value);
                    array_push($subCoreParametersArray, $subCoreObject);
                }
            }
            else
            {
                if (AcceptableRequestUtilities::isAcceptableSimpleValue($key, $value))
                {
                    $wantedObject = end($subCoreParametersArray);
                    $wantedObject->updateKey($key, $value);
                }
            }
        }
        if (strcasecmp($coreParameterObject->getRequest(), AcceptableURLParameters::GETDAMAGE) == 0
            && sizeof($subCoreParametersArray) != 1
        )
        {
            throw new Exception("Size != 1 for the GETDAMAGE Request.");
        }

        for ($i = 0; $i < sizeof($subCoreParametersArray); $i++)
        {
            if (((!$subCoreParametersArray[$i]->isValidSubCoreParameter()))
            ) throw new Exception("Not Acceptable Request: " . $i);
        }
        return new AcceptableRequestContainer($coreParameterObject, $subCoreParametersArray);
    }


}

abstract class URLInput
{
    const KEY = "KEY";
    const VALUE = "TYPE";
}

/**
 * Used for parsing the given URL from the user.
 */
class AcceptableURLParameters
{
    /**Request*/
    const REQUEST = "Request";
    /** GetCapabilities Request*/
    const GETCAPABILITIES = "GetCapabilities";
    /** GetDamages Request*/
    const GETDAMAGE = "GetDamage";
    /** Get Aggregation of Damages Request*/
    const GETAGGREGATIONDAMAGE = "GetAggDamage";
    /**Building Identifier*/
    const ID = "ID";
    /**Building Count*/
    const BC = "BC";
    /**Building Occupancy*/
    const BO = "BO";
    /**Foundation Type*/
    const FT = "FT";
    /**Year Built*/
    const YB = "YB";
    /**Stories*/
    const ST = "ST";
    /**Building Count*/
    const BA = "BA";
    /**Garage*/
    const GA = "GA";
    /**Water Depth (feet)*/
    const WD = "WD";
    /**Water Percentage*/
    const WP = "WP";
    /**Building Quality (Optional)*/
    const BQ = "BQ";
    /**Building Value (Optional)*/
    const BV = "BV";
    /**Damage Curve Number (Optional) - 3 Digit Number*/
    const DC = "DC";
    const FORMAT = "FORMAT";
    const XML = "XML";
    const JSON = "JSON";
}
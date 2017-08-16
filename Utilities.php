<?php

/**
 * @Author: Menelaos Kotsollaris
 * menelaos@mkotsollaris.com
 * All rights reserved ©
 */
abstract class Utilities
{
    /**
     * @param $yearBuild : The year when the building was built
     *
     * @return string: the subtraction between current and yearBuilt
     */
    public static function ageSubtraction($yearBuild)
    {
        return date("Y") - $yearBuild;
    }

    public static function waterFoundationSubtraction($foundationType, $waterDepth)
    {
        $wantedValue = $waterDepth - $foundationType;
        if($wantedValue<-4) return -4;
        else if($wantedValue>23) return 23;
        return $wantedValue;
    }

    /**
     * Computes the building's evaluation
     *
     * @param $squareFootage         : The Square Footage (Table 1)
     * @param $basementExtraCost     : The finished or unfinished cost (in case of having a basement) (Table 2)
     * @param $garageCost            : The garage cost (table 3)
     * @param $ageDepreciationFactor : The Age Depreciation Factor. The format of the receiving number should be 1.00 +
     *                               [Table 5 value]
     * @param $bc                    : building Count
     *
     * @param $st                    : The number of stories
     *
     * @return number : Building's Evaluation
     *
     */
    public static function calculateValuation($squareFootage, $basementExtraCost, $garageCost, $ageDepreciationFactor,
                                              $bc, $st)
    {
        $stNumber = 1;
        if ($st == 2) $stNumber = 1.5;
        else if ($st == 3) $stNumber = 1.75;
        else if (strcasecmp($st, "S") == 0) $stNumber = 1.5;
        //echo $stNumber;
        return
            (round($bc * (($squareFootage * $basementExtraCost) + $garageCost) * $ageDepreciationFactor * $stNumber));
    }

    /**
     * Complexity (cause of explode): O(N)
     * Compute the age Depreciation Factor, based on the age.csv file.
     *
     * @param $subtractedAge                : the subtracted Age
     * @param $buildingOccupancyIndexNumber : The building Occupancy Index Number
     *
     * @return string: the Depreciation Factor (Table 5)
     */
    public static function getAgeDepreciationFactor($subtractedAge, $buildingOccupancyIndexNumber)
    {
        $file = new SplFileObject(__DIR__ . '/data_files/age.csv');
        $file->seek($subtractedAge + 1); // seek to the wanted line
        $wantedLineArray = explode(",", $file->current());
        $wantedNumber = $wantedLineArray[$buildingOccupancyIndexNumber];
        return ($wantedNumber / 10000) + 1;
    }

    /**
     * FIXME: File could be serialized or even deleted to parts, since at this moment only 105-112 indexes are being
     * FIXME: used.
     *
     * @param $curveDamageNumber          : The curve Damage Number (first column of the Table 6)
     * @param $waterFoundationSubtraction : The water and foundation type subtraction
     *
     * @return number: the damage of the structure (percentage)
     * @throws Exception: Invalid Input Exception
     */
    public static function calculateStructureDmgPercentage($curveDamageNumber, $waterFoundationSubtraction, $wp)
    {
        $floorSubtraction = floor($waterFoundationSubtraction);//the floor
        $fraction = $waterFoundationSubtraction - $floorSubtraction;//the decimal part
        $index1 = floor($waterFoundationSubtraction);
        $index2 = $index1 + 1;
        $waterFoundationSubtraction = round($waterFoundationSubtraction);
        $file = new SplFileObject('data_files/structure_damage_curve_table_6.csv');
        $i = 0;
        //iterating lines
        while (true)
        {
            $file->seek($i + 1);
            $currLine = $file->current();
            $wantedString = Utilities::extractStringFromLine($currLine, ",");
            try
            {
                if ($wantedString == $curveDamageNumber)
                {
                    $wantedLineArray = explode(",", $file->current());
                    /*echo (($wantedLineArray[(int)$index1 + 5]) * (1 - $fraction)) . "\n";
                    echo (($wantedLineArray[(int)$index2 + 5]) * ($fraction)) . "\n";*/
                    $wantedValue = ((($wantedLineArray[(int)$index1 + 5]) * (1 - $fraction) +
                        ($wantedLineArray[(int)$index2 + 5]) * ($fraction))*$wp/100);
                    //if ($fraction != 0) $wantedValue /= 2;
                    return $wantedValue;
                }
                else
                {
                    $i++;
                    continue;
                }
            }
            catch (Exception $e)
            {
                Utilities::handleError();
            }
        }
        throw new Exception("Invalid Input. curveDamageNumber=" . $curveDamageNumber . " waterFoundationSubtraction="
            . $waterFoundationSubtraction);
    }

    /**
     * Checks the Table 7 based on the following parameters:
     *
     * @param $curveDamageNumber          : The curve damage
     * @param $waterFoundationSubtraction : The water Foundation subtraction number
     *
     * @param $wp                         : the water percentage
     *
     * @return float : The Content Percentage
     * @throws Exception
     */
    public static function calculateContentPercentage
    ($curveDamageNumber, $waterFoundationSubtraction, $wp)
    {
        $floorSubtraction = floor($waterFoundationSubtraction);//the floor
        $fraction = $waterFoundationSubtraction - $floorSubtraction;//the decimal part
        $index1 = floor($waterFoundationSubtraction);
        $index2 = $index1 + 1;
        $waterFoundationSubtraction = round($waterFoundationSubtraction);
        $file = new SplFileObject('data_files/content_damage_function_table_7.csv');
        $i = 0;
        //iterating lines
        while (true)
        {
            $file->seek($i + 1);
            $currLine = $file->current();
            $wantedString = Utilities::extractStringFromLine($currLine, ",");
            try
            {
                if ($wantedString == $curveDamageNumber)
                {
                    $wantedLineArray = explode(",", $file->current());
                    /*echo "Content: \n";
                    echo (($wantedLineArray[(int)$index1 + 5]) * (1 - $fraction)) . "\n";
                    echo (($wantedLineArray[(int)$index2 + 5]) * ($fraction)) . "\n";*/
                    $wantedValue = (($wantedLineArray[(int)$index1 + 5]) * (1 - $fraction) +
                        ($wantedLineArray[(int)$index2 + 5]) * ($fraction))*$wp/100;
                    //if ($fraction != 0) $wantedValue /= 2;
                    return $wantedValue;
                }
                else
                {
                    $i++;
                    continue;
                }
            }
            catch (Exception $e)
            {
                Utilities::handleError();
            }
        }
        throw new Exception("Invalid Input. curveDamageNumber=" .
            $curveDamageNumber . " waterFoundationSubtraction=" . $waterFoundationSubtraction);
    }

    /**
     * Calculate Damage Percentage
     *
     * @param $curveDamageNumber          : the curve damage number (e.g: 105)
     * @param $waterFoundationSubtraction : Water Depth - Foundation Type
     *
     * @param $wp                         : the water percentage
     *
     * @return float
     * @throws Exception
     */
    public static function calculateDamagePercentage($curveDamageNumber, $waterFoundationSubtraction, $wp)
    {
        $file = new SplFileObject('data_files/content_damage_function_table_7.csv');
        $i = 0;
        //iterating lines
        while (true)
        {
            $file->seek($i + 1);
            $currLine = $file->current();
            $wantedString = Utilities::extractStringFromLine($currLine, ",");
            try
            {
                if ($wantedString == $curveDamageNumber)
                {
                    $wantedLineArray = explode(",", $file->current());
                    return ($wantedLineArray[$waterFoundationSubtraction + 5] * $wp / 100);
                }
                else
                {
                    $i++;
                    continue;
                }
            }
            catch (Exception $e)
            {
                Utilities::handleError();
            }
        }
        throw new Exception("Invalid Input. curveDamageNumber=" .
            $curveDamageNumber . " waterFoundationSubtraction=" . $waterFoundationSubtraction);
    }

    /**
     * Complexity O(n) But n=very small (numerical) number so O(1).
     * It parses the line in order to read it until the delimiter.
     *
     * @param $line      : The line.
     * @param $delimiter : The delimiter of the line where the parsing ends
     *
     * @return string: The wanted String
     * @throws Exception: The wanted value was not found.
     */
    public static function extractStringFromLine($line, $delimiter)
    {
        $wantedString = "";
        for ($i = 0; $i < strlen($line) - 1; $i++)
        {
            $currentChar = $line[$i];
            if ($currentChar === $delimiter) break;
            $wantedString .= $currentChar;
        }
        if ($wantedString == "") throw new Exception("Value not found");
        return $wantedString;
    }

    public static function handleError()
    {
        echo 'Wrong Parameters (Handle Error)';
    }

    public static function calculateStructureDmgMoney($buildingValue, $structureDmgPercentage, $waterPercentage)
    {
        return $buildingValue * $structureDmgPercentage * $waterPercentage;
    }

    /**
     * @param $coreParameters         : Contains a CoreParameter object at each position
     * @param $subCoreParametersArray : Contains a SubCoreParameter at each position
     *                                FIXME possibly: in case of $coreParameters more that just "request"
     */
    public static function makeCalculations($coreParameters, $subCoreParametersArray)
    {
        require_once "AcceptableRequestContainer.php";
        $request = $coreParameters->getRequest();
        $subCoreRequestArray = $subCoreParametersArray->getSubCoreParametersArray();
        if ($request == AcceptableURLParameters::GETCAPABILITIES)
        {
            //TODO SHOW CAPABILITIES..
        }
        else if ($request == AcceptableURLParameters::GETDAMAGE)
        {
            for ($i = 0; $i < sizeof($subCoreRequestArray); $i++)
            {
                /**Building ID*/
                $buildingID = $subCoreRequestArray[$i]->getID();
                /**Building Count Input TODO include in computations..*/
                $buildingCount = $subCoreRequestArray[$i]->getBC();
                /**Building Occupancy*/
                $buildingOccupancyType = $subCoreRequestArray[$i]->getBO();
                /**Foundation Type Input*/
                $foundationType = $subCoreRequestArray[$i]->getFT();
                /**Year Built Input*/
                $yearBuilt = $subCoreRequestArray[$i]->getYB();
                /**Class of Stories*/
                $storyClass = $subCoreRequestArray[$i]->getST();
                /**Basement value Input*/
                $basementValue = $subCoreRequestArray[$i]->getBA();
                /**Garage Input*/
                $garageInput = $subCoreRequestArray[$i]->getGA();
                /**Water Depth Input*/
                $waterDepth = $subCoreRequestArray[$i]->getWD();
                /**Water Percentage*/
                $waterPercentage = $subCoreRequestArray[$i]->getWP();
                /**Building Quality Input*/
                $buildingQuality = $subCoreRequestArray[$i]->getBQ();//optional
                /**Building Evaluation*/
                $buildingValuation = $subCoreRequestArray[$i]->getBV();//Optional
                /**Damage Curve*/
                $curveDamageNumber = $subCoreRequestArray[$i]->getDC();//Optional
                $buildingOccupancy = new BuildingOccupancy($buildingOccupancyType);
                $squareFootage = $buildingOccupancy->getSquareFootage();
                /**Means Construction class (building quality arithmetic value)*/
                $buildingArithmeticValue = BuildingQuality::getArithmeticValue($buildingQuality);
                $basementStatusEnum = Basement::getBasementString($basementValue);
                /**Curve Damage ID generation*/
                $curveDamageID = DamageCurve::getDamageCurveID($buildingOccupancy, $storyClass, $basementValue);
                $curveDamageNumber = DamageCurve::getStructureNumber($curveDamageID, $buildingOccupancy->getType());
                $averageBasementCost = Basement::calculateRES1Basement($curveDamageNumber
                    , $buildingArithmeticValue, $storyClass, WantedBasementTypeEnum::AVERAGE);
                $basementExtraCost = ($basementStatusEnum == Basement::NONE) ? 0 : ($basementStatusEnum ==
                    Basement::YES_FINISHED) ?
                    Basement::calculateRES1Basement($curveDamageNumber, $buildingArithmeticValue, $storyClass,
                        WantedBasementTypeEnum::FINISHED) :
                    Basement::calculateRES1Basement($curveDamageNumber, $buildingArithmeticValue, $storyClass,
                        WantedBasementTypeEnum::UNFINISHED);
                $garageCost = Garage::calculateCost($garageInput, $buildingQuality);
                $subtractedAge = Utilities::ageSubtraction($yearBuilt);
                $ageDepreciationFactor = Utilities::getAgeDepreciationFactor($subtractedAge,
                    $buildingOccupancy->getColumnIndex());
                $buildingValuation = Utilities::calculateValuation($squareFootage, $averageBasementCost,
                    $basementExtraCost, $garageCost, $ageDepreciationFactor, $storyClass);
                $foundation = new Foundation($foundationType);
                $waterFoundationSubtraction = Utilities::waterFoundationSubtraction($foundation, $waterDepth);
                $structureDmgPercentage = Utilities::calculateStructureDmgPercentage($curveDamageNumber,
                    $waterFoundationSubtraction);
                $structureDmgMoney = Utilities::calculateStructureDmgMoney($buildingValuation, $structureDmgPercentage,
                    $waterPercentage);
                $buildingDamage = $buildingValuation * $structureDmgPercentage;
                $contentAndDamagePercentage = Utilities::calculateContentAndDamagePercentage($curveDamageNumber,
                    $waterDepth, $waterFoundationSubtraction);
            }
        }
    }
}
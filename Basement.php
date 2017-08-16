<?php
/** @Author: Menelaos Kotsollaris
 * menelaos@mkotsollaris.com
 * All rights reserved ©
 */
//fixme no need for the constants.. use only numbers..
class Basement
{
    const NONE = "NONE";
    const YES_UNFINISHED = "YES_UNFINISHED";
    const YES_FINISHED = "YES_FINISHED";

    public $averageCost;
    public $finishedCost;
    public $unFinishedCost;

    public function Basement()
    {

    }
    
    public function getAverageCost()
    {
        return $this->averageCost;
    }

    public function getFinishedCost()
    {
        return $this->finishedCost;
    }

    public function getUnFinishedCost()
    {
        return $this->unFinishedCost;
    }

    public function getExtraCost($value)
    {
        if ($value == 0) return 0;
        if ($value == 1) return $this->unFinishedCost;
        if ($value == 2) return $this->finishedCost;
        throw new Exception("Invalid Input: $value");
    }

    /**
     * @param $basementValue : the basement's arithmetic value
     * @return string: the appropriate String depending on the Input
     * @throws Exception: Invalid Number
     */
    public static function getBasementString($basementValue)
    {
        switch ($basementValue)
        {
            case 0:
                return Basement::NONE;
            case 1:
                return Basement::YES_UNFINISHED;
            case 2:
                return Basement::YES_FINISHED;
        }
        throw new Exception("Invalid Number");
    }

    /**
     * FIXME Have to return all the cases; Probably a object basment hilding ALL the costs...FOR RES1 ONLY
     * See Table 2
     * @param $dmgCurve : DMGCurve
     * @param $buildingQualityNumber : Building Quality Number
     * @param $storyClass : HeightClass
     * @return number : Basement Object
     * @throws Exception
     */
    public static function calculateRES1Basement($dmgCurve, $buildingQualityNumber, $storyClass)
    {
        //echo "combination: $dmgCurve + $buildingQualityNumber + $storyClass";
        $flag = false;
        $wantedBasement = new Basement();
        if (($dmgCurve == 105 || 106) && $buildingQualityNumber == 1 && $storyClass == 1)
        {

            $wantedBasement->averageCost = 65.91;
            $wantedBasement->finishedCost = 19.3;
            $wantedBasement->unFinishedCost = 7.1;
            $flag = true;
        }
        else if (($dmgCurve == 107 || 108) && $buildingQualityNumber == 1 && $storyClass == 2)
        {
            $flag = true;
            $wantedBasement->averageCost = 70.13;
            $wantedBasement->finishedCost = 11.1;
            $wantedBasement->unFinishedCost = 7.1;
        }
        else if (($dmgCurve == 109 || 110) && $buildingQualityNumber == 1 && $storyClass == 3)
        {
            $flag = true;
            $wantedBasement->averageCost = 70.13;
            $wantedBasement->finishedCost = 11.1;
            $wantedBasement->unFinishedCost = 4.65;
        }
        else if (($dmgCurve == 111 || 112) && $buildingQualityNumber == 1 && $storyClass == "S")
        {
            $flag = true;
            $wantedBasement->averageCost = 64.46;
            $wantedBasement->finishedCost = 13.9;
            $wantedBasement->unFinishedCost = 5.5;
        }
        else if (($dmgCurve == 105 || 106) && $buildingQualityNumber == 2 && $storyClass == 1)
        {
            $flag = true;
            $wantedBasement->averageCost = 92.84;
            $wantedBasement->finishedCost = 24.05;
            $wantedBasement->unFinishedCost = 8.45;
        }
        else if (($dmgCurve == 107 || 108) && $buildingQualityNumber == 2 && $storyClass == 2)
        {
            $flag = true;
            $wantedBasement->averageCost = 90.15;
            $wantedBasement->finishedCost = 24.05;
            $wantedBasement->unFinishedCost = 8.45;
        }
        else if (($dmgCurve == 109 || 110) && $buildingQualityNumber == 2 && $storyClass == 3)
        {
            $flag = true;
            $wantedBasement->averageCost = 94.49;
            $wantedBasement->finishedCost = 12.35;
            $wantedBasement->unFinishedCost = 4.25;
        }
        else if (($dmgCurve == 111 || 112) && $buildingQualityNumber == 2 && $storyClass == "S")
        {
            $flag = true;
            $wantedBasement->averageCost = 84.96;
            $wantedBasement->finishedCost = 18.45;
            $wantedBasement->unFinishedCost = 6.5;
        }
        else if (($dmgCurve == 105 || 106) && $buildingQualityNumber == 3 && $storyClass == 1)
        {
            $flag = true;
            $wantedBasement->averageCost = 114.91;
            $wantedBasement->finishedCost = 39.55;
            $wantedBasement->unFinishedCost = 15.45;
        }
        else if (($dmgCurve == 107 || 108) && $buildingQualityNumber == 3 && $storyClass == 2)
        {
            $flag = true;
            $wantedBasement->averageCost = 112.91;
            $wantedBasement->finishedCost = 22.9;
            $wantedBasement->unFinishedCost = 9.2;
        }
        else if (($dmgCurve == 109 || 110) && $buildingQualityNumber == 3 && $storyClass == 3)
        {
            $flag = true;
            $wantedBasement->averageCost = 116.99;
            $wantedBasement->finishedCost = 16.8;
            $wantedBasement->unFinishedCost = 6.85;
        }
        else if (($dmgCurve == 111 || 112) && $buildingQualityNumber == 3 && $storyClass == "S")
        {
            $wantedBasement->averageCost = 105.25;
            $wantedBasement->finishedCost = 28.55;
            $wantedBasement->unFinishedCost = 11.35;
        }
        else if (($dmgCurve == 105 || 106) && $buildingQualityNumber == 4 && $storyClass == 1)
        {
            $flag = true;
            $wantedBasement->averageCost = 139.79;
            $wantedBasement->finishedCost = 43.75;
            $wantedBasement->unFinishedCost = 13.2;
        }
        else if (($dmgCurve == 107 || 108) && $buildingQualityNumber == 4 && $storyClass == 2)
        {
            $flag = true;
            $wantedBasement->averageCost = 133.09;
            $wantedBasement->finishedCost = 25.75;
            $wantedBasement->unFinishedCost = 10.1;
        }
        else if (($dmgCurve == 109 || 110) && $buildingQualityNumber == 4 && $storyClass == 3)
        {
            $flag = true;
            $wantedBasement->averageCost = 137.08;
            $wantedBasement->finishedCost = 19;
            $wantedBasement->unFinishedCost = 7.6;
        }
        else if (($dmgCurve == 111 || 112) && $buildingQualityNumber == 4 && $storyClass == "S")
        {
            $flag = true;
            $wantedBasement->averageCost = 124.81;
            $wantedBasement->finishedCost = 31.9;
            $wantedBasement->unFinishedCost = 12.45;
        }
        if ($flag == false) throw new Exception("Invalid Input: $dmgCurve, $buildingQualityNumber, $storyClass");
        else return $wantedBasement;
    }
}

abstract class WantedBasementTypeEnum
{
    const AVERAGE = "AVERAGE";
    const FINISHED = "FINISHED";
    const UNFINISHED = "UNFINISHED";
}
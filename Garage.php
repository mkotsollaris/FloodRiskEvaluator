<?php

/** @Author: Menelaos Kotsollaris
 * menelaos@mkotsollaris.com
 * All rights reserved ©
 */
abstract class Garage
{
    /**
     * @param $garageInput : Garage User Input
     * @param $buildingQuality : Building Quality Input
     * @return number: Resulting number according to table 3
     * @throws Exception:
     */
    public static function calculateCost($garageInput, $buildingQuality)
    {
        if ($garageInput == 0 || $garageInput == 4) return 0;
        if ($garageInput == 1)
        {
            if (strcasecmp(BuildingQuality::AVERAGE, $buildingQuality) == 0)
                return 13120;
            elseif (strcasecmp(BuildingQuality::CUSTOM, $buildingQuality) == 0)
                return 15030;
            elseif (strcasecmp(BuildingQuality::ECONOMY, $buildingQuality) == 0)
                return 12600;
            elseif (strcasecmp(BuildingQuality::LUXURY, $buildingQuality) == 0)
                return 17320;
        }
        else if ($garageInput == 2)
        {

            if (strcasecmp(BuildingQuality::AVERAGE, $buildingQuality) == 0)
                return 20460;
            elseif (strcasecmp(BuildingQuality::CUSTOM, $buildingQuality) == 0)
                return 23850;
            elseif (strcasecmp(BuildingQuality::ECONOMY, $buildingQuality) == 0)
                return 19780;
            elseif (strcasecmp(BuildingQuality::LUXURY, $buildingQuality) == 0)
                return 27700;
        }
        else if ($garageInput == 3)
        {

            if (strcasecmp(BuildingQuality::AVERAGE, $buildingQuality) == 0)
                return 27580;
            elseif (strcasecmp(BuildingQuality::CUSTOM, $buildingQuality) == 0)
                return 32380;
            elseif (strcasecmp(BuildingQuality::ECONOMY, $buildingQuality) == 0)
                return 26750;
            elseif (strcasecmp(BuildingQuality::LUXURY, $buildingQuality) == 0)
                return 37630;

        }
        throw new Exception("Invalid Input");
    }
}
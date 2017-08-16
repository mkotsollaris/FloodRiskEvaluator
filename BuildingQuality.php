<?php
/** @Author: Menelaos Kotsollaris
 * menelaos@mkotsollaris.com
 * All rights reserved ©
 */
class BuildingQuality
{
    const AVERAGE = "AVERAGE";
    const ECONOMY = "ECONOMY";
    const CUSTOM = "CUSTOM";
    const LUXURY = "LUXURY";
    //const buildingQualityArray = array(BuildingQuality::AVERAGE, BuildingQuality::ECONOMY, BuildingQuality::CUSTOM, BuildingQuality::LUXURY);

    public static function isCorrect($value)
    {
        return (strcasecmp($value, BuildingQuality::AVERAGE) == 0 || strcasecmp($value, BuildingQuality::ECONOMY) == 0 ||
            strcasecmp($value, BuildingQuality::CUSTOM) == 0 || strcasecmp($value, BuildingQuality::LUXURY) == 0);
    }

    /**
     * @param $buildingQualityEnum : BuildingQuality
     * @return int: The arithmetic value
     * @throws Exception: Invalid Input
     */
    public static function getArithmeticValue($buildingQualityEnum)
    {

        if (strcasecmp($buildingQualityEnum, BuildingQuality::ECONOMY) == 0)
            return 1;
        elseif (strcasecmp($buildingQualityEnum, BuildingQuality::AVERAGE) == 0)
            return 2;
        elseif (strcasecmp($buildingQualityEnum, BuildingQuality::CUSTOM) == 0)
            return 3;
        elseif (strcasecmp($buildingQualityEnum, BuildingQuality::LUXURY) == 0)
            return 4;
        throw new Exception('Invalid Input: ' . $buildingQualityEnum);
    }

    public static function isValid($value)
    {
        return (strcasecmp($value, BuildingQuality::AVERAGE) == 0 || strcasecmp($value, BuildingQuality::ECONOMY) == 0 ||
            strcasecmp($value, BuildingQuality::CUSTOM) == 0 || strcasecmp($value, BuildingQuality::LUXURY) == 0);
    }
}
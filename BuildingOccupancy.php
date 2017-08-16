<?php
/** @Author: Menelaos Kotsollaris
 * menelaos@mkotsollaris.com
 * All rights reserved ©
 */
class BuildingOccupancy
{
    const AGR1 = "AGR1";
    const COM1 = "COM1";
    const COM2 = "COM2";
    const COM3 = "COM3";
    const COM4 = "COM4";
    const COM5 = "COM5";
    const COM6 = "COM6";
    const COM7 = "COM7";
    const COM8 = "COM8";
    const COM9 = "COM9";
    const COM10 = "COM10";
    const EDU1 = "EDU1";
    const EDU2 = "EDU2";
    const GOV1 = "GOV1";
    const GOV2 = "GOV2";
    const IND1 = "IND1";
    const IND2 = "IND2";
    const IND3 = "IND3";
    const IND4 = "IND4";
    const IND5 = "IND5";
    const IND6 = "IND6";
    const REL1 = "REL1";
    const RES1 = "RES1";
    const RES2 = "RES2";
    const RES3A = "RES3A";
    const RES3B = "RES3B";
    const RES3C = "RES3C";
    const RES3D = "RES3D";
    const RES3E = "RES3E";
    const RES3F = "RES3F";
    const RES4 = "RES4";
    const RES5 = "RES5";
    const RES6 = "RES6";
    public static function isValid($value)
    {
        return (strcasecmp($value, BuildingOccupancy::AGR1) == 0 || strcasecmp($value, BuildingOccupancy::COM1) == 0 ||
            strcasecmp($value, BuildingOccupancy::COM2) == 0 || strcasecmp($value, BuildingOccupancy::COM3) == 0 ||
            strcasecmp($value, BuildingOccupancy::COM4) == 0 || strcasecmp($value, BuildingOccupancy::COM5) == 0 ||
            strcasecmp($value, BuildingOccupancy::COM6) == 0 || strcasecmp($value, BuildingOccupancy::COM7) == 0 ||
            strcasecmp($value, BuildingOccupancy::COM8) == 0 || strcasecmp($value, BuildingOccupancy::COM9) == 0 ||
            strcasecmp($value, BuildingOccupancy::COM10) == 0 || strcasecmp($value, BuildingOccupancy::EDU1) == 0 ||
            strcasecmp($value, BuildingOccupancy::EDU2) == 0 || strcasecmp($value, BuildingOccupancy::GOV1) == 0 ||
            strcasecmp($value, BuildingOccupancy::GOV2) == 0 || strcasecmp($value, BuildingOccupancy::IND1) == 0 ||
            strcasecmp($value, BuildingOccupancy::IND2) == 0 || strcasecmp($value, BuildingOccupancy::IND3) == 0 ||
            strcasecmp($value, BuildingOccupancy::IND4) == 0 || strcasecmp($value, BuildingOccupancy::IND5) == 0 ||
            strcasecmp($value, BuildingOccupancy::IND6) == 0 || strcasecmp($value, BuildingOccupancy::REL1) == 0 ||
            strcasecmp($value, BuildingOccupancy::RES1) == 0 || strcasecmp($value, BuildingOccupancy::RES2) == 0 ||
            strcasecmp($value, BuildingOccupancy::RES3A) == 0 || strcasecmp($value, BuildingOccupancy::RES3B) == 0 ||
            strcasecmp($value, BuildingOccupancy::RES3C) == 0 || strcasecmp($value, BuildingOccupancy::RES3D) == 0 ||
            strcasecmp($value, BuildingOccupancy::RES3E) == 0 || strcasecmp($value, BuildingOccupancy::RES3F) == 0 ||
            strcasecmp($value, BuildingOccupancy::RES4) == 0 || strcasecmp($value, BuildingOccupancy::RES3D) == 0 ||
            strcasecmp($value, BuildingOccupancy::RES5) == 0 || strcasecmp($value, BuildingOccupancy::RES6) == 0);
    }

    /** Building Occupancy Type */
    private $type;
    private $meanCost;
    private $squareFootage;
    private $contentsPercentage;
    private $columnIndex;

    /** Constructor based on type
     *
     * @param $type : the initial type of BuildingOccupancy
     * @return BuildingOccupancy
     */
    public function BuildingOccupancy($type)
    {
        $this->type = $type;
        switch ($type)
        {
            case BuildingOccupancy::AGR1:
                $this->meanCost = 75.95;
                $this->squareFootage = 30000;
                $this->contentsPercentage = 100;
                $this->columnIndex = 17;
                break;
            case BuildingOccupancy::COM1:
                $this->meanCost = 82.63;
                $this->squareFootage = 11000;
                $this->contentsPercentage = 100;
                $this->columnIndex = 1;
                break;
            case BuildingOccupancy::COM2:
                $this->meanCost = 75.95;
                $this->squareFootage = 3000;
                $this->contentsPercentage = 100;
                $this->columnIndex = 2;
                break;
            case BuildingOccupancy::COM3:
                $this->meanCost = 102.34;
                $this->squareFootage = 10000;
                $this->contentsPercentage = 100;
                $this->columnIndex = 3;
                break;
            case BuildingOccupancy::COM4:
                $this->meanCost = 133.43;
                $this->squareFootage = 80000;
                $this->contentsPercentage = 100;
                $this->columnIndex = 4;
                break;
            case BuildingOccupancy::COM5:
                $this->meanCost = 191.53;
                $this->squareFootage = 4100;
                $this->contentsPercentage = 100;
                $this->columnIndex = 5;
                break;
            case BuildingOccupancy::COM6:
                $this->meanCost = 224.29;
                $this->squareFootage = 55000;
                $this->contentsPercentage = 100;
                $this->columnIndex = 6;
                break;
            case BuildingOccupancy::COM7:
                $this->meanCost = 164.18;
                $this->squareFootage = 7000;
                $this->contentsPercentage = 150;
                $this->columnIndex = 7;
                break;
            case BuildingOccupancy::COM8:
                $this->meanCost = 170.51;
                $this->squareFootage = 5000;
                $this->contentsPercentage = 100;
                $this->columnIndex = 8;
                break;
            case BuildingOccupancy::COM9:
                $this->meanCost = 122.05;
                $this->squareFootage = 12000;
                $this->contentsPercentage = 100;
                $this->columnIndex = 9;
                break;
            case BuildingOccupancy::COM10:
                $this->meanCost = 43.72;
                $this->squareFootage = 145000;
                $this->contentsPercentage = 50;
                $this->columnIndex = 10;
                break;
            case BuildingOccupancy::EDU1:
                $this->meanCost = 115.31;
                $this->squareFootage = 130000;
                $this->contentsPercentage = 100;
                $this->columnIndex = 20;
                break;
            case BuildingOccupancy::EDU2:
                $this->meanCost = 144.73;
                $this->squareFootage = 50000;
                $this->contentsPercentage = 150;
                $this->columnIndex = 21;
                break;
            case BuildingOccupancy::GOV1:
                $this->meanCost = 107.28;
                $this->squareFootage = 11000;
                $this->contentsPercentage = 100;
                $this->columnIndex = 18;
                break;
            case BuildingOccupancy::GOV2:
                $this->meanCost = 166.59;
                $this->squareFootage = 11000;
                $this->contentsPercentage = 150;
                $this->columnIndex = 19;
                break;
            case BuildingOccupancy::IND1:
                $this->meanCost = 88.28;
                $this->squareFootage = 30000;
                $this->contentsPercentage = 150;
                $this->columnIndex = 11;
                break;
            case BuildingOccupancy::IND2:
                $this->meanCost = 75.95;
                $this->squareFootage = 30000;
                $this->contentsPercentage = 150;
                $this->columnIndex = 12;
                break;
            case BuildingOccupancy::IND3:
                $this->meanCost = 145.07;
                $this->squareFootage = 45000;
                $this->contentsPercentage = 150;
                $this->columnIndex = 13;
                break;
            case BuildingOccupancy::IND4:
                $this->meanCost = 145.07;
                $this->squareFootage = 45000;
                $this->contentsPercentage = 150;
                $this->columnIndex = 14;
                break;
            case BuildingOccupancy::IND5:
                $this->meanCost = 145.07;
                $this->squareFootage = 45000;
                $this->contentsPercentage = 150;
                $this->columnIndex = 15;
                break;
            case BuildingOccupancy::IND6:
                $this->meanCost = 75.95;
                $this->squareFootage = 30000;
                $this->contentsPercentage = 100;
                $this->columnIndex = 16;
                break;
            case BuildingOccupancy::REL1:
                $this->meanCost = 138.57;
                $this->squareFootage = 17000;
                $this->contentsPercentage = 100;
                $this->columnIndex = 22;
                break;
            case BuildingOccupancy::RES1:
                $this->meanCost = -1;//@TODO Update
                $this->squareFootage = 2000;
                $this->contentsPercentage = 50;
                $this->columnIndex = 23;
                break;
            case BuildingOccupancy::RES2:
                $this->meanCost = 35.75;
                $this->squareFootage = 1063;
                $this->contentsPercentage = 50;
                $this->columnIndex = 24;
                break;
            case BuildingOccupancy::RES3A:
                $this->meanCost = 79.48;
                $this->squareFootage = 3000;
                $this->contentsPercentage = 150;
                $this->columnIndex = 25;
                break;
            case BuildingOccupancy::RES3B:
                $this->meanCost = 86.6;
                $this->squareFootage = 3000;
                $this->contentsPercentage = 50;
                $this->columnIndex = 26;
                break;
            case BuildingOccupancy::RES3C:
                $this->meanCost = 154.31;
                $this->squareFootage = 8000;
                $this->contentsPercentage = 50;
                $this->columnIndex = 27;
                break;
            case BuildingOccupancy::RES3D:
                $this->meanCost = 137.67;
                $this->squareFootage = 12000;
                $this->contentsPercentage = 50;
                $this->columnIndex = 28;
                break;
            case BuildingOccupancy::RES3E:
                $this->meanCost = 135.39;
                $this->squareFootage = 40000;
                $this->contentsPercentage = 50;
                $this->columnIndex = 29;
                break;
            case BuildingOccupancy::RES3F:
                $this->meanCost = 131.93;
                $this->squareFootage = 60000;
                $this->contentsPercentage = 50;
                $this->columnIndex = 30;
                break;
            case BuildingOccupancy::RES4:
                $this->meanCost = 132.52;
                $this->squareFootage = 135000;
                $this->contentsPercentage = 50;
                $this->columnIndex = 31;
                break;
            case BuildingOccupancy::RES5:
                $this->meanCost = 150.96;
                $this->squareFootage = 25000;
                $this->contentsPercentage = 50;
                $this->columnIndex = 32;
                break;
            case BuildingOccupancy::RES6:
                $this->meanCost = 126.95;
                $this->squareFootage = 25000;
                $this->contentsPercentage = 50;
                $this->columnIndex = 33;
                break;
        }
    }

    public function getType()
    {
        return $this->type;
    }

    public function getMeanCost()
    {
        return $this->meanCost;
    }

    public function getSquareFootage()
    {
        return $this->squareFootage;
    }

    public function getContentCurvePercentage()
    {
        return $this->contentsPercentage;
    }

    public function getColumnIndex()
    {
        return $this->columnIndex;
    }

    /**
     * @param $buildingOccupancyTypeEnum : Building Occupancy Type Enum
     * @return: The first character of a string
     */
    static function getFirstChar($buildingOccupancyTypeEnum)
    {
        return $buildingOccupancyTypeEnum[0];
    }

    /**
     * @param $buildingOccupancyTypeEnum : Building Occupancy Type Enum
     * @return string: The last character of a string
     */
    static function getLastChar($buildingOccupancyTypeEnum)
    {
        return substr($buildingOccupancyTypeEnum, -1);
    }

    /**
     * @param $buildingOccupancyTypeEnum : Building Occupancy Type Enum
     * @return string: The last character of a string
     */
    static function getSemiLastChar($buildingOccupancyTypeEnum)
    {
        return substr($buildingOccupancyTypeEnum, -2,1);
    }

    /**
     * Updates RES1 based on the Table 2 in the Documentation
     */
    public function updateRES1()
    {

    }
}
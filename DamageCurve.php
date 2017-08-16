<?php
/**
 * @Author: Menelaos Kotsollaris
 * menelaos@mkotsollaris.com
 * All rights reserved ©
 */
require_once 'BuildingOccupancy.php';

class DamageCurve
{
    const R1N = "R1N";
    const R1B = "R1B";
    const R2N = "R2N";
    const R2B = "R2B";
    const R3N = "R3N";
    const R3B = "R3B";
    const RSN = "RSN";
    const RSB = "RSB";

    const R11N = "R11N";
    const R11B = "R11B";
    const R12N = "R12N";
    const R12B = "R12B";
    const R13N = "R13N";
    const R13B = "R13B";
    const R1SN = "R1SN";
    const R1SB = "R1SB";
    const R21N = "R21N";
    const R21B = "R21B";
    const R3A1N = "R3A1N";
    const R3A1B = "R3A1B";
    const R3A2N = "R3A2N";
    const R3A2B = "R3A2B";
    const R3A3N = "R3A3N";
    const R3A3B = "R3A3B";
    const R3ASN = "R3ASN";
    const R3ASB = "R3ASB";
    const R3B1N = "R3B1N";
    const R3B1B = "R3B1B";
    const R3B2N = "R3B2N";
    const R3B2B = "R3B2B";
    const R3B3N = "R3B3N";
    const R3B3B = "R3B3B";
    const R3BSN = "R3BSN";
    const R3BSB = "R3BSB";
    const R3C1N = "R3C1N";
    const R3C1B = "R3C1B";
    const R3C2N = "R3C2N";
    const R3C2B = "R3C2B";
    const R3C3N = "R3C3N";
    const R3C3B = "R3C3B";
    const R3CSN = "R3CSN";
    const R3CSB = "R3CSB";
    const R3D1N = "R3D1N";
    const R3D1B = "R3D1B";
    const R3D2N = "R3D2N";
    const R3D2B = "R3D2B";
    const R3D3N = "R3D3N";
    const R3D3B = "R3D3B";
    const R3F2N = "R3F2N";
    const R3F2B = "R3F2B";
    const R3F3N = "R3F3N";
    const R3F3B = "R3F3B";
    const R3FSN = "R3FSN";
    const R3FSB = "R3FSB";
    const R41N = "R41N";
    const R41B = "R41B";
    const R42N = "R42N";
    const R42B = "R42B";
    const R43N = "R43N";
    const R43B = "R43B";
    const R51N = "R51N";
    const R51B = "R51B";
    const R52N = "R52N";
    const R52B = "R52B";
    const R53N = "R53N";
    const R53B = "R53B";
    const R61N = "R61N";
    const R61B = "R61B";
    const R62N = "R62N";
    const R62B = "R62B";
    const R63N = "R63N";
    const R63B = "R63B";
    const C11N = "C11N";
    const C11B = "C11B";
    const C12N = "C12N";
    const C12B = "C12B";
    const C13N = "C13N";
    const C13B = "C13B";
    const C21N = "C21N";
    const C21B = "C21B";
    const C22N = "C22N";
    const C22B = "C22B";
    const C23N = "C23N";
    const C23B = "C23B";
    const C31N = "C31N";
    const C31B = "C31B";
    const C32N = "C32N";
    const C32B = "C32B";
    const C53N = "C53N";
    const C53B = "C53B";
    const C61N = "C61N";
    const C61B = "C61B";
    const C62N = "C62N";
    const C62B = "C62B";
    const C63N = "C63N";
    const C63B = "C63B";
    const C71N = "C71N";
    const C71B = "C71B";
    const C72N = "C72N";
    const C72B = "C72B";
    const C73N = "C73N";
    const C73B = "C73B";
    const C81N = "C81N";
    const C81B = "C81B";
    const C82N = "C82N";
    const C82B = "C82B";
    const C83N = "C83N";
    const C83B = "C83B";
    const C91N = "C91N";
    const C91B = "C91B";
    const C92N = "C92N";
    const C92B = "C92B";
    const C93N = "C93N";
    const C93B = "C93B";
    const C101N = "C101N";
    const C101B = "C101B";
    const C102N = "C102N";
    const C102B = "C102B";
    const C103N = "C103N";
    const C103B = "C103B";
    const I11N = "I11N";
    const I11B = "I11B";
    const I12N = "I12N";
    const I12B = "I12B";
    const I13N = "I13N";
    const I13B = "I13B";
    const I21N = "I21N";
    const R3DSN = "R3DSN";
    const R3DSB = "R3DSB";
    const R3E1N = "R3E1N";
    const R3E1B = "R3E1B";
    const R3E2N = "R3E2N";
    const R3E2B = "R3E2B";
    const R3E3N = "R3E3N";
    const R3E3B = "R3E3B";
    const R3ESN = "R3ESN";
    const R3ESB = "R3ESB";
    const R3F1N = "R3F1N";
    const R3F1B = "R3F1B";
    const C33N = "C33N";
    const C33B = "C33B";
    const C41N = "C41N";
    const C41B = "C41B";
    const C42N = "C42N";
    const C42B = "C42B";
    const C43N = "C43N";
    const C43B = "C43B";
    const C51N = "C51N";
    const C51B = "C51B";
    const C52N = "C52N";
    const C52B = "C52B";

    /**
     * Returns the Damage Curve ID
     *
     * @param $buildingOccupancy : the building occupancy code
     * @param $storyNumber : the number of stories
     * @param $basementValue : the basement code (0 or 1 or 2)
     * @return string : the Curve Damage ID (E.g.: R11N = RES1 (single family residence), 1 story with no (0) basement)
     * @throws Exception
     */
    public static function getDamageCurveID($buildingOccupancy, $storyNumber, $basementValue)
    {
        if ($basementValue == 0) $wantedChar = "N"; else $wantedChar = "B";
        if(strlen($buildingOccupancy)==5)
        {
            $possibleCombination =  BuildingOccupancy::getFirstChar($buildingOccupancy).
                BuildingOccupancy::getSemiLastChar($buildingOccupancy).
                BuildingOccupancy::getLastChar($buildingOccupancy). $storyNumber . $wantedChar;
            return $possibleCombination;
        }
        else
        {
            $secondaryCombination = BuildingOccupancy::getFirstChar($buildingOccupancy).
                BuildingOccupancy::getLastChar($buildingOccupancy). $storyNumber . $wantedChar;
            return $secondaryCombination;
        }
    }

    /**
     * @deprecated Use getStructureNumber instead
     * TODO Recheck
     * Gets the Damage Curve Number (First column of Table 6 & 7)
     *
     * @param $damageCurveID : Damage Curve ID (column without name @ docs)
     * @param $buildingOccupancy : the Building Occupancy
     * @return int: the curve number based on Table 2 in the docs.
     * @throws Exception: Invalid Input
     */
    public static function getDamageCurveNumber($buildingOccupancy, $damageCurveID)
    {
        if (strcasecmp($buildingOccupancy, BuildingOccupancy::RES1)==0)
        {
            switch ($damageCurveID)
            {
                case (DamageCurve::R1N):
                    return 105;
                case (DamageCurve::R1B):
                    return 106;
                case (DamageCurve::R2N):
                    return 107;
                case (DamageCurve::R2B):
                    return 108;
                case (DamageCurve::R3N):
                    return 109;
                case (DamageCurve::R3B):
                    return 110;
                case (DamageCurve::RSN):
                    return 111;
                case (DamageCurve::RSB):
                    return 112;
            }
        }
        else if (strcasecmp($buildingOccupancy, BuildingOccupancy::AGR1) == 0)
        {
            return 616;
        }
        else if (strcasecmp($buildingOccupancy, BuildingOccupancy::COM5) == 0)
        {
            return 467;
        }
        else if (strcasecmp($buildingOccupancy, BuildingOccupancy::REL1) == 0)
        {
            return 624;
        }
        else if (strcasecmp($buildingOccupancy, BuildingOccupancy::IND6) == 0)
        {
            return 592;
        }
        else if (strcasecmp($buildingOccupancy, BuildingOccupancy::RES3A) == 0)
        {
            return 205;
        }
        else if (strcasecmp($buildingOccupancy, BuildingOccupancy::GOV2) == 0)
        {
            return 640;
        }
        else if (strcasecmp($buildingOccupancy, BuildingOccupancy::COM8) == 0)
        {
            return 493;
        }
        else if (strcasecmp($buildingOccupancy, BuildingOccupancy::IND3) == 0)
        {
            return 575;
        }
        else if (strcasecmp($buildingOccupancy, BuildingOccupancy::GOV1) == 0)
        {
            return 631;
        }
        else if (strcasecmp($buildingOccupancy, BuildingOccupancy::EDU1) == 0)
        {
            return 643;
        }
        else if (strcasecmp($buildingOccupancy, BuildingOccupancy::IND1) == 0)
        {
            return 525;
        }
        else if (strcasecmp($buildingOccupancy, BuildingOccupancy::IND5) == 0)
        {
            return 591;
        }
        else if (strcasecmp($buildingOccupancy, BuildingOccupancy::COM6) == 0)
        {
            return 474;
        }
        else if (strcasecmp($buildingOccupancy, BuildingOccupancy::RES5) == 0)
        {
            return 214;
        }
        else if (strcasecmp($buildingOccupancy, BuildingOccupancy::IND2) == 0)
        {
            return 559;
        }
        else if (strcasecmp($buildingOccupancy, BuildingOccupancy::RES2) == 0)
        {
            return 89;
        }
        else if (strcasecmp($buildingOccupancy, BuildingOccupancy::COM7) == 0)
        {
            return 475;
        }
        else if (strcasecmp($buildingOccupancy, BuildingOccupancy::IND4) == 0)
        {
            return 586;
        }
        else if (strcasecmp($buildingOccupancy, BuildingOccupancy::RES3D) == 0)
        {
            return 205;
        }
        else if (strcasecmp($buildingOccupancy, BuildingOccupancy::RES3E) == 0)
        {
            return 205;
        }
        else if (strcasecmp($buildingOccupancy, BuildingOccupancy::RES3F) == 0)
        {
            return 205;
        }
        else if (strcasecmp($buildingOccupancy, BuildingOccupancy::RES3C) == 0)
        {
            return 205;
        }
        else if (strcasecmp($buildingOccupancy, BuildingOccupancy::RES6) == 0)
        {
            return 215;
        }
        else if (strcasecmp($buildingOccupancy, BuildingOccupancy::COM10) == 0)
        {
            return 543;
        }
        else if (strcasecmp($buildingOccupancy, BuildingOccupancy::COM3) == 0)
        {
            return 375;
        }
        else if (strcasecmp($buildingOccupancy, BuildingOccupancy::COM4) == 0)
        {
            return 431;
        }
        else if (strcasecmp($buildingOccupancy, BuildingOccupancy::COM1) == 0)
        {
            return 217;
        }
        else if (strcasecmp($buildingOccupancy, BuildingOccupancy::RES4) == 0)
        {
            return 209;
        }
        else if (strcasecmp($buildingOccupancy, BuildingOccupancy::COM9) == 0)
        {
            return 532;
        }
        else if (strcasecmp($buildingOccupancy, BuildingOccupancy::RES3B) == 0)
        {
            return 205;
        }
        else if (strcasecmp($buildingOccupancy, BuildingOccupancy::EDU2) == 0)
        {
            return 652;
        }
        else if (strcasecmp($buildingOccupancy, BuildingOccupancy::COM2) == 0)
        {
            return 341;
        }
        throw new Exception("Invalid Input in Getting DamageCurveNumber.");
    }

    /**
     * Based on Table 4
     *
     * @param $curveDamageID
     * @param $buildingOccupancy
     * @return int
     * @throws Exception
     */
    public static function getStructureNumber($curveDamageID, $buildingOccupancy)
    {
        if (strcasecmp( $buildingOccupancy, BuildingOccupancy::AGR1) == 0)
        {
            return 616;
        }
        else if (strcasecmp($buildingOccupancy, BuildingOccupancy::EDU1) == 0)
        {
            return 643;
        }
        else if (strcasecmp($buildingOccupancy, BuildingOccupancy::EDU2) == 0)
        {
            return 652;
        }
        else if (strcasecmp($buildingOccupancy, BuildingOccupancy::GOV1) == 0)
        {
            return 631;
        }
        else if (strcasecmp($buildingOccupancy, BuildingOccupancy::GOV2) == 0)
        {
            return 640;
        }
        else if (strcasecmp($buildingOccupancy, BuildingOccupancy::IND3) == 0)
        {
            return 575;
        }
        else if (strcasecmp($buildingOccupancy, BuildingOccupancy::IND4) == 0)
        {
            return 586;
        }
        else if (strcasecmp($buildingOccupancy, BuildingOccupancy::IND5) == 0)
        {
            return 591;
        }
        else if (strcasecmp($curveDamageID, BuildingOccupancy::IND6) == 0)
        {
            return 592;
        }
        else if(strcmp($curveDamageID,DamageCurve::R11N)==0)
        {
            return 105;
        }
        else if(strcmp($curveDamageID,DamageCurve::R11B)==0)
        {
            return 106;
        }
        else if(strcmp($curveDamageID,DamageCurve::R12N)==0)
        {
            return 107;
        }
        else if(strcmp($curveDamageID,DamageCurve::R12B)==0)
        {
            return 108;
        }
        else if(strcmp($curveDamageID,DamageCurve::R13N)==0)
        {
            return 109;
        }
        else if(strcmp($curveDamageID,DamageCurve::R13B)==0)
        {
            return 110;
        }
        else if(strcmp($curveDamageID,DamageCurve::R1SN)==0)
        {
            return 111;
        }
        else if(strcmp($curveDamageID,DamageCurve::R1SB)==0)
        {
            return 112;
        }
        else if(strcmp($curveDamageID,DamageCurve::R21N)==0)
        {
            return 89;
        }
        else if(strcmp($curveDamageID,DamageCurve::R21B)==0)
        {
            return 89;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3A1N)==0)
        {
            return 204;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3A1B)==0)
        {
            return 205;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3A2N)==0)
        {
            return 204;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3A2B)==0)
        {
            return 205;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3A3N)==0)
        {
            return 204;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3A3B)==0)
        {
            return 205;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3ASN)==0)
        {
            return 204;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3ASB)==0)
        {
            return 205;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3B1N)==0)
        {
            return 204;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3B1B)==0)
        {
            return 205;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3B2N)==0)
        {
            return 204;
        }
        else if(strcmp($curveDamageID,DamageCurve::R11N)==0)
        {
            return 204;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3B2B)==0)
        {
            return 205;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3B3N)==0)
        {
            return 205;
        }
        else if(strcmp($curveDamageID,DamageCurve::R11N)==0)
        {
            return 204;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3B3B)==0)
        {
            return 205;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3BSN)==0)
        {
            return 204;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3BSB)==0)
        {
            return 205;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3C1N)==0)
        {
            return 204;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3C1B)==0)
        {
            return 205;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3C2N)==0)
        {
            return 204;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3C2B)==0)
        {
            return 205;
        }
        else if(strcmp($curveDamageID,DamageCurve::R11N)==0)
        {
            return 205;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3C3N)==0)
        {
            return 204;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3C3B)==0)
        {
            return 205;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3CSN)==0)
        {
            return 204;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3CSB)==0)
        {
            return 205;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3D1N)==0)
        {
            return 204;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3D1B)==0)
        {
            return 205;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3D2N)==0)
        {
            return 205;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3D2B)==0)
        {
            return 205;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3D3N)==0)
        {
            return 204;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3D3B)==0)
        {
            return 205;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3F2N)==0)
        {
            return 204;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3F2B)==0)
        {
            return 205;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3F3N)==0)
        {
            return 204;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3F3B)==0)
        {
            return 205;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3FSN)==0)
        {
            return 204;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3FSB)==0)
        {
            return 205;
        }
        else if(strcmp($curveDamageID,DamageCurve::R41N)==0)
        {
            return 209;
        }
        else if(strcmp($curveDamageID,DamageCurve::R41B)==0)
        {
            return 209;
        }
        else if(strcmp($curveDamageID,DamageCurve::R42N)==0)
        {
            return 209;
        }
        else if(strcmp($curveDamageID,DamageCurve::R42B)==0)
        {
            return 209;
        }
        else if(strcmp($curveDamageID,DamageCurve::R43N)==0)
        {
            return 209;
        }
        else if(strcmp($curveDamageID,DamageCurve::R43B)==0)
        {
            return 209;
        }
        else if(strcmp($curveDamageID,DamageCurve::R51N)==0)
        {
            return 214;
        }
        else if(strcmp($curveDamageID,DamageCurve::R51B)==0)
        {
            return 214;
        }
        else if(strcmp($curveDamageID,DamageCurve::R52N)==0)
        {
            return 214;
        }
        else if(strcmp($curveDamageID,DamageCurve::R52B)==0)
        {
            return 214;
        }
        else if(strcmp($curveDamageID,DamageCurve::R53N)==0)
        {
            return 214;
        }
        else if(strcmp($curveDamageID,DamageCurve::R53B)==0)
        {
            return 214;
        }
        else if(strcmp($curveDamageID,DamageCurve::R61N)==0)
        {
            return 215;
        }
        else if(strcmp($curveDamageID,DamageCurve::R61B)==0)
        {
            return 215;
        }
        else if(strcmp($curveDamageID,DamageCurve::R62N)==0)
        {
            return 215;
        }
        else if(strcmp($curveDamageID,DamageCurve::R62B)==0)
        {
            return 215;
        }
        else if(strcmp($curveDamageID,DamageCurve::R63N)==0)
        {
            return 215;
        }
        else if(strcmp($curveDamageID,DamageCurve::R63B)==0)
        {
            return 215;
        }
        else if(strcmp($curveDamageID,DamageCurve::C11N)==0)
        {
            return 217;
        }
        else if(strcmp($curveDamageID,DamageCurve::C11B)==0)
        {
            return 217;
        }
        else if(strcmp($curveDamageID,DamageCurve::C12N)==0)
        {
            return 217;
        }
        else if(strcmp($curveDamageID,DamageCurve::C12B)==0)
        {
            return 217;
        }
        else if(strcmp($curveDamageID,DamageCurve::C13N)==0)
        {
            return 217;
        }
        else if(strcmp($curveDamageID,DamageCurve::C13B)==0)
        {
            return 217;
        }
        else if(strcmp($curveDamageID,DamageCurve::C21N)==0)
        {
            return 341;
        }
        else if(strcmp($curveDamageID,DamageCurve::C21B)==0)
        {
            return 341;
        }
        else if(strcmp($curveDamageID,DamageCurve::C22N)==0)
        {
            return 341;
        }
        else if(strcmp($curveDamageID,DamageCurve::C22B)==0)
        {
            return 341;
        }
        else if(strcmp($curveDamageID,DamageCurve::C23N)==0)
        {
            return 341;
        }
        else if(strcmp($curveDamageID,DamageCurve::C23B)==0)
        {
            return 341;
        }
        else if(strcmp($curveDamageID,DamageCurve::C31N)==0)
        {
            return 375;
        }
        else if(strcmp($curveDamageID,DamageCurve::C31B)==0)
        {
            return 375;
        }
        else if(strcmp($curveDamageID,DamageCurve::C32N)==0)
        {
            return 375;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3B2N)==0)
        {
            return 375;
        }
        else if(strcmp($curveDamageID,DamageCurve::C32B)==0)
        {
            return 375;
        }
        else if(strcmp($curveDamageID,DamageCurve::C53N)==0)
        {
            return 467;
        }
        else if(strcmp($curveDamageID,DamageCurve::C53B)==0)
        {
            return 467;
        }
        else if(strcmp($curveDamageID,DamageCurve::C61N)==0)
        {
            return 474;
        }
        else if(strcmp($curveDamageID,DamageCurve::C61B)==0)
        {
            return 474;
        }
        else if(strcmp($curveDamageID,DamageCurve::C62N)==0)
        {
            return 474;
        }
        else if(strcmp($curveDamageID,DamageCurve::C62B)==0)
        {
            return 474;
        }
        else if(strcmp($curveDamageID,DamageCurve::C63N)==0)
        {
            return 474;
        }
        else if(strcmp($curveDamageID,DamageCurve::C63B)==0)
        {
            return 474;
        }
        else if(strcmp($curveDamageID,DamageCurve::C71N)==0)
        {
            return 475;
        }
        else if(strcmp($curveDamageID,DamageCurve::C71B)==0)
        {
            return 475;
        }
        else if(strcmp($curveDamageID,DamageCurve::C72N)==0)
        {
            return 475;
        }
        else if(strcmp($curveDamageID,DamageCurve::C72B)==0)
        {
            return 475;
        }
        else if(strcmp($curveDamageID,DamageCurve::C73N)==0)
        {
            return 475;
        }
        else if(strcmp($curveDamageID,DamageCurve::C73B)==0)
        {
            return 475;
        }
        else if(strcmp($curveDamageID,DamageCurve::C81N)==0)
        {
            return 493;
        }
        else if(strcmp($curveDamageID,DamageCurve::C81B)==0)
        {
            return 493;
        }
        else if(strcmp($curveDamageID,DamageCurve::C82N)==0)
        {
            return 493;
        }
        else if(strcmp($curveDamageID,DamageCurve::C82B)==0)
        {
            return 493;
        }
        else if(strcmp($curveDamageID,DamageCurve::C83B)==0)
        {
            return 493;
        }
        else if(strcmp($curveDamageID,DamageCurve::C83N)==0)
        {
            return 493;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3D3N)==0)
        {
            return 493;
        }
        else if(strcmp($curveDamageID,DamageCurve::C91N)==0)
        {
            return 532;
        }
        else if(strcmp($curveDamageID,DamageCurve::C91B)==0)
        {
            return 532;
        }
        else if(strcmp($curveDamageID,DamageCurve::C92N)==0)
        {
            return 532;
        }
        else if(strcmp($curveDamageID,DamageCurve::C92B)==0)
        {
            return 532;
        }
        else if(strcmp($curveDamageID,DamageCurve::C93N)==0)
        {
            return 532;
        }
        else if(strcmp($curveDamageID,DamageCurve::C93B)==0)
        {
            return 532;
        }
        else if(strcmp($curveDamageID,DamageCurve::C101N)==0)
        {
            return 543;
        }
        else if(strcmp($curveDamageID,DamageCurve::C101B)==0)
        {
            return 543;
        }
        else if(strcmp($curveDamageID,DamageCurve::C102N)==0)
        {
            return 543;
        }
        else if(strcmp($curveDamageID,DamageCurve::C102B)==0)
        {
            return 543;
        }
        else if(strcmp($curveDamageID,DamageCurve::C103B)==0)
        {
            return 543;
        }
        else if(strcmp($curveDamageID,DamageCurve::C103N)==0)
        {
            return 543;
        }
        else if(strcmp($curveDamageID,DamageCurve::I11N)==0)
        {
            return 545;
        }
        else if(strcmp($curveDamageID,DamageCurve::I11B)==0)
        {
            return 545;
        }
        else if(strcmp($curveDamageID,DamageCurve::I12N)==0)
        {
            return 545;
        }
        else if(strcmp($curveDamageID,DamageCurve::I12B)==0)
        {
            return 545;
        }
        else if(strcmp($curveDamageID,DamageCurve::I13N)==0)
        {
            return 545;
        }
        else if(strcmp($curveDamageID,DamageCurve::I13B)==0)
        {
            return 545;
        }
        else if(strcmp($curveDamageID,DamageCurve::I21N)==0)
        {
            return 559;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3DSN)==0)
        {
            return 204;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3DSB)==0)
        {
            return 205;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3E1N)==0)
        {
            return 204;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3E1B)==0)
        {
            return 205;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3E2N)==0)
        {
            return 204;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3E2B)==0)
        {
            return 205;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3E3N)==0)
        {
            return 204;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3E3B)==0)
        {
            return 205;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3ESN)==0)
        {
            return 204;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3ESB)==0)
        {
            return 205;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3F1N)==0)
        {
            return 204;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3F1B)==0)
        {
            return 205;
        }
        else if(strcmp($curveDamageID,DamageCurve::C33N)==0)
        {
            return 375;
        }
        else if(strcmp($curveDamageID,DamageCurve::C33B)==0)
        {
            return 375;
        }
        else if(strcmp($curveDamageID,DamageCurve::C41N)==0)
        {
            return 431;
        }
        else if(strcmp($curveDamageID,DamageCurve::C41B)==0)
        {
            return 431;
        }
        else if(strcmp($curveDamageID,DamageCurve::C42B)==0)
        {
            return 431;
        }
        else if(strcmp($curveDamageID,DamageCurve::C43N)==0)
        {
            return 431;
        }
        else if(strcmp($curveDamageID,DamageCurve::C43B)==0)
        {
            return 431;
        }
        else if(strcmp($curveDamageID,DamageCurve::C51N)==0)
        {
            return 467;
        }
        else if(strcmp($curveDamageID,DamageCurve::C51B)==0)
        {
            return 467;
        }
        else if(strcmp($curveDamageID,DamageCurve::C52N)==0)
        {
            return 467;
        }
        else if(strcmp($curveDamageID,DamageCurve::C52B)==0)
        {
            return 467;
        }
        throw new Exception("Wrong IdNumber ($curveDamageID) at getStructureNumber function.");
    }

    /**
     * @param $curveDamageID
     * @return int
     * @throws Exception
     */
    public static function getContentsNumber($curveDamageID)
    {
        if(strcmp($curveDamageID,DamageCurve::R11N)==0)
        {
            return 21;
        }
        else if(strcmp($curveDamageID,DamageCurve::R11B)==0)
        {
            return 22;
        }
        else if(strcmp($curveDamageID,DamageCurve::R12N)==0)
        {
            return 23;
        }
        else if(strcmp($curveDamageID,DamageCurve::R12B)==0)
        {
            return 24;
        }
        else if(strcmp($curveDamageID,DamageCurve::R13N)==0)
        {
            return 25;
        }
        else if(strcmp($curveDamageID,DamageCurve::R13B)==0)
        {
            return 26;
        }
        else if(strcmp($curveDamageID,DamageCurve::R1SN)==0)
        {
            return 27;
        }
        else if(strcmp($curveDamageID,DamageCurve::R1SB)==0)
        {
            return 28;
        }
        else if(strcmp($curveDamageID,DamageCurve::R21N)==0)
        {
            return 74;
        }
        else if(strcmp($curveDamageID,DamageCurve::R21B)==0)
        {
            return 74;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3A1N)==0)
        {
            return 81;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3A1B)==0)
        {
            return 82;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3A2N)==0)
        {
            return 81;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3A2B)==0)
        {
            return 82;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3A3N)==0)
        {
            return 81;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3A3B)==0)
        {
            return 81;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3ASN)==0)
        {
            return 82;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3ASB)==0)
        {
            return 81;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3B1N)==0)
        {
            return 82;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3B1B)==0)
        {
            return 81;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3B2N)==0)
        {
            return 82;
        }
        else if(strcmp($curveDamageID,DamageCurve::R11N)==0)
        {
            return 81;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3B2B)==0)
        {
            return 82;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3B3N)==0)
        {
            return 81;
        }
        else if(strcmp($curveDamageID,DamageCurve::R11N)==0)
        {
            return 82;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3B3B)==0)
        {
            return 81;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3BSN)==0)
        {
            return 82;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3BSB)==0)
        {
            return 81;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3C1N)==0)
        {
            return 82;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3C1B)==0)
        {
            return 81;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3C2N)==0)
        {
            return 82;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3C2B)==0)
        {
            return 81;
        }
        else if(strcmp($curveDamageID,DamageCurve::R11N)==0)
        {
            return 82;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3C3N)==0)
        {
            return 81;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3C3B)==0)
        {
            return 82;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3CSN)==0)
        {
            return 81;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3CSB)==0)
        {
            return 82;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3D1N)==0)
        {
            return 81;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3D1B)==0)
        {
            return 82;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3D2N)==0)
        {
            return 81;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3D2B)==0)
        {
            return 82;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3D3N)==0)
        {
            return 81;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3D3B)==0)
        {
            return 82;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3F2N)==0)
        {
            return 81;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3F2B)==0)
        {
            return 82;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3F3N)==0)
        {
            return 81;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3F3B)==0)
        {
            return 82;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3FSN)==0)
        {
            return 81;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3FSB)==0)
        {
            return 82;
        }
        else if(strcmp($curveDamageID,DamageCurve::R41N)==0)
        {
            return 85;
        }
        else if(strcmp($curveDamageID,DamageCurve::R41B)==0)
        {
            return 85;
        }
        else if(strcmp($curveDamageID,DamageCurve::R42N)==0)
        {
            return 85;
        }
        else if(strcmp($curveDamageID,DamageCurve::R42B)==0)
        {
            return 85;
        }
        else if(strcmp($curveDamageID,DamageCurve::R43N)==0)
        {
            return 85;
        }
        else if(strcmp($curveDamageID,DamageCurve::R43B)==0)
        {
            return 85;
        }
        else if(strcmp($curveDamageID,DamageCurve::R51N)==0)
        {
            return 88;
        }
        else if(strcmp($curveDamageID,DamageCurve::R51B)==0)
        {
            return 88;
        }
        else if(strcmp($curveDamageID,DamageCurve::R52N)==0)
        {
            return 88;
        }
        else if(strcmp($curveDamageID,DamageCurve::R52B)==0)
        {
            return 88;
        }
        else if(strcmp($curveDamageID,DamageCurve::R53N)==0)
        {
            return 88;
        }
        else if(strcmp($curveDamageID,DamageCurve::R53B)==0)
        {
            return 88;
        }
        else if(strcmp($curveDamageID,DamageCurve::R61N)==0)
        {
            return 89;
        }
        else if(strcmp($curveDamageID,DamageCurve::R61B)==0)
        {
            return 89;
        }
        else if(strcmp($curveDamageID,DamageCurve::R62N)==0)
        {
            return 89;
        }
        else if(strcmp($curveDamageID,DamageCurve::R62B)==0)
        {
            return 89;
        }
        else if(strcmp($curveDamageID,DamageCurve::R63N)==0)
        {
            return 89;
        }
        else if(strcmp($curveDamageID,DamageCurve::R63B)==0)
        {
            return 89;
        }
        else if(strcmp($curveDamageID,DamageCurve::C11N)==0)
        {
            return 90;
        }
        else if(strcmp($curveDamageID,DamageCurve::C11B)==0)
        {
            return 90;
        }
        else if(strcmp($curveDamageID,DamageCurve::C12N)==0)
        {
            return 90;
        }
        else if(strcmp($curveDamageID,DamageCurve::C12B)==0)
        {
            return 90;
        }
        else if(strcmp($curveDamageID,DamageCurve::C13N)==0)
        {
            return 90;
        }
        else if(strcmp($curveDamageID,DamageCurve::C13B)==0)
        {
            return 90;
        }
        else if(strcmp($curveDamageID,DamageCurve::C21N)==0)
        {
            return 195;
        }
        else if(strcmp($curveDamageID,DamageCurve::C21B)==0)
        {
            return 195;
        }
        else if(strcmp($curveDamageID,DamageCurve::C22N)==0)
        {
            return 195;
        }
        else if(strcmp($curveDamageID,DamageCurve::C22B)==0)
        {
            return 195;
        }
        else if(strcmp($curveDamageID,DamageCurve::C23N)==0)
        {
            return 195;
        }
        else if(strcmp($curveDamageID,DamageCurve::C23B)==0)
        {
            return 195;
        }
        else if(strcmp($curveDamageID,DamageCurve::C31N)==0)
        {
            return 240;
        }
        else if(strcmp($curveDamageID,DamageCurve::C31B)==0)
        {
            return 240;
        }
        else if(strcmp($curveDamageID,DamageCurve::C32N)==0)
        {
            return 240;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3B2N)==0)
        {
            return 240;
        }
        else if(strcmp($curveDamageID,DamageCurve::C32B)==0)
        {
            return 240;
        }
        else if(strcmp($curveDamageID,DamageCurve::C53N)==0)
        {
            return 304;
        }
        else if(strcmp($curveDamageID,DamageCurve::C53B)==0)
        {
            return 304;
        }
        else if(strcmp($curveDamageID,DamageCurve::C61N)==0)
        {
            return 309;
        }
        else if(strcmp($curveDamageID,DamageCurve::C61B)==0)
        {
            return 309;
        }
        else if(strcmp($curveDamageID,DamageCurve::C62N)==0)
        {
            return 309;
        }
        else if(strcmp($curveDamageID,DamageCurve::C62B)==0)
        {
            return 309;
        }
        else if(strcmp($curveDamageID,DamageCurve::C63N)==0)
        {
            return 309;
        }
        else if(strcmp($curveDamageID,DamageCurve::C63B)==0)
        {
            return 309;
        }
        else if(strcmp($curveDamageID,DamageCurve::C71N)==0)
        {
            return 312;
        }
        else if(strcmp($curveDamageID,DamageCurve::C71B)==0)
        {
            return 312;
        }
        else if(strcmp($curveDamageID,DamageCurve::C72N)==0)
        {
            return 312;
        }
        else if(strcmp($curveDamageID,DamageCurve::C72B)==0)
        {
            return 312;
        }
        else if(strcmp($curveDamageID,DamageCurve::C73N)==0)
        {
            return 312;
        }
        else if(strcmp($curveDamageID,DamageCurve::C73B)==0)
        {
            return 312;
        }
        else if(strcmp($curveDamageID,DamageCurve::C81N)==0)
        {
            return 322;
        }
        else if(strcmp($curveDamageID,DamageCurve::C81B)==0)
        {
            return 322;
        }
        else if(strcmp($curveDamageID,DamageCurve::C82N)==0)
        {
            return 322;
        }
        else if(strcmp($curveDamageID,DamageCurve::C82B)==0)
        {
            return 322;
        }
        else if(strcmp($curveDamageID,DamageCurve::C83B)==0)
        {
            return 322;
        }
        else if(strcmp($curveDamageID,DamageCurve::C83N)==0)
        {
            return 322;
        }
        else if(strcmp($curveDamageID,DamageCurve::C91N)==0)
        {
            return 352;
        }
        else if(strcmp($curveDamageID,DamageCurve::C91B)==0)
        {
            return 352;
        }
        else if(strcmp($curveDamageID,DamageCurve::C92N)==0)
        {
            return 352;
        }
        else if(strcmp($curveDamageID,DamageCurve::C92B)==0)
        {
            return 352;
        }
        else if(strcmp($curveDamageID,DamageCurve::C93N)==0)
        {
            return 352;
        }
        else if(strcmp($curveDamageID,DamageCurve::C93B)==0)
        {
            return 352;
        }
        else if(strcmp($curveDamageID,DamageCurve::C101N)==0)
        {
            return 357;
        }
        else if(strcmp($curveDamageID,DamageCurve::C101B)==0)
        {
            return 357;
        }
        else if(strcmp($curveDamageID,DamageCurve::C102N)==0)
        {
            return 357;
        }
        else if(strcmp($curveDamageID,DamageCurve::C102B)==0)
        {
            return 357;
        }
        else if(strcmp($curveDamageID,DamageCurve::C103B)==0)
        {
            return 357;
        }
        else if(strcmp($curveDamageID,DamageCurve::C103N)==0)
        {
            return 357;
        }
        else if(strcmp($curveDamageID,DamageCurve::I11N)==0)
        {
            return 358;
        }
        else if(strcmp($curveDamageID,DamageCurve::I11B)==0)
        {
            return 358;
        }
        else if(strcmp($curveDamageID,DamageCurve::I12N)==0)
        {
            return 358;
        }
        else if(strcmp($curveDamageID,DamageCurve::I12B)==0)
        {
            return 358;
        }
        else if(strcmp($curveDamageID,DamageCurve::I13N)==0)
        {
            return 358;
        }
        else if(strcmp($curveDamageID,DamageCurve::I13B)==0)
        {
            return 358;
        }
        else if(strcmp($curveDamageID,DamageCurve::I21N)==0)
        {
            return 358;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3DSN)==0)
        {
            return 81;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3DSB)==0)
        {
            return 82;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3E1N)==0)
        {
            return 81;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3E1B)==0)
        {
            return 82;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3E2N)==0)
        {
            return 81;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3E2B)==0)
        {
            return 82;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3E3N)==0)
        {
            return 81;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3E3B)==0)
        {
            return 82;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3ESN)==0)
        {
            return 81;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3ESB)==0)
        {
            return 82;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3F1N)==0)
        {
            return 81;
        }
        else if(strcmp($curveDamageID,DamageCurve::R3F1B)==0)
        {
            return 82;
        }
        else if(strcmp($curveDamageID,DamageCurve::C33N)==0)
        {
            return 240;
        }
        else if(strcmp($curveDamageID,DamageCurve::C33B)==0)
        {
            return 240;
        }
        else if(strcmp($curveDamageID,DamageCurve::C41N)==0)
        {
            return 280;
        }
        else if(strcmp($curveDamageID,DamageCurve::C41B)==0)
        {
            return 280;
        }
        else if(strcmp($curveDamageID,DamageCurve::C42B)==0)
        {
            return 280;
        }
        else if(strcmp($curveDamageID,DamageCurve::C43N)==0)
        {
            return 280;
        }
        else if(strcmp($curveDamageID,DamageCurve::C43B)==0)
        {
            return 280;
        }
        else if(strcmp($curveDamageID,DamageCurve::C51N)==0)
        {
            return 304;
        }
        else if(strcmp($curveDamageID,DamageCurve::C51B)==0)
        {
            return 304;
        }
        else if(strcmp($curveDamageID,DamageCurve::C52N)==0)
        {
            return 304;
        }
        else if(strcmp($curveDamageID,DamageCurve::C52B)==0)
        {
            return 304;
        }
        throw new Exception("Wrong Curve Number ($curveDamageID) at getContentsNumber function.");
    }
}
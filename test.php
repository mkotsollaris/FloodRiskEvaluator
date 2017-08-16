<?php

/** @Author: Menelaos Kotsollaris
 * menelaos@mkotsollaris.com
 * All rights reserved ©
 */

require_once('BuildingOccupancy.php');
require_once('Basement.php');
require_once('BuildingQuality.php');
require_once('AcceptableRequestContainer.php');
require_once('AcceptableRequestUtilities.php');
require_once('DamageCurve.php');
require_once('Utilities.php');
require_once('Garage.php');
require_once('StructuralResult.php');
require_once('Currency.php');

try
{
    $myStr = "Request=GetDamage&format=xmL&id=1&BC=1&dc=105&bo=RES1&yb=1987&st=1&ft=2&ba=0&ga=0&wd=3
    .5&wp=79&id=2&BC=1&bq=Average&bo=RES1&yb=2000&st=1&ft=2&ba=0&ga=0&wd=3.1&wp=100";
    $requestContainer = AcceptableRequestUtilities::parseURL($myStr);
    $subArray = $requestContainer->getSubCoreParametersArray();
    $coreParameters = $requestContainer->getCoreParameters();
    $request = $coreParameters->getRequest();
    $format = $coreParameters->getFormat();
    /** Holds the StructuralResult objects*/
    $structuralResultArray = array();
    $initialParametersArray = array();
    for ($i = 0; $i < sizeof($subArray); $i++)
    {
        $id = $subArray[$i]->getID();
        $ba = $subArray[$i]->getBA();
        $st = $subArray[$i]->getST();
        $bo = $subArray[$i]->getBO();
        $ga = $subArray[$i]->getGA();
        $wp = $subArray[$i]->getWP();
        $bq = $subArray[$i]->getBQ();
        $dc = $subArray[$i]->getDC();
        $yb = $subArray[$i]->getYB();
        $ft = $subArray[$i]->getFT();
        $wd = $subArray[$i]->getWD();
        $bv = $subArray[$i]->getBV();
        $buildingQualityNumber = BuildingQuality::getArithmeticValue($bq);
        $curveDamageID = DamageCurve::getDamageCurveID($bo, $st, $ba);
        if ($dc == null) $dc = DamageCurve::getDamageCurveNumber($curveDamageID);
        $basement = Basement::calculateRES1Basement($dc, $buildingQualityNumber, $st);
        $ageSubtraction = Utilities::ageSubtraction($yb);
        $buildingOccupancy = new BuildingOccupancy($bo);
        $boIndex = $buildingOccupancy->getColumnIndex();
        $ageDeprecation = Utilities::getAgeDepreciationFactor($ageSubtraction, $boIndex);
        $squareFootage = $buildingOccupancy->getSquareFootage();
        $garageCost = Garage::calculateCost($ga, $bq);
        $basementExtraCost = $basement->getExtraCost($ba);
        $averageBasementCost = $basement->averageCost;
        if ($bv == null) $bv = Utilities::calculateValuation($squareFootage, $averageBasementCost, $basementExtraCost, $garageCost, $ageDeprecation);
        $waterFoundationSubtraction = Utilities::waterFoundationSubtraction($ft, $wd);
        $structureDmgPercentage = Utilities::calculateStructureDmgPercentage($dc, $waterFoundationSubtraction);
        $contentAndDamagePercentage = Utilities::calculateContentAndDamagePercentage($dc, $wd, $waterFoundationSubtraction);
        $structuralResult = new StructuralResult();
        $structuralResult->setAgeDeprecation($ageDeprecation);
        $structuralResult->setAgeSubtraction($ageSubtraction);
        $structuralResult->setExtraBasementCost($averageBasementCost);
        $structuralResult->setBasementExtraCost($basementExtraCost);
        $structuralResult->setBoIndex($boIndex);
        $structuralResult->setBuildingQualityNumber($buildingQualityNumber);
        $structuralResult->setBV($bv);
        $structuralResult->setGarageCost($garageCost);
        $structuralResult->setSquareFootage($squareFootage);
        $structuralResult->setCurveDamageID($curveDamageID);
        $structuralResult->setCurveDamageNumber($dc);
        $structuralResult->setWaterFoundationSubtraction($waterFoundationSubtraction);
        $structuralResult->setStructureDmgPercentage($structureDmgPercentage);
        $structuralResult->setContentPercentage($contentAndDamagePercentage[0]);
        $structuralResult->setDamagePercentage($contentAndDamagePercentage[1]);
        $initialParameters = array(AcceptableURLParameters::ID => $id, AcceptableURLParameters::BA => $ba,
            AcceptableURLParameters::ST => $st, AcceptableURLParameters::WP => $wp, AcceptableURLParameters::BO => $bo,
            AcceptableURLParameters::DC => $dc, AcceptableURLParameters::BQ => $bq, AcceptableURLParameters::YB => $yb,
            AcceptableURLParameters::FT => $ft, AcceptableURLParameters::GA => $ga, AcceptableURLParameters::WD => $wd);
        $structuralResult->setInitialParameters($initialParameters);
        $structuralResultVisual = array($initialParameters, array('WaterFoundationSubtraction' => $waterFoundationSubtraction,
            'buildingQualityNumber' => $buildingQualityNumber, 'curveDamageID' => $curveDamageID,
            'curveDamageNumber' => $dc, 'ageSubtraction' => $ageSubtraction, 'ageDeprecation' => $ageDeprecation,
            'squareFootage' => $squareFootage, 'garageCost' => $garageCost,
            'averageBasementCost' => $averageBasementCost, 'basementExtraCost' => $basementExtraCost, 'buildingValuation' => $bv,
            'boIndex' => $boIndex));

        if (strcasecmp($format, AcceptableURLParameters::XML) == 0)
        {
            array_push($structuralResultArray, $structuralResult);
            array_push($initialParametersArray, $initialParameters);
        }
        else if (strcasecmp($format, AcceptableURLParameters::JSON) == 0)
        {
            array_push($structuralResultArray, $structuralResultVisual);
        }
    }
    if (strcasecmp($format, AcceptableURLParameters::XML) == 0)
    {
        StructuralResult::printXML($initialParametersArray, $structuralResultArray);
    }
    else if (strcasecmp($format, AcceptableURLParameters::JSON) == 0)
    {
        StructuralResult::printJSON($structuralResultArray);
    }
}
catch (Exception $e)
{
    $errorArray = array("Error:" => $e->getMessage());
    $sxe = new SimpleXMLElement('<xml/>');
    $parent = $sxe->addChild("Message",$e->getMessage());
    Header('Content-type: text/xml');
    print($sxe->asXML());
}
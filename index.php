<?php
/**
 * @Author: Menelaos Kotsollaris
 * mkotsollaris@gmail.com
 * All rights reserved © 2016
 *
 * URL:
 *     Request=GetDamage&format=xmL&id=1&BC=1&bo=RES1&yb=1987&st=1&ft=2&ba=0&ga=0&wd=2&wp=79&id=2&BC=1&bq=Average&bo=RES1&yb=2000&st=1&ft=2&ba=0&ga=0&wd=3.1&wp=100
 *
 *     http://gaia.gge.unb.ca/wmaps/students/menelaos/FloodRiskEvaluation/?Request=GetAggDamage&Format=json&WD=2&WP=100&ID=1&BC=1&BO=RES1&FT=2&YB=1987&ST=1&BA=0&GA=0&BQ=Average
 *     http://gaia.gge.unb.ca/wmaps/students/menelaos/FloodRiskEvaluation/?Request=GetAggDamage&Format=json&WD=2&WP=80&wd=3.5&wp=20&ID=1&BC=1&BO=RES1&FT=2&YB=1987&ST=1&BA=0&GA=0&BQ=Average
 *     Request=GetDamage&Format=XML&ID=1&BC=1&BO=RES1&FT=0&YB=1950&ST=1&BA=0&GA=0&WD=2&WP=10
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
    $URLString = $_SERVER['QUERY_STRING'];
    //todo get type of request
    $requestType = AcceptableRequestUtilities::parseRequest($URLString);
    //echo $requestType;
    if (strcasecmp($requestType, AcceptableURLParameters::GETAGGREGATIONDAMAGE) == 0)
    {
        $requestContainer = AcceptableRequestUtilities::parseAggrURL($URLString);
    }
    else
    {
        $requestContainer = AcceptableRequestUtilities::parseURL($URLString);
    }
    //$requestContainer = AcceptableRequestUtilities::parseURL($URLString);
    $subArray = $requestContainer->getSubCoreParametersArray();
    $coreParameters = $requestContainer->getCoreParameters();
    $request = $requestType;
    $format = $coreParameters->getFormat();
    /** Holds the StructuralResult objects*/
    $structuralResultArray = array();
    $initialParametersArray = array();
    if (strcasecmp($request, AcceptableURLParameters::GETCAPABILITIES) == 0)
    {
        $version = "BETA 2.0.0";
        $documentationURL = "http://gaia.gge.unb.ca/wmaps/students/menelaos/floodriskshowcase/Documentation.html";
        if (strcasecmp($format, AcceptableURLParameters::XML) == 0)
        {
            $sxe = new SimpleXMLElement('<xml/>');
            $parent = $sxe->addChild("Version", $version);
            $parent = $sxe->addChild("Documentation", $documentationURL);
            Header('Content-type: text/xml');
            print($sxe->asXML());
            exit();
        }
        else if (strcasecmp($format, AcceptableURLParameters::JSON) == 0)
        {
            $structuralResultArray =
                array("Version" => $version, "Documentation" => $documentationURL);
            StructuralResult::printJSON($structuralResultArray);
            exit();
        }
    }
    //Parsing for the WP to check if it sums to 100
    //TODO reconsider logic.
    $wpCounter = 0;
    for ($i = 0; $i < sizeof($subArray); $i++)
    {
        if (sizeof($subArray) == 1)
        {
            $subArray[$i]->setWP(100);
            $wpCounter = 100;
            break;
        }
        $wpCounter += $subArray[$i]->getWP();
    }
    if ($wpCounter > 100 &&
        $request == AcceptableURLParameters::GETDAMAGE
    ) throw new Exception("Water Percentage does not sums to 100: (value= $wpCounter)%");
    if (strcasecmp($request, AcceptableURLParameters::GETAGGREGATIONDAMAGE) == 0)
    {
        //special parse
    }
    /** Foreach request object: */
    $totalBV=0;
    for ($i = 0; $i < sizeof($subArray); $i++)
    {
        $id = $subArray[$i]->getID();
        $bc = $subArray[$i]->getBC();
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
        $buildingOccupancy = new BuildingOccupancy($bo);
        $curveDamageID = DamageCurve::getDamageCurveID
        ($buildingOccupancy->getType(), $st, $ba);
        if ($dc == null) $dc = DamageCurve::getStructureNumber
        ($curveDamageID, $buildingOccupancy->getType());
        if (strcasecmp($buildingOccupancy->getType(), BuildingOccupancy::RES1) == 0)
        {
            $basement =
                Basement::calculateRES1Basement
                ($curveDamageID, $buildingQualityNumber, $st);
            $extraBasementCost = $basement->averageCost;
            if($ba == 1) $extraBasementCost+=$basement->unFinishedCost;
            if($ba == 2) $extraBasementCost+=$basement->finishedCost;
            /*if($ba == 1) $extraBasementCost+=$basement->unfinishedCost;
            if($ba == 2) $extraBasementCost+=$basement->finishedCost;*/
            /*$extraBasementCost += ($ba != "0" && $ba == "2") ?
                $basement->finishedCost : $basement->unfinishedCost;*/
        }
        else $extraBasementCost = $buildingOccupancy->getMeanCost();
        //echo "\n extraBasementCost: ".$extraBasementCost;
        $ageSubtraction = Utilities::ageSubtraction($yb);
        $boIndex = $buildingOccupancy->getColumnIndex();
        $ageDeprecation = Utilities::getAgeDepreciationFactor($ageSubtraction, $boIndex);
        $squareFootage = $buildingOccupancy->getSquareFootage();
        $garageCost = Garage::calculateCost($ga, $bq);
        if ($bv == null) $bv = Utilities::calculateValuation($squareFootage, $extraBasementCost,
            $garageCost, $ageDeprecation, $bc, $st);
        $totalBV += $bv;
        $waterFoundationSubtraction = Utilities::waterFoundationSubtraction($ft, $wd);
        $structureDmgPercentage =
            Utilities::calculateStructureDmgPercentage($dc, $waterFoundationSubtraction, $wp);
        $contentPercentage = Utilities::calculateContentPercentage
        ($dc, $waterFoundationSubtraction, $wp);
        $damagePercentage = Utilities::calculateDamagePercentage
        ($dc, $waterFoundationSubtraction, $wp);
        //------------------------ Printing Results -------------------------------------------
        $structuralResult = new StructuralResult();
        $structuralResult->setAgeDeprecation($ageDeprecation);
        $structuralResult->setAgeSubtraction($ageSubtraction);
        $structuralResult->setBoIndex($boIndex);
        $structuralResult->setBuildingQualityNumber($buildingQualityNumber);
        $structuralResult->setBV($bv);
        $structuralResult->setGarageCost($garageCost);
        $structuralResult->setSquareFootage($squareFootage);
        $structuralResult->setCurveDamageID($curveDamageID);
        $structuralResult->setCurveDamageNumber($dc);
        $structuralResult->setCurveContentPercentage($buildingOccupancy->getContentCurvePercentage());
        $structuralResult->setWaterFoundationSubtraction($waterFoundationSubtraction);
        $structuralResult->setStructureDmgPercentage($structureDmgPercentage);
        $structuralResult->setContentPercentage($contentPercentage);
        $contentPercentageDollars = ($contentPercentage / 100) *
            ($buildingOccupancy->getContentCurvePercentage() / 100) * $bv;
        $structureDmgPercentageDollars = ($structureDmgPercentage / 100) * $bv;
        $structuralResult->setContentPercentageDollars($contentPercentageDollars);
        $structuralResult->setDamagePercentageDollars($structureDmgPercentageDollars);
        $initialParameters = array(
            AcceptableURLParameters::ID => $id,
            AcceptableURLParameters::BA => $ba,
            AcceptableURLParameters::ST => $st,
            AcceptableURLParameters::WP => $wp,
            AcceptableURLParameters::BO => $bo,
            AcceptableURLParameters::DC => $dc,
            AcceptableURLParameters::BQ => $bq,
            AcceptableURLParameters::YB => $yb,
            AcceptableURLParameters::FT => $ft,
            AcceptableURLParameters::GA => $ga,
            AcceptableURLParameters::WD => $wd);
        $structuralResult->setInitialParameters($initialParameters);
        $structuralResultVisual = array($initialParameters,
            array(
                'ageDeprecation' => $ageDeprecation,
                'WaterFoundationSubtraction' => $waterFoundationSubtraction,
                'buildingQualityNumber' => $buildingQualityNumber,
                'curveDamageID' => $curveDamageID,
                'curveDamageNumber' => $dc,
                'ageSubtraction' => $ageSubtraction,
                'squareFootage' => $squareFootage,
                'garageCost' => $garageCost,
                'basementExtraCost' => $extraBasementCost,
                'buildingValuation' => $bv,
                'ContentCurvePercentage' => $buildingOccupancy->getContentCurvePercentage(),
                'ContentPercentage' => $contentPercentage,
                'structureDmgPercentage' => $structureDmgPercentage,
                'StructureDamagePercentageDollars' => $structureDmgPercentageDollars,
                'ContentPercentageDollars' => $contentPercentageDollars,
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
    //array_push($structuralResultArray, array('test'=>'a'));
    if (strcasecmp($format, AcceptableURLParameters::XML) == 0)
    {
        StructuralResult::printXML($initialParametersArray, $structuralResultArray, $totalBV);
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
    $parent = $sxe->addChild("Message", $e->getMessage());
    Header('Content-type: text/xml');
    print($sxe->asXML());
}
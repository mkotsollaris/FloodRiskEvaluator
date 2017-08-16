<?php
/** @Author: Menelaos Kotsollaris
 * menelaos@mkotsollaris.com
 * All rights reserved ©
 */
/**
 * The Structural Resulting Class
 */
class StructuralResult
{
    private $buildingQualityNumber;
    private $curveDamageID;
    private $curveDamageNumber;
    private $ageSubtraction;
    private $ageDeprecation;
    private $squareFootage;
    private $garageCost;
    private $extraBasementCost;
    private $boIndex;
    private $buildingValuation;
    private $initialParameters;
    private $waterFoundationSubtraction;
    private $structureDmgPercentage;
    private $contentPercentage;
    private $contentCurvePercentage;
    private $damagePercentage;
    private $contentPercentageDollars;
    private $damagePercentageDollars;

    public function setContentPercentageDollars($contentPercentageDollars)
    {
        $this->contentPercentageDollars = $contentPercentageDollars;
    }

    public function setDamagePercentageDollars($damagePercentageDollars)
    {
        $this->damagePercentageDollars = $damagePercentageDollars;
    }

    public function StructuralResult()
    {

    }

    public function setContentPercentage($contentPercentage)
    {
        $this->contentPercentage = $contentPercentage;
    }

    public function setDamagePercentage($damagePercentage)
    {
        $this->damagePercentage = $damagePercentage;
    }

    public function setStructureDmgPercentage($structureDmgPercentage)
    {
        $this->structureDmgPercentage = $structureDmgPercentage;
    }

    public function setWaterFoundationSubtraction($waterFoundationSubtraction)
    {
        $this->waterFoundationSubtraction = $waterFoundationSubtraction;
    }

    public function setInitialParameters($initialParameters)
    {
        $this->initialParameters = $initialParameters;
    }

    public function setCurveContentPercentage($contentCurvePercentage)
    {
        $this->contentCurvePercentage = $contentCurvePercentage;
    }

    /**
     * @return mixed
     */
    public function getBuildingQualityNumber()
    {
        return $this->buildingQualityNumber;
    }

    /**
     * @param mixed $buildingQualityNumber
     */
    public function setBuildingQualityNumber($buildingQualityNumber)
    {
        $this->buildingQualityNumber = $buildingQualityNumber;
    }

    /**
     * @return mixed
     */
    public function getCurveDamageID()
    {
        return $this->curveDamageID;
    }

    public function setCurveDamageID($curveDamageID)
    {
        $this->curveDamageID = $curveDamageID;
    }

    public function getCurveDamageNumber()
    {
        return $this->curveDamageNumber;
    }

    public function setCurveDamageNumber($curveDamageNumber)
    {
        $this->curveDamageNumber = $curveDamageNumber;
    }

    public function getAgeSubtraction()
    {
        return $this->ageSubtraction;
    }

    public function setAgeSubtraction($ageSubtraction)
    {
        $this->ageSubtraction = $ageSubtraction;
    }

    public function getBoIndex()
    {
        return $this->boIndex;
    }

    public function setBoIndex($boIndex)
    {
        $this->boIndex = $boIndex;
    }

    public function getAgeDeprecation()
    {
        return $this->ageDeprecation;
    }

    public function setAgeDeprecation($ageDeprecation)
    {
        $this->ageDeprecation = $ageDeprecation;
    }

    public function getSquareFootage()
    {
        return $this->squareFootage;
    }

    public function setSquareFootage($squareFootage)
    {
        $this->squareFootage = $squareFootage;
    }

    public function getGarageCost()
    {
        return $this->garageCost;
    }

    public function setGarageCost($garageCost)
    {
        $this->garageCost = $garageCost;
    }

    public function getExtraBasementCost()
    {
        return $this->extraBasementCost;
    }

    public function setExtraBasementCost($extraBasementCost)
    {
        $this->extraBasementCost = $extraBasementCost;
    }

    public function getBV()
    {
        return $this->buildingValuation;
    }

    public function setBV($buildingValuation)
    {
        $this->buildingValuation = $buildingValuation;
    }


    /**
     * @deprecated ?not used
     * TODO add the initial part here too
     * @param $initialParameters : the user given parameters from the url
     * @return array: the pair (objectName => value) array
     */
    public function toArray($initialParameters)
    {
        $wantedArray = array($initialParameters, array('buildingQualityNumber' => $this->buildingQualityNumber, 'curveDamageID' => $this->curveDamageID,
            'curveDamageNumber' => $this->curveDamageNumber, 'ageSubtraction' => $this->ageSubtraction,
            'ageDeprecation' => $this->ageDeprecation, 'squareFootage' => $this->squareFootage, 'garageCost' =>
                $this->garageCost, 'averageBasementCost' => $this->extraBasementCost,
            'basementExtraCost' => $this->basementExtraCost, 'buildingValuation' => $this->buildingValuation, 'boIndex' => $this->boIndex));
        //print_r($wantedArray);
        return $wantedArray;
    }

    //FIXME might need to add InitialParameters as object in StructuralResult since we need it in case of aggregation
    /**
     * @param $structuralResultArray : the computed Structural Result array
     */
    public static function printJSON($structuralResultArray)
    {
        header('Content-Type: text/plain');
        print(json_encode($structuralResultArray, JSON_PRETTY_PRINT));
    }

    /**
     * Prints the XML based on the given parameters:
     *
     * @param $initialParametersArray
     * @param $structuralResultsArray : the array containing all the StructuralResult objects
     * @param $totalBV: the total building valuation
     */
    public static function printXML($initialParametersArray, $structuralResultsArray, $totalBV)
    {
        $sxe = new SimpleXMLElement('<xml/>');
        for ($i = 0; $i < sizeof($structuralResultsArray); $i++)
        {
            $parent = $sxe->addChild('Part_' . ($i+1));
            $initial_Parameters = $parent->addChild('Initial_Parameters');
            foreach ($initialParametersArray[$i] as $key => $value)
            {
                $initial_Parameters->addChild($key, $value);
            }
            $computedParameters = $parent->addChild('Computed_Variables');
            $computedParameters->addChild('BuildingQualityNumber', $structuralResultsArray[$i]->buildingQualityNumber);
            $computedParameters->addChild('CurveDamageID', $structuralResultsArray[$i]->curveDamageID);
            $computedParameters->addChild('CurveDamageNumber', $structuralResultsArray[$i]->curveDamageNumber);
            $computedParameters->addChild('AgeSubtraction', $structuralResultsArray[$i]->ageSubtraction);
            $computedParameters->addChild('AgeDeprecation', $structuralResultsArray[$i]->ageDeprecation);
            $computedParameters->addChild('SquareFootage', $structuralResultsArray[$i]->squareFootage);
            $computedParameters->addChild('GarageCost', $structuralResultsArray[$i]->garageCost);
            $computedParameters->addChild('AverageBasementCost', $structuralResultsArray[$i]->averageBasementCost);
            $computedParameters->addChild('BasementExtraCost', $structuralResultsArray[$i]->basementExtraCost);
            $computedParameters->addChild('BoIndex', $structuralResultsArray[$i]->boIndex);
            $computedParameters->addChild('BuildingValuation', $structuralResultsArray[$i]->buildingValuation);
            $computedParameters->addChild('WaterFoundationSubtraction', $structuralResultsArray[$i]->waterFoundationSubtraction);
            $computedParameters->addChild('StructureDmgPercentage', $structuralResultsArray[$i]->structureDmgPercentage);
            $computedParameters->addChild('ContentDmgPercentage', $structuralResultsArray[$i]->contentPercentage);
            $computedParameters->addChild('ContentCurvePercentage', $structuralResultsArray[$i]->contentCurvePercentage);
        }
        $sxe->addChild('totalBuildingValuation',$totalBV);
        Header('Content-type: text/xml');
        print($sxe->asXML());
    }
}
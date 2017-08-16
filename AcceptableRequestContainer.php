<?php
/** @Author: Menelaos Kotsollaris
 * menelaos@mkotsollaris.com
 * All rights reserved ©
 */
class AcceptableRequestContainer
{
    private $coreParameters = array();
    private $subCoreParametersArray = array();

    public function AcceptableRequestContainer($coreParameters, $subCoreParametersArray)
    {
        $this->coreParameters = $coreParameters;
        $this->subCoreParametersArray = $subCoreParametersArray;
    }

    public function upgradeCoreParameters($coreParameters)
    {
        $this->coreParameters = $coreParameters;
    }

    public function getCoreParameters()
    {
        return $this->coreParameters;
    }

    public function getSubCoreParametersArray()
    {
        return $this->subCoreParametersArray;
    }

    public function upgradeSubCoreParameters($subCoreParameters)
    {
        $this->$subCoreParameters = $subCoreParameters;
    }
}
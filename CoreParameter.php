<?php
/** @Author: Menelaos Kotsollaris
 * menelaos@mkotsollaris.com
 * All rights reserved ©
 */
/**
 * CoreParameter appears only one time in the URL (e.g. request=GetDamages or Format=XML)
 */
class CoreParameter
{
    private $request;
    private $format;

    public function CoreParameter()
    {

    }

    public function updateKey($key, $value)
    {
        if (strcasecmp($key, AcceptableURLParameters::REQUEST) == 0)
        {
            $this->request = $value;
            return true;
        }
        else if(strcasecmp($key, AcceptableURLParameters::FORMAT) == 0)
        {
            $this->format = $value;
            return true;
        }
        throw new Exception("Invalid key: $key and value: $value .");
    }

    public function getRequest()
    {
        return $this->request;
    }

    public function getFormat()
    {
        return $this->format;
    }

    public function isValidSubCoreParameter()
    {
        return ($this->request != null);
    }
}
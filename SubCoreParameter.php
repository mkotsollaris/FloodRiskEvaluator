<?php
/** @Author: Menelaos Kotsollaris
 * menelaos@mkotsollaris.com
 * All rights reserved ©
 */
/**
 * Optional Parameters
 */
require_once('BuildingQuality.php');

class SubCoreParameter
{
    private $id;
    private $bc;
    private $bo;
    private $ft;
    private $yb;
    private $st;
    private $ba;
    private $ga;
    private $wd;
    private $wp;
    private $bq;//optional
    private $bv;//optional
    private $dc;//optional

    public function SubCoreParameter()
    {

    }

    public static function copy($subCoreParameter)
    {
        $newObject = new SubCoreParameter();
        $newObject->id = $subCoreParameter->getID();
        $newObject->bc = $subCoreParameter->getBC();
        $newObject->bo = $subCoreParameter->getBO();
        $newObject->ft = $subCoreParameter->getFT();
        $newObject->yb = $subCoreParameter->getYB();
        $newObject->st = $subCoreParameter->getST();
        $newObject->ba = $subCoreParameter->getBA();
        $newObject->ga = $subCoreParameter->getGA();
        $newObject->wd = $subCoreParameter->getWD();
        $newObject->wp = $subCoreParameter->getWP();
        $newObject->bq = $subCoreParameter->getBQ();
        $newObject->bv = $subCoreParameter->getBV();
        $newObject->dc = $subCoreParameter->getDC();
        return $newObject;
    }

    public function setWP($wp)
    {
        $this->wp = $wp;
    }

    public function setWD($wd)
    {
        $this->wd = $wd;
    }

    public function getID()
    {
        return $this->id;
    }

    public function getBC()
    {
        return $this->bc;
    }

    public function getBO()
    {
        return $this->bo;
    }

    public function getFT()
    {
        return $this->ft;
    }

    public function getYB()
    {
        return $this->yb;
    }

    public function getST()
    {
        return $this->st;
    }

    public function getBA()
    {
        return $this->ba;
    }

    public function getGA()
    {
        return $this->ga;
    }

    public function getWD()
    {
        return $this->wd;
    }

    public function getWP()
    {
        /*if($this->wp == null)
        {
            $this->wp = 100;
        }*/
        return $this->wp;
    }

    public function getBQ()
    {
        if($this->bq == null) $this->bq = BuildingQuality::AVERAGE;
        return $this->bq;
    }

    public function getBV()
    {
        return $this->bv;
    }

    public function getDC()
    {
        return $this->dc;
    }


    /**
     * @param $key : The key
     * @param $value : The key's value
     * @return bool: true if updates; else false
     */
    public function updateKey($key, $value)
    {
        if (strcasecmp($key, AcceptableURLParameters::ID) == 0)
        {
            $this->id = $value;
            return true;
        }
        elseif (strcasecmp($key, AcceptableURLParameters::BC) == 0)
        {
            $this->bc = $value;
            return true;
        }
        elseif (strcasecmp($key, AcceptableURLParameters::BO) == 0)
        {
            $this->bo = $value;
            return true;
        }
        elseif (strcasecmp($key, AcceptableURLParameters::FT) == 0)
        {
            $this->ft = $value;
            return true;
        }
        elseif (strcasecmp($key, AcceptableURLParameters::YB) == 0)
        {
            $this->yb = $value;
            return true;
        }
        elseif (strcasecmp($key, AcceptableURLParameters::ST) == 0)
        {
            $this->st = $value;
            return true;
        }
        elseif (strcasecmp($key, AcceptableURLParameters::BA) == 0)
        {
            $this->ba = $value;
            return true;
        }
        elseif (strcasecmp($key, AcceptableURLParameters::GA) == 0)
        {
            $this->ga = $value;
            return true;
        }
        elseif (strcasecmp($key, AcceptableURLParameters::WD) == 0)
        {
            $this->wd = $value;
            return true;
        }
        elseif (strcasecmp($key, AcceptableURLParameters::WP) == 0)
        {
            $this->wp = $value;
            return true;
        }
        elseif (strcasecmp($key, AcceptableURLParameters::BQ) == 0)
        {
            $this->bq = $value;
            return true;
        }
        elseif (strcasecmp($key, AcceptableURLParameters::BV) == 0)
        {
            $this->bv = $value;
            return true;
        }
        elseif (strcasecmp($key, AcceptableURLParameters::DC) == 0)
        {
            $this->dc = $value;
            return true;
        }
        return false;
    }

    /**
     * Checks if SubCoreParameter is valid. Note that it does not check about values validity. It only checks if the parameters are not null.
     * Value validity is examined while updating values.
     */
    public function isValidSubCoreParameter()
    {
        return ($this->id != null && $this->bc != null && $this->bo != null && $this->ft != null && $this->yb != null && $this->st != null &&
            $this->ba != null && $this->ga != null && $this->wd != null);
    }
}
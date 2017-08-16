<?php
/** @Author: Menelaos Kotsollaris
 * menelaos@mkotsollaris.com
 * All rights reserved ©
 */

class Foundation
{
    private $userInput;
    private $type;
    private $height;

    public function Foundation($userInput)
    {
        $this->$userInput = $userInput;
        switch($userInput)
        {
            case 0:
                $this->height = 0;
                $this->type = 0;
                break;
            case 1:
                $this->height = "Slab on Grade";
                $this->type = 1;
                break;
            case 2:
                $this->height = "Fill";
                $this->type = 2;
                break;
            case 3:
                $this->height = "Crawl Space";
                $this->type = 3;
                break;
            case 4:
                $this->height = "Basement/Garden";
                $this->type = 4;
                break;
            case 5:
                $this->height = "Pier";
                $this->type = 5;
                break;
            case 6:
                $this->height = "Solid Wall";
                $this->type = 6;
                break;
            case 7:
                $this->height = "Pile";
                $this->type = 8;
                break;
        }
    }
    public function getHeight()
    {
        return $this->height;
    }

    public function getType()
    {
        return $this->type;
    }
}
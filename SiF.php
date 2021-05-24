<?php

//-----Pattern Factory-----//
//Seek in File
abstract class SiF
{
    abstract function str(): Args ;

    public function out()
    {
        $find = $this->str();
        $find->getPosition();
    }
}

//Arguments
interface Args
{
    public function getPosition() ;
}

//----Clents Classes----
class Find extends SiF implements Args
{
    private $path;
    private $str;

    public function __construct($p, $s)
    {
        $this->path = $p;
        $this->str = $s;
    }

    function str(): Args
    {
        // TODO: Implement str() method.
        return new find($this->path, $this->str);
    }

    public function getPosition()
    {
        // TODO: Implement get_position() method.
        if ($file = fopen($this->path,"r")) {
            $string_number = 0;
            $position = 0;
            while(($line = fgets($file,4096)) !== false && !$position) {
                $string_number++;
                if(strpos($line,$this->str) !== false) {
                    $position = strpos($line,$this->str);
                }
            }
            echo 'номер строки: ' . $string_number . ', позиция: ' . ($position+1);
        } else {
            echo 'ничего не вышло';
        }
    }
}

<?php

//-----Pattern Factory-----//
//Seek in File
abstract class SiF
{
    abstract function str(): Args ;

    public function out()
    {
        $find = $this->str();
        $find->get_position();
    }
}

//Arguments
interface Args
{
    public function get_position() ;
}

//----Clents Classes----
class find extends SiF implements Args
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

    public function get_position()
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
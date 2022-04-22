<?php

namespace FarsiPoem\App;

use FarsiPoem\Drivers\Ganjoor as Driver;
use FarsiPoem\App\History;

class App 
{
    use Driver, History;

    public function verses(Int $count = 0) 
    {
        if ($count >= count($this->verses)) {
            return $this->verses;
        }

        $verses = array();

        for($i = 0; $i < $count; $i++) {
            array_push($verses, $this->verses[$i]);
        }

        return $verses;
    }
    
    public function versesAsPlain(Int $count = 0, String $separator = ' / ')
    {
        if ($count >= count($this->verses) || $count == 0) {

            $count = count($this->verses);

        }

        $verses = '';

        for($i = 0; $i < $count; $i++) {
            $verses .= $this->verses[$i]->text;

            if ($i < $count - 1) {
                $verses .= $separator;
            }
        }

        return $verses;
    }  
}
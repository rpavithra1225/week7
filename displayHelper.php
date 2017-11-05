<?php

class displayHelper 
{

    // Prints the string passed as an argument
    static public function printString($string) {
       return print($string);
     }

    static public function displayData($tableRow,$isTableHeader) {

        $table = htmlTagsHelper::tableRowStart();
        //$i=0;
        foreach ($tableRow as $val) {
            if ($isTableHeader) {
                    $table.= htmlTagsHelper::tableHeadStart();
                    $table.= $val;
                    $table.= htmlTagsHelper::tableHeadEnd();
                    //$i++;
            } else {
                    $table .= htmlTagsHelper::tableDataStart();
                    $table .= $val;
                    $table .= htmlTagsHelper::tableDataEnd();
                    //$i++;
            }
        }
        $table .= htmlTagsHelper::tableRowEnd();
        return $table;
    }

    static public function strReplace($source, $dest, $str) {
        return str_replace($source, $dest, $str);
    }

    static public function getEmptyStr() {
        return " ";
    }
}



?>
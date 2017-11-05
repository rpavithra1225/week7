<?php

class htmlTagsHelper {

    static public function headingOne ($str, $center) {
        if(!isset($center)) {
            $center = 'left';
        }
        return "<h1 align='$center'> $str </h1>";
    }

    static public function headingThree ($str) {
        return "<h3> $str </h3>";
    }

    static public function paragraph ($str) {
        return "<p> $str </p>";
    }

    static public function tableRowStart () {
        return '<tr>';
    }


    static public function tableRowEnd () {
        return '</tr>';
    }

    static public function tableDataStart () {
        return '<td>';
    }

    static public function tableDataEnd () {
        return '</td>';
    }

    static public function tableHeadStart () {
        return '<th>';
    }

    static public function tableHeadEnd () {
        return '</th>';
    }

    static public function tableStart () {
            return '<table>';
    }


    static public function tableEnd () {
        return '</table>';
    }

    static public function divStart ($id) {
        if (isset($id)) {
            return "<div class='$id'>";
        } else {
            return '<div>';    
        }
        
    }

    static public function divEnd () {
        return '</div>';
    }

    static public function htmlStart () {
        return '<html>';
    }

    static public function htmlEnd () {
        return '</html>';
    }

    static public function bodyStart () {
        return '<body>';
    }

    static public function bodyEnd () {
        return '</body>';

    }

    static public function inputStart ($type, $name, $id, $val) {
        return "<input type='$type' name='$name' id='$id' value='$val'>";
    }


    static public function formStart ($action, $method, $enctype) {
        return "<form action='$action' method='$method' enctype='$enctype'>";
    }


    static public function formEnd () {
        return '</form>';
    }

    static public function getcss($cssFile) {
     return "<link rel='stylesheet' href='$cssFile'>";
    }

    static public function getlinebreak() {
     return '</br>';
    }

    static public function getLabel($id,$str) {
        return "<label for='$id'>".$str."</label>";
    }
}

?>
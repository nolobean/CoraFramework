<?php namespace App\Util;
use Core\Exception;
class Helper{
    public static function dateFormat($fdate, $format ='d/m/Y'){
        return date($format, strtotime($fdate));
    }
    public static function getMesNombre($numero){
        $meses = ['No Definido','Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];
        return $meses[$numero];
    }
    public static function listToJson($arr){
         return json_encode($arr);
    }
    //TODO: testear restriccion
    public static function jsonToList($json){
        //tomar en cuenta lo siguiente
        // los siguientes string son válidos en JavaScript pero no en JSON
        // el nombre y el valor deben estar entre comillas dobles
        // las comillas simples no son válidas
        //http://php.net/manual/es/function.json-decode.php
        $contents = utf8_encode($json);
        $list= json_decode($contents, true);
        if($list==null) {
             return [];
        }
        return $list;
    }
    public static function hash($password){
        return sha1($password);
    }
    public static function sanear_string($string){

        $string = trim($string);
        $string = str_replace(
            array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
            array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
            $string
        );

        $string = str_replace(
            array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
            array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
            $string
        );

        $string = str_replace(
            array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
            array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
            $string
        );

        $string = str_replace(
            array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
            array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
            $string
        );

        $string = str_replace(
            array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
            array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
            $string
        );

        $string = str_replace(
            array('ñ', 'Ñ', 'ç', 'Ç'),
            array('n', 'N', 'c', 'C',),
            $string
        );

        //Esta parte se encarga de eliminar cualquier caracter extraño
        $string = str_replace(
            array("\\", "¨", "º", "-", "~",
                "#", "@", "|", "!", "\"",
                "$", "%", "&", "/",
                "(", ")", "?", "'", "¡",
                "¿", "[", "^", "`", "]",
                "+", "}", "{", "¨", "´",
                ">", "< ", ";", ",", ":",
                " "),
            '',
            $string
        );

        return $string;
    }
}
<?php
class Lib{

    public static function lTrimAll($data_trim){
        print_r($data);
        echo '1';
        foreach ($data_trim as $key => $value) {
            $data[$key] = $value;
            $data[$key] = ltrim($data[$value]);
            echo $data[$key];
            echo '1111';
            exit;
        }
        return $data;

    }

        public static function tst($data = array()){

            return $data;

        }

}
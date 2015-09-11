<?php
class Lib{

    public static function lTrimAll($data_trim){
        print_r($data);
        echo '1';
        foreach ($data_trim as $key => $value) {
            $data[$key] = $value;
            $data[$key] = ltrim($data[$value]);
            echo $data[$key];
            echo '1';
        }



        return $data;
        /*
        if(!is_array($data_trim)) {
            $data_trim = ltrim($data_trim);
        } else {
            $data_trim = array_map('lTrimAll',$data_trim);
        }
        return $data_trim;
    }
        */
    }


}
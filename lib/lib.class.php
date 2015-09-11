<?php
class lib{

    public static function lTrimAll($data_trim) {
        if(!is_array($data_trim)) {
            $data_trim = ltrim($data_trim);
        } else {
            $data_trim = array_map('lTrimAll',$data_trim);
        }
        return $data_trim;
    }




}
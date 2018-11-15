<?php

/**
 * Created by PhpStorm.
 * User: mac
 * Date: 11/15/18
 * Time: 5:20 PM
 */
namespace common\helpers;

class DateHelper
{
    public static function dateFormat($date, $format){
        return date($format, strtotime($date));
    }

}
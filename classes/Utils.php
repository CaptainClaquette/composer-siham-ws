<?php
namespace hakuryo\sihamWSClient;

use DateTime;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of utils
 *
 * @author dere01
 */
class Utils {

    public static function format_date(string $date_as_string): DateTime {
        return DateTime::createFromFormat("Y-m-d", preg_replace('/T.*/', "", $date_as_string));
    }

}

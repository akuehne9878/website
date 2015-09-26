<?php
/**
 * Created by PhpStorm.
 * User: aku
 * Date: 31.05.2015
 * Time: 17:59
 */

namespace website\application;


class ApplicationUtils {

    // Create the function, so you can use it
    public static function isMobile() {
        return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
    }

}
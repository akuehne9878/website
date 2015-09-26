<?php
/**
 * Created by PhpStorm.
 * User: aku
 * Date: 23.05.2015
 * Time: 13:37
 */

namespace website\application\presentation\views;


use Commons\view\View;

class Error404View extends View {

    public function __construct() {
        parent::__construct ( "website/application/presentation/templates/404.html" );
    }

}
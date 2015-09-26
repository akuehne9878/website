<?php

namespace website\application\presentation\views\sections;

use Commons\view\View;

/**
 * HomeView
 */
class HomeView extends View {
	public function __construct() {
		parent::__construct ( "website/application/presentation/templates/sections/home.php" );
	}
}

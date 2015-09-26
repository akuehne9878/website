<?php

namespace website\application\presentation\views\singlepages;

use Commons\view\View;

/**
 * MailView
 */
class MailView extends View {
	private $success;
	public function __construct() {
		parent::__construct ( "website/application/presentation/templates/singlepages/mail.php" );
	}
	public function setSuccess($success) {
		$this->success = $success;
	}
	public function getSuccess() {
		return $this->success;
	}
}

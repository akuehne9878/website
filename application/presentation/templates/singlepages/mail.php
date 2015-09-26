<div class="container singlepage">
	<div class="row">
		<div class="col-md-12">
			<h1 class="centered">
			
			<?php if ($this->getSuccess()) { ?>
			<p>NACHRICHT GESENDET</p>
			<?php } else { ?>
			<p>NICHT GESENDET</p>
			<?php }?>
			
			</h1>
		</div>
		<hr>
	</div>
	<div class="row">
		<div class="col-lg-8 col-lg-offset-2 centered">
		
			<?php if ($this->getSuccess()) { ?>
			<p>Vielen Dank für deine Nachricht. Wir werden sie so schnell wie möglich bearbeiten.</p>
			<?php } else { ?>
			<p>Ups,... da ist wohl was schief gegangen. Bitte versuche es erneut.</p>
			<?php }?>
			
			<a class="singlepage_link" href="/">zurück zur Hauptseite</a>

		</div>
	</div>
</div>

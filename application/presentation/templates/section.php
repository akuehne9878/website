<section id="<?php echo $this->getId() ?>">

	<div class="container">
	<?php if ($this->getTitle()) { ?>
		<div class="row">
			<div class="col-md-12">
				<h1 class="centered"><?php echo $this->getTitle() ?></h1>
			</div>
			<hr>
		</div>
	<?php } ?>
	</div>

	<?php
	if ($this->getChildView () != null) {
		$this->getChildView ()->render ();
	}
	?>	
</section>
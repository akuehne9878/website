<section id="<?php echo $this->getId() ?>">

    <div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1 class="centered"><?php echo $this->getTitle() ?></h1>
			</div>
			<hr>
		</div>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="event-list">
					<ul class="event-list-view">
				<?php $events = $this->getEvents(); ?>
				<?php foreach ($events as $event) { ?>
				<li class="event ">
					<?php $event->render(); ?>
				</li>		
				<?php	} ?>				
			</ul>
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
</section>
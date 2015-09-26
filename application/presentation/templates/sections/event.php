
<div class="row">
	<div class="col-md-12">
		<div class="event ">
			<div class="event-date">
				<div class="start-date">
					<div class="event-weekday"><?php echo $this->getEventWeekday(); ?></div>
					<div class="event-day"><?php echo $this->getEventDay(); ?></div>
					<div class="event-month"><?php echo $this->getEventMonth(); ?></div>
					<div class="event-year"><?php echo $this->getEventYear(); ?></div>
				</div>
			</div>
			<div class="event-info single-day">
				<div class="event-title">
					<h3><?php echo $this->getTitle(); ?></h3>
				</div>
				<span class="event-location"><?php echo $this->getLocation();?></span>
				<div class="event-details">
					<p>
						<a href="<?php echo  $this->getEventLink(); ?>"><?php echo  $this->getEventLinkName(); ?></a>
					</p>
				</div>
			</div>
		</div>
	</div>
</div>
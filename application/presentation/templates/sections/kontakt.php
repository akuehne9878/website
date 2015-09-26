<section id="<?php echo $this->getId() ?>">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1 class="centered"><?php echo $this->getTitle() ?></h1>
			</div>
			<hr>
		</div>
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2 centered">

				<p>über unsere Facebook Seite:</p>

				<div class="fb-like-box centered" data-href="http://www.facebook.com/rk-musik" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="false" data-show-border="true"></div>

				<p></p>
				<p>oder direkt an uns:</p>
				<form role="form" action="/mail" method="post">
					<div class="row">
						<div class="col-xs-6 col-md-6 form-group">
							<input class="form-control" id="name" name="name" placeholder="Name" type="text" required />
						</div>
						<div class="col-xs-6 col-md-6 form-group">
							<input class="form-control" id="email" name="email" placeholder="Email" type="email" required />
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-md-12">
							<textarea class="form-control" id="message" name="message" placeholder="Nachricht" rows="5"></textarea>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-md-12">
							<button class="btn btn-default" type="submit">Abschicken</button>
						</div>
					</div>
				</form>

			</div>
		</div>
	</div>
</section>

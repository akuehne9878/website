<section id="<?php echo $this->getId() ?>" <?php if ($this->getHidden()) { echo 'style="display:none"';} ?>  >
	<div class="container-fluid">

		<div class="filter-options centered">
		
			<?php
			
			if (sizeof ( $this->getGalleries () ) > 1) {
				foreach ( $this->getGalleries () as $gallery ) {
					echo '<button class="btn btn-default" data-group="' . $gallery->getName () . '">' . $gallery->getName () . '</button>';
				}
			}
			?>
		
		</div>


		<div id="grid" class="row-fluid">
		
			<?php
			
			foreach ( $this->getGalleryItemViews () as $galleryItemView ) {
				$galleryItemView->render ();
			}
			?>

		</div>
		<!-- /#grid -->
		<br>
		<div class="centered">
			<button id="morePhotos" class="btn btn-default">Weitere Fotos anzeigen</button>
		</div>

	</div>
	<!-- /.container -->


	<!-- The Gallery as lightbox dialog, should be a child element of the document body -->
	<div id="blueimp-gallery" class="blueimp-gallery">
		<div class="slides"></div>
		<h3 class="title"></h3>
		<a class="prev">‹</a> <a class="next">›</a> <a class="close">×</a> <a class="play-pause"></a>
		<ol class="indicator"></ol>
	</div>

</section>

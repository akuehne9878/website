
		<footer>
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<span class="copyright">Copyright &copy; <?php echo date("Y"); ?> raumklang</span>
						| <a href="impressum">impressum</a>
					</div>
					<div class="col-md-8">
						<div>
						<ul class="footer-nav">							
							<?php  $items = $this->getSections(); ?>
							<?php for ($i = 0; $i < sizeof($items); $i++) { ?>
								<?php $item = $items[$i];?>
								<li><a class="page-scroll" href="<?php if ($this->getSectionsAndNavigationOnSamePage() == false) { echo "/"; }  echo "#". $item->getId(); ?>"><?php echo $item->getTitle(); ?></a></li>
								<?php if ($i != (sizeof($items)-1)) {?>
								<li>|</li>
								<?php }?>
							<?php } ?>							
						</ul>
						</div>
					</div>
				</div>
			</div>
		</footer>		
		<!-- JS -->
		<script data-main="/website/htdocs/js/main" src="/website/htdocs/js/vendor/require.js"></script>
	</body>
</html>
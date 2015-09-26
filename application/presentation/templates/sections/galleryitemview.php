<figure class="picture-item" data-groups='["<?php echo $this->getDataGroup(); ?>"]'>
    <a href="<?php echo $this->getContentLink(); ?>"
       data-gallery="#blueimp-gallery-<?php echo $this->getDataGroup(); ?>">
        <div class="picholder">
            <img class="img-responsive" src="<?php echo $this->getThumbnailLink(); ?>"/>
            <div class="overlay"></div>
        </div>
    </a>
</figure>

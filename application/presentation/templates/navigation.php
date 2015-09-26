<!-- Navigation -->
<nav class="navbar navbar-custom navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target=".navbar-main-collapse" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-right navbar-main-collapse ">
            <ul id="primary-nav" class="nav navbar-nav">
                <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                <li class="hidden"><a href="#page-top"></a></li>
                <?php $items = $this->getSections(); ?>
                <?php foreach ($items as $item) { ?>

                    <?php if (website\application\ApplicationUtils::isMobile()) { ?>
                        <li><a class="page-scroll" data-toggle="collapse" data-target=".navbar-main-collapse" href="<?php if ($this->getSectionsAndNavigationOnSamePage() == false) {echo "/"; } echo "#" . $item->getId(); ?>"><?php echo $item->getTitle(); ?></a></li>
                    <?php } else { ?>
                        <li><a class="page-scroll" href="<?php if ($this->getSectionsAndNavigationOnSamePage() == false) { echo "/"; } echo "#" . $item->getId(); ?>"><?php echo $item->getTitle(); ?></a></li>
                    <?php } ?>

                <?php } ?>
            </ul>
        </div>

        <div class="collapse navbar-collapse navbar-left navbar-main-collapse ">
            <ul id="secondary-nav" class="nav navbar-nav">
                <li class="project"><a href="/projekt">projekt</a></li>
            </ul>
        </div>

        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

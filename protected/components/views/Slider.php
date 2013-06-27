
<div id="top_caurosel" class="carousel slide">
        <!-- Carousel items -->
        <div class="carousel-inner">
            <div class="active item">
                <?php foreach($banner as $key=>$bannerx){?>
                <img src="<?php echo Yii::app()->request->baseUrl.'/'.$bannerx->banner_image; ?>" alt="" />
                <h3 class="slide-caption">Lorem Ipsum<strong>Lorem Ipsum</strong></h3>
                <?php } ?>
            </div>
            <div class="item">
            	<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/banner-item-2.jpg" alt="" />
                <h3 class="slide-caption">Lorem Ipsum<strong>Lorem Ipsum</strong></h3>
            </div>
        </div>
        <!-- Carousel nav -->
        <div class="arrow_holder">
            <a class="carousel-control left" href="#top_caurosel" data-slide="prev">&lsaquo;</a>
            <a class="carousel-control right" href="#top_caurosel" data-slide="next">&rsaquo;</a>
        </div>
    </div>
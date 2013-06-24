<a href="#" class="sub-button"><span><?php echo $model->name; ?></span></a>
    <div class="subcontent clearfix">
    	<div class="slide-pannel">
        	<?php if($gallery){?>
            <div class="carousel-wrapper">
                <ul class="bxslider">
                    <?php foreach($gallery as $img){ ?>
                    <li><img src="<?php echo Yii::app()->request->baseUrl;?>/gallery/<?php echo $img->product_id.'/'. $img->full_image;?>" width="440" height="493" /></li>
                     <?php }?>
                </ul>
                <div id="bx-pager" class="clearfix">
                    <?php $i = 0; foreach($gallery as $img){ ?>
                  <a data-slide-index="<?php echo $i;?>" href=""><img src="<?php echo Yii::app()->request->baseUrl;?>/gallery/<?php echo $img->product_id.'/thumbs/'. $img->thumb_image;?>" width="66" height="66" /></a>
                    <?php $i++; }?>
                </div>
                
            </div>
        	<?php }else{ ?> 
                    <div class="carousel-wrapper">
                <ul class="bxslider">
                    <li><img src="<?php echo Yii::app()->request->baseUrl;?>/images/Le-Loft-Villa-Villa-deck.jpg" width="440" height="493" /></li>
                </ul>
                <div id="bx-pager" class="clearfix">
                  <a data-slide-index="0" href=""><img src="<?php echo Yii::app()->request->baseUrl;?>/images/Le-Loft-Villa-Villa-deck.jpg" width="66" height="66" /></a>
                </div>
               </div>
                    <?php }?>
            <div class="slide-bottom-info">
            	<h4>עשייתית</h4>
                <div>
                    <strong>יתית:</strong> תע תעשי<br />
                    <strong>יתית תע:</strong> תעשייתית תעשייתית תע תעשי<br />
                    <strong>יתית תעתע:</strong> תע תעשי<br />
                    <strong>תעשי:</strong> 054-9090145<br />
                    <strong>יתית:</strong> <a href="http://www.villgilla.co.li" target="_blank">http://www.villgilla.co.li</a> 
                </div>
            </div>
        	<a href="#" class="map-trigger-link">&nbsp;</a>
        </div>
        <div class="info-pannel">
        	<div class="info-desk">
            	<h3>המושלם לחיבור</h3>
                <p><strong>הפתרון</strong> המושלם לחיבור, אטימה ומניעת רעידות. פתרון חדשני לתחום הטיפול חדשני לתחום פתרון חדשני לתחום הטיפול באבקות 100% אטימה לאבק בזכות החיבור הגמיש ביותר פתרון עומד בסטנדרטים ההיגייניים הגבוהים ביותר פתרון חדשני</p>
                <p><strong>הפתרון</strong> המושלם לחיבור, אטימה ומניעת רעידות. פתרון חדשני לתחום הטיפול חדשני לתחום פתרון חדשני לתחום הטיפול באבקות 100% אטימה לאבק בזכות החיבור הגמיש ביותר פתרון עומד בסטנדרטים ההיגייניים הגבוהים ביותר פתרון חדשני חדשני לתחום הטיפול באבקות 100% אטימה לאבק בזכות החיבור הגמיש ביותר פתרון עומד</p>
                <p>הפתרוןהמושלם לחיבור, אטימה ומניעת רעידות. פתרון חדשני לתחום הטיפול חדשני לתחום פתרון חדשני לתחום הטיפול באבקות 100% אטימה לאבק בזכות החיבור הגמיש ביותר</p>
                <p>הפתרוןהמושלם לחיבור, אטימה ומניעת רעידות. פתרון חדשני לתחום הטיפול חדשני</p>
            </div>
            
            <div class="subwhite-box">
            	<h4>חדשני לתחום </h4>
                <form action="#" class="jNice no-margin clearfix">
                    <ul class="search-options-col subwhite-checks clearfix" id="fixes">
                        <li class="options-col">
                            <ul id="double" class="options-list">
                                <?php if($filters){ foreach( $filters as $filter){ ?>
                                <li class="dark-gray"><?php echo $filter->title?><input type="checkbox" value="" /></li>
                                <?php } }else { ?>
                                    <li class="dark-gray"><?php echo "No Features found"?></li>
                                    <?php }?>
                               
                            </ul>
                        </li>
                      </ul>
                </form>
            </div>
            
            <div class="clearfix">
            	<div class="fb-place"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/fb-place.jpg" alt="" ></div>
                <a href="#" class="fb-like-plc"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/fb-btn.gif" alt="" /></a>
            </div>
        </div>
    </div>
    
    <div class="sub-bottom-line">
        <h4 class="bottom-title">תעשייתית תע</h4>
        <ul class="bottom-series clearfix">
        	<li class="no-margin">
            	<span class="thumb"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/sub-bottom-thumb.jpg" alt="" width="127" height="124" /></span>
                <div class="caption">תעשייתית תע תעשייתית תע תעש</div>
            </li>
            <li>
            	<span class="thumb"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/sub-bottom-thumb.jpg" alt="" width="127" height="124" /></span>
                <div class="caption">תעשייתית תע תעשייתית תע תעש</div>
            </li>
            <li>
            	<span class="thumb"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/sub-bottom-thumb.jpg" alt="" width="127" height="124" /></span>
                <div class="caption">תעשייתית תע תעשייתית תע תעש</div>
            </li>
            <li>
            	<span class="thumb"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/sub-bottom-thumb.jpg" alt="" width="127" height="124" /></span>
                <div class="caption">תעשייתית תע תעשייתית תע תעש</div>
            </li>
            <li>
            	<span class="thumb"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/sub-bottom-thumb.jpg" alt="" width="127" height="124" /></span>
                <div class="caption">תעשייתית תע תעשייתית תע תעש</div>
            </li>
        </ul>
    </div>
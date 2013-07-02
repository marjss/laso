<li class="result-item" rel="<?php echo $data['id'];?>">
            	<div class="result-padder">
                	<div class="result-content">
                    	<h4 class="title-bar"><?php echo $data['name'];  ?></h4>
                        <div>
                                <?php   $avatarimage = Yii::app()->request->baseUrl."/".$data['avatar'];
                                        $avatar = CHtml::image($avatarimage);
                                ?>
                        	<?php echo CHtml::Link($avatar,$this->createUrl(('site/subsite'),array('id'=>$data['id'])),array('class'=>'thumb','width'=>'218','height'=>'242'));?> 
                        	<p><?php echo $data['description'];?></p>
                            <div class="clearfix">
                                <?php // echo CHtml::Link('compare',$this->createUrl(('hotels/compare')),array('class'=>'result-item-btn'));?> 
                            	<a href="#" class="result-item-btn">חדשני לתחום</a>
                                <span class="clearfix item-chooser">חדשני לתחום 
                                    <!--<input type="checkbox" value="<?php // echo $data['id'];?>" class="chek"/>-->
                                <?php echo CHtml::CheckBox($data['id'],'',array('class'=>'chek','checked'=>false)); ?>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            
     
        

<style type="text/css">
            #vertical-2 thead,#vertical-2 tbody{
                display:inline-block;
                width: 20%;
            }

        </style>
<div class="datatable">
 
    	<ul class="data-thumbs clearfix">
            <?php foreach ($dataProvider as $id){
                  $model = Hotels::model()->findByPk($id);?>
             
        	<li>
            	<div class="data-thumb-item">
                	<a href="#"><img src="<?php echo Yii::app()->request->baseUrl.'/'.$model->avatar; ?>" alt="" width="166" height="166" /></a>
                    <span class="thumb-caption"><a href="#"><?php echo $model->name; ?></a></span>
                    <div class="data-thumb-action"><a href="#">&nbsp;</a></div>
                </div>
            </li>
            <?php  }?>
             <li class="last"><h4>תעשייתית תעש</h4></li>
        </ul>
        <h4 class="table-title">תעשייתית תעש</h4>
        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="data-statistick">
          <tr> 
          <td width="20%" class="first-col"><?php echo $model->getAttributeLabel('area');?></td>
          <?php foreach ($dataProvider as $id){
                  $model = Hotels::model()->findByPk($id);?>
            <td><?php echo $model->area;?></td>
            <?php } ?>
          </tr>
          <tr class="even">
              <td class="first-col"><?php echo $model->getAttributeLabel('city');?></td>
            <?php foreach ($dataProvider as $id){
                  $model = Hotels::model()->findByPk($id);?>
            <td><?php echo $model->city;?></td>
            <?php } ?>
            
          </tr>
          <tr>
            <td class="first-col"><?php echo $model->getAttributeLabel('capacity');?></td>
            <?php foreach ($dataProvider as $id){
                  $model = Hotels::model()->findByPk($id);?>
            <td><?php echo $model->capacity;?></td>
            <?php } ?>
          </tr>
          <tr class="even">
            <td class="first-col"><?php echo $model->getAttributeLabel('email');?></td>
             <?php foreach ($dataProvider as $id){
                  $model = Hotels::model()->findByPk($id);?>
            <td><?php echo $model->email;?></td>
            <?php } ?>
          </tr>
          <tr>
            <td class="first-col"><?php echo $model->getAttributeLabel('phone');?></td>
           <?php foreach ($dataProvider as $id){
                  $model = Hotels::model()->findByPk($id);?>
            <td><?php echo $model->phone;?></td>
            <?php } ?>
          </tr>
          <tr class="even">
            <td class="first-col"><?php echo $model->getAttributeLabel('website');?></td>
            <?php foreach ($dataProvider as $id){
                  $model = Hotels::model()->findByPk($id);?>
            <td><a href="<?php echo $model->website;?>"><?php echo $model->website;?></a></td>
            <?php } ?>
          </tr>
        </table>
        
        <h4 class="table-title">תעשייתית תעש</h4>
        <?php $filters = Filters::model()->findAll();?>
        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="data-statistick" id="vertical-2">
          <thead>
             <?php foreach ($filters as $key=>$filter){ if($key%2){$odd='even';}else{$odd='';}?>
               <tr class="<?php echo $odd ;?>">
                    <td class ="first-col" width="20%" ><?php echo $filter['title']; ?></th>
               </tr>
               <?php }?>
         </thead>
                <?php foreach ($dataProvider as $id){
                  $model = Hotels::model()->findByPk($id);?>
                <tbody>
                    <?php $modelfilter = HotelFilters::model()->findAllByAttributes(array('hotel_id'=>$id)); 
                    foreach ($filters as $key=>$filter){if($key%2){$odd='even';}else{$odd=''; } ?> 
                 <tr class="<?php echo $odd ;?>"> 
                     <td width="20%">
                       <?php  foreach($modelfilter as $kr=>$modelfil){ ?>
                        <?php if($modelfil->filter_id == $filter->id)
                           echo $img ='<img src="'.Yii::app()->request->baseUrl.'/images/v_icon.png" alt="Yes" class="try" />'; ?>
                        <?php  }    ?>
                       <?php echo $img ='<img src="'. Yii::app()->request->baseUrl.'/images/x_icon.png" alt="No" />';   ?>
                     </td>
                 </tr>
                 <?php }?>
                </tbody>
                <?php }?>
        </table>
         
<!--        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="data-statistick">
         
            <tr class="even">
            <td class="first-col" width="20%">test</td>
            <td width="20%"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/v_icon.png" alt="Yes" /></td>
            <td width="20%" class="last-col"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/v_icon.png" alt="Yes" /></td>
            <td width="20%"></td>
            <td width="20%"  class="last-col"></td>
          </tr>
          <tr>
            <td class="first-col">two</td>
            <td><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/x_icon.png" alt="No" /></td>
            <td class="last-col"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/x_icon.png" alt="No" /></td>
          </tr>
         </table>-->
    </div>
        <script>
          if ($("tr:has(img.try)").length > 0) {
                $('.try').next('img').css('display','none');
            }
       </script>
<div class="datatable">
  <?php  
  
  /*$this->widget('zii.widgets.grid.CGridView', array(
                    'id'=>'products-compared-grid',
                    'dataProvider'=>$comparisonDataProvider,
                    'enablePagination'=>false,
                    'summaryText'=>'',
                    'htmlOptions'=>array('class'=>'datatable'),
                    'columns'=>
//      $columnsArray
      array(
             array(            
            'name'=>'newColumn',
            //call the method 'gridDataColumn' from the controller
            'value'=>array($this,'gridDataName'), 
        ),
                         array(            
            'name'=>'newColumn',
            //call the method 'gridDataColumn' from the controller
            'value'=>array($this,'gridDataDesc'), 
        ),
                        ),
      
                    
                )); */?>
    <?php              echo '<pre>';
              print_r($dataProvider);
              echo '</pre>';
//              die; ?>
    	<ul class="data-thumbs clearfix">
        	<li>
            	<div class="data-thumb-item">
                	<a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/data-thumb-2.jpg" alt="" width="166" height="166" /></a>
                    <span class="thumb-caption"><a href="#">תעשייתית תעש</a></span>
                    <div class="data-thumb-action"><a href="#">&nbsp;</a></div>
                </div>
            </li>
            <li>
            	<div class="data-thumb-item">
                	<a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/data-thumb-3.jpg" alt="" width="166" height="166" /></a>
                    <span class="thumb-caption"><a href="#">תעשייתית תעש</a></span>
                    <div class="data-thumb-action"><a href="#">&nbsp;</a></div>
                </div>
            </li>
            <li>
            	<div class="data-thumb-item">
                	<a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/data-thumb-4.jpg" alt="" width="166" height="166" /></a>
                    <span class="thumb-caption"><a href="#">תעשייתית תעש</a></span>
                    <div class="data-thumb-action"><a href="#">&nbsp;</a></div>
                </div>
            </li>
            <li>
            	<div class="data-thumb-item">
                	<a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/data-thumb-2.jpg" alt="" width="166" height="166" /></a>
                    <span class="thumb-caption"><a href="#">תעשייתית תעש</a></span>
                    <div class="data-thumb-action"><a href="#">&nbsp;</a></div>
                </div>
            </li>
            <li class="last"><h4>תעשייתית תעש</h4></li>
        </ul>
        
        <h4 class="table-title">תעשייתית תעש</h4>
        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="data-statistick">
          <tr>
            <td width="20%" class="first-col">שייתית</td>
            <td width="20%">תעשייתית</td>
            <td width="20%">תעשייתית</td>
            <td width="20%">תעשייתית</td>
            <td width="20%" class="last-col">תעשייתית</td>
          </tr>
          <tr class="even">
            <td class="first-col">תעשייתית</td>
            <td>5</td>
            <td>7</td>
            <td>6</td>
            <td class="last-col">3</td>
          </tr>
          <tr>
            <td class="first-col">שייתית</td>
            <td>10</td>
            <td>15</td>
            <td>20</td>
            <td class="last-col">25</td>
          </tr>
          <tr class="even">
            <td class="first-col">תעשייתית</td>
            <td>5</td>
            <td>7</td>
            <td>6</td>
            <td class="last-col">3</td>
          </tr>
          <tr>
            <td class="first-col">שייתית</td>
            <td>054-45215478</td>
            <td>054-45215478</td>
            <td>054-45215478</td>
            <td class="last-col">054-45215478</td>
          </tr>
          <tr class="even">
            <td class="first-col">תעשייתית</td>
            <td>-</td>
            <td><a href="#">www.vilayokra.con</a></td>
            <td>-</td>
            <td class="last-col"><a href="#">www.thedreamlist.co.li</a></td>
          </tr>
        </table>
        
        <h4 class="table-title">תעשייתית תעש</h4>
        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="data-statistick">
          <tr class="even">
            <td class="first-col" width="20%">שייתית</td>
            <td width="20%"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/v_icon.png" alt="Yes" /></td>
            <td width="20%"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/v_icon.png" alt="Yes" /></td>
            <td width="20%"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/v_icon.png" alt="Yes" /></td>
            <td width="20%" class="last-col"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/v_icon.png" alt="Yes" /></td>
          </tr>
          <tr>
            <td class="first-col">תעשייתית</td>
            <td><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/x_icon.png" alt="No" /></td>
            <td><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/v_icon.png" alt="Yes" /></td>
            <td><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/x_icon.png" alt="No" /></td>
            <td class="last-col"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/x_icon.png" alt="No" /></td>
          </tr>
          <tr class="even">
            <td class="first-col">תעשייתית</td>
            <td><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/x_icon.png" alt="No" /></td>
            <td><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/v_icon.png" alt="Yes" /></td>
            <td><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/v_icon.png" alt="Yes" /></td>
            <td class="last-col"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/x_icon.png" alt="No" /></td>
          </tr>
          <tr>
            <td class="first-col">תעשייתית</td>
            <td><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/x_icon.png" alt="No" /></td>
            <td><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/v_icon.png" alt="Yes" /></td>
            <td><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/x_icon.png" alt="No" /></td>
            <td class="last-col"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/x_icon.png" alt="No" /></td>
          </tr>
          <tr class="even">
            <td class="first-col">תעשייתית</td>
            <td><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/x_icon.png" alt="No" /></td>
            <td><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/v_icon.png" alt="Yes" /></td>
            <td><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/v_icon.png" alt="Yes" /></td>
            <td class="last-col"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/x_icon.png" alt="No" /></td>
          </tr>
          <tr>
            <td class="first-col">תעשייתית</td>
            <td><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/x_icon.png" alt="No" /></td>
            <td><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/v_icon.png" alt="Yes" /></td>
            <td><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/x_icon.png" alt="No" /></td>
            <td class="last-col"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/x_icon.png" alt="No" /></td>
          </tr>
          <tr class="even">
            <td class="first-col">תעשייתית</td>
            <td><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/x_icon.png" alt="No" /></td>
            <td><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/v_icon.png" alt="Yes" /></td>
            <td><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/v_icon.png" alt="Yes" /></td>
            <td class="last-col"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/x_icon.png" alt="No" /></td>
          </tr>
          <tr>
            <td class="first-col">תעשייתית</td>
            <td><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/x_icon.png" alt="No" /></td>
            <td><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/v_icon.png" alt="Yes" /></td>
            <td><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/x_icon.png" alt="No" /></td>
            <td class="last-col"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/x_icon.png" alt="No" /></td>
          </tr>
        </table>
    </div>
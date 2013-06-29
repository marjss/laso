<style>
    
#treeMenu ul li a {
    color: #4D5F6B;
    display: inline-block;
    float: left;
    font-size: 16px;
    padding: 0px 0px;
    text-decoration: none;
    width: 182px;
}

h3 {
    cursor: s-resize;
    margin: -13px 0 0;
}
h4.success {
    background: url("../images/icons/icn_alert_success.png") no-repeat scroll 10px 10px #E2F6C5;
    border: 1px solid #79C20D;
    color: #32510F;
    padding: 7px 0;
}
h4.alert {
    border-radius: 5px 5px 5px 5px;
    display: block;
    font-size: 14px;
    margin-bottom: 10px;
    margin-top: 10px;
    text-indent: 40px;
}
ul, ol {
    margin: 0 0 0px 0px;
    padding: 0;
}

#treeMenu ul {
    list-style: none outside none;
    margin: -8px 2px 14px -11px !important;
}
</style>
<?php
/* @var $this CategoriesController */
/* @var $model Categories */

$this->breadcrumbs=array(
	'Categories'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Categories', 'url'=>array('index')),
	array('label'=>'Create Categories', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#categories-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
 <style>
#sortable { list-style-type: none; margin: 0; padding: 0; width: 60%; }
#sortable li {  background: none repeat scroll 0 0 #F7F7F7;margin: 0 11px 10px;width: 150px; padding: 0.4em; padding-left: 1.5em; font-size: 1.4em; height: 18px; }
#sortable li span { position: absolute; margin-left: -1.3em; }
</style>
<h1>Manage Categories</h1>
<br>

<?php //Yii::app()->clientScript->registerScriptFile('http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js');?>
<?php // echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php // $this->renderPartial('_search',array(
//	'model'=>$model,
//)); ?>
</div><!-- search-form -->
<div class="content-box">
<div class="content-box-header">
<h3 style="cursor: s-resize; ">Categories Grid</h3>

</div>
    <h4 class="alert success" style="display:none;">Successfully Changed</h4>
    <h4 class="alert error" style="display:none;"></h4>
    <p>
You can change the position of the category filter by drag and drop.
</p><br>
    <?php if(Yii::app()->user->hasFlash('success')){ ?>
        
<h4 class="alert success">
   	<?php echo Yii::app()->user->getFlash('success'); ?>
</h4>
<?php }elseif(Yii::app()->user->hasFlash('error')){ ?>
        
<h4 class="alert error">
   	<?php echo Yii::app()->user->getFlash('error'); ?>
</h4>
<?php } ?>
<?php
    $str_js = "
        var fixHelper = function(e, ui) {
            ui.children().each(function() {
                $(this).width($(this).width());
            });
            return ui;
        };
 
        $('#categories-grid table.datagrid tbody').sortable({
            forcePlaceholderSize: true,
            forceHelperSize: true,
            items: 'tr',
            update : function () {
                serial = $('#categories-grid table.datagrid tbody').sortable('serialize', {key: 'items[]', attribute: 'class'});
                $.ajax({
                    'url': '" . $this->createUrl('//categories/sort') . "',
                    'type': 'post',
                    'data': serial,
                    'success': function(data){
                    $('.success').css('display','block');
//                  $('#categories-grid').yiiGridView('update');
                    return false;
                    },
                    'error': function(request, status, error){
                        alert('We are unable to set the sort order at this time.  Please try again in a few minutes.');
                    }
                });
            },
            helper: fixHelper
        }).disableSelection();
    ";
 
    Yii::app()->clientScript->registerScript('sortable-project', $str_js);
?>









<?php //$data =Webnut::getCats();
//$this->widget('zii.widgets.jui.CJuiSortable', array(
//    'id'=>'sortable',
//    'items'=>$data,
//    'options'=>array(
//        'cursor'=>'n-resize',
//        'class'=>'ui-icon ui-icon-arrowthick-2-n-s',
//        'opacity'=>0.6, //set the dragged object's opacity to 0.6
//      ),
//    ));
 /*echo CHtml::ajaxButton('Submit Changes', 'Updateorder', array(
        'type' => 'POST',
        'data' => array(
            // Turn the Javascript array into a PHP-friendly string
            'Order' => 'js:$("ul.ui-sortable").sortable("toArray").toString()',
        ),
     'success'=>'function(resp){
         $("#categories-grid").yiiGridView("update");
          $(".success").css("display","block");
         $(".success").html("Success");
         }',
     'error'=>'function(resp){
         $("#categories-grid").yiiGridView("update");
          $(".error").css("display","block");
         $(".error").html("Oh! Some error occured. Try Again.");
         }',
    ),array('class'=>'button'));*/
//$this->widget('bootstrap.widgets.TbGridView', array(
//	'id'=>'categories-grid',
////        'itemsCssClass' => 'datagrid',
//	'dataProvider'=>$model->search(),
//        'template' => "{items}",
////    'rowCssClassExpression'=>'"items[]_{$data->id}"',
////	'filter'=>$model,
////        'ajaxUpdate'=>false,
//	'columns'=>array(
//		'id',
//                
////                'sortOrder',
//		'title',
//		'description',
//		'added_date',
//		'modified_date',
//		 array(            
//                    'name'=>'status',
//                    'value'=>array($this,'gridStatusColumn'), 
//                ),
//                array(
//                'class' => 'bootstrap.widgets.TbEditableColumn',
//                'name' => 'sortOrder',
//                'sortable'=>false,
//                'editable' => array(
//                'url' => $this->createUrl('categories/editable'),	
//                'placement' => 'right',
//                'inputclass' => 'span3'
//                )),
//		array(
//			'class'=>'CButtonColumn',
//		),
//	),
//)); ?>
<?php     
$this->widget('bootstrap.widgets.TbExtendedGridView', array(
    'type' => 'striped bordered',
    'itemsCssClass' => 'datagrid',
    'pager'=>array(
        'header'=>'',
        'cssFile'=>true,
        'maxButtonCount'=>25,
        'selectedPageCssClass'=>'active',
        'hiddenPageCssClass'=>'disabled',
        'firstPageCssClass'=>'previous',
        'lastPageCssClass'=>'next',
        'firstPageLabel'=>'<<',
        'lastPageLabel'=>'>>',
        'prevPageLabel'=>'<',
        'nextPageLabel'=>'>',
        ),
    'id'=>'categories-grid',
    'dataProvider' => $model->search(),
    'template' => "{items}",
    'filter'=>$model,
    'ajaxUpdate'=>false,
    'rowCssClassExpression'=>'"items[]_{$data->id}"',
    'columns' => array_merge(array(
                array(
                'class'=>'bootstrap.widgets.TbRelationalColumn',
                'name' => 'title',
                'url' => $this->createUrl('categories/relational'),
                'value'=> $data->title,
                )),
                array(
                    array(
                'class' => 'bootstrap.widgets.TbEditableColumn',
                'type'=>'raw',
                'name' => 'sortOrder',
                'value'=>$data->sortOrder, 
                'sortable'=>false,
                'editable' => array(
                'url' => $this->createUrl('categories/editable'),
                'placement' => 'right',
                'inputclass' => 'span3'
                )),
                'title',
                'description',
		'added_date',
		'modified_date',
		 array(            
                    'name'=>'status',
                    'value'=>array($this,'gridStatusColumn'), 
                ),
                array(
			'class'=>'CButtonColumn',
                        'htmlOptions'=>array('width'=>58),
		))),));
        /**
         * array(
                'class' => 'bootstrap.widgets.TbEditableColumn',
                'type'=>'raw',
                'name' => 'sortOrder',
                'value'=>$data->sortOrder, 
                'sortable'=>false,
                'editable' => array(
                'url' => $this->createUrl('categories/editable'),
                'placement' => 'right',
                'inputclass' => 'span3'
                )),
                'title',
                'description',
		'added_date',
		'modified_date',
		 array(            
                    'name'=>'status',
                    'value'=>array($this,'gridStatusColumn'), 
                ),
                array(
			'class'=>'CButtonColumn',
                        'htmlOptions'=>array('width'=>58),
		),
   ));
         */
               
 ?>
</div>
<?php
    Yii::app()->clientScript->registerScript('uploadDialog', "
$(function(){
    $('#upload-filter').click(function(){
        $('#filter-form').load('".Yii::app()->createUrl('filters/create')."', function(){
            $('#filter-form').dialog('open');
        });
        return false;
    });
});");

echo CHtml::link('Add New Filter', '#', array('id' => 'upload-filter','class'=>'button'));
    
    $this->beginWidget('zii.widgets.jui.CJuiDialog',array(
                'id'=>'filter-form',
                'options'=>array(
                    'title'=>Yii::t('Add','Filter'),
                    'autoOpen'=>false,
                    'model'=>'true',
                    'width'=>'auto',
                    'height'=>'auto'
                ),
        
           
                ));
    
    $this->endWidget('zii.widgets.jui.CJuiDialog');  ?>
<script>
       $(document).on('click','.imgactive',(function(){
          var cid = $(this).attr('rel');
          var status = $('.status-'+cid).attr('rel');
          $.ajax({
              type:'POST',
              data:{cid:cid,status:status},
              url: '<?php echo Yii::app()->baseUrl;?>/categories/Activeinactive',
              success:function(res){
                    var stat = $('.status-'+cid);
                    $(stat).attr('src',res);
                    $('#categories-grid').yiiGridView('update');
                    return false;
                 }
          })
       })); 
    
    </script>
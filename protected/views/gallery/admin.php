<?php
$this->breadcrumbs=array(
	'Galleries'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Gallery', 'url'=>array('index')),
	array('label'=>'Create Gallery', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('gallery-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Galleries</h1>

<p>
You may optionally Filter the hotels via the given Product drop-down.

</p>

<?php // echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php // $this->renderPartial('_search',array(
//	'model'=>$model,
//)); ?>
</div><!-- search-form -->
<?php /*
$tabs=array();
$tabs['Select Hotel'] = $this->renderPartial("_form2", array("model"=>$model,"hotel"=>$hotel));
$this->widget('zii.widgets.jui.CJuiTabs', array(
    'tabs'=>$tabs,
    'options'=>array(
        'collapsible'=>true,
    ),
));*/
?><div id="output">
<?php  $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'gallery-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
                   'name'=> 'id',
                    'value'=>$data->id,
                    'htmlOptions'=>array('width'=>'10px')
                    ),
//		'product_id',
                array('name'=>'product_id', 
                     'value'=>'$data->hotel->name',
                     'filter' => Webnut::getHotels(),
                     'sortable'=>TRUE),
		'thumb_image',
		'full_image',
		'add_date',
		array(            
                    'name'=>'status',
                    'value'=>array($this,'gridStatusColumn'), 
                ),

		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

<!--Function to update the status dynamically via Ajax--->
<script>
       $(document).on('click','.imgactive',(function(){
          var gid = $(this).attr('rel');
          var status = $('.status-'+gid).attr('rel');
          $.ajax({
              type:'POST',
              data:{gid:gid,status:status},
              url: '<?php echo Yii::app()->baseUrl;?>/gallery/Activeinactive',
              success:function(res){
                    var stat = $('.status-'+gid);
                    $(stat).attr('src',res);
                    $('#gallery-grid').yiiGridView('update');
                    return false;
                 }
          })
       })); 
    
    </script>
    </div>
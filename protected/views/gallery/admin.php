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
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php // $this->renderPartial('_search',array(
//	'model'=>$model,
//)); ?>
</div><!-- search-form -->
<?php
//$tabs=array();
$tabs['Select Hotel']=$this->renderPartial("_form2", array("model"=>$model,"hotel"=>$hotel));

$this->widget('zii.widgets.jui.CJuiTabs', array(
    'tabs'=>$tabs,
    'options'=>array(
        'collapsible'=>true,
    ),
));
?>
<?php  $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'gallery-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'product_id',
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

<script>
    $(document).ready(function(){
       $('.imgactive').click(function(){
          var gid = $(this).attr('rel');
          var status = $('.status').attr('rel');
          $.ajax({
              type:'POST',
              data:{gid:gid,status:status},
              url: '<?php echo Yii::app()->baseUrl.'/gallery/Activeinactive'; ?>',
              success:function(res){
          console.log(res);
                    $('.status').attr('src',res);
              }
          })
       }); 
    });
    </script>
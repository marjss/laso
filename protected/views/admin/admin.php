<?php
/* @var $this HotelsController */
/* @var $model Hotels */

$this->breadcrumbs=array(
	'Hotels'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Hotels', 'url'=>array('index')),
	array('label'=>'Create Hotels', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#hotels-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Hotels</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
<div class="content-box">
<div class="content-box-header">
<h3 style="cursor: s-resize; ">Hotels Grid</h3>
</div>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'hotels-grid',
        'itemsCssClass' => 'datagrid',
//    'htmlOptions'=>array('class'=>'content-box-header'),
        'dataProvider'=>$model->search(),
	'filter'=>$model,
        
	'columns'=>array(
		'id',
		'user_id',
		'name',
		'description',
		'avatar',
		'street',
		/*
		'city',
		'address',
		'state',
		'country',
		'album_id',
		'other',
		'status',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
</div>

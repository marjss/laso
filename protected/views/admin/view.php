<?php
/* @var $this CategoriesController */
/* @var $model Categories */

$this->breadcrumbs=array(
	'Categories'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Categories', 'url'=>array('index')),
	array('label'=>'Create Categories', 'url'=>array('create')),
	array('label'=>'Update Categories', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Categories', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Categories', 'url'=>array('admin')),
);
?>
<div class="content-box">
<div class="content-box-header">
<h3 style="cursor: s-resize; ">View Hotels #<?php echo $model->id; ?></h3>

</div>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'description',
		 array(      
                    'name'=>'avatar',
                     'type'=>'image',
                     'value'=>Yii::app()->baseUrl.'/'.$model->avatar
			    ),
		'area',
		'city',
                'state'
	),
)); ?>
</div>
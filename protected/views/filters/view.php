<?php
/* @var $this FiltersController */
/* @var $model Filters */

$this->breadcrumbs=array(
	'Filters'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Filters', 'url'=>array('index')),
	array('label'=>'Create Filters', 'url'=>array('create')),
	array('label'=>'Update Filters', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Filters', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Filters', 'url'=>array('admin')),
);
?>
<div class="content-box">
<div class="content-box-header">
<h3 style="cursor: s-resize; ">View Filters #<?php echo $model->id; ?></h3>

</div>


<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		array(
                    'name'=>'cat_id',
                    'value'=>FiltersController::get_categoryname($model,'')
                ),
		'title',
		'description',
		array(
                    'name'=>'added_date',
                            'value'=>date('F j Y',strtotime($model->added_date))
                    ),
		'status',
		'note',
	),
)); ?>
</div>
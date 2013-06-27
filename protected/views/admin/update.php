<?php
/* @var $this HotelsController */
/* @var $model Hotels */

$this->breadcrumbs=array(
	'Hotels'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Hotels', 'url'=>array('index')),
	array('label'=>'Create Hotels', 'url'=>array('create')),
	array('label'=>'View Hotels', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Hotels', 'url'=>array('admin')),
);
?>

<h1>Update <?php echo $model->name; ?></h1>
<br>
<?php echo $this->renderPartial('_form', array('model'=>$model,'filter'=>$filter,'data'=>$data)); ?>
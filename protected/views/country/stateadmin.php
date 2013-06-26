<?php
$this->breadcrumbs=array(
	'State'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List State', 'url'=>array('stateindex')),
	array('label'=>'Create State', 'url'=>array('statecreate')),
);

//Yii::app()->clientScript->registerScript('search', "
//$('.search-button').click(function(){
//	$('.search-form').toggle();
//	return false;
//});
//$('.search-form form').submit(function(){
//	$.fn.yiiGridView.update('country-grid', {
//		data: $(this).serialize()
//	});
//	return false;
//});
//");
?>

<h1>Manage States</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php // echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<!--<div class="search-form" style="display:none">
<?php // $this->renderPartial('_search',array(
//	'model'=>$model,
//)); ?>
</div> search-form -->

<?php 

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'state-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		array(
                    'name'=>'country_id',
                    'value'=>array($this,'get_countryname'),
                    'filter' => Webnut::getListCountries(),
                     'sortable'=>TRUE
                ),
		'state_name',
//		'long_name',
//		'iso3',
//		'numcode',
		/*
		'un_member',
		'calling_code',
		'cctld',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

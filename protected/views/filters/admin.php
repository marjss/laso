<?php
/* @var $this FiltersController */
/* @var $model Filters */
/*
$this->breadcrumbs=array(
	'Filters'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Filters', 'url'=>array('index')),
	array('label'=>'Create Filters', 'url'=>array('create')),
);
*/
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#filters-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Filters</h1>
<br>

<?php // echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php // $this->renderPartial('_search',array(
//	'model'=>$model,
//)); ?>
</div><!-- search-form -->
<div class="content-box">
<div class="content-box-header">
<h3 style="cursor: s-resize; ">Filters / Features Grid</h3>
</div>
<?php 
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'filters-grid',
	'dataProvider'=>$model->search(),
        'itemsCssClass' => 'datagrid',
	'filter'=>$model,
	'columns'=>array(
		array(
                    'name'=>'id',
                    'htmlOptions'=>array('width'=>'10px')
                    
                ),
            array('name'=>'cat_id', 
                     'value'=>array($this,'get_categoryname'),
                     'filter' => Webnut::getCategories(),
                     'sortable'=>TRUE), 
		//'hotel_id',
//            array('name'=>'hotel_id', 
//                     'value'=>array($this,'get_hotelsname'),
//                     'filter' => Webnut::getHotels(),
//                     'sortable'=>TRUE),
		'title',
		'description',
		'added_date',
                array(
                    'name'=>'status',
                    'value'=>array($this,'gridStatusColumn')
                ),
		/*
		'status',
		'note',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

<!--Function to update the status dynamically via Ajax--->
<script>
       $(document).on('click','.imgactive',(function(){
          var fid = $(this).attr('rel');
          var status = $('.status-'+fid).attr('rel');
          $.ajax({
              type:'POST',
              data:{fid:fid,status:status},
              url: '<?php echo Yii::app()->baseUrl;?>/filters/Activeinactive',
              success:function(res){
                    var stat = $('.status-'+fid);
                    $(stat).attr('src',res);
                    $('#filters-grid').yiiGridView('update');
                    return false;
                 }
          })
       })); 
    
    </script>
    </div>

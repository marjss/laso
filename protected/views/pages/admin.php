<?php
/* @var $this PagesController */
/* @var $model Pages */

$this->breadcrumbs=array(
	'Pages'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Pages', 'url'=>array('index')),
	array('label'=>'Create Pages', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#pages-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<!--<h1>Manage Pages</h1>-->
<!--
<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>-->

<?php // echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php // $this->renderPartial('_search',array(
//	'model'=>$model,
//)); ?>
</div><!-- search-form -->
<div class="content-box">
<div class="content-box-header">
<h3 style="cursor: s-resize; ">Manage Pages</h3>
</div>
<?php 
echo Webnut::CurrentDate();

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'pages-grid',
         'itemsCssClass' => 'datagrid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
            'title',
//		'section_id',
//		'pagename',
		'contents',
		'keyword',
		array(
                    'name'=>'status',
                    'value'=>array($this,'gridStatusColumn')
                ),
		/*
		'description',
		'extpage_link',
		'published',
		'parent_id',
		'secure_access',
		'footer',
		'menu_order',
		'status',
		*/
              
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
    
    <!--Function to update the status dynamically via Ajax--->
<script>
       $(document).on('click','.imgactive',(function(){
          var pid = $(this).attr('rel');
          var status = $('.status-'+pid).attr('rel');
          $.ajax({
              type:'POST',
              data:{pid:pid,status:status},
              url: '<?php echo Yii::app()->baseUrl;?>/pages/Activeinactive',
              success:function(res){
                    var stat = $('.status-'+pid);
                    $(stat).attr('src',res);
                    $('#pages-grid').yiiGridView('update');
                    return false;
                 }
          })
       })); 
    
    </script>
</div>

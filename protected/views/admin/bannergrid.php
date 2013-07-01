<?php
/* @var $this HotelsController */
/* @var $model Hotels */


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
<style>
        .thumb {width: 100px;}
        .thumb img{height: 100px; width:80px;}
    </style>
<h1>Manage Banners</h1>
<br>
<!--<p>
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
<h3 style="cursor: s-resize; ">Banners Grid</h3>
</div>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'banner-grid',
        'itemsCssClass' => 'datagrid',
//    'htmlOptions'=>array('class'=>'content-box-header'),
        'dataProvider'=>$model->search(),
	'filter'=>$model,
        
	'columns'=>array(
		'id',
//		'user_id',
		'banner_name',
//		'banner_image',
                array(      
                'name'=>'banner_image',
                     'type'=>'image',
                     'value'=>array($this,'bannerPath'),
                     'htmlOptions'=>array('class'=>'thumb','rel'=>'gallery'),
			    ),
		//'avatar',
//		'status',
                array(            
                    'name'=>'status',
                    'value'=>array($this,'gridStatusColumn'), 
                ),
                'adddate',
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
<script>
       $(document).on('click','.imgactive',(function(){
          var bid = $(this).attr('rel');
          var status = $('.status-'+bid).attr('rel');
          $.ajax({
              type:'POST',
              data:{bid:bid,status:status},
              url: '<?php echo Yii::app()->baseUrl;?>/admin/Activeinactive',
              success:function(res){
                    var stat = $('.status-'+bid);
                    $(stat).attr('src',res);
                    $('#banner-grid').yiiGridView('update');
                    return false;
                 }
          })
       })); 
    
    </script>

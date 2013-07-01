<?php $this->widget('bootstrap.widgets.TbExtendedGridView', array(
'type'=>'striped bordered',
'dataProvider' => $gridDataProvider,
'template' => "{items}",
'id'=>'fil-form-'.$id,
'htmlOptions'=>array('class'=>'fil-form-'.$id),
'columns' => array(
    //'cat_id',
//    'pos',
     array(     'header'=>'Order',
                'class' => 'bootstrap.widgets.TbEditableColumn',
                'type'=>'raw',
                'name' => 'pos',
               // 'value'=>$data->sortOrder, 
                'sortable'=>false,
                'editable' => array(
                'url' => $this->createUrl('filters/editable'),
                'placement' => 'right',
                'inputclass' => 'span3',
                'htmlOptions'=>array('width'=>'10px !important','class'=>'subgrd-pos'),

                 
                )),
    array(
                'class' => 'bootstrap.widgets.TbEditableColumn',
                'type'=>'raw',
                'name' => 'title',
               // 'value'=>$data->sortOrder, 
                'sortable'=>false,
                'editable' => array(
                'url' => $this->createUrl('filters/edittitle'),
                'placement' => 'right',
                'inputclass' => 'span3',
                'htmlOptions'=>array('class'=>'subgrd-tit'),

                 
                )),
   
    
   

//    array('name'=>'title','sortable'=>false)
 
    array(
        'header'=>'Active(Home)',
        'type'=>'raw',
        'value'=>'CHtml::CheckBox("$data->home",$data->home,array(
         "ajax" => array(
                    "type"=>"POST", 
                    "url"=> Yii::app()->createUrl("filters/togglehome",array("feed_id"=>$data->id)),
                    "dataType"=>"text",
                    "data" => array("Type_id" => $data->id,"status"=> "js:$(this).attr(\"name\")"),
                    "success" => "js:function(html){
                           if(html==\"1\"){
                               $(\"#active$data->id\").attr(\"checked\",\"checked\");
                              $(\"#fil-form-'.$id.'\").yiiGridView(\"update\");
                           }
                               else if(html==\"0\"){
                               $(\"#active$data->home\").attr(\"checked\",false);
                               $(\"#fil-form-'.$id.'\").yiiGridView(\"update\");
                               
                           }

                    }",
                    "error"=>"function (xhr, ajaxOptions, thrownError){
                            alert(xhr.statusText);
                            alert(thrownError);}",
            ),
        "style"=>"width:50px;","feed_id"=>$data->id,"id"=>"active".$data->id))',
        'htmlOptions'=>array("width"=>"50px"),
    ), 
    array(
        'header'=>'Active(Site)',
        'type'=>'raw',
        'value'=>'CHtml::CheckBox("$data->site",$data->site,array(
         "ajax" => array(
                    "type"=>"POST", 
                    "url"=> Yii::app()->createUrl("filters/togglesite",array("feed_id"=>$data->id)),
                    "dataType"=>"text",
                    "data" => array("Type_id" => $data->id,"status"=> "js:$(this).attr(\"name\")"),
                    "success" => "js:function(html){
                        if(html==\"1\"){
                               $(\"#sactive$data->id\").attr(\"checked\",\"checked\");
                             $(\"#fil-form-'.$id.'\").yiiGridView(\"update\");
                           }
                               else if(html==\"0\"){
                               $(\"#sactive$data->site\").attr(\"checked\",false);
                               $(\"#fil-form-'.$id.'\").yiiGridView(\"update\");
                           }

                    }",
                    "error"=>"function (xhr, ajaxOptions, thrownError){
                            alert(xhr.statusText);
                            alert(thrownError);}",
            ),
        "style"=>"width:50px;","feed_id"=>$data->id,"id"=>"sactive".$data->id))',
        'htmlOptions'=>array("width"=>"50px"),
    ), 
       array(
			'class'=>'CButtonColumn',
			'template'=>'{delete}',
			'buttons'=>array
			(
			  'delete' => array
			    (
				'label'=>'',
				'url'=>'Yii::app()->createUrl("filters/delete", array("id"=>$data->id))',
                            ),
                         ),
		),           
    ),
));?>
<script>

    $('.subgrd-pos').parent().css('width','58px !important');
    $('.subgrd-tit').parent().css('width','60px !important');
</script>
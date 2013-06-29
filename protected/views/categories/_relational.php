<?php $this->widget('bootstrap.widgets.TbExtendedGridView', array(
'type'=>'striped bordered',
'dataProvider' => $gridDataProvider,
'template' => "{items}",
'columns' => array(
    //'cat_id',
    'title'),
));?>
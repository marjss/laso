<ul class="clearfix result-land" id="resultLand">
<?php 
$this->widget('ext.isotope.Isotope',array(
            'dataProvider'=>$model->hotelsearch(),
            'itemView'=>'_searchhotels',
            'template' => '{items}{pager}',
            'itemSelectorClass'=>'result-item',
            'options'=>array(
//                'layoutMode' => Yii::app()->session['layout'],
//                'layoutMode'=>'straightDown'
                ), // options for the isotope jquery
           'infiniteScroll'=>true, // default to true
           'infiniteOptions'=>array(
                                    'loading' => array(
                                                 'msgText' => 'Loading More Results ...',
                                                 'finishedMsg' => 'Reached End of Page!')
                                    ),
            )); ?>

</ul>
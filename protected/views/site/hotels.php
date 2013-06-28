<ul class="clearfix result-land" id="resultLand">
<?php 
$this->widget('ext.isotope.Isotope',array(
            'dataProvider'=>$model,
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
<script>
     $(document).ready(function(){
         
    
                $('.result-item-btn').click(function(){
                    var arr =  [];
                     $('.result-item').each(function() {
                    var target = $(this);
                    var a = target.find("input:checkbox").is(":checked");
                    if (a) {
                        arr.push($(this).attr('rel'));
                    }});
                $.ajax({
                    type: "POST",
                    url:'<?php echo Yii::app()->createUrl("hotels/compare"); ?>',
                    data:{ids:arr},
                    success:function(resp){
                    $(document).html('');
//                    $('header').remove();
//                    $('footer').remove();
        //var url= '<?php echo Yii::app()->createUrl("hotels/compare"); ?>';
                       $('body').html(resp)
                            }    
                    });
                   console.log(arr);
                    return arr
                    });
                });
            </script>
<?php 
$actionId =  Yii::app()->controller->action->id;
$controller = Yii::app()->controller->id;

          $_SERVER['REQUEST_URI_PATH'] = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
	  $seg = $_SERVER['REQUEST_URI_PATH'];
//          echo $seg;
          $segments = explode('/', $_SERVER['REQUEST_URI_PATH']);
//			echo "<pre>"; print_r($segments); echo '</pre>';
//          echo $segments[2];
?>
<script>
$(document).ready(function(){
    var segments = '<?php echo $seg; ?>';
//    alert(segments);
   var i = $('ul li ul li').find('a.cls').attr('href');
   console.log(i);
   if(i==segments){
//       console.log(this);
//       $(this).parent().parent().parent().css('display','block');
       
   }
//   $(i).parent().find('div').css('display','block');    
});
/**
 * $(document).on('click','.closed',function(){
    var segments = '<?php echo $seg; ?>';
    var i = $(this).parent().find('a.cls').attr('href');
   console.log(i);
   if(i==segments){
       console.log(this)
       $(this).parent().find('div').css('display','block');
   }
//   $(i).parent().find('div').css('display','block');
        
    
    
});
 * ***/
</script>
<ul>
                              <li><a href="#" class="parent">Admin Manager</a><span></span>
                                <div>
                                  <ul>
                                    <li><span></span><a href="#">Admin</a></li>
                                  </ul>
                                </div>
                              </li>
				<li><a href="#" class="parent">Member Manager</a><span></span>
                                <div>
                                  <ul>
                                    <li><span></span><a href="#">View Members</a></li>
                                    <li><span></span><a href="#">Add Member</a></li>
                                   </ul>
                                </div>
                              </li>
                              <li><a href="#">Category Manager</a><span></span>
                                <div>
                                  <ul>
                                      <li><span></span><a href="<?php echo Yii::app()->createUrl('categories/admin');  ?>" class="cls">Manage Categories</a></li>
                                      <li><span></span><a href="<?php echo Yii::app()->createUrl('categories/create'); ?>" class="cls">Add Category</a></li>
                                     
                                  </ul>
                                </div>
                              </li>
                              <li><a href="#">Feature Manager</a>
                                  <span></span>
                                  <div>
                                    <ul>
                                       <li><span></span><a href="<?php echo Yii::app()->createUrl('filters/admin'); ?>" class="cls">Manage Feature</a></li>
                                      <li><span></span><a href="<?php echo Yii::app()->createUrl('filters/create'); ?>" class="cls">Add Feature</a></li>
                                  </ul>
                                </div>
                              </li>
                              <li><a href="#">Product Manager</a><span></span>
                                <div>
                                  <ul>
                                      <li><span></span><a href="<?php echo Yii::app()->createUrl('admin/admin'); ?>">Manage Product</a></li>
                                      <li><span></span><a href="<?php echo Yii::app()->createUrl('admin/create'); ?>">Add Product</a></li>
                                  </ul>
                                </div>
                              </li>
                              
				<li><a href="#">Page Manager</a><span></span>
                                <div>
                                  <ul>
                                    <li><span></span><a href="<?php echo Yii::app()->createUrl('pages/admin'); ?>">View Pages</a></li>
                                    <li><span></span><a href="<?php echo Yii::app()->createUrl('pages/create'); ?>">Add Pages</a></li>
                                  </ul>
                                </div>
                              </li>
                              <li><span></span><a href="#" class="parent">News & Events Manager </a> 
                                <div>
                                  <ul>
                                    <li><span></span><a href="#">View Newsletter</a> 
                                    </li>
                                    <li><span></span><a href="#">View Subscriber</a>
                                    </li>
                                    <li><span></span><a href="#">Add Newsletter</a>
                                    </li>
                                  </ul>
                                </div>
                              </li>
                              <li><a href="#" class="parent">Gallery Manager</a><span></span>
                                <div>
                                  <ul>
                                      <li><span></span><a href="<?php echo Yii::app()->createUrl('gallery/admin') ?>">View Gallery</a></li>
                                    <li><span></span><a href="<?php echo Yii::app()->createUrl('gallery/create') ?>">Add Gallery</a></li>
                                  </ul>
                                </div>
                              </li>
                              <li><a href="#" class="parent">Banner Manager</a><span></span>
                                <div>
                                  <ul>
                                    <li><span></span><a href="<?php echo Yii::app()->createUrl('admin/banneradmin') ?>">View Banner</a></li>
                                    <li><span></span><a href="<?php echo Yii::app()->createUrl('admin/banner') ?>">Add Banner</a></li>
                                  </ul>
                                </div>
                              </li>
                              <li><a href="#" class="parent">Location Manager</a><span></span>
                                <div>
                                  <ul>
                                    <li><span></span><a href="<?php echo Yii::app()->createUrl('country/admin') ?>">View Countries</a></li>
                                    <li><span></span><a href="<?php echo Yii::app()->createUrl('country/create') ?>">Add Country</a></li>
                                    <li><span></span><a href="<?php echo Yii::app()->createUrl('country/stateadmin') ?>">View States</a></li>
                                    <li><span></span><a href="<?php echo Yii::app()->createUrl('country/statecreate') ?>">Add State</a></li>    
                                      </ul>
                                </div>
                              </li>
                            </ul>
    
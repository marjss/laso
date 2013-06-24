<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Webnut extends CController
{
    public function getHotels(){
                return CHtml::listData(Hotels::model()->findAll(array('order'=>'name ASC')),'id','name');
    }   
    
    public function updateStatus($status,$model){
        if($status == 1){
            $model->status = 0;
            return 0;
        }else{
            $model->status = 1;
            return 1;
        }
    }
}

?>

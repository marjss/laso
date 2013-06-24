<?php
/* 
 * The Helper class to extend the functionality of the application
 * Author: Sudhanshu Saxena
 */

class Webnut extends CController
{
    /**
     * Return the list of hotels with corresponding ID's
     */
    public function getHotels(){
                return CHtml::listData(Hotels::model()->findAll(array('order'=>'name ASC')),'id','name');
    }   
    
    /**
     * Return 1 if the status is 0 and VICE-VERSA
     */
    public function updateStatus($status,$model){
       
        if($status == 0){
            $model->status = 1;
            return 1;
        }else{
            $model->status = 0;
            return 0;
        }
    }
}

?>

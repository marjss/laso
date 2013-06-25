<?php
/* 
 * The Helper class to extend the functionality of the application
 * Author: Sudhanshu Saxena
 */

class Webnut extends CController
{
    
     #get Current Date 
    public function CurrentDate()
    {
        $datestring = "%Y-%m-%d %h:%i:%s %A";
        $time = time();
        $entrydate= date($datestring, $time);
        return $entrydate;
    }//End of Function
    
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
    
    /**
     * Return the list of Categories with corresponding ID's
     */
    public function getCategories(){
                        return CHtml::listData(Categories::model()->findAll(array('order'=>'title ASC')),'id','title');
    } 
    
     /**
         * Public function to update the flag status
         */
         public function gridStatusColumn($data,$row){ 
             if ($data->status == 1) {
                 $image = '/images/active.png';}
             else{ 
                 $image = '/images/inactive.png';}
        $imghtml = CHtml::image(Yii::app()->baseUrl . $image, 'Status', array('rel' => $data->status, 'class' => 'status-' . $data->id));
        echo CHtml::link($imghtml, '', array('class' => 'imgactive', 'rel' => $data->id, 'style' => 'cursor:pointer;',));
    }
}

?>

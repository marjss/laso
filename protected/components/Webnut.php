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
     * Return the list of Filters with corresponding ID's
     */
    public function getFilters(){
                        return CHtml::listData(Filters::model()->findAll(array('order'=>'title ASC')),'id','title');
    } 
    public function gethotelFilters(){
                        return CHtml::listData(HotelFilters::model()->findAll(),'hotel_id','filter_id');
                       
    }
    /**
     * Return the list of Categories with corresponding Order by their Positions to sort via sortable ID's
     */
    public function getCats(){
                        return CHtml::listData(Categories::model()->findAll(array('order'=>'pos ASC')),'id','title');
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
    
     /**
     * Return the list of COuntries with corresponding Order by their Positions to sort via sortable ID's
     */
    public function getListCountries(){
               return CHtml::listData(Country::model()->findAll(),'country_id','short_name');
    } 
    
      public function getCountryname($country_id){
                  //print_r($idinvoice); print_r($idsku);die();
           $country = Country::model()->findByPk($country_id);
          return $country->short_name;
    }
    public function getunserials($id){
        
        
$keys = array_keys($id);
 $criteria = new CDbCriteria();
$criteria->addInCondition(explode(",","filter_id"),$keys);
echo '<pre>';
print_r($criteria);
echo '</pre>';
$hotelfilter = HotelFilters::model()->find($criteria);
echo '<pre>';
print_r($hotelfilter);
echo '</pre>';
die;
        foreach ($id as $filteringCriteria=>$value) {
            
        $hotelfilter = HotelFilters::model()->find(array('filter_id'=> $filteringCriteria));
        $data = explode(',', $fil->filter_id);
        
        }
//                unserialize( $hotelfilter->filter_id);
       return $data;
    }
    
    public function getHotelByname($hid){
        if(is_numeric($hid)){
            $hotel = Hotels::model()->findByPk($hid);
            
             return $hotel->name;
        }
    }
   
}

?>

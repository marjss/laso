<?php

/**
 * This is the model class for table "ld_hotel_filters".
 *
 * The followings are the available columns in table 'ld_hotel_filters':
 * @property integer $id
 * @property integer $hotel_id
 * @property integer $filter_id
 * @property integer $status
 */
class HotelFilters extends CActiveRecord
{
    public $categoryIds;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return HotelFilters the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ld_hotel_filters';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('hotel_id, filter_id', 'required'),
			array('hotel_id','numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, hotel_id, filter_id, status', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
                    'hotel' => array(self::HAS_MANY, 'Hotels', 'id'),
//                    'filtr'=>array(self::HAS_MANY, 'Filters', 'filter_id'),
//                    'tags' => array(self::MANY_MANY, 'Filters', 'ld_hotel_filters(filter_id,hotel_id)'),
//                      'filter' => array(self::MANY_MANY, 
//                            'Filters', 'ld_hotel_filters(hotel_id,filter_id)','index'=>'id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'hotel_id' => 'Hotel',
			'filter_id' => 'Filter',
			'status' => 'Status',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('hotel_id',$this->hotel_id);
		$criteria->compare('filter_id',$this->filter_id);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        public function hotelfilter($keyword){
            $criteria=new CDbCriteria;
            $criteria->compare('filter_id',$keyword);
            return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
        }
//        public function afterFind()
//        {
//	$this->categoryIds = array_keys($this->filter);
//        parent::afterFind();
//        }
        public function getunserials($id){
        
        
        $keys = array_keys($id);

        $criteria = new CDbCriteria();
 
        // $criteria->compare((str_getcsv("filter_id",",")),implode(",",$keys),true);
        if ($keys) {
                 
                     $criteria2 = new CDbCriteria();
                    foreach($keys as $c) {
                $criteria2->compare($this->filter_id,$c, "OR");
                //$criteria2->compare(str_getcsv($this->filter_id,","),$c, "OR");
        } 
        $criteria->mergeWith($criteria2);

//                      $criteria->addInCondition($fil,$keys);
                 
                  }
        foreach ($id as $filteringCriteria=>$value) {
            
        $hotelfilter = HotelFilters::model()->find(array('filter_id'=> $filteringCriteria));
        $data = explode(',', $fil->filter_id);
        
        }
//                unserialize( $hotelfilter->filter_id);
       return $data;
    }
}
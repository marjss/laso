<?php

/**
 * This is the model class for table "ld_hotels".
 *
 * The followings are the available columns in table 'ld_hotels':
 * @property integer $id
 * @property integer $user_id
 * @property string $name
 * @property string $description
 * @property string $avatar
 * @property string $email
 * @property integer $phone 
 * @property string $website
 * @property string $summary
 * @property string $area
 * @property string $city
 * @property string $address
 * @property string $state
 * @property string $country
 * @property integer $album_id
 * @property string $other
 * @property string $status
 */
class Hotels extends CActiveRecord
{
     public $categoryIds;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Hotels the static model class
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
		return 'ld_hotels';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, description', 'required'),
			array('id, user_id, album_id,phone,capacity', 'numerical', 'integerOnly'=>true),
			array('name, avatar, area, city, state, country', 'length', 'max'=>255),
			array('description', 'length', 'max'=>5000),
			array('address, other', 'length', 'max'=>1024),
                        array('summary', 'length', 'max'=>2000),
			array('status', 'length', 'max'=>11),
                        array('email','email'),
                        array('website', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, name,capacity, description, avatar,phone,website,email,summary, area, city, address, state, country, album_id, other, status', 'safe', 'on'=>'search'),
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
//                    'feature' => array(self::HAS_MANY, 'Filters', 'hotel_id'),
                    'gallery' => array(self::HAS_MANY, 'Gallery', 'album_id'),
                    'filter' => array(self::MANY_MANY, 
                            'Filters', 'ld_hotel_filters(hotel_id,filter_id)','index'=>'id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user_id' => 'User',
			'name' => 'Name',
			'description' => 'Description',
			'avatar' => 'Avatar',
                        'capacity'=>'Capacity',
                        'phone' => 'Phone',
                        'website' => 'Web Address',
                        'summary' => 'Summary',
                        'email' => 'Email',
			'area' => 'Area',
			'city' => 'City',
			'address' => 'Address',
			'state' => 'State',
			'country' => 'Country',
			'album_id' => 'Album',
			'other' => 'Other',
			'status' => 'Status',
		);
	}
public function afterFind()
        {
	$this->categoryIds = array_keys($this->filter);
        parent::afterFind();
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
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('avatar',$this->avatar,true);
                $criteria->compare('capacity',$this->capacity,true);
                $criteria->compare('phone',$this->phone,true);
                $criteria->compare('website',$this->website,true);
                $criteria->compare('email',$this->email,true);
                $criteria->compare('summary',$this->summary,true);
		$criteria->compare('area',$this->area,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('state',$this->state,true);
		$criteria->compare('country',$this->country,true);
		$criteria->compare('album_id',$this->album_id);
		$criteria->compare('other',$this->other,true);
		$criteria->compare('status',$this->status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        /**
         * The default home search criteria which return the full list of hotels without any filter
         */
        public function hotelsearch()
	{
		$criteria=new CDbCriteria;
                return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'pagination'=>array('pagesize'=>9)
                ));
	}
        /**
         * The filter function to display the filtered hotels choosen by the users
         */
       public function hotsearch($id)
	{ 
     $criteria = new CDbCriteria;
     if ($id) {
      $criteria2 = new CDbCriteria;
      $filteringCriteria =  array_keys($id);
      foreach ($filteringCriteria as $filt){
           $filtermodel= HotelFilters::model()->findAllByAttributes(array('filter_id'=>$filt));
           foreach($filtermodel as $filter){
            $uid = $filter->hotel_id; 
            $criteria2->compare('id', $uid,true,'OR');
            }
         }
         return new CActiveDataProvider('hotels', array('criteria' => $criteria2,'pagination'=>array('pagesize'=>9)));
    }
    
}
public function getCompare($id){
    foreach ($id as $filt){
           $criteria=array('condition'=>'id='.$filt);
     
            }
          return new CActiveDataProvider($this, array('criteria' => $criteria,'pagination'=>array('pagesize'=>9)));  
}

// Get Area or Zone
        public function getAreas()
        {
            return array(
                'east'=>'East',
                'west'=>'West',
                'north'=>'North',
                'south'=>'South',
                
            );

        }
        
}
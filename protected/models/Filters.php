<?php

/**
 * This is the model class for table "ld_filters".
 *
 * The followings are the available columns in table 'ld_filters':
 * @property integer $id
 * @property integer $cat_id
 * @property integer $hotel_id
 * @property string $title
 * @property string $description
 * @property integer $pos
 * @property string $added_date
 * @property integer $status
 * @property string $home 
 * @property string $site
 * @property string $note
 *
 * The followings are the available model relations:
 * @property Hotels $hotel
 */
class Filters extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Filters the static model class
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
		return 'ld_filters';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title', 'required'),
			array('cat_id, pos, status', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>255),
			array('description', 'length', 'max'=>500),
			array('note', 'length', 'max'=>1024),
			array('added_date,cat_id,home,site', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, cat_id, title, description, pos,home,site, added_date, status, note', 'safe', 'on'=>'search'),
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
//			'hotel' => array(self::HAS_MANY, 'Hotels', 'hotel_id'),
                        'cat'=>array(self::HAS_ONE,'Categories','cat_id')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'cat_id' => 'Cat',
			'title' => 'Title',
			'description' => 'Description',
			'pos' => 'Pos',
			'added_date' => 'Added Date',
			'status' => 'Status',
			'note' => 'Note',
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
		$criteria->compare('cat_id',$this->cat_id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('pos',$this->pos);
		$criteria->compare('added_date',$this->added_date,true);
		$criteria->compare('status',$this->status);
                $criteria->compare('home',$this->home,true);
                $criteria->compare('site',$this->site,true);
		$criteria->compare('note',$this->note,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        public function getfilters($id){
            $criteria=new CDbCriteria;
            $criteria->condition = 'cat_id =' .$id ;
//            $criteria->compare('title',$this->title);
            return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
        }
        
}
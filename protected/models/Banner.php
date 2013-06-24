<?php

/**
 * This is the model class for table "ld_banner".
 *
 * The followings are the available columns in table 'ld_banner':
 * @property integer $id
 * @property string $banner_name
 * @property string $banner_image
 * @property string $status
 * @property string $adddate
 */
class Banner extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Banner the static model class
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
		return 'ld_banner';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('adddate', 'required'),
			array('banner_name, banner_image', 'length', 'max'=>300),
			array('status', 'length', 'max'=>3),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, banner_name, banner_image, status, adddate', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'banner_name' => 'Banner Name',
			'banner_image' => 'Banner Image',
			'status' => 'Status',
			'adddate' => 'Adddate',
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
		$criteria->compare('banner_name',$this->banner_name,true);
		$criteria->compare('banner_image',$this->banner_image,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('adddate',$this->adddate,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
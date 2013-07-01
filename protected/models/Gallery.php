<?php

/**
 * This is the model class for table "ld_gallery".
 *
 * The followings are the available columns in table 'ld_gallery':
 * @property integer $id
 * @property integer $product_id
 * @property string $thumb_image
 * @property string $full_image
 * @property string $add_date
 * @property string $status
 */
class Gallery extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Gallery the static model class
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
		return 'ld_gallery';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('product_id, thumb_image, full_image, add_date', 'required'),
			array('product_id', 'numerical', 'integerOnly'=>true),
			array('thumb_image, full_image', 'length', 'max'=>255),
			array('status', 'length', 'max'=>1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, product_id, thumb_image, full_image, add_date, status', 'safe', 'on'=>'search'),
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
                    'hotel0' => array(self::BELONGS_TO, 'hotels', 'product_id'),
    );
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'product_id' => 'Product',
			'thumb_image' => 'Thumb Image',
			'full_image' => 'Full Image',
			'add_date' => 'Add Date',
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
		$criteria->compare('product_id',$this->product_id);
		$criteria->compare('thumb_image',$this->thumb_image,true);
		$criteria->compare('full_image',$this->full_image,true);
		$criteria->compare('add_date',$this->add_date,true);
		$criteria->compare('status',$this->status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
       
}
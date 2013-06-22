<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property string $id
 * @property string $type
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $phone
 * @property string $pass
 * @property string $status
 * @property string $status_last_updated
 */
class User extends CActiveRecord
{
	const STATUS_ACTIVATED = 'activated';
	const STATUS_DEACTIVATED = 'suspended';
	
	/**
	 * Returns the static model of the specified AR class.
	 * @return User the static model class
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
		return 'ld_users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, email, pass', 'required'),
			array('username', 'length', 'max'=>5),
                        array('username', 'unique'),
			array('email', 'length', 'max'=>100),
			array('email', 'email'),
			array('email', 'unique'),
 //			array('categor', 'numerical'),
			array('password', 'length', 'max'=>256),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('username, email, password, status', 'safe', 'on'=>'search'),
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
			'user_det'=>array(self::HAS_ONE, 'Userdetail', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'email' => 'Email',
			'pass' => 'Password',
			'status' => 'Status'
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

		$criteria->compare('id',$this->id,true);
                $criteria->compare('username',$this->username,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('status',$this->status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function getTypeOfStatus()
	{
		return array(
			self::STATUS_ACTIVATED => 'Activated',
			self::STATUS_DEACTIVATED => 'Suspended'
		);
	}
}
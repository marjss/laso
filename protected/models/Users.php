<?php

/**
 * This is the model class for table "ld_users".
 *
 * The followings are the available columns in table 'ld_users':
 * @property integer $id
 * @property integer $mas_role_id
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $activation_key
 * @property string $status
 * @property string $log
 * @property string $add_date
 */
class Users extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Users the static model class
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
			array('username,email,password,add_date', 'required'),
			array('mas_role_id', 'numerical', 'integerOnly'=>true),
			array('username, email, password, activation_key, log', 'length', 'max'=>255),
			array('status', 'length', 'max'=>1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, mas_role_id, username, email, password, activation_key, status, log, add_date', 'safe', 'on'=>'search'),
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
			'mas_role_id' => 'Mas Role',
			'username' => 'Username',
			'email' => 'Email',
			'password' => 'Password',
			'activation_key' => 'Activation Key',
			'status' => 'Status',
			'log' => 'Log',
			'add_date' => 'Add Date',
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
		$criteria->compare('mas_role_id',$this->mas_role_id);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('activation_key',$this->activation_key,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('log',$this->log,true);
		$criteria->compare('add_date',$this->add_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
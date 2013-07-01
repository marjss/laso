<?php

/**
 * This is the model class for table "ld_pages".
 *
 * The followings are the available columns in table 'ld_pages':
 * @property integer $id
 * @property double $section_id
 * @property string $pagename
 * @property string $contents
 * @property string $keyword
 * @property string $title
 * @property string $description
 * @property string $extpage_link
 * @property double $published
 * @property double $parent_id
 * @property double $secure_access
 * @property double $footer
 * @property string $menu_order
 * @property string $status
 */
class Pages extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Pages the static model class
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
		return 'ld_pages';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('section_id, published, parent_id, secure_access, footer', 'numerical'),
			array('pagename, title, extpage_link', 'length', 'max'=>300),
			array('keyword', 'length', 'max'=>600),
			array('description', 'length', 'max'=>1500),
			array('menu_order', 'length', 'max'=>30),
			array('status', 'length', 'max'=>3),
			array('contents', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, section_id, pagename, contents, keyword, title, description, extpage_link, published, parent_id, secure_access, footer, menu_order, status', 'safe', 'on'=>'search'),
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
			'section_id' => 'Section',
			'pagename' => 'Pagename',
			'contents' => 'Contents',
			'keyword' => 'Keyword',
			'title' => 'Title',
			'description' => 'Description',
			'extpage_link' => 'Extpage Link',
			'published' => 'Published',
			'parent_id' => 'Parent',
			'secure_access' => 'Secure Access',
			'footer' => 'Footer',
			'menu_order' => 'Menu Order',
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
		$criteria->compare('section_id',$this->section_id);
		$criteria->compare('pagename',$this->pagename,true);
		$criteria->compare('contents',$this->contents,true);
		$criteria->compare('keyword',$this->keyword,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('extpage_link',$this->extpage_link,true);
		$criteria->compare('published',$this->published);
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('secure_access',$this->secure_access);
		$criteria->compare('footer',$this->footer);
		$criteria->compare('menu_order',$this->menu_order,true);
		$criteria->compare('status',$this->status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
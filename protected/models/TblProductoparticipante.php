<?php

/**
 * This is the model class for table "tbl_productoparticipante".
 *
 * The followings are the available columns in table 'tbl_productoparticipante':
 * @property integer $pp_id
 * @property integer $parti_id
 * @property integer $prod_id
 *
 * The followings are the available model relations:
 * @property TblParticipante $parti
 * @property TblProducto $prod
 */
class TblProductoparticipante extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TblProductoparticipante the static model class
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
		return 'tbl_productoparticipante';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('parti_id, prod_id', 'required'),
			array('parti_id, prod_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('pp_id, parti_id, prod_id', 'safe', 'on'=>'search'),
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
			'parti' => array(self::BELONGS_TO, 'TblParticipante', 'parti_id'),
			'prod' => array(self::BELONGS_TO, 'TblProducto', 'prod_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'pp_id' => 'Pp',
			'parti_id' => 'Parti',
			'prod_id' => 'Prod',
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

		$criteria->compare('pp_id',$this->pp_id);
		$criteria->compare('parti_id',$this->parti_id);
		$criteria->compare('prod_id',$this->prod_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
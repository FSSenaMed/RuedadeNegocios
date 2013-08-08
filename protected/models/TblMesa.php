<?php

/**
 * This is the model class for table "tbl_mesa".
 *
 * The followings are the available columns in table 'tbl_mesa':
 * @property integer $mesa_id
 * @property string $mesa_numero
 * @property string $mesa_estado
 *
 * The followings are the available model relations:
 * @property TblHistorico[] $tblHistoricos
 */
class TblMesa extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TblMesa the static model class
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
		return 'tbl_mesa';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('mesa_id, mesa_numero, mesa_estado', 'required'),
			array('mesa_id', 'numerical', 'integerOnly'=>true),
			array('mesa_numero, mesa_estado', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('mesa_id, mesa_numero, mesa_estado', 'safe', 'on'=>'search'),
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
			'tblHistoricos' => array(self::HAS_MANY, 'TblHistorico', 'mesa_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'mesa_id' => 'Mesa',
			'mesa_numero' => 'Mesa Numero',
			'mesa_estado' => 'Mesa Estado',
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

		$criteria->compare('mesa_id',$this->mesa_id);
		$criteria->compare('mesa_numero',$this->mesa_numero,true);
		$criteria->compare('mesa_estado',$this->mesa_estado,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
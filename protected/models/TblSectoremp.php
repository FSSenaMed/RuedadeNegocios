<?php

/**
 * This is the model class for table "tbl_sectoremp".
 *
 * The followings are the available columns in table 'tbl_sectoremp':
 * @property integer $sec_id
 * @property string $sec_nombre
 * @property integer $sec_estado
 *
 * The followings are the available model relations:
 * @property TblParticipante[] $tblParticipantes
 */
class TblSectoremp extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TblSectoremp the static model class
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
		return 'tbl_sectoremp';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('sec_nombre', 'required'),
			array('sec_estado', 'numerical', 'integerOnly'=>true),
			array('sec_nombre', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('sec_id, sec_nombre, sec_estado', 'safe', 'on'=>'search'),
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
			'tblParticipantes' => array(self::HAS_MANY, 'TblParticipante', 'parti_sector'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'sec_id' => 'Sec',
			'sec_nombre' => 'Sector empresarial',
			'sec_estado' => 'Sec Estado',
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

		$criteria->compare('sec_id',$this->sec_id);
		$criteria->compare('sec_nombre',$this->sec_nombre,true);
		$criteria->compare('sec_estado',$this->sec_estado);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
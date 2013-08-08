<?php

/**
 * This is the model class for table "tbl_registro".
 *
 * The followings are the available columns in table 'tbl_registro':
 * @property integer $registro_id
 * @property integer $rueda_id
 * @property integer $parti_id
 *
 * The followings are the available model relations:
 * @property TblCita[] $tblCitas
 * @property TblParticipante $parti
 * @property TblRuedaNegocios $rueda
 */
class TblRegistro extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TblRegistro the static model class
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
		return 'tbl_registro';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('rueda_id, parti_id', 'required'),
			array('rueda_id, parti_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('registro_id, rueda_id, parti_id', 'safe', 'on'=>'search'),
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
			'tblCitas' => array(self::HAS_MANY, 'TblCita', 'registro_idEmp1'),
			'parti' => array(self::BELONGS_TO, 'TblParticipante', 'parti_id'),
			'rueda' => array(self::BELONGS_TO, 'TblRuedaNegocios', 'rueda_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'registro_id' => 'Registro',
			'rueda_id' => 'Rueda',
			'parti_id' => 'Parti',
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

		$criteria->compare('registro_id',$this->registro_id);
		$criteria->compare('rueda_id',$this->rueda_id);
		$criteria->compare('parti_id',$this->parti_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
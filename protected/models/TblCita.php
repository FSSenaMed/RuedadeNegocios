<?php

/**
 * This is the model class for table "tbl_cita".
 *
 * The followings are the available columns in table 'tbl_cita':
 * @property integer $cita_id
 * @property string $cita_hora
 * @property integer $registro_idEmp1
 * @property integer $registro_idEmp2
 * @property integer $historico
 *
 * The followings are the available model relations:
 * @property TblHistorico $historico0
 * @property TblRegistro $registroIdEmp2
 */
class TblCita extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TblCita the static model class
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
		return 'tbl_cita';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cita_hora, registro_idEmp1, registro_idEmp2, historico', 'required'),
			array('registro_idEmp1, registro_idEmp2, historico', 'numerical', 'integerOnly'=>true),
			array('cita_hora', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('cita_id, cita_hora, registro_idEmp1, registro_idEmp2, historico', 'safe', 'on'=>'search'),
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
			'historico0' => array(self::BELONGS_TO, 'TblHistorico', 'historico'),
			'registroIdEmp2' => array(self::BELONGS_TO, 'TblRegistro', 'registro_idEmp2'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'cita_id' => 'Cita',
			'cita_hora' => 'Cita Hora',
			'registro_idEmp1' => 'Registro Id Emp1',
			'registro_idEmp2' => 'Registro Id Emp2',
			'historico' => 'Historico',
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

		$criteria->compare('cita_id',$this->cita_id);
		$criteria->compare('cita_hora',$this->cita_hora,true);
		$criteria->compare('registro_idEmp1',$this->registro_idEmp1);
		$criteria->compare('registro_idEmp2',$this->registro_idEmp2);
		$criteria->compare('historico',$this->historico);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
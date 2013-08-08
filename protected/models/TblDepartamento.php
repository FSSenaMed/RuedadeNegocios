<?php

/**
 * This is the model class for table "tbl_departamento".
 *
 * The followings are the available columns in table 'tbl_departamento':
 * @property string $dep_id
 * @property string $dep_nombre
 * @property integer $dep_estado
 *
 * The followings are the available model relations:
 * @property TblMunicipio[] $tblMunicipios
 */
class TblDepartamento extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TblDepartamento the static model class
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
		return 'tbl_departamento';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('dep_id, dep_nombre, dep_estado', 'required'),
			array('dep_estado', 'numerical', 'integerOnly'=>true),
			array('dep_id', 'length', 'max'=>2),
			array('dep_nombre', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('dep_id, dep_nombre, dep_estado', 'safe', 'on'=>'search'),
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
			'tblMunicipios' => array(self::HAS_MANY, 'TblMunicipio', 'dep_codigo'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'dep_id' => 'Dep',
			'dep_nombre' => 'Departamento',
			'dep_estado' => 'Dep Estado',
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

		$criteria->compare('dep_id',$this->dep_id,true);
		$criteria->compare('dep_nombre',$this->dep_nombre,true);
		$criteria->compare('dep_estado',$this->dep_estado);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
<?php

/**
 * This is the model class for table "tbl_ruedaNegocios".
 *
 * The followings are the available columns in table 'tbl_ruedaNegocios':
 * @property integer $rueda_id
 * @property string $rueda_fechaCreacion
 * @property string $rueda_fechainiregistro
 * @property string $rueda_fechafinregistro
 * @property string $rueda_descripcion
 * @property string $dep_id
 * @property string $rueda_tiempocita
 * @property string $rueda_horinicio
 * @property string $rueda_horfin
 * @property integer $rueda_estado
 * @property string $rueda_tiempoinduccion
 * @property string $rueda_horinicioalmuerzo
 * @property string $rueda_horfinalmuerzo
 *
 * The followings are the available model relations:
 * @property TblRegistro[] $tblRegistros
 * @property TblDepartamento $dep
 */
class TblRuedaNegocios extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TblRuedaNegocios the static model class
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
		return 'tbl_ruedaNegocios';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('rueda_fechaCreacion, rueda_fechainiregistro, rueda_fechafinregistro, dep_id, rueda_tiempocita, rueda_horinicio, rueda_horfin, rueda_horinicioalmuerzo, rueda_horfinalmuerzo', 'required'),
			array('rueda_estado', 'numerical', 'integerOnly'=>true),
			array('rueda_descripcion', 'length', 'max'=>150),
			array('dep_id', 'length', 'max'=>45),
			array('rueda_tiempoinduccion', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('rueda_id, rueda_fechaCreacion, rueda_fechainiregistro, rueda_fechafinregistro, rueda_descripcion, dep_id, rueda_tiempocita, rueda_horinicio, rueda_horfin, rueda_estado, rueda_tiempoinduccion, rueda_horinicioalmuerzo, rueda_horfinalmuerzo', 'safe', 'on'=>'search'),
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
			'tblRegistros' => array(self::HAS_MANY, 'TblRegistro', 'rueda_id'),
			'dep' => array(self::BELONGS_TO, 'TblDepartamento', 'dep_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'rueda_id' => 'Rueda',
			'rueda_fechaCreacion' => 'Rueda Fecha Creacion',
			'rueda_fechainiregistro' => 'Rueda Fechainiregistro',
			'rueda_fechafinregistro' => 'Rueda Fechafinregistro',
			'rueda_descripcion' => 'Rueda Descripcion',
			'dep_id' => 'Dep',
			'rueda_tiempocita' => 'Rueda Tiempocita',
			'rueda_horinicio' => 'Rueda Horinicio',
			'rueda_horfin' => 'Rueda Horfin',
			'rueda_estado' => 'Rueda Estado',
			'rueda_tiempoinduccion' => 'Rueda Tiempoinduccion',
			'rueda_horinicioalmuerzo' => 'Rueda Horinicioalmuerzo',
			'rueda_horfinalmuerzo' => 'Rueda Horfinalmuerzo',
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

		$criteria->compare('rueda_id',$this->rueda_id);
		$criteria->compare('rueda_fechaCreacion',$this->rueda_fechaCreacion,true);
		$criteria->compare('rueda_fechainiregistro',$this->rueda_fechainiregistro,true);
		$criteria->compare('rueda_fechafinregistro',$this->rueda_fechafinregistro,true);
		$criteria->compare('rueda_descripcion',$this->rueda_descripcion,true);
		$criteria->compare('dep_id',$this->dep_id,true);
		$criteria->compare('rueda_tiempocita',$this->rueda_tiempocita,true);
		$criteria->compare('rueda_horinicio',$this->rueda_horinicio,true);
		$criteria->compare('rueda_horfin',$this->rueda_horfin,true);
		$criteria->compare('rueda_estado',$this->rueda_estado);
		$criteria->compare('rueda_tiempoinduccion',$this->rueda_tiempoinduccion,true);
		$criteria->compare('rueda_horinicioalmuerzo',$this->rueda_horinicioalmuerzo,true);
		$criteria->compare('rueda_horfinalmuerzo',$this->rueda_horfinalmuerzo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
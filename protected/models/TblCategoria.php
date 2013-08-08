<?php

/**
 * This is the model class for table "tbl_categoria".
 *
 * The followings are the available columns in table 'tbl_categoria':
 * @property integer $cate_id
 * @property string $cate_nombre
 * @property integer $porne_estado
 *
 * The followings are the available model relations:
 * @property TblProducto[] $tblProductos
 */
class TblCategoria extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TblCategoria the static model class
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
		return 'tbl_categoria';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cate_nombre', 'required'),
			array('porne_estado', 'numerical', 'integerOnly'=>true),
			array('cate_nombre', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('cate_id, cate_nombre, porne_estado', 'safe', 'on'=>'search'),
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
			'tblProductos' => array(self::HAS_MANY, 'TblProducto', 'id_categoria'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'cate_id' => 'Cate',
			'cate_nombre' => 'Categoria',
			'porne_estado' => 'Porne Estado',
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

		$criteria->compare('cate_id',$this->cate_id);
		$criteria->compare('cate_nombre',$this->cate_nombre,true);
		$criteria->compare('porne_estado',$this->porne_estado);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
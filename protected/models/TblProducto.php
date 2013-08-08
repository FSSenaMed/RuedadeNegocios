<?php

/**
 * This is the model class for table "tbl_producto".
 *
 * The followings are the available columns in table 'tbl_producto':
 * @property integer $prod_id
 * @property string $prod_producto
 * @property string $prod_descripcion
 * @property integer $prod_sector
 * @property integer $parti_id
 * @property string $prod_estado
 * @property integer $id_categoria
 *
 * The followings are the available model relations:
 * @property TblCategoria $idCategoria
 * @property TblSectoremp $prodSector
 * @property TblProductoparticipante[] $tblProductoparticipantes
 */
class TblProducto extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TblProducto the static model class
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
		return 'tbl_producto';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('prod_producto, prod_sector, parti_id, id_categoria', 'required'),
			array('prod_sector, parti_id, id_categoria', 'numerical', 'integerOnly'=>true),
			array('prod_producto', 'length', 'max'=>60),
			array('prod_descripcion', 'length', 'max'=>120),
			array('prod_estado', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('prod_id, prod_producto, prod_descripcion, prod_sector, parti_id, prod_estado, id_categoria', 'safe', 'on'=>'search'),
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
			'idCategoria' => array(self::BELONGS_TO, 'TblCategoria', 'id_categoria'),
			'prodSector' => array(self::BELONGS_TO, 'TblSectoremp', 'prod_sector'),
			
			'tblProductoparticipantes' => array(self::HAS_MANY, 'TblProductoparticipante', 'prod_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'prod_id' => 'Prod',
			'prod_producto' => 'Prod Producto',
			'prod_descripcion' => 'Prod Descripcion',
			'prod_sector' => 'Prod Sector',
			'parti_id' => 'Parti',
			'prod_estado' => 'Prod Estado',
			'id_categoria' => 'Id Categoria',
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

		$criteria->compare('prod_id',$this->prod_id);
		$criteria->compare('prod_producto',$this->prod_producto,true);
		$criteria->compare('prod_descripcion',$this->prod_descripcion,true);
		$criteria->compare('prod_sector',$this->prod_sector);
		$criteria->compare('parti_id',$this->parti_id);
		$criteria->compare('prod_estado',$this->prod_estado,true);
		$criteria->compare('id_categoria',$this->id_categoria);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
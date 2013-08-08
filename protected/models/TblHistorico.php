<?php

/**
 * This is the model class for table "tbl_historico".
 *
 * The followings are the available columns in table 'tbl_historico':
 * @property integer $histo_id
 * @property string $histo_horainic
 * @property integer $mesa_id
 *
 * The followings are the available model relations:
 * @property TblCita[] $tblCitas
 * @property TblMesa $mesa
 */
class TblHistorico extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TblHistorico the static model class
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
		return 'tbl_historico';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('histo_id, histo_horainic, mesa_id', 'required'),
			array('histo_id, mesa_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('histo_id, histo_horainic, mesa_id', 'safe', 'on'=>'search'),
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
			'tblCitas' => array(self::HAS_MANY, 'TblCita', 'historico'),
			'mesa' => array(self::BELONGS_TO, 'TblMesa', 'mesa_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'histo_id' => 'Histo',
			'histo_horainic' => 'Histo Horainic',
			'mesa_id' => 'Mesa',
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

		$criteria->compare('histo_id',$this->histo_id);
		$criteria->compare('histo_horainic',$this->histo_horainic,true);
		$criteria->compare('mesa_id',$this->mesa_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
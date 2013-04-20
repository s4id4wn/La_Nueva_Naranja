<?php

/**
 * This is the model class for table "tbl_service_type".
 *
 * The followings are the available columns in table 'tbl_service_type':
 * @property string $id
 * @property string $name
 * @property integer $active
 *
 * The followings are the available model relations:
 * @property TblActivityVerification[] $tblActivityVerifications
 * @property TblDiagnostic[] $tblDiagnostics
 * @property TblOrder[] $tblOrders
 * @property TblService[] $tblServices
 * @property TblWork[] $tblWorks
 */
class ServiceType extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ServiceType the static model class
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
		return 'tbl_service_type';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, active', 'required'),
			array('active', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>50),
			array('name', 'unique','message'=>'Tipo de servicio ya existe.'),   
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, active', 'safe', 'on'=>'search'),
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
			'tblActivityVerifications' => array(self::HAS_MANY, 'TblActivityVerification', 'service_type_id'),
			'tblDiagnostics' => array(self::HAS_MANY, 'TblDiagnostic', 'service_type_id'),
			'tblOrders' => array(self::HAS_MANY, 'TblOrder', 'service_type_id'),
			'tblServices' => array(self::HAS_MANY, 'TblService', 'service_type_id'),
			'tblWorks' => array(self::HAS_MANY, 'TblWork', 'service_type_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Tipo de Servicio',
			'active' => 'Activo',
		);
	}
	
	public function getActive($active)
	{
		if($active=='1'){
			return 'Si';
		}
		else{
			return 'No';
		}
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('active',$this->active);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function logical_deletion()
	{
		$result = $this->updateByPk($this->id, array("active"=>'0'));
	}
}
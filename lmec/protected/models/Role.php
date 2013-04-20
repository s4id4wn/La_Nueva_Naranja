<?php

/**
 * This is the model class for table "tbl_role".
 *
 * The followings are the available columns in table 'tbl_role':
 * @property string $id
 * @property string $name
 * @property string $url_initial
 * @property integer $priority
 * @property integer $active
 *
 * The followings are the available model relations:
 * @property User[] $tblUsers
 */
class Role extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Role the static model class
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
		return 'tbl_role';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('name, url_initial, priority, active', 'required'), url y prioridad en que momento ?
			array('name, active', 'required'),
			array('name', 'unique','message'=>'Rol creado enteriormente.'),
			array('priority, active', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>45),
			array('url_initial', 'length', 'max'=>70),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, url_initial, priority, active', 'safe', 'on'=>'search'),
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
			'tblUsers' => array(self::MANY_MANY, 'User', 'tbl_user_role(role_id, user_id)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'name' => 'Rol',
			//'url_initial' => 'Url Initial',
			//'priority' => 'Priority',
			'active' => 'Activo',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('url_initial',$this->url_initial,true);
		$criteria->compare('priority',$this->priority);
		$criteria->compare('active',$this->active);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
				'pageSize'=>Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']),
			),
		));
	}
	
	public function findIdRoleInUserRole($role_id)
	{
		//en tbl_user_role
		//obtenemos todos los ids de los usuarios que tengan el rol a desactivar
		$model = UserRole::model()->findAll('role_id =' . $role_id );
		
		/*foreach($model as $user_role)
		{
			$roles_existing[] = $user_role->role_id;
			var_dump($user_role->role_id);
		die();
		}*/
		/*
		1. obtenemos todos los id de los user donde haya el id del role
		2. eliminamos todos los modelosde user_role donde haya el id del rol
		3. luego si no se encuentra cada id de user en user_role procedemos a 
			desactivar el user
		
		*/
		
		
	}
	
	public function deleteRelationUserRole($role_id)
	{
		UserRole::model()->deleteAll('role_id =' . $role_id);//retorna el número de líneas afectadas
	}
	
		public function getActive($active)
	{
		if($active=='1')
		{
			return 'Si';
		}
		else if($active=='0')
		{
			return 'No';
		}
	}
	
	
	
}
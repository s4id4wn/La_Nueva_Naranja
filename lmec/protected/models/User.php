<?php

/**
 * This is the model class for table "tbl_user".
 *
 * The followings are the available columns in table 'tbl_user':
 * @property string $id
 * @property string $user
 * @property string $password
 * @property string $name
 * @property string $last_name
 * @property string $email
 * @property integer $active
 *
 * The followings are the available model relations:
 * @property BlogGuarantee[] $blogGuarantees
 * @property BlogOrder[] $blogOrders
 * @property BlogSpare[] $blogSpares
 * @property BlogStatusOrder[] $blogStatusOrders
 * @property BlogStatusOrder[] $blogStatusOrders1
 * @property Diagnostic[] $diagnostics
 * @property Order[] $orders
 * @property OutOrder[] $outOrders
 * @property RepairWork[] $repairWorks
 * @property TechnicalOrder[] $technicalOrders
 * @property UserRole[] $userRoles
 */
class User extends CActiveRecord
{
	public $_password2;
	public $_password3;
	public $_selected_roles;
	public $_Roles;
	
	private $_currentPassword;
	
	
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
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
		return 'tbl_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		
		//	AGREGAR TODOS LOS ESCENARIOS

		return array(
			array('user, name, last_name, email, active', 'required'),
			array('user', 'unique','message'=>'Usuario no disponible, favor de elegir otro.'),
			array('_selected_roles', 'required', 'message'=>'Favor de seleccionar al menos un rol.'),
			array('_password2, _password3', 'required','on'=>'create'),
			array('active', 'numerical', 'integerOnly'=>true),
			array('user', 'length', 'min'=>8, 'max'=>20),
			array('email', 'email'),
			//array('_selected_roles','validateRoles','on'=>'create'),
			array('name, last_name, email', 'length', 'max'=>100),
			
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user, password, name, last_name, email, active', 'safe', 'on'=>'search'),
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
			'blogGuarantees' => array(self::HAS_MANY, 'BlogGuarantee', 'technician_user__id'),
			'blogOrders' => array(self::HAS_MANY, 'BlogOrder', 'user_technical_id'),
			'blogSpares' => array(self::HAS_MANY, 'BlogSpare', 'user_id'),
			'blogStatusOrders' => array(self::HAS_MANY, 'BlogStatusOrder', 'user_who_assigned_id'),
			'blogStatusOrders1' => array(self::HAS_MANY, 'BlogStatusOrder', 'user_assigned_id'),
			'diagnostics' => array(self::HAS_MANY, 'Diagnostic', 'user_technical_id'),
			'orders' => array(self::HAS_MANY, 'Order', 'receptionist_user_id'),
			'outOrders' => array(self::HAS_MANY, 'OutOrder', 'user_id'),
			'repairWorks' => array(self::HAS_MANY, 'RepairWork', 'user_id'),
			'technicalOrders' => array(self::HAS_MANY, 'TechnicalOrder', 'user_id'),
			
            'roles' => array(self::MANY_MANY, 'Role', 'tbl_user_role(user_id,role_id)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	 
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user' => 'Usuario',
			'password' => 'Contraseña',
			'_password2' => 'Contraseña',
			'_password3' => 'Confirmar contraseña',
			'name' => 'Nombres',
			'last_name' => 'Apellidos',
			'email' => 'Correo electrónico',
            '_selected_roles' =>'Roles',
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
		$criteria->compare('user',$this->user,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('active',$this->active,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
				'pageSize'=>Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']),
			),
		));
	}
	
	
	public function validateRoles($attribute,$params)
	{
		
		 if( empty($this->_selected_roles ) )
		{
			$this->addError('_selected_roles','Debes seleccionar al menos un rol');//corregir !! ******************
		}
		else if( !is_array( $this->_selected_roles ) )
		{
			$this->addError('_selected_roles','Rol seleccionado incorrectamente.');
		}
		else
		{
			$ids_actives_roles = $this->getIdsActivesRoles();
			
			foreach($this->_selected_roles as $selected_role)
			{
				if( !in_array($selected_role, $ids_actives_roles ) )
				{
					$this->addError('_selected_roles','Valor incorrecto de rol');
				}
			}
		}
	}
	
	private function getIdsActivesRoles()
	{
		$actives_roles=Role::model()->findAll('active = 1 ');
		$ids = array();
		
		foreach($actives_roles as $active)
		{
			$ids[] = $active->id;
		}
		return $ids;
	}
	
	
	public function add_user_role($user_id)
	{
		foreach($this->_selected_roles as $id_selected_role)
		{		
			$model = new UserRole;
			$model->user_id = $user_id;
			$model->role_id = $id_selected_role;
			$model->save();
		}
	}

    public function logicalDeletion($id)
	{
		$model = User::model()->updateByPk($id, array('active'=>'0'));
		/*
		$transaction = Yii::app()->db->beginTransaction();
			try{
			
			// we only allow deletion via POST request
		$model = User::model()->updateByPk($id, array('active'=>'0'));
			
			}
			catch(Exception $exception)
			{
				$transaction->rollback();
			}
		*/
		/*var_dump($id);
		die();
		$model=User::model()->findByPk($id);
		$model->active = 0;
		$model->save();*/
		
	}
	
	
	public function activate($id)
	{
		User::model()->updateByPk($id, array('active'=>'1'));
	}
	
	public function getExistingRolesOfUser($user_id)
	{
		$userRole = UserRole::model()->findAll('user_id = ' . $user_id );
		$roles_existing = array();
		
		foreach($userRole as $user_role)
		{
			$roles_existing[] = $user_role->role_id;
		}
		return $roles_existing;
	}
	
	
	
	public function deleteRolesOfUser($user_id)
	{
		UserRole::model()->deleteAll('user_id =' . $user_id);//retorna el n�mero de l�neas afectadas
	}
	/**
	 * Descripcion: Guarda el password en otra variable.
	 */
	protected function afterFind()
	{
		$this->_currentPassword = $this->password;
	}
	
	/**
	 * Descripcion: Encripta el password antes de ser guardado en la BD, sea una actualizacion o un nuevo usuario creado.
	 * @return true, false.
	 */
	public function getPassword()
	{
		if($this->isNewRecord)
		{
			$this->password = $this->encrypt($this->_password2);
		}
	}
	
	public function getUserRoles($user)
	{
		$command = Yii::app()->db->createCommand()
		->select('tbl_role.name')
		->from('tbl_user_role')
		->join('tbl_user', 'tbl_user_role.user_id = tbl_user.id')
		->join('tbl_role', 'tbl_user_role.role_id = tbl_role.id')
		->where("user ='$user'")
		->queryAll();
		
		$string = null;
		foreach ($command as $value)
		{
			foreach($value as $v){
				$string = $string . $v . '<br>';
			}
		}
		return substr(($string), 0, -1); 
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
	
	
	public function encrypt($value)
	{
		return crypt($value);
	}   
}
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

	public $password2;
	public $password3;
	public $selected_roles;
	//public $Roles;
	
	
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
		return array(
			array('user, password2, password3, name, last_name, email, active', 'required'),
			array('active', 'numerical', 'integerOnly'=>true),
			array('user', 'length', 'min'=>8, 'max'=>20),
			array('email', 'email'),
			array('selected_roles','validateRoles'),
			array('password2, password3', 'length', 'min'=>8, 'max'=>35),
			array('password2', 'compare', 'compareAttribute'=>'password3'),
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
			//'userRoles' => array(self::HAS_MANY, 'UserRole', 'user_id'),
                    
            'rols' => array(self::MANY_MANY, 'Role', 'tbl_user_role(user_id,role_id)'),
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
			'password2' => 'Contraseña',
			'password3' => 'Confirmar contraseña',
			'name' => 'Nombres',
			'last_name' => 'Apellidos',
			'email' => 'Correo electrónico',
            'selected_roles' =>'Roles',
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
		//$criteria->compare('password',$this->password,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('email',$this->email,true);
		
		$criteria->compare('active',$this->active,true);
		//$criteria->condition = 'active = 1'; 	//mostrar solo los activos

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function validateRoles($attribute,$params)
	{
	//var_dump($this->selected_roles);
	
//		$actives_roles = $this->get_actives_roles();
		//var_dump($actives_roles);
		//var_dump($this->selected_roles);
		
//		if( empty($actives_roles))
//		{
//			throw new CHttpException(400,'No hay roles, debes agregar antes de registrar un usuario');
			//$this->addError('selected_roles','Debes agregar roles antes de agregar usuarios');
//		}
//		else if( empty($this->selected_roles) )
		if( empty($this->selected_roles) )
		{
			$this->addError('selected_roles','Debes seleccionar al menos un rol');
		}
		else if( !is_array($this->selected_roles) )
		{
			$this->addError('selected_roles','Rol seleccionado incorrectamente');
		}
		else
		{
			$correct_values = true;
			
			//var_dump($this->selected_roles);///
			//var_dump($actives_roles);
			foreach($this->selected_roles as $selected_role)
			{
			
			//var_dump($actives_roles);
//				if( !in_array($selected_role, $actives_roles ) )
				if( !in_array($selected_role, array ('administrador','tecnico' ) ) )
				{
					$this->addError('selected_roles','Valor incorrecto de rol');
					$correct_values=false;
				}
			}
			if($correct_values==true)
			{
				$this->add_roles($this->selected_roles);
				
			}
		}
	}

	private function get_actives_roles()
	{
		$connection=Yii::app()->db;
		
		$sql = 'SELECT role FROM tbl_role WHERE active = 1';//1=active,0=inactive
		$command=$connection->createCommand($sql);
		$dataReader=$command->query();
		$actives_roles=$dataReader->readAll();
		
		
		//foreach($actives_roles as $acti){
		//var_dump($acti);
		//}
		
		//return $actives_roles;
		return $actives_roles;
	}	
	
	private function add_roles($selected_roles)
	{	
//	var_dump($selected_roles);
		$connection=Yii::app()->db;
		
		foreach($selected_roles as $selected_role){
		
		$id_role = $this->get_id_active_role($selected_role);
		//var_dump($selected_role);
		
		$this->insert_selected_role($id_role);
		
		//$affected_lines = insert_selected_role($id_role);
		
		}
	}
	
	private function insert_selected_role($id_role)
	{
		$connection=Yii::app()->db;
		//var_dump($id_role);
		//var_dump($this->id);
		//$num_line = Yii::app()->db->createCommand()
		//->insert('tbl_user_role',array('id_role'=>$id_role, 'id_user'=>$this->id));
		//$sql = 'INSERT INTO tbl_user_role (user_id,role_id) VALUES (' . $this->id . ','. $id_role . ')';
		$sql = 'INSERT INTO tbl_user_role (user_id,role_id,active) VALUES (70,70,1)';
		$command=$connection->createCommand($sql);
		$affected_lines=$command->execute();
		//return $affected_lines;
	}
	
	private function get_id_active_role($selected_role)
	{
		//$connection=Yii::app()->db;
		
		//var_dump($selected_role);
		//$sql = 'SELECT id FROM tbl_role WHERE role = ' . $selected_role ;
		//$command=$connection->createCommand($sql);
		//$dataReader=$command->query();
		//$id_role=$dataReader->readAll();
		//$dataReader->bindColumn(1,$id_role);
		$id_role = Yii::app()->db->createCommand()
		->select('id')
		->from('tbl_role')
		->where('role=:role', array(':role'=>$selected_role))
		->queryRow();
	
	 return $id_role;
	
	}
	
    public function logical_deletion()
	{
	//var_dump($sql);
	$connection=Yii::app()->db;   
        //UPDATE tbl_user SET active = 0 WHERE 1
	$sql = 'UPDATE tbl_user SET active = 0 WHERE id = ' . $this->id ;
        
        $command=$connection->createCommand($sql);

        $number_line_affected=$command->execute();
		//var_dump($number_line_affected);
		//if(!$number_line_affected==1){
		//	return true;
		//}else
		//{
		//	return false;
		//}
	}
	
	
        
}
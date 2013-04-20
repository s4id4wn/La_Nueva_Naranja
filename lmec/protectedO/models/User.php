<?php

/**
 * This is the model class for table "tbl_user".
 *
 * The followings are the available columns in table 'tbl_user':
 * @property string $id
 * @property string $user_name
 * @property string $password
 * @property string $name
 * @property string $last_name
 * @property string $email
 * @property integer $active
 *
 * The followings are the available model relations:
 * @property TblBlogGuarantee[] $tblBlogGuarantees
 * @property TblBlogOrder[] $tblBlogOrders
 * @property TblBlogSpare[] $tblBlogSpares
 * @property TblBlogStatusOrder[] $tblBlogStatusOrders
 * @property TblBlogStatusOrder[] $tblBlogStatusOrders1
 * @property TblDiagnostic[] $tblDiagnostics
 * @property TblOrder[] $tblOrders
 * @property TblOutOrder[] $tblOutOrders
 * @property TblRepairWork[] $tblRepairWorks
 * @property TblTechnicalOrder[] $tblTechnicalOrders
 * @property TblUserRole[] $tblUserRoles
 */
class User extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	 
	private $_currentPassword;
	 
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
			array('user_name, password, name, last_name, email, active', 'required'),
			array('active', 'numerical', 'integerOnly'=>true),
			array('user_name', 'length', 'max'=>20),
			array('password', 'length', 'max'=>35),
			array('name, last_name, email', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_name, password, name, last_name, email, active', 'safe', 'on'=>'search'),
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
			'tblBlogGuarantees' => array(self::HAS_MANY, 'TblBlogGuarantee', 'technician_user__id'),
			'tblBlogOrders' => array(self::HAS_MANY, 'TblBlogOrder', 'user_technical_id'),
			'tblBlogSpares' => array(self::HAS_MANY, 'TblBlogSpare', 'user_id'),
			'tblBlogStatusOrders' => array(self::HAS_MANY, 'TblBlogStatusOrder', 'user_who_assigned_id'),
			'tblBlogStatusOrders1' => array(self::HAS_MANY, 'TblBlogStatusOrder', 'user_assigned_id'),
			'tblDiagnostics' => array(self::HAS_MANY, 'TblDiagnostic', 'user_technical_id'),
			'tblOrders' => array(self::HAS_MANY, 'TblOrder', 'receptionist_user_id'),
			'tblOutOrders' => array(self::HAS_MANY, 'TblOutOrder', 'user_id'),
			'tblRepairWorks' => array(self::HAS_MANY, 'TblRepairWork', 'user_id'),
			'tblTechnicalOrders' => array(self::HAS_MANY, 'TblTechnicalOrder', 'user_id'),
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
			'user_name' => 'User Name',
			'password' => 'Password',
			'name' => 'Name',
			'last_name' => 'Last Name',
			'email' => 'Email',
			'active' => 'Active',
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
		$criteria->compare('user_name',$this->user_name,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('active',$this->active);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
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
	protected function afterValidate()
	{
		parent::afterValidate();
		if($this->isNewRecord)
		{
			$this->password = $this->encrypt($this->password);
		}
		else if($this->_currentPassword !== $this->password)
		{
			$this->password = $this->encrypt($this->password);
		}
	}
	
	public function encrypt($value)
	{
		return crypt($value);
	}
}
<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	 
	 /*
     * @var ID del usuario identificado.
     */
	 private $_id;
	 /*
     * @var usuario activo 
     */
	 const ACTIVE = 1;
	 /*
     * @var Error de usuario eliminado (baja logica).
     */
	 const ERROR_NO_ACTIVE_USER = 3;
	 
	 /**
	 * Descripcion: verifica que el password es igual al encriptado en la base de datos.
	 * @return verdaderos si el password coincide si no retorna falso.
	 */
	 private function AuthenticateEncryptPassword($user)
	 {
		return crypt($this->password,$user->password) === $user->password;
	 }
	 
	 /**
	 * Descripcion: retorna todos los roles con los que cuenta el usuario logueado.
	 * @return un string con Roles. ej. "administrador,tecnico,estadista".
	 */
	 private function getRoles($name)
	 {
		$command = Yii::app()->db->createCommand()
		->select('tbl_role.role')
		->from('tbl_user_role')
		->join('tbl_user', 'tbl_user_role.user_id = tbl_user.id')
		->join('tbl_role', 'tbl_user_role.role_id = tbl_role.id')
		->where("user_name ='$name'")
		->queryAll();
		
		$string = null;
		foreach ($command as $value)
		{
			foreach($value as $v){
				$string = $string . strtolower($v) . ",";
			}
		}
		return substr(($string), 0, -1);
	 }
	 
	 /**
	 * Descripcion: autentifica si el usuario existe y valida si un usuario esta activo.
	 * @return error o sin errores.
	 */
	public function authenticate()
	{
		$user = User::model()->findByAttributes(array('user_name'=>$this->username));
		
		if ($user===null) 
		{
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		}
		else if ($this->AuthenticateEncryptPassword($user)) 
		{
			if($user->active == self::ACTIVE)
			{
				$this->_id=$user->id;
				$this->username=$user->user_name;
				$this->setState('roles', $this->getRoles($user->user_name));
				$this->errorCode=self::ERROR_NONE;
			}
			else {
				$this->errorCode=self::ERROR_NO_ACTIVE_USER;
			}
		} 
		else {
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		}
		
	return !$this->errorCode;
	}
	
	 /**
	 * Descripcion: get id.
	 * @return el id del usuario logueado.
	 */
	public function getId()
    {
        return $this->_id;
    }
}
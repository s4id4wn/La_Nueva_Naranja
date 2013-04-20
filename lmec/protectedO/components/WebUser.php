<?php
class WebUser extends CWebUser
{
    /**
     * Overrides a Yii method that is used for roles in controllers (accessRules).
     *
     * @param string $operation Name of the operation required (here, a role).
     * @param mixed $params (opt) Parameters for this operation, usually the object to access.
     * @return bool Permission granted?
     */
    public function checkAccess($operation, $params=array())
    {
		//si tiene comas viene del checkaccess
        if (empty($this->id)) // Not identified => no rights
		{ 
            return false;
        }
		else 
		{
			$role = $this->getState("roles"); // $role = "administrador,tecnico,estadista".

			$roles = explode(',', $role); // $roles array[3].
			
			if ($role === 'administrador') // Si es administrador tiene privilegios a todo.
			{
				return true;
			}
			if (in_array($operation, $roles))
			{
				return true;
			}
		}
		return false;
	}
}
<?php

class UserIdentity extends CUserIdentity
{
	private $_id;
	private $_role;

	public function authenticate()
	{
		// Buscar al usuario en la base de datos usando el username (email)
		$user = User::model()->findByAttributes(array('email' => $this->username));

		// Si el usuario no existe
		if ($user === null) {
			$this->errorCode = self::ERROR_USERNAME_INVALID;
		}
		// Si el usuario existe, pero la contraseña no coincide con el hash
		else if (!password_verify($this->password, $user->password)) {
			$this->errorCode = self::ERROR_PASSWORD_INVALID;
		} else {
			// Si la autenticación es exitosa
			$this->_id = $user->id;  // Guardamos el ID del usuario autenticado
			$this->_role = $user->role_id;  // Guardamos el rol del usuario
			$this->setState('role', $user->role_id);  // Guardamos el rol en el estado de la sesión
			$this->errorCode = self::ERROR_NONE;  // Autenticación exitosa
		}

		return !$this->errorCode;
	}

	// Retornar el ID del usuario
	public function getId()
	{
		return $this->_id;
	}

	// Retornar el rol del usuario (si es necesario)
	public function getRole()
	{
		return $this->_role;
	}
}

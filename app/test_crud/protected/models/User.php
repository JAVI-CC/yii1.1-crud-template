<?php

class User extends CActiveRecord
{
	// Definir los atributos que corresponden a las columnas de la tabla
	public $id;
	public $nombre;
	public $apellidos;
	public $email;
	public $password;
	public $fecha_nacimiento;
	public $role_id;
	public $is_active;
	public $points;

	// La clave primaria de la tabla
	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}

	// Definir el nombre de la tabla
	public function tableName()
	{
		return 'users';  // Nombre de la tabla
	}

	// Definir las reglas de validación
	public function rules()
	{
		return array(
			// Validar campos obligatorios
			array('nombre, apellidos, email, password, role_id', 'required'),

			// Validar que el formato del email sea correcto
			array('email', 'email'),

			// Validar que el email sea único
			array('email', 'unique', 'className' => 'User', 'attributeName' => 'email', 'message' => 'Este correo electrónico ya está en uso'),

			// Validar la longitud de los campos de texto
			array('nombre, apellidos', 'length', 'min' => 2, 'max' => 100, 'message' => 'El nombre y los apellidos deben tener entre 2 y 100 caracteres'),
			array('email', 'length', 'max' => 255, 'message' => 'El correo electrónico no puede tener más de 255 caracteres'),
			array('password', 'length', 'min' => 6, 'message' => 'La contraseña debe tener al menos 6 caracteres'),

			// Validar que 'is_active' y 'points' sean numéricos
			array('is_active, points', 'numerical', 'integerOnly' => true),

			// Validar el formato de la fecha de nacimiento
			array('fecha_nacimiento', 'date', 'format' => 'yyyy-MM-dd'),
		);
	}

	// Este método se ejecuta antes de guardar el modelo
	protected function beforeSave()
	{
		if ($this->isNewRecord) {
			// Hasheamos la contraseña antes de guardarla
			$this->password = password_hash($this->password, PASSWORD_BCRYPT);
		}
		return parent::beforeSave();
	}

	// Relación con la tabla 'roles' (uno a muchos)
	public function relations()
	{
		return array(
			'role' => array(self::BELONGS_TO, 'Role', 'role_id'),  // Relación con la tabla 'roles'
			'tags' => array(self::MANY_MANY, 'Tag', 'user_tags(user_id, tag_id)'),  // Relación con 'tags'
			'direccion' => array(self::HAS_ONE, 'Direccion', 'user_id'),
		);
	}

	// Definir las etiquetas de los campos
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nombre' => 'Nombre',
			'apellidos' => 'Apellidos',
			'email' => 'Correo electrónico',
			'password' => 'Contraseña',
			'fecha_nacimiento' => 'Fecha de nacimiento',
			'role_id' => 'Rol',
			'is_active' => 'Activo',
			'points' => 'Puntos',
		);
	}

	// Método para obtener un nombre de usuario (por ejemplo)
	public function getFullName()
	{
		return $this->nombre . ' ' . $this->apellidos;
	}

	/**
	 * Calcula la edad de un usuario basado en su fecha de nacimiento
	 * @return int La edad del usuario
	 */
	public function getEdad()
	{
		$fechaNacimiento = new DateTime($this->fecha_nacimiento);
		$hoy = new DateTime();
		$edad = $hoy->diff($fechaNacimiento)->y;  // Devuelve la diferencia en años
		return $edad;
	}
}

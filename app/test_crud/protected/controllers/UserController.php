<?php
class UserController extends Controller
{

	// Antes de ejecutar cualquier acción, verifica el acceso
	public function beforeAction($action)
	{
		// Verificar si el usuario está autenticado
		if (Yii::app()->user->isGuest) {
			// Si el usuario no está autenticado, puedes redirigirlo a la página de login
			if ($action->id !== 'login') {  // Evita redirigir a login si ya está en la página de login
				$this->redirect(array('site/login'));
			}
		} else {
			// Obtener el rol del usuario autenticado
			$role = Yii::app()->user->role;

			// Verificar los permisos de acceso para las acciones
			if ($action->id == 'create' || $action->id == 'update') {
				if ($role != Role::ROLE_ADMIN && $role != Role::ROLE_MODERADOR) {  // Solo Admin (ROLE_ADMIN) y Moderador (ROLE_MODERADOR)
					Yii::app()->user->setFlash('error', 'No tienes permisos para realizar esta acción.');
					$this->redirect(array('index'));  // Redirigir a la lista de usuarios si no tiene permisos
				}
			}

			if ($action->id == 'delete') {
				if ($role != Role::ROLE_ADMIN) {  // Solo Admin (ROLE_ADMIN)
					Yii::app()->user->setFlash('error', 'No tienes permisos para eliminar usuarios.');
					$this->redirect(array('index'));  // Redirigir a la lista de usuarios si no tiene permisos
				}
			}
		}

		return parent::beforeAction($action);  // Siempre llamar al padre
	}


	// Acción para mostrar el listado de usuarios
	public function actionIndex()
	{
		// Obtén todos los usuarios de la base de datos
		$users = User::model()->with('role')->findAll();
		// $users = User::model()->findAll();

		// Pasa los usuarios a la vista
		$this->render('index', array('users' => $users));
	}

	public function actionView($id)
	{
		// Usamos el componente registrado 'modelLoader'
		$user = Yii::app()->modelLoader->loadModel($id, 'User');

		// Renderizar la vista con los detalles del usuario
		$this->render('view', array('user' => $user));
	}

	public function actionCreate()
	{
		$user = new User();
		$direccion = new Direccion();
		$roles = CHtml::listData(Role::model()->findAll(), 'id', 'nombre');  // Obtener roles
		$tags = CHtml::listData(Tag::model()->findAll(), 'id', 'nombre');    // Obtener tags

		if (isset($_POST['User'], $_POST['Direccion'])) {
			$user->attributes = $_POST['User'];
			$direccion->attributes = $_POST['Direccion'];
			$user->tags = isset($_POST['User']['tags']) ? $_POST['User']['tags'] : [];

			$valid = $user->validate() && $direccion->validate();

			if ($valid) {
				if ($user->save()) {
					$direccion->user_id = $user->id;
					if ($direccion->save()) {
						// Relacionar los tags con el usuario
						if (isset($_POST['User']['tags']) && !empty($_POST['User']['tags'])) {
							foreach ($_POST['User']['tags'] as $tagId) {
								$userTag = new UserTag();
								$userTag->user_id = $user->id;
								$userTag->tag_id = $tagId;
								$userTag->save();
							}
						}
						$this->redirect(array('view', 'id' => $user->id));
					}
				}
			}
		}

		$this->render('create', array('user' => $user, 'direccion' => $direccion, 'roles' => $roles, 'tags' => $tags));
	}

	public function actionUpdate($id)
	{
		// Obtener el usuario a actualizar
		$user = Yii::app()->modelLoader->loadModel($id, 'User');
		$direccion = $user->direccion;  // Obtener la dirección asociada al usuario

		// Obtener todos los roles y tags
		$roles = CHtml::listData(Role::model()->findAll(), 'id', 'nombre');
		$tags = CHtml::listData(Tag::model()->findAll(), 'id', 'nombre');
		$userTags = CHtml::listData($user->tags, 'id', 'id');
		// var_dump($userTags);
		// die();

		// Si el formulario se envía
		if (isset($_POST['User'], $_POST['Direccion'])) {
			$user->attributes = $_POST['User'];
			$direccion->attributes = $_POST['Direccion'];
			$user->tags = isset($_POST['User']['tags']) ? $_POST['User']['tags'] : [];

			$valid = $user->validate() && $direccion->validate();

			if ($valid) {
				// Guardar el usuario
				if ($user->save()) {
					// Guardar la dirección
					$direccion->user_id = $user->id;
					if ($direccion->save()) {
						// Eliminar relaciones anteriores de tags
						UserTag::model()->deleteAll('user_id = :user_id', array(':user_id' => $user->id));

						// Relacionar los nuevos tags seleccionados
						if (isset($_POST['User']['tags']) && !empty($_POST['User']['tags'])) {
							foreach ($_POST['User']['tags'] as $tagId) {
								$userTag = new UserTag();
								$userTag->user_id = $user->id;
								$userTag->tag_id = $tagId;
								$userTag->save();
							}
						}

						// Redirigir a la vista del usuario actualizado
						$this->redirect(array('view', 'id' => $user->id));
					}
				}
			}
		}

		// Renderizar la vista de actualización
		$this->render('update', array('user' => $user, 'direccion' => $direccion, 'roles' => $roles, 'tags' => $tags, 'userTags' => $userTags));
	}

	public function actionDelete($id)
	{
		$user = Yii::app()->modelLoader->loadModel($id, 'User');
		$user->delete();

		$this->redirect(array('index'));
	}
}

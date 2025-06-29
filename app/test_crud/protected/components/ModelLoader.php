<?php

class ModelLoader extends CApplicationComponent
{
	/**
	 * Carga un modelo por su ID.
	 * @param integer $id
	 * @param string $modelClass Nombre de la clase del modelo (por defecto 'User')
	 * @return CActiveRecord El modelo cargado
	 * @throws CHttpException Si no se encuentra el modelo
	 */
	public function loadModel($id, $modelClass = 'User')
	{
		$model = CActiveRecord::model($modelClass)->findByPk($id);

		if ($model === null) {
			throw new CHttpException(404, 'El recurso solicitado no existe.');
		}

		return $model;
	}
}

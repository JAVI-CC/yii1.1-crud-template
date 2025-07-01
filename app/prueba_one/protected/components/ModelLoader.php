<?php

class ModelLoader extends CApplicationComponent
{
	/**
	 * Loads a model by its ID.
	 * @param integer $id
	 * @param string $modelClass Model class name (default is 'Product')
	 * @return CActiveRecord The loaded model
	 * @throws CHttpException If the model is not found
	 */
	public function loadModel($id, $modelClass = 'Product')
	{
		$model = CActiveRecord::model($modelClass)->findByPk($id);

		if ($model === null) {
			throw new CHttpException(404, 'The requested resource does not exist.');
		}

		return $model;
	}
}

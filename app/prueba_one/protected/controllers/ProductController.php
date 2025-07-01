<?php
class ProductController extends Controller
{

	public function actionIndex()
	{
		$products = Product::model()->with('category')->findAll();

		$this->render('index', array('products' => $products));
	}

	public function actionView($id)
	{
		$product = Yii::app()->modelLoader->loadModel($id, 'Product');

		$this->render('view', array('product' => $product));
	}

	public function actionCreate()
	{
		$product = new Product();

		$categories = CHtml::listData(Category::model()->findAll(), 'id', 'name');

		if (isset($_POST['Product'])) {
			$product->attributes = $_POST['Product'];

			if ($product->validate()) {
				if ($product->save()) {
					$this->redirect(array('view', 'id' => $product->id));
				}
			}
		}

		$this->render('create', array('product' => $product, 'categories' => $categories));
	}

	public function actionUpdate($id)
	{
		$product = Yii::app()->modelLoader->loadModel($id, 'Product');

		$categories = CHtml::listData(Category::model()->findAll(), 'id', 'name');

		if (isset($_POST['Product'])) {
			$product->attributes = $_POST['Product'];

			if ($product->validate()) {
				if ($product->save()) {
					$this->redirect(array('view', 'id' => $product->id));
				}
			}
		}

		$this->render('update', array('product' => $product, 'categories' => $categories));
	}

	public function actionDelete($id)
	{
		$product = Yii::app()->modelLoader->loadModel($id, 'Product');
		$product->delete();

		$this->redirect(array('index'));
	}

	public function actionListPagination()
	{
		// Crea un objeto CDbCriteria para las condiciones de búsqueda (si las necesitas)
		$criteria = new CDbCriteria();

		// Opcionalmente puedes añadir filtros (por ejemplo, filtrar por nombre)
		// if (isset($_GET['Product']['name'])) {
		//     $criteria->compare('name', $_GET['Product']['name'], true);
		// }

		// Crear un objeto de paginación
		$pages = new CPagination(Product::model()->count($criteria)); // Cuenta los productos que cumplen con el criterio
		$pages->pageSize = 10;  // Número de productos por página

		// Crear el CActiveDataProvider
		$dataProvider = new CActiveDataProvider('Product', array(
			'criteria' => $criteria,
			'pagination' => $pages,  // Asocia la paginación al DataProvider
		));

		// Renderizar la vista con el DataProvider
		$this->render('list_pagination', array(
			'dataProvider' => $dataProvider,
		));
	}
}

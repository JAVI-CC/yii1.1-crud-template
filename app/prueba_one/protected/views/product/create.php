<?php
/* @var $this ProductController */
/* @var $product Product */
/* @var $categories Category */

$this->breadcrumbs = array('Product' => array('index'), 'New');
?>

<h1>Create Product</h1>

<?php $this->renderPartial('_form', array('product' => $product, 'categories' => $categories)); ?>
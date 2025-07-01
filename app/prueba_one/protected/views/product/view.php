<?php
/* @var $this ProductController */
/* @var $product Product */

$this->pageTitle = 'Details of Product - ' . CHtml::encode($product->name);
$this->breadcrumbs = array('Products' => array('index'), CHtml::encode($product->name));
?>

<h1>Details of Product <?php echo CHtml::link($product->id, array('product/update', 'id' => $product->id)); ?></h1>

<div>
	<strong>Name:</strong> <?php echo CHtml::encode($product->name); ?>
</div>
<div>
	<strong>Price:</strong> <?php echo CHtml::encode($product->price); ?>
</div>
<div>
	<strong>Stock:</strong> <?php echo CHtml::encode($product->stock); ?>
</div>
<div>
	<strong>Category:</strong> <?php echo CHtml::encode($product->category->name); ?>
</div>

<div>
	<br />
	<?php echo CHtml::link('Return of list', array('index')); ?>
	<br />
	<br />
	<?php $this->renderPartial('_deleteLink', array('product' => $product)); ?>
</div>
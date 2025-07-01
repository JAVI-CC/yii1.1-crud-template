<?php
/* @var $this ProductController */
/* @var $products Product[] */

$this->pageTitle = 'List of products';
$this->breadcrumbs = array('Products');
?>

<h1>List of products</h1>

<div>
	<?php echo CHtml::link('Create Product', array('product/create'), array('class' => 'btn btn-success')); ?>
</div>

<table border="1" cellpadding="10">
	<thead>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Price</th>
			<th>Stock</th>
			<th>Category</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($products as $product): ?>
			<tr>
				<td><?php echo CHtml::encode($product->id); ?></td>
				<td><?php echo CHtml::encode($product->name); ?></td>
				<td><?php echo CHtml::encode($product->price); ?></td>
				<td><?php echo CHtml::encode($product->stock); ?></td>
				<td><?php echo CHtml::encode($product->category->name); ?></td>
				<td>
					<?php echo CHtml::link('Show', array('product/view', 'id' => $product->id)); ?>
					<?php echo CHtml::link('Edit', array('product/update', 'id' => $product->id)); ?>
					<?php $this->renderPartial('_deleteLink', array('product' => $product)); ?>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
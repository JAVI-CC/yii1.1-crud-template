<?php
/* @var $product Product */

echo CHtml::link('Delete', array('product/delete', 'id' => $product->id), array(
	'onclick' => 'return confirm("Are you sure you want to delete this product?");'
));

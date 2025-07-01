<?php
/* @var $this ProductController */
/* @var $product Product */
/* @var $form CActiveForm */
?>

<?php
$form = $this->beginWidget('CActiveForm', array(
	'id' => 'product-form',
	// 'enableAjaxValidation' => false,
	// 'htmlOptions' => array('enctype' => 'multipart/form-data'), 
));
?>

<div class="form">

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<div class="row">
		<?php echo $form->labelEx($product, 'name'); ?>
		<?php echo $form->textField($product, 'name', array('class' => 'form-control')); ?>
		<?php echo $form->error($product, 'name', array('class' => 'errorMessage')); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($product, 'price'); ?>
		<?php echo $form->numberField($product, 'price', array('class' => 'form-control')); ?>
		<?php echo $form->error($product, 'price', array('class' => 'errorMessage')); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($product, 'stock'); ?>
		<?php echo $form->numberField($product, 'stock', array('class' => 'form-control')); ?>
		<?php echo $form->error($product, 'stock', array('class' => 'errorMessage')); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($product, 'category_id'); ?>
		<?php echo $form->dropDownList($product, 'category_id', $categories, array('class' => 'form-control')); ?>
		<?php echo $form->error($product, 'category_id', array('class' => 'errorMessage')); ?>
	</div>
</div>

<div class="row buttons">
		<?php echo CHtml::submitButton($product->isNewRecord ? 'Create' : 'Save'); ?>
</div>

<?php $this->endWidget(); ?>
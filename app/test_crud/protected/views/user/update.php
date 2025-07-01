// protected/views/user/update.php

<h1>Actualizar Usuario</h1>

<?php
$this->breadcrumbs = array('Usuarios' => array('index'), 'Editar usuario' . $user->id);

$form = $this->beginWidget('CActiveForm', array(
	'id' => 'user-form',
	'enableAjaxValidation' => false,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
));
?>

<!-- Formulario de Usuario -->
<div class="form-group">
	<h2>Datos del Usuario</h2>

	<!-- Campo Nombre -->
	<div class="form-group">
		<?php echo $form->labelEx($user, 'nombre'); ?>
		<?php echo $form->textField($user, 'nombre', array('class' => 'form-control')); ?>
		<?php echo $form->error($user, 'nombre'); ?>
	</div>

	<!-- Campo Apellidos -->
	<div class="form-group">
		<?php echo $form->labelEx($user, 'apellidos'); ?>
		<?php echo $form->textField($user, 'apellidos', array('class' => 'form-control')); ?>
		<?php echo $form->error($user, 'apellidos'); ?>
	</div>

	<!-- Campo Email -->
	<div class="form-group">
		<?php echo $form->labelEx($user, 'email'); ?>
		<?php echo $form->textField($user, 'email', array('class' => 'form-control')); ?>
		<?php echo $form->error($user, 'email'); ?>
	</div>

	<!-- Campo Fecha de Nacimiento -->
	<div class="form-group">
		<?php echo $form->labelEx($user, 'fecha_nacimiento'); ?>
		<?php echo $form->dateField($user, 'fecha_nacimiento', array('class' => 'form-control')); ?>
		<?php echo $form->error($user, 'fecha_nacimiento'); ?>
	</div>


	<!-- Campo Booleano (Ejemplo: Activado) -->
	<div class="form-group">
		<?php echo $form->labelEx($user, 'is_active'); ?>
		<?php echo $form->checkBox($user, 'is_active'); ?>
		<?php echo $form->error($user, 'is_active'); ?>
	</div>

	<!-- Campo Puntos -->
	<div class="form-group">
		<?php echo $form->labelEx($user, 'points'); ?>
		<?php echo $form->numberField($user, 'points', array('class' => 'form-control')); ?>
		<?php echo $form->error($user, 'points'); ?>
	</div>

	<!-- Campo Rol -->
	<div class="form-group">
		<?php echo $form->labelEx($user, 'role_id'); ?>
		<?php echo $form->dropDownList($user, 'role_id', $roles, array('class' => 'form-control')); ?>
		<?php echo $form->error($user, 'role_id'); ?>
	</div>

	<!-- Campo Tags (Selección Múltiple) -->
	<div class="form-group">
		<?php echo $form->labelEx($user, 'tags'); ?>
		<?php
		// Asignamos el array de tags (IDs) seleccionados al campo de checkboxes
		//echo $form->checkBoxList($user, 'tags', $tags, array(
		//	'class' => 'form-control',
		//	'value' => $userTags, // Asignamos los tags seleccionados en el formulario
		// ));
		?>
		<?php echo $form->error($user, 'tags'); ?>
	</div>

</div>

<!-- Formulario de Dirección -->
<div class="form-group">
	<h2>Datos de la Dirección</h2>

	<!-- Campo Dirección -->
	<div class="form-group">
		<?php echo $form->labelEx($direccion, 'nombre'); ?>
		<?php echo $form->textField($direccion, 'nombre', array('class' => 'form-control')); ?>
		<?php echo $form->error($direccion, 'nombre'); ?>
	</div>
</div>

<!-- Botón de Guardar -->
<div class="form-group">
	<?php echo CHtml::submitButton('Actualizar Usuario', array('class' => 'btn btn-primary')); ?>
</div>

<?php $this->endWidget(); ?>
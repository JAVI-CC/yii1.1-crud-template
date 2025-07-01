<?php
/* @var $this UserController */
/* @var $user User */

$this->pageTitle = 'Detalles del Usuario - ' . CHtml::encode($user->nombre);
$this->breadcrumbs = array('Usuarios' => array('index'), CHtml::encode($user->nombre));
?>

<h1>Detalles del Usuario <?php echo CHtml::link($user->id, array('user/update', 'id' => $user->id)); ?></h1>

<div>
	<strong>Nombre:</strong> <?php echo CHtml::encode($user->nombre); ?>
</div>
<div>
	<strong>Apellidos:</strong> <?php echo CHtml::encode($user->apellidos); ?>
</div>
<div>
	<strong>Email:</strong> <?php echo CHtml::encode($user->email); ?>
</div>
<div>
	<strong>Fecha de Nacimiento:</strong> <?php echo CHtml::encode($user->fecha_nacimiento); ?>
</div>
<div>
	<strong>Edad:</strong> <?php echo CHtml::encode($user->getEdad()); ?>
</div>
<div>
	<strong>Rol:</strong> <?php echo CHtml::encode($user->role->nombre); ?>
</div>
<div>
	<strong>Tags:</strong>
	<ul>
		<?php foreach ($user->tags as $tag): ?>
			<li><?php echo CHtml::encode($tag->nombre); ?></li>
		<?php endforeach; ?>
	</ul>
</div>
<div>
	<strong>Dirección:</strong> <?php echo CHtml::encode($user->direccion ? $user->direccion->nombre : 'Sin Dirección'); ?>
</div>

<div>
	<br />
	<?php echo CHtml::link('Volver al Listado', array('index')); ?>
	<br />
	<?php $this->renderPartial('_deleteLink', array('user' => $user)); ?>
</div>
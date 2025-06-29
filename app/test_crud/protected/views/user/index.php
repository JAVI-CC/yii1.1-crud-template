<?php
/* @var $this UserController */
/* @var $users User[] */

$this->pageTitle = 'Listado de Usuarios';
$this->breadcrumbs = array('Usuarios');
?>

<h1>Listado de Usuarios</h1>

<div>
    <!-- Mostrar el enlace de Crear Usuario solo si el usuario tiene rol Admin o Moderador -->
    <?php if (Yii::app()->user->role == Role::ROLE_ADMIN || Yii::app()->user->role == Role::ROLE_MODERADOR): ?>
        <?php echo CHtml::link('Crear Nuevo Usuario', array('user/create'), array('class' => 'btn btn-success')); ?>
    <?php endif; ?>
</div>

<table border="1" cellpadding="10">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Email</th>
            <th>Fecha de Nacimiento</th>
            <th>Edad</th>
            <th>Rol</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo CHtml::encode($user->id); ?></td>
                <td><?php echo CHtml::encode($user->nombre); ?></td>
                <td><?php echo CHtml::encode($user->apellidos); ?></td>
                <td><?php echo CHtml::encode($user->email); ?></td>
                <td><?php echo CHtml::encode($user->fecha_nacimiento); ?></td>
                <td><?php echo CHtml::encode($user->getEdad()); ?></td> <!-- Mostrar la edad -->
                <td><?php echo CHtml::encode($user->role->nombre); ?></td>
                <td>
                    <?php echo CHtml::link('Ver', array('user/view', 'id' => $user->id)); ?>

                    <!-- Mostrar el enlace de Editar solo si el usuario tiene rol Admin o Moderador -->
                    <?php if (Yii::app()->user->role == Role::ROLE_ADMIN || Yii::app()->user->role == Role::ROLE_MODERADOR): ?>
                        <?php echo CHtml::link('Editar', array('user/update', 'id' => $user->id)); ?>
                    <?php endif; ?>

                    <!-- Mostrar el enlace de Eliminar solo si el usuario tiene rol Admin -->
                    <?php if (Yii::app()->user->role == Role::ROLE_ADMIN): ?>
                        <?php $this->renderPartial('_deleteLink', array('user' => $user)); ?>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

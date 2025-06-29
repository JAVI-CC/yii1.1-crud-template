<?php
// protected/views/user/_deleteLink.php
echo CHtml::link('Eliminar', array('user/delete', 'id' => $user->id), array(
    'onclick' => 'return confirm("¿Estás seguro de que deseas eliminar este usuario?");'
));

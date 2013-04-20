<?php
$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	'Registrar',
);

$this->menu=array(
	array('label'=>'Usuarios', 'url'=>array('index')),
	array('label'=>'Administrador de usuarios', 'url'=>array('admin')),
);
?>

<h1>Agregar Usuario</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
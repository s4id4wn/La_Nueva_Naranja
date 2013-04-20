<?php
$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Listar usuarios', 'url'=>array('index')),
	array('label'=>'Crear usuario', 'url'=>array('create')),
	array('label'=>'Actualizar usuario', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Desactivar usuario', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Desactivar usuario?')),
	array('label'=>'Administrar usuarios', 'url'=>array('admin')),
);
?>

<h1>Ver usuario: <?php echo $model->user; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'user',
		'name',
		'last_name',
		'email',
        array(
		'label'=>'Roles',
		//'name'=>'_Roles',
		'type'=>'raw',
		'value'=>$model->getUserRoles($model->user),
		),
		array(
		'name'=>'active',
		'value'=>$model->getActive($model->active),
		),
	),
)); ?>

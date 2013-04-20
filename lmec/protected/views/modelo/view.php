<?php
$this->breadcrumbs=array(
	'Modelos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Modelos', 'url'=>array('index')),
	array('label'=>'Crear Modelo', 'url'=>array('create')),
	array('label'=>'Actualizar Modelo', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar Modelo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Esta seguro que desea eliminar este Modelo?'),'visible'=>$model->active==1),
	array('label'=>'Activar Accesorio',  'url'=>'#', 'linkOptions'=>array('submit'=>array('activate','id'=>$model->id),'confirm'=>'¿Esta seguro que desea activar este Accesorio?'),'visible'=>$model->active==0),
	array('label'=>'Administrar Modelo', 'url'=>array('admin')),
);
?>

<h1>Vista del Modelo #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		array(
		'name'=>'brand_id',
		'value'=>$model->Brand->name,
		),
		array(
		'name'=>'equipment_type_id',
		'value'=>$model->EquipmentType->type,
		),
		'name',
		array(
			'name' => 'active',
			'value'=>Modelo::getActive($model->active),
			),
	),
)); ?>

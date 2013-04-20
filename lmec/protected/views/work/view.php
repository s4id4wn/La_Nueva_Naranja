<?php
/* @var $this WorkController */
/* @var $model Work */

$this->breadcrumbs=array(
	'Trabajos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Trabajos', 'url'=>array('index')),
	array('label'=>'Crear Trabajo', 'url'=>array('create')),
	array('label'=>'Actualizar Trabajo', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Desactivar Trabajo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Está seguro de que desea desactivar este trabajo?')),
	array('label'=>'Administrar Trabajos', 'url'=>array('admin')),
);
?>

<h1>Ver Trabajo #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		//'service_type_id',
		array(
			'name' => 'service_type_id',
			'value' => (($model->service_type_id=="1")?"Preventivo":"Correctivo"),
		),
		'name',
		'description',
		//'active',
		array(
			'name' => 'active',
			'value' => (($model->active=="1")?"Si":"No"),
		),
	),
)); ?>

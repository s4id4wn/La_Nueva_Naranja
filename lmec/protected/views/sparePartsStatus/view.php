<?php
/* @var $this SparePartsStatusController */
/* @var $model SparePartsStatus */

$this->breadcrumbs=array(
	'Estado de Refacciones'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Estados', 'url'=>array('index')),
	array('label'=>'Crear Estado', 'url'=>array('create')),
	array('label'=>'Actualizar Estado', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Desactivar Estado', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Está seguro que desea desactivar el estado?')),
	array('label'=>'Administrar Estados', 'url'=>array('admin')),
);
?>

<h1>Ver Estado #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'description',
		//'active',
		array(
			'name' => 'active',
			'value' => (($model->active=="1")?"Si":"No"),
		),
	),
)); ?>

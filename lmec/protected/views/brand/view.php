<?php
/* @var $this BrandController */
/* @var $model Brand */

$this->breadcrumbs=array(
	'Marcas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Marcas', 'url'=>array('index')),
	array('label'=>'Crear Marca', 'url'=>array('create')),
	array('label'=>'Actualizar Marca', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Desactivar Marca', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Está seguro que desea desactivar la marca?')),
	array('label'=>'Administrar Marcas', 'url'=>array('admin')),
);
?>

<h1>Ver Marca #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name', //nombre de la marca
		//'active',
		array(
			'name' => 'active',
			'value' => (($model->active=="1")?"Si":"No"),
		),
	),
)); ?>

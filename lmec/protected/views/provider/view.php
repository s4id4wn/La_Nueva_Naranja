<?php
$this->breadcrumbs=array(
	'Proveedor'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Listar Proveedor', 'url'=>array('index')),
	array('label'=>'Crear Proveedor', 'url'=>array('create')),
	array('label'=>'Actualizar Proveedor', 'url'=>array('update', 'id'=>$model->id)),
	($model->active == 1)?array('label'=>'Desactivar Proveedor', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Esta seguro que desea desactivar este Proveedor?')):NULL,
	array('label'=>'Administrar Proveedor', 'url'=>array('admin')),
);
?>

<h1>Proveedor: <?php echo $model->name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'contact_name',
		'contact_email',
		'contact_telephone_number',
		'address',
		//'active',
                array(
                    'label' => 'Activo',
                    'type' => 'raw',
                    'value' => ($model->active == 1)?'Si':'No'
                ),
	),        
        
)); ?>
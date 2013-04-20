<?php
$this->breadcrumbs=array(
	'Dependencias'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Listar Dependencia', 'url'=>array('index')),
	array('label'=>'Crear Dependencia', 'url'=>array('create')),
	array('label'=>'Actualizar Dependencia', 'url'=>array('update', 'id'=>$model->id)),
	($model->active == 1)?array('label'=>'Desactivar Dependencia', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Esta seguro que desea desactivar esta Dependencia?')):NULL,
	array('label'=>'Administrar Dependencia', 'url'=>array('admin')),
);
?>

<h1>Dependencia: <?php echo $model->name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'address',
		'telephone_number',
                'extension',
		//'active',
                array(
                    'label' => 'Activo',
                    'type' => 'raw',
                    'value' => ($model->active == 1)?'Si':'No'
                ),                
	),
        
)); ?>
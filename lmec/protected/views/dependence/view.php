<?php
/* @var $this DependenceController */
/* @var $model Dependence */

$this->breadcrumbs=array(
	'Dependences'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Dependence', 'url'=>array('index')),
	array('label'=>'Create Dependence', 'url'=>array('create')),
	array('label'=>'Update Dependence', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Dependence', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Dependence', 'url'=>array('admin')),
);
?>

<h1>View Dependence #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'customer_id',
		'name',
		'address',
		'telephone_number',
		'active',
	),
)); ?>

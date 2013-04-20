<?php
/* @var $this DependenceController */
/* @var $model Dependence */

$this->breadcrumbs=array(
	'Dependences'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Dependence', 'url'=>array('index')),
	array('label'=>'Create Dependence', 'url'=>array('create')),
	array('label'=>'View Dependence', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Dependence', 'url'=>array('admin')),
);
?>

<h1>Update Dependence <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
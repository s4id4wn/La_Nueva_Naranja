<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);
?>

<h1>Actualizar Usuario: <?php echo $model->user_name; ?></h1>

<?php echo $this->renderPartial('_formOwn', array('model'=>$model)); ?>
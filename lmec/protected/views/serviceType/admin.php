<?php
/* @var $this ServiceTypeController */
/* @var $model ServiceType */

$this->breadcrumbs=array(
	'Tipo de servicios'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Listar tipos de servicios', 'url'=>array('index')),
	array('label'=>'Crear tipo de servicio', 'url'=>array('create')),
);
?>

<h1>Administrar tipo de servicios</h1>

<p>
Si lo desea, puede escribir un operador de comparaci&oacute;n (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
o <b>=</b>) al principio de cada uno de los valores de busqueda, para especificar como se debe realizar la comparaci&oacute;n.
</p>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'service-type-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		array(
			'name'=>'active',
			'value'=>'ServiceType::getActive($data->active)',
			 ),
		array(
			'class'=>'CButtonColumn',
			'template'=>'{update}{view}{delete}{activate}',
			'buttons' => array(
				'activate'=>array(
					'label'=>'Activar',
                    'url'=>'Yii::app()->createUrl("serviceType/activate", array("id"=>$data->id))',
                    'imageUrl'=>'../images/active.png',
					'visible'=>'$data->active == 0',
					'click'=> "function(){
								if(!confirm('¿Seguro que desea activar este elemento?')) return false;
								$.fn.yiiGridView.update('service-type-grid',{
									type:'POST',
									url:$(this).attr('href'),
									success:function(data){
										$.fn.yiiGridView.update('service-type-grid');
									},
									});
									return false;
							}",
				),
				'delete'=>array(
					'visible'=>'$data->active == 1',
				),
			),
		),
	),
)); ?>
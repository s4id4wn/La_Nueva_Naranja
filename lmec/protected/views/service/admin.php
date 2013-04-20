<?php
/* @var $this ServiceController */
/* @var $model Service */

$this->breadcrumbs=array(
	'Servicios'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Listar Servicios', 'url'=>array('index')),
	array('label'=>'Crear Servicio', 'url'=>array('create')),
);
?>

<h1>Administrar Servicios</h1>

<p>
Si lo desea, puede escribir un operador de comparaci&oacute;n (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
o <b>=</b>) al principio de cada uno de los valores de busqueda, para especificar como se debe realizar la comparaci&oacute;n.
</p>


<?php 
	$pageSize=Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']);
	$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'service-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		array(
			'name'=>'service_type_id',
			'value'=>'Service::getServiceType($data->service_type_id)'
			 ),
		'name',
		array(
			'name'=>'price',
			'value'=> '$data->price',
			 ),
		array(
			'name'=>'active',
			'value'=>'Service::getActive($data->active)',
			'filter'=>array('1'=>'Si', '0'=>'No'),
			 ),
		array(
			'class'=>'CButtonColumn',
			'header'=>CHtml::dropDownList('pageSize',$pageSize,array(10=>10,20=>20,30=>30,40=>40,50=>50,Service::getAllServices()=>'Todos'),array(
			'onchange'=>"$.fn.yiiGridView.update('service-grid',{ data:{pageSize: $(this).val() }})",)),
			'template'=>'{update}{view}{delete}{activate}',
			'buttons' => array(
				'activate'=>array(
					'label'=>'Activar',
                    'url'=>'Yii::app()->createUrl("Service/activate", array("id"=>$data->id))',
                    'imageUrl'=>'../images/active.png',
					'visible'=>'$data->active == 0',
					'click'=> "function(){
								if(!confirm('¿Seguro que desea activar este elemento?')) return false;
								$.fn.yiiGridView.update('service-grid',{
									type:'POST',
									url:$(this).attr('href'),
									success:function(data){
										$.fn.yiiGridView.update('service-grid');
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
)); 
?>
<!DOCTYPE html>
<html>
<?php
Yii::app()->bootstrap->register();
//Yii::app()->flatui->register();
?>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="language" content="zh"/>

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap-style.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery-ui.css"/>
</head>


<body>

<div class="container" id="page">
	<?php
	$this->widget('bootstrap.widgets.TbNavbar', array(
		'fixed' => 'top',
		'brand' => 'wms后台',
		'brandUrl' => '/',
		'collapse' => false,
		'fluid' => false,
		// requires bootstrap-responsive.css
		'items' => array(
			array(
				'class' => 'bootstrap.widgets.TbMenu',
				'items' => Yii::app()->user->menu,
			),
			array(
				'class' => 'bootstrap.widgets.TbMenu',
				'htmlOptions' => array('class' => 'pull-right'),
				'items' => array(
					array(
						'label' => '个人管理',
						'url' => array('#'),
						'items' => array(
							array(
								'label' => '个人信息及密码修改',
								'url' => array('AdminUser/index')
							),
						),
						'visible' => !Yii::app()->user->isGuest

					),
					array(
						'label' => '登录',
						'url' => array('site/login'),
						'visible' => Yii::app()->user->isGuest
					),
					array(
						'label' => '登出 (' . Yii::app()->user->name . ')',
						'url' => array('site/logout'),
						'visible' => !Yii::app()->user->isGuest
					),
				),
			),
		),
	));?>
	<!-- page -->

	<?php if (isset($this->breadcrumbs)): ?>
		<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
			'links' => $this->breadcrumbs,
		)); ?>

	<?php endif ?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by Lee Team.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div>
</div>

</body>
</html>

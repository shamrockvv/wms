<?php $this->beginContent('//layouts/main'); ?>
	<ul class="nav nav-pills" style="border-bottom: 1px solid #EEEEEE;">
		<li>
			<a style="color: #0f0f0f" href='javascript:void(0)' disabled='true'>管理模块:</a>
		</li>
		<li class="<?php if (strpos(Yii::app()->controller->action->getId(), 'origin') !== false) {
			echo 'active';
		} ?>">
			<a href="<?php echo Yii::app()->createUrl('modelRecycleOrderNb/origin'); ?>">来源管理</a>
		</li>
		<li class="<?php if (strpos(Yii::app()->controller->action->getId(), 'business') !== false) {
			echo 'active';
		} ?>">
			<a href="<?php echo Yii::app()->createUrl('modelRecycleOrderNb/business'); ?>">交易商家管理</a>
		</li>
		<li class="<?php if (strpos(Yii::app()->controller->action->getId(), 'model') !== false) {
			echo 'active';
		} ?>">
			<a href="<?php echo Yii::app()->createUrl('modelRecycleOrderNb/model'); ?>">回收机型管理</a>
		</li>
		<li class="<?php if (strpos(Yii::app()->controller->action->getId(), 'sort') !== false) {
			echo 'active';
		} ?>">
			<a href="<?php echo Yii::app()->createUrl('modelRecycleOrderNb/sort'); ?>">回收机型类别管理</a>
		</li>
		<li class="<?php if (strpos(Yii::app()->controller->action->getId(), 'templet') !== false) {
			echo 'active';
		} ?>">
			<a href="<?php echo Yii::app()->createUrl('modelRecycleOrderNb/templet'); ?>">回收机型模板属性管理</a>
		</li>
	</ul>
	<ul class="nav nav-pills" style="border-bottom: 1px solid #EEEEEE;">
		<li>
			<a style="color: #0f0f0f" href='javascript:void(0)' disabled='true'>功能模块:</a>
		</li>
		<li class="<?php if (strpos(Yii::app()->controller->action->getId(), 'order') !== false) {
			echo 'active';
		} ?>">
			<a href="<?php echo Yii::app()->createUrl('modelRecycleOrderNb/order'); ?>">订单列表</a>
		</li>
		<li class="<?php if (Yii::app()->controller->action->getId() == 'create') {
			echo 'active';
		} ?>">
			<a href="<?php echo Yii::app()->createUrl('modelRecycleOrderNb/create'); ?>">新建订单</a>
		</li>
	</ul>

	<ul class="nav nav-pills" style="border-bottom: 1px solid #EEEEEE;">
		<li>
			<a style="color: #0f0f0f" href='javascript:void(0)' disabled='true'>统计模块:</a>
		</li>
		<li class="<?php if (strpos(Yii::app()->controller->action->getId(), 'count') !== false) {
			echo 'active';
		} ?>">
			<a href="<?php echo Yii::app()->createUrl('modelRecycleOrderNb/count'); ?>">统计-机型报价</a>
		</li>
		<li class="<?php if (strpos(Yii::app()->controller->action->getId(), 'customer') !== false) {
			echo 'active';
		} ?>">
			<a href="<?php echo Yii::app()->createUrl('modelRecycleOrderNb/customer'); ?>">统计-客服提成</a>
		</li>
		<li class="<?php if (strpos(Yii::app()->controller->action->getId(), 'total') !== false) {
			echo 'active';
		} ?>">
			<a href="<?php echo Yii::app()->createUrl('modelRecycleOrderNb/total'); ?>">统计-月汇总</a>
		</li>
	</ul>

	<div id="content">
		<?php echo $content; ?>
	</div>
	<!-- content -->

<?php $this->endContent(); ?>
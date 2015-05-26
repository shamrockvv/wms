<?php

/**
 * Created by PhpStorm.
 * User: limu
 * Date: 14-8-7
 * Time: 下午5:19
 */
Yii::import('bootstrap.widgets.TbDataColumn');

class TbDataColumnExt extends TbDataColumn {
	public function renderFilterCell() {
		echo '<td><div class="filter-container">';
		$this->renderFilterCellContent();
		echo '</div></td>';
	}

	public function getFilterCellContent() {
		return CHtml::dropDownList('DevicesResource[show_flag]', $this->grid->dataProvider->model->show_flag, array(
			'-1' => '全部',
			'0' => '不显示',
			'1' => '显示',
		), array('style' => 'width:80px'));
//		return $this->grid->blankDisplay;
	}
} 
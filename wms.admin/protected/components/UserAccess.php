<?php

/**
 * Created by JetBrains PhpStorm.
 * User: apirl
 * Date: 12-3-3
 * Time: 下午12:49
 * @author shilei@opda.cn
 * 后台用户权限分配
 */
class UserAccess extends CWebUser {

    private $_user;
    private $_menu;

    //超级管理员username = admin;
    public function getIsSuperAdmin() {
        return ($this->user && ($this->user[0]->adminid === Admin::LEVEL_SUPERADMIN));
    }

    //高级管理员permission = 1;
    public function getIsAdvanceAdmin() {
        return ($this->user && $this->user[0]->adminpower <= Admin::LEVEL_ADVANCEADMIN);
    }

    //管理员permission <= 2；
    public function getIsAdmin() {
        return ($this->user && $this->user[0]->adminpower <= Admin::LEVEL_ADMIN);
    }

    //管理员permission<=3;
    public function getIsLowerAdmin() {
        return ($this->user && $this->user[0]->adminpower <= Admin::LEVEL_LOWERADMIN);
    }

    //管理员permission<=4;
    public function getIsLowestAdmin() {
        return ($this->user && $this->user[0]->adminpower <= Admin::LEVEL_LOWESTADMIN);
    }

    //其他管理员permission<=5;
    public function getIsOtherAdmin() {
        return ($this->user && $this->user[0]->adminpower <= Admin::LEVEL_OTHERADMIN);
    }

    //外部人员permission<=6;
    public function getIsOtherUser() {
        return ($this->user && $this->user[0]->adminpower <= Admin::LEVEL_OTHERUSER);
    }

    //外部访客permission<=7;
    public function getIsVisitUser() {
        return ($this->user && $this->user[0]->adminpower <= Admin::LEVEL_VISITUSER);
    }

    public function getUser() {
        if ($this->isGuest)
            return;
        if ($this->_user === null) {
            $this->_user = Admin::model()->findAllByPk($this->id);
        }
        return $this->_user;
    }

    public function getMenu() {
        //$menu_index = array('label' => '首页', 'url' => '/');
        $menu_base_info = array(
            'label' => '基本资料',
            'url' => '#',
            'items' => array(
                array(
                    'label' => '客户资料',
                    'url' => array('kehu/index'),
                ),
                array(
                    'label' => '产品资料',
                    'url' => array('chanpinziliao/index'),
                ),
                array(
                    'label' => '配送资料',
                    'url' => array('peisongshang/index'),
                ),
                array(
                    'label' => 'SKU尺码定义',
                    'url' => array('sku/index'),
                ),
                array(
                    'label' => '打印条码',
                    'url' => array('#')
                )
            ),
            'visible' => !Yii::app()->user->isGuest
        );
        $menu_system = array(
            'label' => '系统设置',
            'url' => '#',
            'items' => array(
                array(
                    'label' => '仓库设置',
                    'url' => array('cangku/index'),
                ),
                array(
                    'label' => '库位设置',
                    'url' => array('kuwei/index'),
                ),
                array(
                    'label' => '打印机设置',
                    'url' => array('#'),
                ),
                array(
                    'label' => '修改密码',
                    'url' => array('#'),
                )
            ),
            'visible' => !Yii::app()->user->isGuest
        );
        $menu_order = array(
            'label' => '订单管理',
            'url' => '#',
            'items' => array(
                array('label' => '订单导入', 'url' => '#'),
                array('label' => '订单审查', 'url' => '#'),
            ),
            'visible' => !Yii::app()->user->isGuest,
        );
        $menu_sendgoods = array(
            'label' => '发货管理',
            'url' => '#',
            'items' => array(
                array('label' => '批量拣货单打印', 'url' => '#'),
                array('label' => '拣货单列表', 'url' => '#'),
                array('label' => '二次分拣', 'url' => '#'),
                '------',
                array('label' => '复核打包', 'url' => '#'),
                array('label' => '搜索复核打包', 'url' => '#'),
                array('label' => '称重完成', 'url' => '#'),
                '------',
                array('label' => '出库交接', 'url' => '#'),
                array('label' => '查询更改物流单号记录', 'url' => '#'),
            ),
            'visible' => !Yii::app()->user->isGuest
        );
        $menu_recivegodds = array(
            'label' => '收货管理',
            'url' => '#',
            'items' => array(
                array(
                    'label' => '创建预约单',
                    'url' => array('#'),
                ),
                array(
                    'label' => '上架单管理',
                    'url' => array('#'),
                ),
            ),
            'visible' => !Yii::app()->user->isGuest
        );
        $menu_return = array(
            'label' => '返厂管理',
            'url' => '#',
            'items' => array(
                array('label' => '创建返厂单', 'url' => '#'),
                array('label' => '返厂单管理', 'url' => '#'),
                array('label' => '有效期安全检查', 'url' => '#'),
            ),
            'visible' => !Yii::app()->user->isGuest
        );
        $menu_saleorback = array(
            'label' => '销退管理',
            'url' => '#',
            'items' => array(
                array('label' => '拒收录入', 'url' => '#'),
                array('label' => '退货产品录入', 'url' => '#'),
                array('label' => '退货确认', 'url' => '#'),
            ),
            'visible' => !Yii::app()->user->isGuest
        );
        $menu_kucunpandian = array(
            'label'=>'库存盘点',
            'url'=>'#',
            'items'=>array(
                array('label'=>'创建盘点单','url'=>'#'),
                array('label'=>'盘点单管理','url'=>'#'),
            ),
            'visible'=>!Yii::app()->user->isGuest
        );
        $menu_kufang = array(
            'label'=>'库房管理',
            'url'=>'#',
            'items'=>array(
                array('label'=>'库存管理','url'=>'#'),
                array('label'=>'库存统计','url'=>'#'),
                array('label'=>'正残转换','url'=>'#'),
                array('label'=>'货品位移','url'=>'#'),
                array('label'=>'进销存统计','url'=>'#'),
            ),
            'visible'=>!Yii::app()->user->isGuest
        );
        $menu_quanxian = array(
            'label'=>'权限管理',
            'url'=>'#',
            'items'=>array(
                array('label'=>'管理员设置','url'=>'#'),
                array('label'=>'管理员权限','url'=>'#'),
            ),
            'visible'=>!Yii::app()->user->isGuest
        );
        $menu_log = array(
            'label'=>'日志查询',
            'url'=>'#',
            'items'=>array(
                array('label'=>'操作日志','url'=>'#'),
                array('label'=>'库位变动记录','url'=>'#'),
            ),
            'visible'=>!Yii::app()->user->isGuest
        );
        $menu_tongji = array(
            'label'=>'统计图表',
            'url'=>'#',
            'items'=>array(
                array('label'=>'生产图表','url'=>'#'),
                array('label'=>'上架图表','url'=>'#'),
                array('label'=>'返厂图表','url'=>'#'),
                array('label'=>'销退图表','url'=>'#'),
            ),
            'visible'=>!Yii::app()->user->isGuest
        );
        if ($this->IsSuperAdmin) {
            $main_menu = array(
                $menu_base_info,
                $menu_system,
                $menu_order,

            );
        } elseif ($this->IsAdvanceAdmin) {
            $main_menu = array(
                //$menu_index,
                $menu_base_info,
                $menu_system,
                $menu_order,
                $menu_sendgoods,
                $menu_recivegodds,
                $menu_return,
                $menu_saleorback,
                $menu_kucunpandian,
                $menu_kufang,
                $menu_quanxian,
                $menu_log,
                $menu_tongji,
            );
        } else {
            $main_menu = array($menu_base_info,);
        }
        return $main_menu;
    }
}
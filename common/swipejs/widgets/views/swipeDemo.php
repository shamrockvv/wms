<?php
/**
 * Created by JetBrains PhpStorm.
 * User: peipei
 * Date: 14-2-18
 * Time: 下午3:39
 * To change this template use File | Settings | File Templates.
 */
?>
	<style type="text/css">
		body {
			background: whitesmoke;
			color: #535353;
			padding: 0 5px;
		}
		.pool-top {
			background: #EDEDED;
			margin: 0;
			box-shadow: 0 1px 3px rgba(0, 0, 0, 0.4) inset, 0 -1px 3px rgba(0, 0, 0, 0.4) inset;
			border: 1px solid #FAFAFA;
			display: inline-block;
			width: 100%
		}
		.licd {
			cursor: pointer;
			color: #3E5D9E;
		}
		.pool-top li {
			float: left;
			width: 33%;
			display: inline-block;
			height: 50px;
			line-height: 50px;
			text-align: center;
		}
		.pool-introduction {
			width: 100%;
			display: inline-block;
			border-bottom: 1px solid #d7d7d7;
		}
		.pool-image {
			width: 15%;
			margin: 10px 5px;
			float: left;
			max-width: 50px;
		}
		.pool-title {
			width: 40%;
			float: left;
			margin: 15px 0 10px 5px;
		}
		.pool-name {
			font-size: 16px;
			font-weight: bold;
		}
		.pool-name a {
			color: #000000;
		}
		.pool-size {
			float: left;
			margin-top: 45px;
			display: inline-block;
		}
		.pool-button {
			float: right;
			margin: 10px;
			border-left: 1px solid #ccc;
			padding-left: 5px;
		}
		.pool-button a {
		}
		.swipe {
			overflow: hidden;
			visibility: hidden;
			position: relative;
		}
		.swipe-wrap {
			overflow: hidden;
			position: relative;
		}
		.swipe-wrap > .wrap {
			float: left;
			width: 100%;
			position: relative;
		}

	</style>
<?php if (count($title) > 1) { ?>
	<div class="row-fluid">
		<div class="pool-top">
			<?php foreach ($title as $tkey => $tvalue) { ?>
				<li class="licd move<?php echo $tkey ?>"><?php echo $tvalue; ?></li>
			<?php } ?>
		</div>
	</div>
<?php } else { ?>
	<script type="text/javascript" charset="UTF-8" src="http://s1.kutongji.com/stat.php?site=2127"></script>
<?php } ?>
	<div class="row-fluid">
		<div class="pool-content">
			<div id="slider" class="swipe">
				<div class="swipe-wrap">
					<?php
					switch ($type) {
						default:
							foreach ($result as $rekey => $revalue) {

								?>
								<div class="wrap" id="wrap<?php echo $rekey ?>">
									<?php foreach ($revalue as $value) { ?>
										<div class="pool-introduction">
											<div class="pool-image">
												<a href="<?php echo $value['app_url']; ?>"><img src="<?php echo $value['icon_url']; ?>"></a>
											</div>
											<div class="pool-title">
												<p class="pool-name">
													<a href="<?php echo $value['app_url']; ?>"><?php echo $value['app_name'] ?></a>
												</p>

												<p>

												<div class="pull-left">
													<?php $this->widget('common.StarRaty.StarRaty', array(
													                                                     'name' => 'star_' . $value['id'],
													                                                     'score' => round($value['level']),
													                                                     'half' => true,
													                                                     'readOnly' => true,
													                                                )); ?>
												</div>
												</p>
											</div>
											<div class="pull-right">
												<div class="pool-size">
													<?php echo $value['filesize'] ?>
												</div>
												<div class="pool-button">
													<p class="pool-name">
														<a href="<?php echo $value['download_url']; ?>"><img src="/static/images/help/download.png"/></a>
													</p>

													<p style="margin:0px;">
														<a href="<?php echo $value['download_url']; ?>">下载</a>
													</p>
												</div>
											</div>
										</div>
									<?php } ?>
								</div>
								<?php
								if ($type == 'game') {
									if ($pages_info[$rekey]->getItemCount() > $pages_info[$rekey]->getPageSize()) {
										$this->widget('common.YiinfiniteScroll.YiinfiniteScroller', array(
										                                                                 'contentSelector' => '#wrap' . $rekey,
										                                                                 'itemSelector' => '#wrap' . $rekey . '.pool-introduction',
										                                                                 'pages' => $pages_info[$rekey],
										                                                            ));
									}
								}
							}
							break;
					}?>
				</div>
			</div>
		</div>
	</div>
<?php $baseUrl = Yii::app()->assetManager->publish(dirname(__FILE__));
Yii::app()->clientScript->registerScriptFile($baseUrl . '/swipe.js', CClientScript::POS_END);
Yii::app()->getClientScript()->registerScript(uniqid(), '
window.mySwipe = new Swipe(document.getElementById("slider"), {
		startSlide: 0,
		speed: 400,
		auto: 0,
		continuous: true,
		disableScroll: false,
		stopPropagation: false,
		callback: function (index, elem) {
		},
		transitionEnd: function (index, elem) {
		}
	});
	$(function () {
		$(".total_count").html($(".swipe-wrap .wrap").length);
			$(".licd").click(function () {
			    var moveNum1=$(this).attr("class");
			    var moveNum2=moveNum1.substr(9);
				Swipe(document.getElementById("slider"), {
					startSlide: moveNum2,
					speed: 400,
					auto: 0,
					continuous: true,
					disableScroll: false,
					stopPropagation: true,
					callback: function (index, elem) {
					},
					transitionEnd: function (index, elem) {
					}
				});
			});
	});'
	, CClientScript::POS_READY);?>

<?php
Yii::app()->getClientScript()->registerCss('swipedemo', '

	');?>
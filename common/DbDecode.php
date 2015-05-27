<?php

class DbDecode {

	public static function questionDecode($questionList, $total, $device = FALSE) {
		$questionItems = array();
		if ($total) {
			$questionItems['total'] = $total;
		} else {
			$questionItems['total'] = 0;
		}
		if ($questionList) {
			foreach ($questionList as $key => $value) {
				$questionItem[$key]['qid'] = $value['id'];
				$questionItem[$key]['app_source'] = Apps::model()->getSource($value['app_id']);
				$questionItem[$key]['app_id'] = $value['app_id'];
				$questionItem[$key]['content'] = !empty($value['text']) ? $value['text'] : $value['title'];
				$questionItem[$key]['time'] = isset($value['question_time']) ? $value['question_time'] : $value['ctime'];
				$questionItem[$key]['answernum'] = isset($value['answer']) ? $value['answer'] : 0;
				$questionItem[$key]['commentnum'] = isset($value['comment']) ? $value['comment'] : 0;

				$questionItem[$key]['show_flag'] = $value['show_flag'];
				$questionItem[$key]['status'] = $value['status'];
				if ($value['device_id']) {
					$questionItem[$key]['did'] = $value['device_id'];
					$questionItem[$key]['s_did'] = $value['device_id'];
					$device_id = $value['device_id'];
				} else {
					$old_did = UserDevice::model()->getDeviceId($value['user_id']);
					$device_id = isset($old_did['device_id']) ? $old_did['device_id'] : 0;
					$questionItem[$key]['uid'] = $value['user_id'];
					$questionItem[$key]['s_uid'] = $value['user_id'];
				}
				$profileItem = UserProfile::model()->getUserProfileByPK($value['device_id'], $value['user_id']);
				$questionItem[$key]['nickname'] = isset($profileItem['nickname']) ? $profileItem['nickname'] : '';
				$questionItem[$key]['groupid'] = isset($profileItem['group_id']) ? $profileItem['group_id'] : 1;
				$questionItem[$key]['sign'] = isset($profileItem['summary']) ? $profileItem['summary'] : '';

				$questionTagItem = QuestionTag::model()->getQuestionTag($value['id']);
				$questionItem[$key]['tags'] = empty($questionTagItem) ? '' : array_values($questionTagItem);

				$questionItem[$key]['favoritenum'] = isset($value['favorite']) ? $value['favorite'] : 0;

				if ($device) {
					$questionDevice = DeviceInfo::model()->getDeviceInfo($device_id);
					$questionItem[$key]['isroot'] = isset($questionDevice['isroot']) ? $questionDevice['isroot'] : 0;
					$questionItem[$key]['device_model'] = isset($questionDevice['model']) ? $questionDevice['model'] : '未知型号';
					$questionItem[$key]['release'] = isset($questionDevice['release']) ? $questionDevice['release'] : '未知版本';
				}
//				$answerItems = QuestionAnswer1::model()->getQuestionAnswer($value['id'], 0, 1);
//				if (isset($answerItems) && $answerItems) {
//					$answerItems = $answerItems[0];
//					switch ($answerItems['answer_type']) {
//						case 1:
//							$answer_text = QuestionAnswerText1::model()->find('id =:id', array(':id' => $answerItems['answer_id']));
//							break;
//						case 2:
//							$answer_text = QuestionAnswer::model()->find('id =:id', array(':id' => $answerItems['answer_id']));
//							break;
//					}
//					$questionItem[$key]['last_answer']['did'] = $answerItems['device_id'];
//					$questionItem[$key]['last_answer']['uid'] = $answerItems['user_id'];
//					$questionItem[$key]['last_answer']['text'] = $answer_text['text'];
//					$questionItem[$key]['last_answer']['nickname'] = UserProfile::model()->getNicknameById($answerItems['device_id'], $answerItems['user_id']);
//					$questionItem[$key]['last_answer']['agree'] = $answerItems['agree'];
//					$questionItem[$key]['last_answer']['disagree'] = $answerItems['disagree'];
//					$questionItem[$key]['last_answer']['time'] = $answerItems['ctime'];
//				}
			}
			$questionItems['items'] = array_values($questionItem);
		} else {
			$questionItems['items'] = NULL;
		}
		return $questionItems;
	}

	public static function answerDecode($answerList, $total) {
		if ($total) {
			$answerItems['total'] = $total;
		} else {
			$answerItems['total'] = 0;
		}
		if ($answerList) {
			foreach ($answerList as $key => $value) {
				$answerItem[$key]['aid'] = $value['id'];

				$answerItem[$key]['qid'] = $value['question_id'];
				$answerItem[$key]['agree'] = $value['agree'];
				$answerItem[$key]['disagree'] = $value['disagree'];

				$answerItem[$key]['content'] = $value['text'];

				$answerItem[$key]['time'] = $value['ctime'];
				$profileItem = UserProfile::model()->getUserProfileByPK($value['device_id'], $value['user_id']);
				if ($value['admin_id']) {
					$answerItem[$key]['mid'] = $value['admin_id'];
					$answerItem[$key]['did'] = $value['device_id'];
				} else {
					if ($value['device_id']) {
						$answerItem[$key]['did'] = $value['device_id'];
					} else {
						$answerItem[$key]['uid'] = $value['user_id'];
					}
					$answerItem[$key]['groupid'] = isset($profileItem['group_id']) ? $profileItem['group_id'] : '1';
					$answerItem[$key]['sign'] = isset($profileItem['summary']) ? $profileItem['summary'] : '';
				}
				$answerItem[$key]['nickname'] = isset($profileItem['nickname']) ? $profileItem['nickname'] : '';
				$level['level_id'] = isset($profileItem['level_id']) ? $profileItem['level_id'] : '1';
				$level['grade'] = UserLevel::model()->getLevel($level['level_id']);
				$answerItem[$key]['level'] = $level['grade'] . '(' . $level['level_id'] . '级)';
			}
			$answerItems['items'] = array_values($answerItem);
		} else {
			$answerItems['items'] = NULL;
		}

		return $answerItems;
	}

	public static function commentDecode($commentList, $total) {
		if ($total) {
			$commentItems['total'] = $total;
		} else {
			$commentItems['total'] = 0;
		}
		if ($commentList) {
			foreach ($commentList as $key => $value) {
				$commentItem[$key]['cid'] = $value['id'];

				$commentItem[$key]['qid'] = $value['question_id'];
				$commentItem[$key]['agree'] = $value['agree'];
				$commentItem[$key]['disagree'] = $value['disagree'];

				$commentItem[$key]['token'] = $value['ip'];

				//				$text = AnswerTagStyle::model()->answerFilter($value['text']);
				$commentItem[$key]['content'] = $value['text'];
				$commentItem[$key]['time'] = $value['ctime'];
				if ($value['admin_id']) {
					$commentItem[$key]['mid'] = $value['admin_id'];
					$commentItem[$key]['did'] = $value['device_id'];
				} else {
					$profileItem = UserProfile::model()->getUserProfileByPK($value['device_id'], $value['user_id']);
					if ($value['device_id']) {
						$commentItem[$key]['did'] = $value['device_id'];
					} else {
						$commentItem[$key]['uid'] = $value['user_id'];
					}
					$commentItem[$key]['nickname'] = isset($profileItem['nickname']) ? $profileItem['nickname'] : '';
					$commentItem[$key]['groupid'] = isset($profileItem['group_id']) ? $profileItem['group_id'] : 0;
					$commentItem[$key]['sign'] = isset($profileItem['summary']) ? $profileItem['summary'] : '';
				}
			}
			$commentItems['items'] = array_values($commentItem);
		} else {
			$commentItems['items'] = NULL;
		}
		return $commentItems;
	}

}

?>

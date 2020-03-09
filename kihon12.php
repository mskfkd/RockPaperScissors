<?php

//プレイヤー入力の関数
function getPlayerHand() {
	$typeHand = trim(fgets(STDIN));
	$checkres = checkHand($typeHand);

	if($checkres === true){
		echo "あなたは" . HAND_LIST[$typeHand]. "を出すのですね" . "\n";
		return $typeHand;
	}else {
		echo "エラーです。再度入力し直してください。";
		return getPlayerHand();
	}
}

//プレイヤー側のバリデーション
function checkHand($inputHand){
//空じゃないか?
	if(!isset($inputHand)) {
		echo "あなたの手を入力してください";
		return false;
	}

//グー、チョキ、パーのいずれかを入力しているか?
	if($inputHand >= 3) {
		echo "0:グー、1:チョキ、2:パーのいずれかを入力し直してください";
		return false;
	}

//プレイヤーが出した手の確認
	// if($inputHand === 0) {
	// 	echo "あなたは" . HAND_LIST[STONE] . "を出すのですね?";
	// 	return true;
	// }elseif($inputHand === 1) {
	// 	echo "あなたは" . HAND_LIST[SCISSOR] . "を出すのですね?";
	// 	return true;
	// }elseif($inputHand === 2) {
	// 	echo "あなたは" . HAND_LIST[PAPPER] . "を出すのですね?";
	// 	return true;
	// }
	// }else {
	// 	return false;
	// }
	return true;
}

//PC側
function getComHand() {
//PC側の手をランダムに選択
	$selectHand = array(0, 1, 2);
	$ans = array_rand($selectHand);
	// $pcselect = HAND_LIST[$ans];
	if($ans === 0) {
		echo "PCは". HAND_LIST[STONE] ."を選びました。";
		return $selectHand[$ans];
	}elseif ($ans === 1) {
		echo "PCは". HAND_LIST[SCISSOR] ."を選びました。";
		return $selectHand[$ans];
	}elseif ($ans === 2) {
		echo "PCは". HAND_LIST[PAPPER] ."を選びました。";
		return $selectHand[$ans];
	}
	// echo "PCは" . $pcselect . "を選びました" . "\n";
	// return $pcselect;
}

//グーチョキパーを判定用数字に変換
const STONE = 0;
const SCISSOR = 1;
const PAPPER = 2;

const HAND_LIST = array(
	STONE => "グー",
	SCISSOR => "チョキ",
	PAPPER => "パー"
);

const JUDGE_LIST = array(
	0 => "引き分け",
	1 => "負け",
	2 => "勝ち"
);

//勝敗判定
function judge($playerchoice , $pcchoice) {

	$judgeCalc = ($playerchoice - $pcchoice + 3) %3;

	return $judgeCalc;
}

//勝敗の返答
function show($judgeCalc) {
	$judgeRes = JUDGE_LIST[$judgeCalc];
	return $judgeRes;
}

//勝負処理
function  RockPaperScissors() {
	$inputHand = getPlayerHand();
	$pcHand = getComHand();
	$result = judge($inputHand , $pcHand);
	//結果を表示
	return show($result);
}

//見える側
echo "じゃんけんをしましょう。0:グー、1:チョキ、2:パーとして、いずれか入力してください。" . "\n";
$player = RockPaperScissors();
echo "あなたは" . $player . "です。" . "\n";

?>
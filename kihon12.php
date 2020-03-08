<?php

//プレイヤー入力の関数
function getPlayerHand() {
	$typeHand = trim(fgets(STDIN));
	$checkres = checkHand($typeHand);

	if($checkres === true){
		echo "あなたは" . $typeHand . "を出すのですね?";
		return $typeHand;
	}else {
		echo "エラーです。再度入力し直してください。";
		return getPlayerHand();
	}
}

//プレイヤー側のバリデーション
function checkHand($inputHand){
//空じゃないか?
	if(empty($inputHand) === true) {
		echo "あなたの手を入力してください";
		return false;
	}

//グー、チョキ、パーのいずれかを入力しているか?
	if($inputHand === "グー") {
		return true;
	}elseif ($inputHand === "チョキ") {
		return true;
	}elseif ($inputHand === "パー") {
		return true;
	}else {
		return false;
	}

}

//PC側
function getComHand() {
//PC側の手をランダムに選択
	$selectHand = array("グー" , "チョキ" , "パー");
	$ans = array_rand($selectHand);
	return $selectHand[$ans];
}

//グーチョキパーを判定用数字に変換
class HandClass {
	const STONE = 0;
	const SCISSOR = 1;
	const PAPPER = 2;

	const HAND_LIST = array(
		"グー" => STONE,
		"チョキ" => SCISSOR,
		"パー" => PAPPER
	);
	
}

class judgeClass {
	const JUDGE_LIST = array(
		0 => "引き分け",
		1 => "負け",
		2 => "勝ち"
	);

} 

//勝敗判定
function judge($playerchoice , $pcchoice) {
	echo "PCは" . $pcchoice . "を出しました";
	
	$playerconv = HandClass::HAND_LIST[$playerchoice];
	$pcconv = HandClass::HAND_LIST[$pcchoice];

	$judgeCalc = ($playerconv - $pcconv + 3) %3;

	return $judgeCalc;
}

//勝敗の返答
function show($judgeCalc) {
	$judgeRes = judgeClass::JUDGE_LIST[$judgeCalc];
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
echo "じゃんけんをしましょう。あなたの手を入力してください。" . "\n";
$player = RockPaperScissors();
echo "あなたは" . $player . "です。" . "\n";

?>
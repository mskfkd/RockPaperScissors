<?php

//プレイヤー入力の関数
function getplayerHand() {
	$typeHand = trim(fgets(STDIN));
	$checkres = checkHand($typeHand);

	if($checkres === true){
		echo "あなたは" . $typeHand . "を出すのですね?";
		return $typeHand;
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
		return;
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
function convert($hand) {
	$hand_list = array(
		"グー" => 0 , 
		"チョキ" => 1 ,
		"パー" => 2
	);
	
	return $hand_list[$hand];
}

//勝敗判定
function judge($playerchoice , $pcchoice) {
	echo "PCは" . $pcchoice . "を出しました";

	//それぞれを数字に変換
	$playerconv = convert($playerchoice);
	$pcconv = convert($pcchoice);

	$judgeCalc = ($playerconv - $pcconv + 3) % 3;
	
	$judge_list = array(
		0 => '引き分け',
		1 => '負け',
		2 => '勝ち'
	);

	return $judge_list[$judgeCalc];

}

//勝負処理
function  RockPaperScissors() {
	$inputHand = getplayerHand();
	$pcHand = getComHand();
	$result = judge($inputHand , $pcHand);
	//結果を表示
	return $result;
}

//見える側
echo "じゃんけんをしましょう。あなたの手を入力してください。" . "\n";
$player = RockPaperScissors();
echo "あなたは" . $player . "です。" . "\n";

?>
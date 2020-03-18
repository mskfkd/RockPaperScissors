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

	return true;
}

//PC側
function getComHand() {
//PC側の手をランダムに選択
	$selectHand = array(0, 1, 2);
	$ans = array_rand($selectHand);
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

//続けるか否かの返事用
const YES = "y";
const NO = "n";

//勝敗判定
function judge($playerchoice , $pcchoice) {

	$judgeCalc = ($playerchoice - $pcchoice + 3) %3;

	return $judgeCalc;
}

//勝敗の返答
function show($judgeCalc) {
	$judgeRes = JUDGE_LIST[$judgeCalc];
	echo "あなたは" . $judgeRes . "です。" . "\n";
}

//勝負処理
function RockPaperScissors() {
	$inputHand = getPlayerHand();
	$pcHand = getComHand();
	$result = judge($inputHand , $pcHand);
	//結果を表示
	$judge = show($result);
	echo $judge;

	$playerReplay = replay();

	if($playerReplay === YES) {
		echo "それでは、0:グー、1:チョキ、2:パーとして、いずれか入力してください。" . "\n";
		return RockPaperScissors();
	}elseif ($playerReplay === NO) {
		echo "それではこれにて、じゃんけんゲームを終了します。" . "\n";
		return;
	}
}

function replay() {
	
	echo "もう1回やりますか? y:はい、n:いいえで入力してください" . "\n";
	$playerRes = trim(fgets(STDIN));

	//バリデーション
	//空じゃないか
	if (!isset($playerRes)) {
		echo "もう1度入力して下さい";
		return replay();
	}

	//yかnかを入力してるか
	if($playerRes === YES || $playerRes === NO) {
		return $playerRes;
	}else {
		echo "y:はい、n:いいえで入力してください" . "\n";
		return replay();
	}

}

//見える側
echo "じゃんけんをしましょう。0:グー、1:チョキ、2:パーとして、いずれか入力してください。" . "\n";
$player = RockPaperScissors();

?>


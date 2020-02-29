<?php

//プレイヤー側のバリデーション
function checkHand($inputHand) {
//空じゃないか?
	if(empty($inputHand) === true) {
		echo "あなたの手を入力してください";
		return false;
	}

//グー、チョキ、パーのいずれかを入力しているか?
	if($inputHand === 'グー') {
		return true;
	}elseif ($inputHand === 'チョキ') {
		return true;
	}elseif ($inputHand === 'パー') {
		return true;
	}else {
		return false;
	}
}

//PC側
function masterHand() {
//PC側の手をランダムに選択
	$selectHand = array('グー' , 'チョキ' , 'パー');
	$ansHand = array_rand($selectHand , 1);
	return $ansHand;
}


//勝負処理
function  RockPaperScissors() {
	$inputHand = trim(fgets(STDIN));



}

//見える側
echo "じゃんけんをしましょう。あなたの手を入力してください。";
$player = ;
echo "あなたは" . $player . "を出すのですね?";
$gamemaster = masterHand();
echo "PCは" . $gamemaster . "を出しました。";
echo "勝者は" . $jugde . "です。";

?>
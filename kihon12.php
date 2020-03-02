<?php
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
function masterHand() {
//PC側の手をランダムに選択
	$selectHand = array("グー" , "チョキ" , "パー");
	$ansHand = array_rand($selectHand);
	return $ansHand;
}

//勝敗判定
function judge($inputHand) {
	$key = masterHand();

	if($key === "グー") {
		switch ($inputHand) {
			case ($key === $inputHand):
				$result = "あいこ";
				break;
			
			case "チョキ":
				$result = "負け";
				break;

			case "パー":
				$result = "勝ち";
				break;
		}

		return $result;

	}elseif ($key === "チョキ") {
		switch ($inputHand) {
			
		case ($key === $inputHand):
				$result = "あいこ";
				break;
			
			case "グー":
				$result = "勝ち";
				break;

			case "パー":
				$result = "負け";
				break;
		}

		return $result;

	}elseif($key === "パー") {
		switch ($inputHand) {
			
		case ($key === $inputHand):
				$result = "あいこ";
				break;
			
			case "チョキ":
				$result = "負け";
				break;

			case "パー":
				$result = "勝ち";
				break;
		}

		return $result;

	}else{
		echo "エラーです";
		return;
	}
}

//勝負処理
function  RockPaperScissors($inputHand) {
	$inputHand = trim(fgets(STDIN));

	if(checkHand($inputHand) === true) {
		$judge = judge($inputHand);
		return $judge;
	}else{
		return RockPaperScissors($inputHand);
	}
}

//見える側
echo "じゃんけんをしましょう。あなたの手を入力してください。";
$player = RockPaperScissors(trim(fgets(STDIN)));
echo "あなたは" . $player . "を出すのですね?";
$gamemaster = masterHand($gamemaster);
echo "PCは" . $gamemaster . "を出しました。";
echo "あなたは" . $player . "です。";

?>
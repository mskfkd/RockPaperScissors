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
	$ans = array_rand($selectHand);
	return $selectHand[$ans];
}

//勝敗判定
function judgeStone($inputHand) {

		switch ($inputHand) {

			case "グー":
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

}

function judgeScissor($inputHand) {

		switch ($inputHand) {
			
			case "チョキ":
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

}

function judgePaper($inputHand) {

		switch ($inputHand) {
			
			case "パー":
				$result = "あいこ";
				break;
			
			case "チョキ":
				$result = "勝ち";
				break;

			case "グー":
				$result = "負け";
				break;
		}

		return $result;

}

//勝負処理
function  RockPaperScissors() {
	$inputHand = trim(fgets(STDIN));
	$key = masterHand();

	echo "あなたは" . $inputHand . "を出すのですね?";

	if($key === "グー") {

			echo "PCは" . $key . "を出しました。" . "\n";
			$checkans = checkHand($inputHand);

		if($checkans === true) {

			$judgeans = judgeStone($inputHand);
			return $judgeans;

		}else{

			echo "エラーです。";
			
		}
	}elseif ($key === "チョキ") {

			echo "PCは" . $key . "を出しました。" . "\n";
			$checkans = checkHand($inputHand);

		if ($checkans === true) {

			$judgeans = judgeScissor($inputHand);
			return $judgeans;

		}else{

			echo "エラーです。";

		}
	}elseif ($key === "パー") {

			echo "PCは" . $key . "を出しました。" . "\n";
			$checkans = checkHand($inputHand);

		if ($checkans === true) {

			$judgeans = judgePaper($inputHand);
			return $judgeans;

		}else{

			echo "エラーです。";

		}
	}
}

//見える側
echo "じゃんけんをしましょう。あなたの手を入力してください。" . "\n";
$player = RockPaperScissors();
echo "あなたは" . $player . "です。" . "\n";

?>
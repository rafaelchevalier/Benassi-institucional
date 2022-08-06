<?php
	$tipo = 0;
	$host = $_REQUEST['url'];
	$tipo = $_REQUEST['tipo'];
	if (isset($_REQUEST['code'])){
		$code = $_REQUEST['code'];
		}
	else{
		$code = 0;
	}
	SWITCH ($tipo){
		case 1:
			exec("ping -n 1 -w 1 " . $host, $output, $result);
			// TESTA O RESULTADO
			if ($result == 0) {
				echo"
					<META HTTP-EQUIV=REFRESH CONTENT='0; URL=../../index.php?url=".$host."&rwhois=".$result."'>
					";
					$_POST['url'] = $host;
			} 
			else {
				echo"
					<META HTTP-EQUIV=REFRESH CONTENT='0; URL=../../index.php?url=".$host."&rwhois=".$result."#servicos'>
					";
					$_POST['url'] = $host;
			}
		break;
		case 2:
			exec("ping -n 1 -w 1 " . $host, $output, $result);
			if ($result == 0) {
			echo"
				<META HTTP-EQUIV=REFRESH CONTENT='0; URL=../../hospedagem/cad.php?url=".$host."&rwhois=".$result."&code=".$code."'>
				";
				$_POST['url'] = $host;
			} 
			else {
				echo"
					<META HTTP-EQUIV=REFRESH CONTENT='0; URL=../../hospedagem/cad.php?url=".$host."&rwhois=".$result."&code=".$code."'>
					";
				$_POST['url'] = $host;
			}
		break;
		default:
	}
?>
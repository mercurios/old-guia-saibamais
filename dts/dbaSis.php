<?php
	require('iniSis.php');

	header('Content-Type: text/html; charset=utf-8');
	$conn = mysql_connect(HOST, USER, PASS) or die ('Erro ao conectar: '.mysql_error());
	$dbsa = mysql_select_db(DBSA) or die ('Erro ao selecionar banco: '.mysql_error());
	mysql_query("SET NAMES 'utf8'");
mysql_query('SET character_set_connection=utf8');
mysql_query('SET character_set_client=utf8');
mysql_query('SET character_set_results=utf8');

	
/*****************************
FUNÇÃO DE CADASTRO NO BANCO
*****************************/

	function create($tabela, array $datas){
		$fields = implode(", ",array_keys($datas));
		$values = "'".implode("', '",array_values($datas))."'";			
		$qrCreate = "INSERT INTO {$tabela} ($fields) VALUES ($values)";
		$stCreate = mysql_query($qrCreate) or die ('Erro ao cadastrar em '.$tabela.' '.mysql_error());
		
		if($stCreate){
			return true;
		}
	}
	
/*****************************
FUNÇÃO DE CADASTRO NO BANCO
*****************************/

	function read($tabela, $cond = NULL){		
		$qrRead = "SELECT * FROM {$tabela} {$cond}";
		$stRead = mysql_query($qrRead) or die ('Erro ao ler em '.$tabela.' '.mysql_error());
		$cField = mysql_num_fields($stRead);
		for($y = 0; $y < $cField; $y++){
			$names[$y] = mysql_field_name($stRead,$y);
		}
		for($x = 0; $res = mysql_fetch_assoc($stRead); $x++){
			for($i = 0; $i < $cField; $i++){
				$resultado[$x][$names[$i]] = $res[$names[$i]];
			}
		}
		return $resultado;
	}
	
/*****************************
FUNÇÃO DE EDIÇÃO NO BANCO
*****************************/	
	
	function update($tabela, array $datas, $where){
		foreach($datas as $fields => $values){
			$campos[] = "$fields = '$values'";
		}
		
		$campos = implode(", ",$campos);
		$qrUpdate = "UPDATE {$tabela} SET $campos WHERE {$where}";
		$stUpdate = mysql_query($qrUpdate) or die ('Erro ao atualizar em '.$tabela.' '.mysql_error());

		if($stUpdate){
			return true;	
		}
		
	}
	
/*****************************
FUNÇÃO DE DELETAR NO BANCO
*****************************/

	function delete($tabela, $where){
		$qrDelete = "DELETE FROM {$tabela} WHERE {$where}";
		$stDelete = mysql_query($qrDelete) or die ('Erro ao deletar em '.$tabela.' '.mysql_error());
	}

/*****************************
FUNÇÃO DE CRIAR LOG DO SISTEMA
*****************************/

	function salvaLog($mensagem, $user = NULL)
	{
		$ip 	= $_SERVER['REMOTE_ADDR']; // Salva o IP do visitante
		$hora 	= date('Y-m-d H:i:s'); // Salva a data e hora atual (formato MySQL)

		// Usamos o mysql_escape_string() para poder inserir a mensagem no banco
		// sem ter problemas com aspas e outros caracteres
		$mensagem 	= mysql_escape_string($mensagem);
		$dados 		= array("ip_log" => $ip, "hora_log" => $hora, "user_log" => $user, "msg_log" => $mensagem); 
		$salvar 	= create('guia_logs', $dados);

		if ($salvar) {
			return true;
		}
		else {
			return false;
		}
	}

/*****************************
GERA RESUMOS
*****************************/

	function lmWord($string, $words = '100'){
		$string 	= strip_tags($string);
		$count		= strlen($string);
		
		if($count <= $words){
			return $string;	
		}else{
			$strpos = strrpos(substr($string,0,$words),' ');
			return substr($string,0,$strpos).'...';
		}
		
	}
	
/*****************************
VALIDA O CPF
*****************************/	

	function valCpf($cpf){
		$cpf = preg_replace('/[^0-9]/','',$cpf);
		$digitoA = 0;
		$digitoB = 0;
		for($i = 0, $x = 10; $i <= 8; $i++, $x--){
			$digitoA += $cpf[$i] * $x;
		}
		for($i = 0, $x = 11; $i <= 9; $i++, $x--){
			if(str_repeat($i, 11) == $cpf){
				return false;
			}
			$digitoB += $cpf[$i] * $x;
		}
		$somaA = (($digitoA%11) < 2 ) ? 0 : 11-($digitoA%11);
		$somaB = (($digitoB%11) < 2 ) ? 0 : 11-($digitoB%11);
		if($somaA != $cpf[9] || $somaB != $cpf[10]){
			return false;	
		}else{
			return true;
		}
	}	

/*****************************
VALIDA O EMAIL
*****************************/	
	
	function valMail($email){
		if(preg_match('/[a-z0-9_\.\-]+@[a-z0-9_\.\-]*[a-z0-9_\.\-]+\.[a-z]{2,4}$/',$email)){
			return true;
		}else{
			return false;
		}
	}
	
/*****************************
ENVIA O EMAIL
*****************************/	

	function sendMail($assunto,$mensagem,$remetente,$nomeRemetente,$destino,$nomeDestino, $reply = NULL, $replyNome = NULL){
		
		require_once('mail/class.phpmailer.php'); //Include pasta/classe do PHPMailer
		
		$mail = new PHPMailer(); //INICIA A CLASSE
		$mail->IsSMTP(); //Habilita envio SMPT
		$mail->SMTPAuth = true; //Ativa email autenticado
		$mail->IsHTML(true);
		
		$mail->Host = MAILHOST; //Servidor de envio
		$mail->Port = MAILPORT; //Porta de envio
		$mail->Username = MAILUSER; //email para smtp autenticado
		$mail->Password = MAILPASS; //seleciona a porta de envio
		
		$mail->From = utf8_decode($remetente); //remtente
		$mail->FromName = utf8_decode($nomeRemetente); //remtetene nome
		
		if($reply != NULL){
			$mail->AddReplyTo(utf8_decode($reply),utf8_decode($replyNome));	
		}
		
		$mail->Subject = utf8_decode($assunto); //assunto
		$mail->Body = utf8_decode($mensagem); //mensagem
		$mail->AddAddress(utf8_decode($destino),utf8_decode($nomeDestino)); //email e nome do destino
		
		if($mail->Send()){
			return true;
		}else{
			return false;
		}
	}	
	

/*****************************
Paginação de resultados
*****************************/

	function readPaginator($tabela, $cond, $maximos, $link, $pag, $width = NULL, $maxlinks = 4){
		$readPaginator = read("$tabela","$cond");
		$total = count($readPaginator);
		if($total > $maximos){
			$paginas = ceil($total/$maximos);
			if($width){
				echo '<div class="paginator" style="width:'.$width.'">';
			}else{
				echo '<div class="paginator">';
			}
			echo '<a href="'.$link.'1">Primeira Página</a>';
			for($i = $pag - $maxlinks; $i <= $pag - 1; $i++){
				if($i >= 1){
					echo '<a href="'.$link.$i.'">'.$i.'</a>';
				}
			}
			echo '<span class="atv">'.$pag.'</span>';
			for($i = $pag + 1; $i <= $pag + $maxlinks; $i++){
				if($i <= $paginas){
					echo '<a href="'.$link.$i.'">'.$i.'</a>';
				}
			}
			echo '<a href="'.$link.$paginas.'">Última Página</a>';
			echo '</div><!-- /paginator -->';
		}
	}
	
/*****************************
IMAGE UPLOAD
*****************************/

	function upload_imagem($arquivo, $pasta, $tipos, $nome = null) {
	    if(isset($arquivo)){
	        $infos = explode(".", $arquivo["name"]);
	 
	        if(!$nome){
	            for($i = 0; $i < count($infos) - 1; $i++){
	                $nomeOriginal = $nomeOriginal . $infos[$i] . ".";
	            }
	        }
	        else{
	            $nomeOriginal = $nome . ".";
	        }
	 
	        $tipoArquivo = $infos[count($infos) - 1];
	 
	        $tipoPermitido = false;
	        foreach($tipos as $tipo){
	            if(strtolower($tipoArquivo) == strtolower($tipo)){
	                $tipoPermitido = true;
	            }
	        }
	        if(!$tipoPermitido){
	            $retorno["erro"] = '<div class="alert alert-error fade in"><a href="#" class="close" data-dismiss="alert">×</a><strong>Atenção!</strong> Tipo de arquivo não permitido. </div>';
	        }
	        else{
	            if(move_uploaded_file($arquivo['tmp_name'], $pasta . $nomeOriginal . $tipoArquivo)){
	                $retorno["caminho"] = $pasta . $nomeOriginal . $tipoArquivo;
	                $retorno['nameimg'] = $nomeOriginal . $tipoArquivo;
	            }
	            else{
	                $retorno["erro"] = '<div class="alert alert-error fade in"><a href="#" class="close" data-dismiss="alert">×</a><strong>Atenção!</strong> Erro ao fazer upload. </div>';
	            }
	        }
	    }
	    else{
	        $retorno["erro"] = '<div class="alert alert-error fade in"><a href="#" class="close" data-dismiss="alert">×</a><strong>Atenção!</strong> Arquivo nao setado. </div>';
	    }
	    return $retorno;
	}

/*****************************
TRANFORMA STRING EM URL
*****************************/

	function setUri($string){
		$a = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜüÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿŔŕ"!@#$%&*()_-+={[}]/?;:.,\\\'<>°ºª';
		$b = 'aaaaaaaceeeeiiiidnoooooouuuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr                                 ';	
		$string = utf8_decode($string);
		$string = strtr($string, utf8_decode($a), $b);
		$string = strip_tags(trim($string));
		$string = str_replace(" ","-",$string);
		$string = str_replace(array("-----","----","---","--"),"-",$string);
		return strtolower(utf8_encode($string));
	}

/*****************************
	Mostra erro personalizado
*****************************/

	function showMsg($msg, $type = '') {
		switch ($type) {
			case 'warning':
				echo '<div class="msg alert alert-error fade in">
					<a href="#" class="close" data-dismiss="alert">×</a>
					<strong>Atenção!</strong> ' . $msg . '
				</div>';
				break;
			case 'success':
				echo '<div class="msg alert alert-success fade in">
					<a href="#" class="close" data-dismiss="alert">×</a>' . $msg . '
				</div>';
				break;
			case 'info':
				echo '<div class="msg alert alert-info fade in">
					<a href="#" class="close" data-dismiss="alert">×</a>
					<strong>Advertência!</strong> ' . $msg . '
				</div>';
				break;
			default:
				echo '<div class="msg alert fade in">
					<a href="#" class="close" data-dismiss="alert">×</a>
					<strong>Advertência!</strong> ' . $msg . '
				</div>';
				break;
		}
	}

/*****************************
	Mostra mensagem de erro
*****************************/
	function message($msg, $type = '') {
		switch ($type) {
			case 'warning':
				echo '<div class="alert alert-error fade in">
					<a href="#" class="close" data-dismiss="alert">×</a>
					<strong>Atenção!</strong> ' . $msg . '
				</div>';
				break;
			case 'success':
				echo '<div class="alert alert-success fade in">
					<a href="#" class="close" data-dismiss="alert">×</a>' . $msg . '
				</div>';
				break;
			case 'info':
				echo '<div class="alert alert-info fade in">
					<a href="#" class="close" data-dismiss="alert">×</a>
					<strong>Advertência!</strong> ' . $msg . '
				</div>';
				break;
			default:
				echo '<div class="alert fade in">
					<a href="#" class="close" data-dismiss="alert">×</a>
					<strong>Advertência!</strong> ' . $msg . '
				</div>';
				break;
		}
	}


/*****************************
FORMDATE
*****************************/	
function formatarDataBanco($data) {
	$data = explode('/', $data);
	$data = $data[2] . '-' . $data[1] . '-' . $data[0] . ' 00:00:00' ;
	return $data;
}

/*****************************
FORMATA DATA EM TIMESTAMP
*****************************/	

	function formDate($data){
		$horaAgora = explode(' ', $data);
		$data = $horaAgora[0];
		$hora = $horaAgora[1];
		$data = explode('-', $data);
		$data = $data[2] . '/' . $data[1] . '/' . $data[0];
		$data = $data . ' - ' . $hora;

		return $data;
	}

/*****************************
TRANFORMA STRING EM URL
*****************************/

function geraUrl($string){
	$a = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜüÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿŔŕ"!@#$%&*()_-+={[}]/?;:.,\\\'<>°ºª';
	$b = 'aaaaaaaceeeeiiiidnoooooouuuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr                                 ';  
	$string = utf8_decode($string);
	$string = strtr($string, utf8_decode($a), $b);
	$string = strip_tags(trim($string));
	$string = str_replace(" ","-",$string);
	$string = str_replace(array("-----","----","---","--"),"-",$string);
	return strtolower(utf8_encode($string));
}
?>
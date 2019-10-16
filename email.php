<?php

namespace email {


  class Email {

	
	public function enviarEmail($select,$aluno,$status) {    
	    for ($i = 0; $i < count($select); $i++){
	    	$this->enviar($select[$i],$aluno,$status);
	    }
        }
		
	
	private function enviar($select,$aluno,$status){
	    //Vari√°veis

		$nome = $select['nome'];
		$destino = $select['email'];
		$origem = "diegod@ifes.edu.br";
		//$opcoes = $_POST['escolhas'];
		if ($status) {
		  $mensagem = 'Entrou no ';
		}
		else $mensagem = 'Saiu do ';
		$data_envio = date('d/m/Y');
		$hora_envio = date('H:i:s');

		// Compo E-mail
		  $arquivo = "
		  <style type='text/css'>
		  body {
		  margin:0px;
		  font-family:Verdane;
		  font-size:12px;
		  color: #666666;
		  }
		  a{
		  color: #666666;
		  text-decoration: none;
		  }
		  a:hover {
		  color: #FF0000;
		  text-decoration: none;
		  }
		  </style>
		    <html>
			<table width='510' border='1' cellpadding='1' cellspacing='1' bgcolor='#CCCCCC'>
			    <tr>
			      <td>NotificaÁ„o: Controle de Acesso ao Campus Serra do Ifes</td>
		  <tr>
				 <td width='500'>Prezado(a):$nome</td>
				</tr>
				<tr>
				  </td>
		     </tr>
		      <tr>
				  <td width='320'>Aluno:<b>$aluno</b></td>
				</tr>
		    		<tr>
				  <td width='320'>Mensagem:$mensagem  Campus Serra do Ifes ‡s <b>$hora_envio</b> do dia <b>$data_envio</b>. </td></tr>
<td><b> AtenÁ„o</b> : Esta È uma mensagem autom·tica. Por favor, n„o responda a este e-mail.</td>
				
			    </td>
			  </tr>  
			  <tr>
			  </tr>
			</table>
		    </html>

		  ";

		//enviar
		  
		  // emails para quem ser√° enviado o formul√°rio
		  
		  //$destino = $emailenviar;
		  $assunto = "Contato pelo Site";

		  // √â necess√°rio indicar que o formato do e-mail √© html
		  $headers  = 'MIME-Version: 1.0' . "\r\n";
		      $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		      $headers .= 'From: '.$nome ."<".$origem.">";
		  //$headers .= "Bcc: $EmailPadrao\r\n";
		  
		  $enviaremail = mail($destino, $assunto, $arquivo, $headers);
		  if($enviaremail){
		  $mgm = "E-MAIL ENVIADO COM SUCESSO! <br> O link ser√° enviado para o e-mail fornecido no formul√°rio";
		  //echo " <meta http-equiv='refresh' content='10;URL=contato.php'>";
		  } else {
		  $mgm = "ERRO AO ENVIAR E-MAIL!";
		  //echo "";
		  }
	}
	
  }
}
?>

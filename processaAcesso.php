<?php
//utilização de namespaces
namespace processaAcesso {

include 'conexao/mysql.php';

    use Mysql as Mysql;

    class ProcessaAcesso {
        
        var $db;

        public function __construct() {
            $conexao = new Mysql\mysql(DB_SERVER, DB_NAME, DB_USERNAME, DB_PASSWORD); 
            $this->db = $conexao; 
        }

        public function verificaAcesso($cod_cartao) {     
	    $aux = $this->db->select('tb_cartao','*'," where cod_cartao = '$cod_cartao'");
	    $aux = $aux[0]['id_cartao'];
            $select = $this->db->select('tb_usuario', '*'," where cartao_id_cartao = '$aux'");
            return $select;
        }

	public function verificaStatus($id_usuario) {
	    return $select = $this->db->select('tb_acesso','status',"where usuario_id_usuario = '$id_usuario' order by data desc");
	}
        
	public function selecionarEmail($id_usuario){
	    return $select = $this->db->select('tb_email','*'," where usuario_id_usuario = '$id_usuario'");
	}
        public function cadastraAcesso($dados){
            
            $insert = $this->db->insert('tb_acesso', $dados);
            return $insert;
        }

    }

}
?>

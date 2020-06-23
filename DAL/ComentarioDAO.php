<?php

require_once("Banco.php");

class ComentarioDAO {

    private $pdo;

    public function __construct() {
        $this->pdo = new Banco();
    }

    public function Cadastrar(Comentario $comentario) {
        try {
            $sql = "INSERT INTO comentario (nome, mensagem, link, comentario_cod) VALUES (:nome, :mensagem, :link, :comentarioCod)";
            $param = array(
                ":nome" => $comentario->getNome(),
                ":mensagem" => $comentario->getMensagem(),
                ":link" => $comentario->getLink(),
                ":comentarioCod" => $comentario->getComentarioCod()
            );

            return $this->pdo->ExecuteNonQuery($sql, $param);
        } catch (PDOException $ex) {
            echo "ERRO: {$ex->getMessage()}";
        }
    }

    public function RetornarComentario(string $link) {
        try {
            $sql = "SELECT cod, nome, mensagem FROM comentario WHERE link = :link ORDER BY cod DESC";
            $param = array(
                ":link" => $link,
            );

            $dt = $this->pdo->ExecuteQuery($sql, $param);
            $listaComentario = [];
            
            foreach ($dt as $dr) {
                $comentario = new Comentario();
                $comentario->setCod($dr["cod"]);
                $comentario->setNome($dr["nome"]);
                $comentario->setMensagem($dr["mensagem"]);

                $listaComentario[] = $comentario;
            }

            return $listaComentario;
        } catch (PDOException $ex) {
            echo "ERRO: {$ex->getMessage()}";
        }
    }

}

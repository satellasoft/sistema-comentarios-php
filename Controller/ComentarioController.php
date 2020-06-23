<?php

require_once("DAL/ComentarioDAO.php");

class ComentarioController {

    private $comentarioDAO;

    public function __construct() {
        $this->comentarioDAO = new ComentarioDAO();
    }

    public function Cadastrar(Comentario $comentario) {

        if (strlen($comentario->getNome()) >= 5 && strlen($comentario->getNome()) <= 50) {
            if (strlen($comentario->getMensagem()) >= 5 && strlen($comentario->getMensagem()) <= 500) {
                return $this->comentarioDAO->Cadastrar($comentario);
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function RetornarComentario(string $link) {
        if (strlen($link) >= 10) {
            return $this->comentarioDAO->RetornarComentario($link);
        } else {
            return null;
        }
    }

}

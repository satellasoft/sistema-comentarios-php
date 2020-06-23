<?php

class Comentario {

    private $cod;
    private $nome;
    private $mensagem;
    private $link;
    private $comentarioCod;

    function getCod() {
        return $this->cod;
    }

    function getNome() {
        return $this->nome;
    }

    function getMensagem() {
        return $this->mensagem;
    }

    function getLink() {
        return $this->link;
    }

    function getComentarioCod() {
        return $this->comentarioCod;
    }

    function setCod($cod) {
        $this->cod = $cod;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setMensagem($mensagem) {
        $this->mensagem = $mensagem;
    }

    function setLink($link) {
        $this->link = $link;
    }

    function setComentarioCod($comentarioCod) {
        $this->comentarioCod = $comentarioCod;
    }

}

?>
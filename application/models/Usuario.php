<?php
    class Aluno {
        private $id, $nome, $email, $senha;
        
        // criação do contrutor da classe Aluno
        // Jhonathan Silva
        public function Aluno($nome, $email, $senha, $id=0) {
            $this->id = $id;
            $this->nome = $nome;
            $this->email = $email;
            $this->senha = $senha;
        }
    }
?>
<?php
    class Aluno {
        private $id, $nome, $email, $senha;
        
        // contrutor da classe Aluno
        // Jhonathan Silva
        public function Aluno($nome, $email, $senha, $id=0) {
            $this->id = $id;
            $this->nome = $nome;
            $this->email = $email;
            $this->senha = $senha;
        }
        
        // getter do atributo id
        // Jhonathan Silva
        public function getId() {
            return $this->id;
        }
        
        // getter do atributo nome
        // Jhonathan Silva
        public function getNome() {
            return $this->nome;
        }
    }
?>
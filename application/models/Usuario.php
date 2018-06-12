<?php
    class Usuario {
        private $id, $nome, $email, $senha;
        
        // contrutor da classe Usuario
        // Jhonathan Silva
        public function Usuario($nome, $email, $senha, $id=0) {
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
        
        // getter do atributo email
        // Jhonathan Silva
        public function getEmail() {
            return $this->email;
        }
        
        // getter do atributo senha
        // Jhonathan Silva
        public function getSenha() {
            return $this->senha;
        }
        
        // validador do objeto
        // Jhonathan Silva
        public function isValido() {
            return $this->nome != "" && $this->email != "" && $this->senha != "";
        }
        
        // gera array com valores das propriedades do objeto
        // Jhonathan Silva
        public function toArray(){
            $aux = array();
            $aux["nome"] = $this->nome;
            $aux["email"] = $this->email;
            $aux["senha"] = $this->senha;
            return $aux;
        }
        
        // retorna nome da entidade para persistência
        // Jhonathan Silva
        public function getClassName() {
            return "usuario";
        }
    }
?>
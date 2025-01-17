<?php
    final class SubmitClasse
    {
        private string $value;
        private string $name;

        public function __construct($value, $name){
            $this->value = $value;
            $this->name = $name;
        }
        public function render(){
            return "<div id=\"validation\">
                        <input type=\"submit\" value='{$this->value}' name='{$this->name}'>
                    </div>";
        }
    }
    
?>
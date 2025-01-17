<?php
    final class Form
    {
        private string $action;
        private string $method;
        private array $fields;
        private string $actionValue;
        private string $actionName;
        private string $messageredirection;
        private string $redirection;

        public function __construct($action="", $method="POST", $fields = [], $actionValue="", $actionName="", $messageredirection="", $redirection="") {
            $this->action = $action;
            $this->method = $method;
            $this->fields = $fields;
            $this->actionValue = $actionValue;
            $this->actionName = $actionName;
            $this->messageredirection = $messageredirection;
            $this->redirection = $redirection;
        }

        public function addFields($field) : array{
            $this->fields []=$field;
        }

        public function render(){
            $formFields = implode("", $this->fields);
            return "<form action='{$this->action}' id=\"form\" method='{$this->method}'>
                {$formFields}
                <div class=\"redir\">
                    <span>{$this->messageredirection}</span>
                    <a href=\"\">{$this->redirection}</a>
                </div>
                <div id=\"validation\">
                    <input type=\"submit\" value='{$this->actionValue}' name='{$this->actionName}'>
                </div>
            </form>";
        }

    }
    
?>
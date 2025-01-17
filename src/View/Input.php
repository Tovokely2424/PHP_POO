<?php
class Input
{
    private string $name="",
            $id="",
            $type ="",
            $value = "",
            $label ="",
            $classe = "";
    private string $attribute;

    public function __construct($data = []){
        $this->hydrate($data);
    }
    public function hydrate($data){
        foreach ($data as $attribute => $value) {
            $setterMethods = 'set'.ucfirst($attribute);
            $this->$setterMethods($value);
        }
    }
    public function getId(){
        return $this->id;
    }
    public function getType(){
        return $this->type;
    }
    public function getValue(){
        return $this->value;
    }
    public function getName(){
        return $this->name;
    }
    public function getLabel(){
        return $this->label;
    }


    //
    public function setName($name){
        $this->name = $name;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function setType($type){
        $this->type = $type;
    }
    public function setValue($value){
        $this->value = $value;
    }
    public function setLabel($label){
        $this->label = $label;
    }
    public function setClasse($classe){
        $this->classe = $classe;
    }

    public function render(){
        //$props = $this->renderAttribute();
        return 
        "<div class=\"conteneurChamp\">
                <div class=\"formgauche\"><label >{$this->getLabel()}</label></div>
                <div class=\"formdroite\"><input type='{$this->getType()}' name='{$this->getName()}' id='{$this->getId()}' value='{$this->getValue()}'></div>
        </div>";
    }
    // private function renderAttribute() : string{
    //     $sttrAttribute = '';
    //     foreach ($this->attribute as $key => $value) {
    //         $sttrAttribute.="$key='$value'";
    //     }
    //     return $sttrAttribute;

    //}
}


?>
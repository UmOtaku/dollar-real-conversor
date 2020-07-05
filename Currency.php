<?php
class Currency {
    
    private $value;
    private $name;

    public function __construct($na, $v)
    {
        $this->setName($na);
        $this->setValue($v);

    }

    public function getValue(){
        return $this->value;
    }
    public function setValue($v){
        $this->value = $v;
    }
    public function getName(){
        return $this->name;
    }
    public function setName($n){
        $this->name = $n;
    }
}

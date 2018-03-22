<?php

namespace core;

class Validation {

    public $obj ;
    public $clear =[] ;

    protected function __construct($obj)
    {
        $this->obj;
    }

    protected function checkData () {
        foreach ($this->obj as $key => $value) {
            $this->clear[$key] = strip_tags(trim($value));
        }
    }

}
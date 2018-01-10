<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Vegetable {

    var $edible;
    var $color;

    function __construct($edible, $color="green")
    {
        $this->edible = $edible;
        $this->color = $color;
    }

    function is_edible() 
    {
        return $this->edible;
    }

    function what_color() 
    {
        return $this->color;
    }
    
} // конец класса Vegetable

// расширяет базовый класс
class Spinach extends Vegetable {

    var $cooked = false;

    function __construct()
    {
        parent::__construct(true, "green");
    }

    function cook_it() 
    {
        $this->cooked = true;
    }

    function is_cooked() 
    {
        return $this->cooked;
    }
    
} // конец класса Spinach

?>
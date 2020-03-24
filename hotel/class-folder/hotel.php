<?php

class hotel{
    //A generic hotel class
    //Hotel features
    public $name, $daily, $pool, $bar, $kidFriendly, $spa;

    
    //Details of hotel features
    function __construct($n0, $n1, $n2, $n3, $n4, $n5) {
        $this->name = $n0;
        $this->daily = $n1;
        $this->pool = $n2;
        $this->bar = $n3;
        $this->kidFriendly = $n4;
        $this->spa = $n5; 
    }
    
    
}

?>
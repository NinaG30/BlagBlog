<?php

class User {
    protected $firstname;
    protected $lastname;
    protected $nickname;
    protected $password;

    public function __construct($f,$l,$n,$p){
        $this->firstname = $f;
        $this->lastname = $l;
        $this->nickname = $n;
        $this->password = $p;
    }


}
<?php

class comment extends TableRoot{
    
    public $user_id  ,$post_id , $number , $comment , $seen  ;
    
    function getUser_id() {
        return $this->user_id;
    }

    function getPost_id() {
        return $this->post_id;
    }

    function getNumber() {
        return $this->number;
    }

    function getComment() {
        return $this->comment;
    }

    function setUser_id($user_id) {
        $this->user_id = $user_id;
    }

    function setPost_id($post_id) {
        $this->post_id = $post_id;
    }

    function setNumber($number) {
        $this->number = $number;
    }

    function setComment($comment) {
        $this->comment = $comment;
    }

    function getSeen() {
        return $this->seen;
    }

    function setSeen($seen) {
        $this->seen = $seen;
    }


    
    
    
}
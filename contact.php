<?php

require_once 'TableRoot.php';

class contact extends TableRoot {

//contact table var

    var $content = "";

    function getContent() {
        return $this->content;
    }

    function setContent($content) {
        $this->content = $content;
    }

}

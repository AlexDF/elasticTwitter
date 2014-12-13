<?php
  
  namespace HtmlController;

  class Index extends Page {
    public $content;

    function __construct() {
      $this->content = 'Please enter a search string.';

      $this->buildPage($this->content);

    }

  }


?>
<?php
  
  namespace HtmlController;

  class Index extends Page {
  

    function __construct() {
      $this->content = 'Please enter a search string.';

      $this->buildPage();

    }

  }


?>
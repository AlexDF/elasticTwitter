<?php

  namespace HtmlController;

  class Html{
    
    

    public static function render($page_type){
      $page_class = 'HtmlController\\' . $page_type;
      return new $page_class;
    }

  }
?>
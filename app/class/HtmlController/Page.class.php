<?php

  namespace HtmlController;

  class Page {
    public $header = "<html><head></head><body><form method='GET' action='index.php'><textarea rows='5' cols='30'></textarea><br><br><input type='submit'></form>";
    public $footer = "</body></html>";

    public function buildPage($body) {
    	echo $this->header . $body . $this->footer;
    }


  }



?>
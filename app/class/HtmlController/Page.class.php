<?php

  namespace HtmlController;

  class Page {
    public $header = "<html><head></head><body><form method='POST' action='index.php?pagetype=Search'><textarea name='searchQuery' rows='5' cols='30'></textarea><br><br><input type='submit'></form>";
    public $content;
    public $footer = "</body></html>";

    public function buildPage() {
    	echo $this->header . $this->content . $this->footer;
    }

  }



?>
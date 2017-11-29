<?php

/*
  Står for at hente lectio fravær siden
  I fremtiden ville denne klasse også stå for at hente alle klassers fravær
*/

class PageFetcher
{
    public function fetch($url)
    {
        return str_get_html(file_get_contents($url));
    }
};
?>
<?php
class PageFetcher
{
    public function fetch($url)
    {
        return str_get_html(file_get_contents($url));
    }
};
?>
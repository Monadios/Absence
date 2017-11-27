<?php
class PageFetcher
{
    public function fetch($url)
    {
        return file_get_html($url);
    }
};
?>
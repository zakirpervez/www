<?php

class Router
{
    /**
     * Redirect to another URL on the same site.
     * 
     * @param string $path Redirection url path
     * 
     * @return void
     */
    public static function redirect($path)
    {
        if (isset($$_SERVER['HTTPS']) && $_SERVER['HTTPS'] != false) {
            $protocol = 'https';
        } else {
            $protocol = 'http';
        }
        header("Location: $protocol://" . $_SERVER['HTTP_HOST'] . $path);
        exit;
    }
}

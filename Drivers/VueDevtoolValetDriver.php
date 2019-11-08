<?php

/**
 * Open In Editor for Vue Devtools
 * @author Socheat <alex@socheat.net>
 */
class VueDevtoolValetDriver extends ValetDriver
{
    /**
     * Determine if the driver serves the request.
     *
     * @param  string  $sitePath
     * @param  string  $siteName
     * @param  string  $uri
     * @return bool
     */
    public function serves($sitePath, $siteName, $uri)
    {
        if (preg_match("/__open-in-editor/i", $uri)) {
            parse_str($_SERVER['QUERY_STRING'], $query);
            $file = $query['file'];

            if (file_exists("$sitePath/$file")) {
                exec("code $sitePath/$file");
                return true;
            }
        }

        return false;
    }

    /**
     * Determine if the incoming request is for a static file.
     *
     * @param  string  $sitePath
     * @param  string  $siteName
     * @param  string  $uri
     * @return string|false
     */
    public function isStaticFile($sitePath, $siteName, $uri)
    {
        return false;
    }

    /**
     * Get the fully resolved path to the application's front controller.
     *
     * @param  string  $sitePath
     * @param  string  $siteName
     * @param  string  $uri
     * @return string
     */
    public function frontControllerPath($sitePath, $siteName, $uri)
    {
        return $sitePath . '/public/index.php';
    }
}
1
Downloading1

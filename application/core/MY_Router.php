<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

/* load the MX_Router class */
require APPPATH . "third_party/MX/Router.php";

class MY_Router extends MX_Router {

    public $widget;

    public function fetch_widget() {
        return $this->widget;
    }

    public function locate($segments) {
        $this->located = 0;
        $ext = $this->config->item('controller_suffix') . EXT;

        /* use module route if available */
        if (isset($segments[0]) && $routes = Modules::parse_routes($segments[0], implode('/', $segments))) {
            $segments = $routes;
        }

        /* get the segments array elements */
        list($module, $directory, $controller) = array_pad($segments, 3, NULL);

        /* check modules */
        foreach (Modules::$locations as $location => $offset) {
            /* module exists? */
            if (is_dir($source = $location . $module . '/controllers/')) {
                $this->module = $module;
                $this->directory = $offset . $module . '/controllers/';

                /* module sub-controller exists? */
                if ($directory) {
                    /* module sub-directory exists? */
                    if (is_dir($source . $directory . '/')) {
                        $source .= $directory . '/';
                        $this->directory .= $directory . '/';

                        /* module sub-directory controller exists? */
                        if ($controller) {
                            if (is_file($source . ucfirst($controller) . $ext)) {
                                $this->located = 3;
                                return array_slice($segments, 2);
                            } else
                                $this->located = -1;
                        }
                    }
                    else
                    if (is_file($source . ucfirst($directory) . $ext)) {
                        $this->located = 2;
                        return array_slice($segments, 1);
                    } else
                        $this->located = -1;
                }

                /* module controller exists? */
                if (is_file($source . ucfirst($module) . $ext)) {
                    $this->located = 1;
                    return $segments;
                }
            }

            if (is_file($location . $module . '/' . $directory . '/' . $controller . $ext)) {
                $this->module = $module;
                $this->widget = $directory;
                $this->directory = $offset . $module . '/' . $directory . '/';
                $this->located = 1;
                return array_slice($segments, 2);
            }
        }

        if (!empty($this->directory))
            return;

        /* application sub-directory controller exists? */
        if ($directory) {
            $c = count($segments);
            $directory_override = isset($this->directory);

            // Loop through our segments and return as soon as a controller
            // is found or when such a directory doesn't exist
            while ($c-- > 0) {
                $test = $this->directory
                        . ucfirst($this->translate_uri_dashes === TRUE ? str_replace('-', '_', $segments[0]) : $segments[0]);

                if (!file_exists(APPPATH . 'controllers/' . $test . '.php') && $directory_override === FALSE && is_dir(APPPATH . 'controllers/' . $this->directory . $segments[0])
                ) {
                    $this->set_directory(array_shift($segments), TRUE);
                    continue;
                }

                return $segments;
            }

            // This means that all segments were actually directories
            return $segments;
        }

        /* application controllers sub-directory exists? */
        if (is_dir(APPPATH . 'controllers/' . $module . '/')) {
            $this->directory = $module . '/';
            return array_slice($segments, 1);
        }

        /* application controller exists? */
        if (is_file(APPPATH . 'controllers/' . ucfirst($module) . $ext)) {
            return $segments;
        }

        $this->located = -1;
    }

}

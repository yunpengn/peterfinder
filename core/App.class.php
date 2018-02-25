<?php
/**
 * Created by PhpStorm.
 * User: neiln
 * Date: 2018/02/25
 * Time: 18:54
 */
class App {
    /**
     * Runs the application when the user enters a URL.
     *
     * @param string $url is the URL entered by the user.
     * @throws Exception when the controller or method is not found.
     */
    public static function run(string $url) {
        $parsed = self::parseUrl($url);

        // Gets the path to the controller class.
        $url = "app/controllers/" . $parsed["controller"] . ".class.php";

        // Checks whether the controller file exists.
        if (file_exists($url)) {
            $c = new $parsed["controller"];
        } else {
            throw new Exception("The requested controller " . $parsed["controller"] . " does not exist.");
        }

        // Calls the method in the controller class.
        if (method_exists($c, $parsed["method"])) {
            $m = $parsed["method"];
            $c->$m();
        } else {
            throw new Exception("The requested method " . $parsed["method"] . " does not exist.");
        }
    }

    /**
     * Parses the URL parameters to route to the correct controller.
     * @param string $url is the URL being parsed.
     * @return array consisting of three items, controller name, method name and the
     * values of additional parameters.
     */
    protected static function parseUrl(string $url): array {
        // Divides the URL into three parts.
        $url = explode('/',$_GET['url']);
        // Stores the result in an associate array.
        $result = array();

        // Checks whether the given URL contains the controller name.
        if (isset($url[0])) {
            $result["controller"] = $url[0];
            unset($url[0]);
        } else {
            // Otherwise, loads the default one.
            $result["controller"] = "Home";
        }

        // Checks whether the given URL contains the method name.
        if (isset($url[1])) {
            $result["method"] = $url[1];
            unset($url[1]);
        } else {
            // Otherwise, loads the default one.
            $result["method"] = "index";
        }

        // Notes down other optional parameters.
        if (isset($url)) {
            $result["params"] = array_values($url);
        }

        return $result;
    }
}

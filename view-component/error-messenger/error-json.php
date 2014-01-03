<?php
/**
 * error-json.php is the view of error json
 *
 * PHP version 5
 *
 * @category PHP
 * @package  /view-component/error-messenger/
 * @author   Fukuball Lin <fukuball@gmail.com>
 * @license  MIT Licence
 * @version  GIT: <0.0.1>
 * @link     http://www.fukuball.com
 */

/*header('Content-type: application/json');

$json_data = array (
    "response"=>
    array(
        "status"=>
            array(
                "version"=>$version,
                "code"=>$error_code,
                "error_type"=>$error_type,
                "message"=>$message,
                "parameter"=>$parameter,
            )
    )
);

if (!empty($return_data)) {
    foreach ($return_data as $key=>$value) {
        $json_data['response'][$key] = $value;
    }
}

echo json_encode($json_data);*/
echo "test";
?>
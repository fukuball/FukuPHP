<?php
/**
 * seed.php
 *
 * PHP version 5
 *
 * @category PHP
 * @package  /migration/
 * @author   Fukuball Lin <fukuball@gmail.com>
 * @license  MIT Licence
 * @version  GIT: <0.0.1>
 * @link     http://www.fukuball.com
 */

require_once dirname(dirname(__FILE__))."/config/db-param.php";
require_once dirname(dirname(__FILE__))."/migration/schema.php";

$db_host       = $database_server['master']['db_host'];
$db_user       = $database_server['master']['db_user'];
$db_name       = $database_server['master']['db_name'];
$db_password   = $database_server['master']['db_password'];

$con = mysqli_connect($db_host, $db_user, $db_password);

// Check connection
if (mysqli_connect_errno()) {

    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit;

} 

$db_selected = mysqli_select_db($con, $db_name);

if (!$db_selected) {

    // If we couldn't, then it either doesn't exist, or we can't see it.
    $sql = $create_database_sql;

    if (mysql_query($sql, $link)) {
        echo "Database fukuphp created successfully\n";
    } else {
        echo 'Error creating database: ' . mysql_error() . "\n";
    }

}

$sql = $create_user_table_sql;

mysqli_query($con, $sql);

$sql = "INSERT INTO `user` (`id`, `path`, `is_deleted`, `create_time`, `modify_time`, `delete_time`) VALUES".
            "(1, 'fukuball', 0, '2013-12-30 00:00:00', '2013-12-30 16:12:18', '0000-00-00 00:00:00');";

mysqli_query($con, $sql);
?>
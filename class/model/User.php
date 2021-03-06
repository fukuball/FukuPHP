<?php
/**
 * User.php is user model class
 *
 * PHP version 5
 *
 * @category PHP
 * @package  /class/model/
 * @author   Fukuball Lin <fukuball@gmail.com>
 * @license  MIT Licence
 * @version  GIT: <0.0.1>
 * @link     http://www.fukuball.com
 */

/**
 * User is user model class
 *
 * An example of a User is:
 *
 * <code>
 *   $user_obj = new User($instance_key);
 * </code>
 *
 * @category PHP
 * @package  /class/model/
 * @author   Fukuball Lin <fukuball@gmail.com>
 * @license  MIT Licence
 * @version  Release: <0.0.1>
 * @link     http://www.fukuball.com
 */
class User extends FukuPHPActiveRecord
{
    // extends from FukuPHPActiveRecord
    //
    // protected $db_obj;
    // protected $memcache_obj;
    // protected $use_cache;
    // protected $table_name;
    // protected $id;
    // protected $is_deleted;
    // protected $create_time;
    // protected $modify_time;
    // protected $delete_time;
    // protected $modify_unix_time;
    protected $path;

}// end class User
?>

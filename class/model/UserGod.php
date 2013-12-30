<?php
/**
 * UserGod.php is user god class
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
 * UserGod.php is user god class
 *
 * An example of a UserGod is:
 *
 * <code>
 *   $user_god_obj = new UserGod();
 * </code>
 *
 * @category PHP
 * @package  /class/model/
 * @author   Fukuball Lin <fukuball@gmail.com>
 * @license  MIT Licence
 * @version  Release: <0.0.1>
 * @link     http://www.fukuball.com
 */
class UserGod extends FukuPHPActiveRecordGod
{
   // extends from IndievoxActiveRecord
   //
   // protected $db_obj;
   // protected $table_name;

   /**
    * Method getUserId get user id
    *
    * @param string $input # user path or email value
    * @param string $type  # search type
    *
    * @return int $user_id
    */
   public function getUserId($input, $type='path')
   {

      $user_id = 0;

      switch ($type) {

      case 'path':
         $select_sql = "SELECT ".
                       "id ".
                       "FROM user ".
                       "WHERE $type = :value ".
                       "AND is_deleted = 0 ".
                       "LIMIT 1";
         $param = array(
            ":value"=>$input
         );

         $query_result = $this->db_obj->selectCommandPrepare($select_sql, $param);

         foreach ($query_result as $query_result_data) {
            $user_id = $query_result_data['id'];
         }

         break;

      }

      return $user_id;

   }// end function getUserId

}// end class UserGod
?>
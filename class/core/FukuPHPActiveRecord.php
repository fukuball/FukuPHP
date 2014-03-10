<?php
/**
 * FukuPHPActiveRecord.php is model class
 *
 * PHP version 5
 *
 * @category PHP
 * @package  /class/core/
 * @author   Fukuball Lin <fukuball@gmail.com>
 * @license  MIT Licence
 * @version  GIT: <0.0.1>
 * @link     http://www.fukuball.com
 */

/**
 * FukuPHPActiveRecord is model class
 *
 * An example of a FukuPHPActiveRecord is:
 *
 * <code>
 *   # this class can't be use directly
 * </code>
 *
 * @category PHP
 * @package  /class/core/
 * @author   Fukuball Lin <fukuball@gmail.com>
 * @license  MIT Licence
 * @version  Release: <0.0.1>
 * @link     http://www.fukuball.com
 */
abstract class FukuPHPActiveRecord
{

    protected $db_obj;
    protected $memcache_obj;
    protected $use_cache;
    protected $table_name;
    protected $id;
    protected $is_deleted;
    protected $create_time;
    protected $modify_time;
    protected $delete_time;
    protected $modify_unix_time;

    /**
     * Method __construct initialize instance
     *
     * @param int    $id        # the key of instance
     * @param string $use_cache # use what cache
     *
     * @return void
     */
    public function __construct($id, $use_cache='memcache')
    {

        // check id is not empty
        try {
            if (empty($id)) {
                throw new Exception('Exception: '.get_class($this).' id is empty.');
            }
        } catch (Exception $e) {
            echo "<h2>".get_class($this)."</h2>";
            echo "<pre>";
            var_dump($e->getMessage());
            echo "</pre>";
            echo "<br>";
            throw new RuntimeException();
        }// end try

        $this->id = $id;
        $this->use_cache = $use_cache;
        // set database connection
        $this->setDBAccess();
        // find this class's table name
        $temp_table_name
            = str_replace("FukuPHP", "", get_class($this));

        $this->table_name
            = strtolower(
                preg_replace('/([^\s])([A-Z])/', '\1_\2', $temp_table_name)
            );


        $instance_memcached = false;

        if ($this->use_cache == 'memcache' && ENABLE_CACHE) {

            // set memcache connection
            $this->setMemcacheAccess();
            // get instance value from memcache
            $instance_memcached
                = $this->memcache_obj->get(KEY_PREFIX.$this->table_name.'_'.$this->id);

        }// end if ($this->use_cache=='memcache')

        // get all class property
        $class_property_array = get_object_vars($this);

        if ($instance_memcached == false) {

            $select_sql
                = 'SELECT * '.
                    'FROM '.$this->table_name.' '.
                    'WHERE id = :id '.
                    'LIMIT 1';
            $param = array(
                ':id'=>$this->id
            );
            $query_instance = $this->db_obj->selectCommandPrepare($select_sql, $param);

            if (count($query_instance)==0) {
                echo "<h2>".get_class($this)."</h2>";
                echo "id: ".$this->id." not exist.";
                echo "<br>";
                throw new RuntimeException();
            }

            foreach ($query_instance as $query_instance_data) {

                foreach ($class_property_array as $property_key => $property_value) {

                    switch ($property_key) {

                    case 'db_obj':
                        break;

                    case 'memcache_obj':
                        break;

                    case 'use_cache':
                        break;

                    case 'table_name':
                        break;

                    case 'modify_time':

                        $check_time
                            = ($query_instance_data['modify_time'] == '0000-00-00 00:00:00');

                        if ($check_time) {

                            $this->modify_time = '1984-09-24 00:00:00';

                        } else {

                            $this->modify_time = $query_instance_data['modify_time'];

                        }// end if

                        $this->modify_unix_time = strtotime($this->modify_time);

                        break;

                    case 'modify_unix_time':
                        break;

                    default:

                        $this->$property_key = $query_instance_data[$property_key];

                        break;

                    }// end switch ($property_key)

                }// end foreach

            }// end foreach

            if (!empty($this->id) && $this->use_cache=='memcache' && ENABLE_CACHE) {


                foreach ($class_property_array as $property_key => $property_value) {

                    switch ($property_key) {

                    case 'db_obj':
                        break;

                    case 'memcache_obj':
                        break;

                    case 'use_cache':
                        break;

                    case 'table_name':
                        break;

                    default:

                        $data_array[$property_key] = $this->$property_key;

                        break;

                    }// end switch($property_key)

                }// end foreach

                $this->memcache_obj->set(
                    KEY_PREFIX.$this->table_name.'_'.$this->id,
                    $data_array,
                    false,
                    0
                );

            }// end if (!empty($this->id) && $this->use_cache=='memcache')

        } else {

            foreach ($class_property_array as $property_key => $property_value) {

                switch ($property_key) {

                case 'db_obj':
                    break;

                case 'memcache_obj':
                    break;

                case 'use_cache':
                    break;

                case 'table_name':
                    break;

                default:

                    $this->$property_key = $instance_memcached[$property_key];

                    break;

                }// end switch($property_key)

            }// end foreach

        }// end if ($instance_memcached == false)

    }// end function __construct

    /**
     * Method setDBAccess set the database connection
     *
     * @param string $type # the database type
     *
     * @return void
     */
    public function setDBAccess($type='normal')
    {

        switch($type){

        case 'normal':

            $this->db_obj = FukuPHPDBAccess::getInstance();

            break;

        default:

            $this->db_obj = FukuPHPDBAccess::getInstance();

            break;

        }

    }// end function setDBAccess

    /**
     * Method getDBAccess get the database connection
     *
     * @return db_obj
     */
    public function getDBAccess()
    {

        return $this->db_obj;

    }// end function getDBAccess

    /**
     * Method setMemcacheAccess set the cache connection
     *
     * @return void
     */
    public function setMemcacheAccess()
    {

        $this->memcache_obj = FukuPHPMemcache::getInstance(
            KEY_PREFIX.$this->table_name.'_'.$this->id
        );

    }// end function setMemcacheAccess

    /**
     * Method getMemcacheAccess get the cache connection
     *
     * @return memcache_obj
     */
    public function getMemcacheAccess()
    {

        return $this->memcache_obj;

    }// end function getMemcacheAccess

    /**
     * Method deleteMyMemcache delete this instance data cache
     *
     * @return boolean $deleted
     */
    public function deleteMyMemcache()
    {

        if ($this->use_cache=='memcache' && ENABLE_CACHE) {
            return $this->memcache_obj->delete(KEY_PREFIX.$this->table_name.'_'.$this->id);
        } else {
            return false;
        }

    }// end function deleteMyMemcache

    /**
     * Method getTableName return this class table name
     *
     * @return string $table_name
     */
    public function getTableName()
    {

        return $this->table_name;

    }// end function getTableName

    /**
     * Method getId get this instance id
     *
     * @return int $instance_id
     */
    public function getId()
    {

        return $this->id;

    }// end function getId

    /**
     * Method getIsDeleted get this instance is_deleted
     *
     * @return int $is_deleted
     */
    public function getIsDeleted()
    {

        return $this->is_deleted;

    }// end function getIsDeleted

    /**
     * Method update to update some instance value
     *
     * @param array $parameter # the key value array of the instance
     *
     * @return int $affected_rows
     */
    public function update($parameter)
    {

        $now = date('Y-m-d H:i:s');
        $sql = 'UPDATE '.$this->table_name.' SET ';
        $param = array();

        foreach ($parameter as $property_key => $property_value) {

            switch ($property_key) {

            case 'id':
                break;

            case 'create_time':
                break;

            case 'modify_time':
                break;

            default:

                if (!is_null($property_value)) {
                    $this->$property_key = $property_value;
                    $sql = $sql.$property_key.'=:'.$property_key.', ';
                    $param[':'.$property_key] = $property_value;
                }

                break;

            }// end switch($property_key)

        }// end foreach

        $this->modify_time = $now;
        $this->modify_unix_time = strtotime($now);
        $sql = $sql.'modify_time=:modify_time ';
        $sql = $sql.'WHERE id=:id LIMIT 1';
        $param[':modify_time'] = $now;
        $param[':id'] = $this->id;

        $result = $this->db_obj->updateCommandPrepare($sql, $param);

        if ($this->use_cache=='memcache' && ENABLE_CACHE) {

            $class_property_array = get_object_vars($this);

            foreach ($class_property_array as $property_key => $property_value) {

                switch ($property_key) {

                case 'db_obj':
                    break;

                case 'memcache_obj':
                    break;

                case 'use_cache':
                    break;

                case 'table_name':
                    break;

                default:

                    $data_array[$property_key] = $this->$property_key;

                    break;

                }// end switch($property_key)

            }// end foreach

            $this->memcache_obj->set(
                KEY_PREFIX.$this->table_name.'_'.$this->id,
                $data_array,
                false,
                0
            );

            //$this->deleteMyMemcache();

        }// end if ($this->use_cache=='memcache')

        return $result;

    }// end function update

    /**
     * Method save to update all instance value
     *
     * @return int $affected_rows
     */
    public function save()
    {

        $class_property_array = get_object_vars($this);
        $now = date('Y-m-d H:i:s');
        $sql = "UPDATE ".$this->table_name." SET ";
        $param = array();

        foreach ($class_property_array as $property_key => $property_value) {

            switch ($property_key) {

            case 'db_obj':
                break;

            case 'memcache_obj':
                break;

            case 'table_name':
                break;

            case 'use_cache':
                break;

            case 'id':
                break;

            case 'create_time':
                break;

            case 'modify_time':
                break;

            case 'modify_unix_time':
                break;

            default:

                if (!is_null($property_value)) {
                    $sql = $sql.$property_key.'=:'.$property_key.', ';
                    $param[':'.$property_key] = $property_value;
                }

                break;

            }// end switch ($property_key)

        }// end foreach

        $this->modify_time = $now;
        $this->modify_unix_time = strtotime($now);
        $sql = $sql.'modify_time=:modify_time ';
        $sql = $sql.'WHERE id=:id LIMIT 1';
        $param[':modify_time'] = $now;
        $param[':id'] = $this->id;

        $result = $this->db_obj->updateCommandPrepare($sql, $param);

        if ($this->use_cache=='memcache' && ENABLE_CACHE) {

            $class_property_array = get_object_vars($this);

            foreach ($class_property_array as $property_key => $property_value) {

                switch ($property_key) {

                case 'db_obj':
                    break;

                case 'memcache_obj':
                    break;

                case 'use_cache':
                    break;

                case 'table_name':
                    break;

                default:

                    $data_array[$property_key] = $this->$property_key;

                    break;

                }// end switch($property_key)

            }// end foreach

            $this->memcache_obj->set(
                KEY_PREFIX.$this->table_name.'_'.$this->id,
                $data_array,
                false,
                0
            );

            //$this->deleteMyMemcache();

        }// end if ($this->use_cache=='memcache')

        return $result;

    }// end function save

    /**
     * Method destroy to delete instance, default is soft delete
     *
     * @param string $type # the delete type
     *
     * @return int $affected_rows
     */
    public function destroy($type='soft')
    {

        switch ($type) {

        case 'hard':

            $sql = 'DELETE '.
                    'FROM '.$this->table_name.' '.
                    'WHERE id = :id '.
                    'LIMIT 1';
            $param = array(
                ':id'=>$this->id
            );
            $result = $this->db_obj->deleteCommandPrepare($sql, $param);

            break;

        case 'soft':
        default:

            $now = date('Y-m-d H:i:s');
            $sql = 'UPDATE '.$this->table_name.' SET '.
                    'is_deleted=1, '.
                    'modify_time=:modify_time, '.
                    'delete_time=:delete_time '.
                    'WHERE id=:id '.
                    'LIMIT 1';
            $param = array(
                ':modify_time'=>$now,
                ':delete_time'=>$now,
                ':id'=>$this->id
            );
            $result = $this->db_obj->updateCommandPrepare($sql, $param);

            break;

        }// end switch ($type)

        $this->modify_time = $now;
        $this->modify_unix_time = strtotime($now);
        $this->delete_time = $now;
        $this->is_deleted = 1;

        if ($this->use_cache=='memcache' && ENABLE_CACHE) {

            $this->deleteMyMemcache();

        }// end if ($this->use_cache=='memcache')

        return $result;

    }// end function destroy

    /**
     * Method recover to recover delete instance
     *
     * @return int $affected_rows
     */
    public function recover()
    {

        $now = date('Y-m-d H:i:s');
        $sql = 'UPDATE '.$this->table_name.' SET '.
                    'is_deleted=0, '.
                    'modify_time=:modify_time, '.
                    'delete_time=:delete_time '.
                    'WHERE id=:id '.
                    'LIMIT 1';
        $param = array(
            ':modify_time'=>$now,
            ':delete_time'=>$now,
            ':id'=>$this->id
        );
        $result = $this->db_obj->updateCommandPrepare($sql, $param);

        $this->modify_time = $now;
        $this->modify_unix_time = strtotime($now);
        $this->delete_time = $now;
        $this->is_deleted = 0;

        if ($this->use_cache=='memcache' && ENABLE_CACHE) {

            $class_property_array = get_object_vars($this);

            foreach ($class_property_array as $property_key => $property_value) {

                switch ($property_key) {

                case 'db_obj':
                    break;

                case 'memcache_obj':
                    break;

                case 'use_cache':
                    break;

                case 'table_name':
                    break;

                default:

                    $data_array[$property_key] = $this->$property_key;

                    break;

                }// end switch($property_key)

            }// end foreach

            $this->memcache_obj->set(
                KEY_PREFIX.$this->table_name.'_'.$this->id,
                $data_array,
                false,
                0
            );

            //$this->deleteMyMemcache();

        }// end if ($this->use_cache=='memcache')

        return $result;

    }// end function recover

    /**
     * Method __get to overwrite original getter
     *
     * @param string $key # input key
     *
     * @return mix $attribute
     */
    public function __get($key)
    {

        if ( method_exists($this, $method = 'get'.FukuPHPStringHelper::studly($key)) ) {

            return $this->$method($key);

        } else {

            return isset($this->$key)? $this->$key : null;

        }

    }// end function __get

    /**
     * Method __set to overwrite original setter
     *
     * @param string $key   # input key
     * @param string $value # input value
     *
     * @return void
     */
    public function __set($key, $value)
    {

        if ( method_exists($this, $method = 'set'.FukuPHPStringHelper::studly($key)) ) {

            $this->$method($key, $value);

        } else {

            $this->$key = $value;

        }

    }// end function __set

    /**
     * Method __isset to overwrite original isset
     *
     * @param string $key # input key
     *
     * @return mix $attribute
     */
    public function __isset($key)
    {

        $return_value = null;

        $return_value = isset($this->$key)? $this->$key : null;

        return isset($return_value);

    }// end function __isset

    /**
     * Method __destruct unset instance value
     *
     * @return void
     */
    public function __destruct()
    {

        $class_property_array = get_object_vars($this);

        foreach ($class_property_array as $property_key => $property_value) {

            switch ($property_key) {

            case 'db_obj':
                break;

            case 'memcache_obj':
                break;

            default:

                unset($this->$property_key);

                break;

            }// end switch($property_key)

        }// end foreach

    }// end function __destruct

}//end class FukuPHPActiveRecord
?>

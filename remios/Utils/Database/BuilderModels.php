<?php
namespace Remios\Utils\Database;
class BuilderModels extends DBQuery{
    
    protected static $_table;
    public $timestamps = false;
    function __construct()
    {
        parent::__construct();
       
    }

   
    public static function boot()
    {
        parent::boot();
    }

    
    public function setTable($table)
    {
        static::$_table = strtolower($table);
    }

    public function getTable()
    {
        return static::$_table;
    }
    
}

?> 
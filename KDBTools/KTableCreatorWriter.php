<?php
namespace KDBTools;


class  KTableCreatorWriter
{
    private $syntax;    
    private $columnList;
    private $fkList;
    private $tbleName;
    
    function __construct($givenSyntax,$givenName) 
    {
        $this->syntax = $givenSyntax;
        $this->tbleName =  $this->syntax."_".$givenName;
        $this->columnList = array("id"=> "id int(11) NOT NULL auto_increment");
    }
    
    
    public  function getTableName()
    {
        return $this->tbleName;
    }
    
    function addVarcharColumn($name,$size,$nullable = true)
    {
        $nullablePortion = $nullable ? "default NULL": "NOT NULL";
        
        $this->columnList[$name]= "`".$name."` varchar(".$size.") ".$nullablePortion;
        
        return $nullablePortion;
    }
    
    
    function addIntColumn($name,$size,$nullable = true)
    {
        $nullablePortion = $nullable ? "default NULL": "NOT NULL";
   
        $this->columnList[$name]= "`".$name."` int(".$size.") ".$nullablePortion;
        
        return $nullablePortion;
    }
    
    function removeColumn($name)
    {
        unset($this->columnList[$name]);
    }
    
    
    function execute()
    {
     //   global $wpdb;
        $cmd = "CREATE TABLE `". $this->tbleName."` (";
        
        foreach($this->columnList as $column)
        {
            $cmd .= $column.",\n";
        }        
        
        $cmd .= "   PRIMARY KEY  (id) )";
        if (!function_exists('maybe_create_table')) {
            require_once ABSPATH . 'wp-admin/install-helper.php';
        }
        
        maybe_create_table($this->tbleName,$cmd);
        
       // dbDelta($cmd);
        
        //return  $cmd;
    
    }
    
    
  
    
}

?>
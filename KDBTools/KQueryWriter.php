<?php
namespace KDBTools;

class KQueryWriter
{
    private $queryTool;
    public function __construct($wpdb)
    {
        
        //global $wpdb;
        $this->queryTool = $wpdb;        
    }
    
    public function performDelete($tableName,$whereArray)
    {
        $amountOfRowsAffected = $this->queryTool->delete($tableName,$whereArray);
        return $amountOfRowsAffected;
    }
    
    public  function performUpdate($tableName,$newVersion,$whereArray)
    {
     
       $amountOfRowsAffected =    $this->queryTool->update($tableName,$newVersion,$whereArray);
       return $amountOfRowsAffected;
    }
    
    public function performInsert($tableName,$data )
    {
        //echo $tableName;
     //   echo json_encode($data);
        
        $this->queryTool->insert($tableName,$data);
    }
    public function getResultsFromQuery($query)
    {
       $result =  $this->queryTool->get_results($query);
        return  $result;
    }
}


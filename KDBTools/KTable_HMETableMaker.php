<?php
namespace KDBTools;

include_once 'KTableCreatorWriter.php';
/**
 *
 * @author leman
 *        
 */
class KTable_HMETableMaker
{
    private $tbleCreator;
    private  $prefix;
    
    function __construct()
    {
        $this->prefix = "wp_HME";
    }
    
    function getCaptionstable()
    {
        $this->tbleCreator = new KTableCreatorWriter(  $this->prefix, "Captions");
        $this->CaptionsTableName = $this->tbleCreator->getTableName();
        
        $this->tbleCreator->addVarcharColumn("Name", "300");
        $this->tbleCreator->addVarcharColumn("Value", "500");
        $this->tbleCreator->execute();
        
        return  $this->CaptionsTableName;
    }
    
}


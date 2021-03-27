<?php
namespace KDBTools;
 include_once 'KTableCreatorWriter.php';

 
    class KTableCreatorWriterTester
    {
        private $tbleCreator;
        private  $prefix;
        
        function __construct()
        {
          $this->prefix = "wp_HME";
        }
        
        function testAddingOrgnaizationTable()
        {
            $this->tbleCreator = new KTableCreatorWriter(  $this->prefix, "Organization");
            $this->tbleCreator->addVarcharColumn("Name", "300");
            $this->tbleCreator->addVarcharColumn("Address", "500");
            echo $this->tbleCreator->execute();            
        }
        
        
        function testAddLanguageContentTable()
        {
            $this->tbleCreator = new KTableCreatorWriter(  $this->prefix, "LanguageContent");
            
            $this->tbleCreator->addVarcharColumn("Name", "30");
            $this->tbleCreator->addVarcharColumn("Code", "10");
            $this->tbleCreator->addIntColumn("org_id", 11);
            
            echo $this->tbleCreator->execute();   
        }
    }
    
?>
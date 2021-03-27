<?php
namespace KDBTools;

/**
 *
 * @author leman
 *        
 */
class K_WPQuery
{
    var $queryDetails;
    /**
     */
    public function __construct($queryDetails)
    {
        $this->queryDetails = $queryDetails;
        
    }
    
    public function getQuery()
    {
        $result = new \WP_Query($this->queryDetails);
        return $result;
    }
    
    
}


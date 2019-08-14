<?php
class Ktree_Label_Model_Label extends Mage_Core_Model_Abstract
{

    /**
     * Internal constructor not depended on params. Can be used for object initialization
     */
    public function _construct()
    {
        parent::_construct();
        $this->_init('label/label');
    }
	public function getPositions($labeltext = true)
    {
        $positionsarray = array();
        foreach (array('top', 'middle', 'bottom') as $first){
            foreach (array('left', 'center', 'right') as $second){
                $positions = $labeltext ? 
                    Mage::helper('label')->__(ucwords($first . ' ' . $second)) 
                    : 
                    $first . '-' . $second;
				$positionsarray[$positions]=$positions;
            }
        }  
        return $positionsarray;     
    }    

}

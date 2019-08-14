<?php
class Ktree_Label_Block_Label extends Mage_Core_Block_Template
{

    /**
     * Before rendering html, but after trying to load cache
     *
     * @return Ktree_Label_Block_Label
     */
    protected function _beforeToHtml()
    {
        $this->_prepareCollection();
        return parent::_beforeToHtml();
    }

    /**
     * Prepare testimonial collection object
     *
     * @return Ktree_Label_Block_Label
     */
    protected function _prepareCollection()
    {
        /* @var $collection Ktree_Label_Model_Mysql4_Label_Collection */
        $collection = Mage::getModel("label/label")->getCollection();
        
        $collection->setOrder('label_id', 'ASC')
                   ->load();
        $this->setLabels($collection);
        return $this;
    }

}
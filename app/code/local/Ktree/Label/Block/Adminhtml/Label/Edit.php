<?php
class Ktree_Label_Block_Adminhtml_Label_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();

        $this->_objectId = 'id';
        $this->_blockGroup = 'label';
        $this->_controller = 'adminhtml_label';

        $this->_updateButton('save', 'label', Mage::helper('label')->__('Save Label'));
        $this->_updateButton('delete', 'label', Mage::helper('label')->__('Delete Label'));

        if( $this->getRequest()->getParam($this->_objectId) ) {
            $model = Mage::getModel('label/label')->load($this->getRequest()->getParam($this->_objectId));
            Mage::register('label', $model);
        }
    }

    /**
     * Get header text
     *
     * @return string
     */
    public function getHeaderText()
    {
        if( Mage::registry('label') && Mage::registry('label')->getId() ) {
            return Mage::helper('label')->__('Edit Label');
        } else {
            return Mage::helper('label')->__('Add Label');
        }
    }
}

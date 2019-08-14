<?php
class Ktree_Label_Block_Adminhtml_Label_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->setId('labelGrid');
        $this->setDefaultSort('label_id');
        $this->setDefaultDir('ASC');
        $this->setSaveParametersInSession(true);
    }

    /**
     * Prepare grid collection object
     *
     * @return Ktree_Label_Block_Adminhtml_Label_Grid
     */
    protected function _prepareCollection()
    {
        $this->setCollection(Mage::getModel('label/label')->getCollection());
        return parent::_prepareCollection();
    }

    /**
     * Preparing colums for grid
     *
     * @return Ktree_Label_Block_Adminhtml_Label_Grid
     */
    protected function _prepareColumns()
    {
        $this->addColumn('label_id', array(
            'header'    => Mage::helper('label')->__('Id'),
            'align'     => 'right',
            'width'     => '50px',
            'index'     => 'label_id',
            'type'      => 'number',
        ));

        $this->addColumn('label_text', array(
            'header'    => Mage::helper('label')->__('Text'),
            'align'     => 'left',
            'index'     => 'label_text',
        ));

        $this->addColumn('label_productskus', array(
            'header'    => Mage::helper('label')->__('Product SKUs'),
            'align'     => 'left',
            'index'     => 'label_productskus',
        ));
		$this->addColumn('label_position', array(
            'header'    => Mage::helper('label')->__('Position'),
            'align'     => 'left',
            'index'     => 'label_position',
        ));
		
        return parent::_prepareColumns();
    }

    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }

}

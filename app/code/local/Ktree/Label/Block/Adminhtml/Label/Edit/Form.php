<?php
class Ktree_Label_Block_Adminhtml_Label_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{

    /**
     * Preparing global layout
     *
     * You can redefine this method in child classes for changin layout
     *
     * @return Mage_Core_Block_Abstract
     */
    protected function _prepareLayout()
    {
        parent::_prepareLayout();
        
    }

    /**
     * Prepare form before rendering HTML
     *
     * @return Mage_Adminhtml_Block_Widget_Form
     */
    protected function _prepareForm()
    {
	$model = Mage::getModel('label/label');
        $form = new Varien_Data_Form(array(
            'id' => 'edit_form',
            'action' => $this->getUrl('*/*/save', array('id' => $this->getRequest()->getParam('id'))),
            'method' => 'post',
            'enctype' => 'multipart/form-data'
        ));

        $fieldset = $form->addFieldset('label_form', array(
            'legend'	  => Mage::helper('label')->__('Label'),
            'class'		=> 'fieldset-wide',
            )
        );

        $fieldset->addField('label_text', 'text', array(
            'name'      => 'label_text',
            'label'     => Mage::helper('label')->__('Text'),
            'class'     => 'required-entry',
            'required'  => true,
        ));

        $fieldset->addField('label_img', 'image', array(
            'name'      => 'label_img',
            'label'     => Mage::helper('label')->__('Image'),
        ));

        
		$fieldset->addField('label_productskus', 'text', array(
            'name'      => 'label_productskus',
            'label'     => Mage::helper('label')->__('Product SKUs'),
			'class'     => 'required-entry',
            
        ));
		$fieldset->addField('label_position', 'select', array(
            'label'     => Mage::helper('label')->__('Position'),
            'name'      => 'label_position',
			'class'     => 'required-entry',
			'values'    => $model->getPositions(),
                    ));
		
            $fieldset->addField('store_id', 'multiselect', array(
                'name' => 'stores[]',
                'label' => Mage::helper('cms')->__('Store View'),
                'title' => Mage::helper('cms')->__('Store View'),
                'required' => true,
                'values' => Mage::getSingleton('adminhtml/system_store')->getStoreValuesForForm(false, true),
            ));
        if (Mage::registry('label')) {
            $form->setValues(Mage::registry('label')->getData());
        }

        $form->setUseContainer(true);
        $this->setForm($form);
        return parent::_prepareForm();
    }

}

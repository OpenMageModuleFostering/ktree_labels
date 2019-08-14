<?php
class Ktree_Label_Adminhtml_LabelController extends Mage_Adminhtml_Controller_Action
{

    /**
     * Init here
     */
	protected function _initAction()
	{
		$this->loadLayout();
		$this->_setActiveMenu('label');
		$this->_addBreadcrumb(Mage::helper('label')->__('Label'), Mage::helper('label')->__('Product Labels'));
	}

    /**
     * View grid action
     */
	public function indexAction()
	{
		$this->_initAction();
		$this->renderLayout();
	}

    /**
     * View edit form action
     */
	public function editAction()
	{
		$this->_initAction();
		$this->_addContent($this->getLayout()->createBlock('label/adminhtml_label_edit'));
		$this->renderLayout();
	}

    /**
     * View new form action
     */
	public function newAction()
	{
		$this->editAction();
	}

    /**
     * Save form action
     */
	public function saveAction()
	{
		if ($this->getRequest()->getPost()) {
			try {
				$data = $this->getRequest()->getPost();
                                if(isset($data['stores'])) {
                                     $stores = $data['stores'];
                                     $storesCount = count($stores);
                                     $storesIndex = 1;
                                     $storesData = '';
                               foreach($stores as $store) {
                                      $storesData .= $store;
                                       if($storesIndex < $storesCount) {
                                            $storesData .= ',';
                                         }
                                    $storesIndex++;
                                 }
                            $data['store_id'] = $storesData;
                          } 
				//implode the reseller services name which is a multiselect fiel 
				//$data['reseller_services']=implode(',',$data['reseller_services']);  
				
				if (isset($_FILES['label_img']['name']) and (file_exists($_FILES['label_img']['tmp_name']))) {
					$uploader = new Varien_File_Uploader('label_img');
					$uploader->setAllowedExtensions(array('jpg','jpeg','gif','png'));
					$uploader->setAllowRenameFiles(false);
					$uploader->setFilesDispersion(false);
					$path = Mage::getBaseDir('media') . DS ;
					$uploader->save($path, $_FILES['label_img']['name']);
					$data['label_img'] = $_FILES['label_img']['name'];
				} else {
					if(isset($data['label_img']['delete']) && $data['label_img']['delete'] == 1) {
						$data['label_img'] = '';
					} else {
						unset($data['label_img']);
					}
				}

				$model = Mage::getModel('label/label');
				$model->setData($data)->setLabelId($this->getRequest()->getParam('id'))->save();

				Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('label')->__('Products Label was successfully saved'));
				
			} catch (Exception $e) {
				Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
				$this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
				return;
			}
		}
               
		$this->_redirect('*/*/');
	}

    /**
     * Delete action
     */
	public function deleteAction()
	{
		if ($this->getRequest()->getParam('id') > 0) {
			try {
				$model = Mage::getModel('label/label');
				$model->setLabelId($this->getRequest()->getParam('id'))
				      ->delete();
				Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('label')->__('Products was successfully deleted'));
				$this->_redirect('*/*/');
			} catch (Exception $e) {
				Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
				$this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
			}
		}

		$this->_redirect('*/*/');
	}

   

}

<?php
class Ktree_Label_Helper_Data extends Mage_Core_Helper_Abstract
{
public function getProductLabels($productsku,$type)
    {
        $html = '';
    $labelcollection=Mage::getModel('label/label')->getCollection()->getData();
	$count=0;
	foreach($labelcollection as $label ) {
		$productskus=$label['label_productskus'];
		//$html.=$productsku;
		$stores=$label['store_id'];
		$productskuarray=array();
		$productskuarray=explode(',',$productskus);
		$storeidarray=array();
		$storeidarray=explode(',',$stores);
		$currentStoreId = Mage::app()->getStore()->getId();
		if(in_array($currentStoreId,$storeidarray) || in_array('0',$storeidarray)) {
		if(in_array($productsku,$productskuarray)) {
		//$html.="raj";
			$image=Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_MEDIA)."".$label['label_img'];
			//$html.=$image;
			if($label['label_position']) {
			$position=strtolower($label['label_position']);
			$position=str_replace(" ","-",$position);
			if($type=='product') {
			$html.='<table class="ktlabel product-'.$position.'" style="height:80px; width:80px;">';
			} else {
			$html.='<table class="ktlabel '.$position.'" style="height:80px; width:80px;">';
			}
			$html.='<tbody><tr>';
			$html.='<td style="background:url('.$image.') no-repeat 0 0">';
			$html.='<span class="ktlabel-txt">'.$label['label_text'].'</span>';
			$html.='</td></tr></tbody></table>';
			}
			//$html.='<img src="'.$image.'" alt="'.$label['lagel_text'].'">';
			//$html.='';
		}
		}
	}
	
        return $html;
    }
	
}

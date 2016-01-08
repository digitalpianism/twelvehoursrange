<?php
/**
 * Adminhtml dashboard orders diagram
 *
 * @category   Mage
 * @package    DigitalPianism_TwelveHoursRange
 * @author     Digital Pianism <contact@digital-pianism.com>
 */

class DigitalPianism_TwelveHoursRange_Block_Adminhtml_Dashboard_Tab_Orders extends Mage_Adminhtml_Block_Dashboard_Tab_Orders
{
    /**
     * Prepare chart data
     *
     * @return void
     */
    protected function _prepareData()
    {
        $this->setDataHelperName('adminhtml/dashboard_order');
        $this->getDataHelper()->setParam('store', $this->getRequest()->getParam('store'));
        $this->getDataHelper()->setParam('website', $this->getRequest()->getParam('website'));
        $this->getDataHelper()->setParam('group', $this->getRequest()->getParam('group'));
		// 12h as the default parameter
        $this->getDataHelper()->setParam(
            'period',
            $this->getRequest()->getParam('period')?$this->getRequest()->getParam('period'):'12h'
            );

        $this->setDataRows('quantity');
        $this->_axisMaps = array(
            'x' => 'range',
            'y' => 'quantity'
        );

        parent::_prepareData();
    }
}

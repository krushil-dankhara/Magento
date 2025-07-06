<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Caliente\Itech\Controller\Popup;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\Result\JsonFactory;
use Caliente\Itech\Model\PopupFactory;

class Submit extends Action
{
    protected $jsonFactory;
    protected $popupFactory;

    public function __construct(
        Context $context,
        JsonFactory $jsonFactory,
        PopupFactory $popupFactory
    ) {
        $this->jsonFactory = $jsonFactory;
        $this->popupFactory = $popupFactory;
        parent::__construct($context);
    }

    public function execute() {
        $result = $this->jsonFactory->create();

        $email = $this->getRequest()->getParam('email');
        if ($email && filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $model = $this->popupFactory->create();
            $model->setEmail($email);
            $model->save();
            $this->messageManager->addSuccessMessage(__('Your email is saved successfully.'));
            return $result->setData(['success' => true]);
        }
        $this->messageManager->addErrorMessage(__('Could not save your email!'));
        return $result->setData(['success' => false]);
    }
}

<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Caliente\Itech\Model;

use Caliente\Itech\Api\Data\PopupInterface;
use Magento\Framework\Model\AbstractModel;

class Popup extends AbstractModel implements PopupInterface
{

    /**
     * @inheritDoc
     */
    public function _construct()
    {
        $this->_init(\Caliente\Itech\Model\ResourceModel\Popup::class);
    }

    /**
     * @inheritDoc
     */
    public function getPopupId()
    {
        return $this->getData(self::POPUP_ID);
    }

    /**
     * @inheritDoc
     */
    public function setPopupId($popupId)
    {
        return $this->setData(self::POPUP_ID, $popupId);
    }

    /**
     * @inheritDoc
     */
    public function getEmail()
    {
        return $this->getData(self::EMAIL);
    }

    /**
     * @inheritDoc
     */
    public function setEmail($email)
    {
        return $this->setData(self::EMAIL, $email);
    }

    /**
     * @inheritDoc
     */
    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }

    /**
     * @inheritDoc
     */
    public function setCreatedAt($createdAt)
    {
        return $this->setData(self::CREATED_AT, $createdAt);
    }
}

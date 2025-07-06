<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Caliente\Itech\Model\ResourceModel\Popup;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{

    /**
     * @inheritDoc
     */
    protected $_idFieldName = 'popup_id';

    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init(
            \Caliente\Itech\Model\Popup::class,
            \Caliente\Itech\Model\ResourceModel\Popup::class
        );
    }
}

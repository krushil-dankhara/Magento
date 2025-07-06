<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Caliente\Itech\Api\Data;

interface PopupSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get Popup list.
     * @return \Caliente\Itech\Api\Data\PopupInterface[]
     */
    public function getItems();

    /**
     * Set email list.
     * @param \Caliente\Itech\Api\Data\PopupInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}


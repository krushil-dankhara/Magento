<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Caliente\Itech\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface PopupRepositoryInterface
{

    /**
     * Save Popup
     * @param \Caliente\Itech\Api\Data\PopupInterface $popup
     * @return \Caliente\Itech\Api\Data\PopupInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Caliente\Itech\Api\Data\PopupInterface $popup
    );

    /**
     * Retrieve Popup
     * @param string $popupId
     * @return \Caliente\Itech\Api\Data\PopupInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($popupId);

    /**
     * Retrieve Popup matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Caliente\Itech\Api\Data\PopupSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete Popup
     * @param \Caliente\Itech\Api\Data\PopupInterface $popup
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Caliente\Itech\Api\Data\PopupInterface $popup
    );

    /**
     * Delete Popup by ID
     * @param string $popupId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($popupId);
}

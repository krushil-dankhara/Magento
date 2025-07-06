<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Caliente\Itech\Model;

use Caliente\Itech\Api\Data\PopupInterface;
use Caliente\Itech\Api\Data\PopupInterfaceFactory;
use Caliente\Itech\Api\Data\PopupSearchResultsInterfaceFactory;
use Caliente\Itech\Api\PopupRepositoryInterface;
use Caliente\Itech\Model\ResourceModel\Popup as ResourcePopup;
use Caliente\Itech\Model\ResourceModel\Popup\CollectionFactory as PopupCollectionFactory;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

class PopupRepository implements PopupRepositoryInterface
{

    /**
     * @var PopupCollectionFactory
     */
    protected $popupCollectionFactory;

    /**
     * @var CollectionProcessorInterface
     */
    protected $collectionProcessor;

    /**
     * @var Popup
     */
    protected $searchResultsFactory;

    /**
     * @var ResourcePopup
     */
    protected $resource;

    /**
     * @var PopupInterfaceFactory
     */
    protected $popupFactory;


    /**
     * @param ResourcePopup $resource
     * @param PopupInterfaceFactory $popupFactory
     * @param PopupCollectionFactory $popupCollectionFactory
     * @param PopupSearchResultsInterfaceFactory $searchResultsFactory
     * @param CollectionProcessorInterface $collectionProcessor
     */
    public function __construct(
        ResourcePopup $resource,
        PopupInterfaceFactory $popupFactory,
        PopupCollectionFactory $popupCollectionFactory,
        PopupSearchResultsInterfaceFactory $searchResultsFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->resource = $resource;
        $this->popupFactory = $popupFactory;
        $this->popupCollectionFactory = $popupCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * @inheritDoc
     */
    public function save(PopupInterface $popup)
    {
        try {
            $this->resource->save($popup);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the popup: %1',
                $exception->getMessage()
            ));
        }
        return $popup;
    }

    /**
     * @inheritDoc
     */
    public function get($popupId)
    {
        $popup = $this->popupFactory->create();
        $this->resource->load($popup, $popupId);
        if (!$popup->getId()) {
            throw new NoSuchEntityException(__('Popup with id "%1" does not exist.', $popupId));
        }
        return $popup;
    }

    /**
     * @inheritDoc
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->popupCollectionFactory->create();
        
        $this->collectionProcessor->process($criteria, $collection);
        
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        
        $items = [];
        foreach ($collection as $model) {
            $items[] = $model;
        }
        
        $searchResults->setItems($items);
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * @inheritDoc
     */
    public function delete(PopupInterface $popup)
    {
        try {
            $popupModel = $this->popupFactory->create();
            $this->resource->load($popupModel, $popup->getPopupId());
            $this->resource->delete($popupModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the Popup: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * @inheritDoc
     */
    public function deleteById($popupId)
    {
        return $this->delete($this->get($popupId));
    }
}

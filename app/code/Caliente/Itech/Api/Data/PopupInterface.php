<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Caliente\Itech\Api\Data;

interface PopupInterface
{

    const EMAIL = 'email';
    const CREATED_AT = 'created_at';
    const POPUP_ID = 'popup_id';

    /**
     * Get popup_id
     * @return string|null
     */
    public function getPopupId();

    /**
     * Set popup_id
     * @param string $popupId
     * @return \Caliente\Itech\Popup\Api\Data\PopupInterface
     */
    public function setPopupId($popupId);

    /**
     * Get email
     * @return string|null
     */
    public function getEmail();

    /**
     * Set email
     * @param string $email
     * @return \Caliente\Itech\Popup\Api\Data\PopupInterface
     */
    public function setEmail($email);

    /**
     * Get created_at
     * @return string|null
     */
    public function getCreatedAt();

    /**
     * Set created_at
     * @param string $createdAt
     * @return \Caliente\Itech\Popup\Api\Data\PopupInterface
     */
    public function setCreatedAt($createdAt);
}


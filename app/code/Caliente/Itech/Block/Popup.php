<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Caliente\Itech\Block;

use Magento\Framework\View\Element\Template;

class Popup extends Template
{
    /**
     * @param Template\Context $context
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        array $data = []
    ) {
        parent::__construct(
            $context,
            $data
        );
    }

    /**
     * Returns action url for popup form
     *
     * @return string
     */
    public function getFormAction()
    {
        return $this->getUrl('caliente/popup/submit', ['_secure' => true]);
    }
}

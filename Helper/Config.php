<?php
/**
 * What3Words_What3Words
 *
 * @category    WorkInProgress
 * @copyright   Copyright (c) 2020 What3Words
 * @author      Vlad Patru <vlad@wearewip.com>
 * @link        http://www.what3words.com
 */
namespace What3Words\What3Words\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Framework\App\ProductMetadataInterface;

/**
 * Class Config
 * Helper to return admin settings values
 */
class Config extends AbstractHelper
{
    const PREFIX = 'what3words/';
    const TOOLTIP_TEXT = 'By entering your 3 word address you make it much<br>easier for our delivery partners to find you first time.<br>To discover your 3 word address, visit <a href="https://what3words.com" target="_blank">what3words.com</a>';

    /**
     * Config constructor.
     * @param Context $context
     * @param ProductMetadataInterface $productMetadata
     */
    public function __construct(
        Context $context,
        ProductMetadataInterface $productMetadata
    ) {
        parent::__construct($context);
        $this->productMetadata = $productMetadata;
    }

    /**
     * Get config placeholder method
     *
     * @param $area
     * @return mixed
     */
    public function getConfig($area)
    {
        return $this->scopeConfig->getValue(self::PREFIX . $area);
    }

    /**
     * Is enabled option
     *
     * @return bool
     */
    public function getIsEnabled()
    {
        return $this->getConfig('general/enabled');
    }

    /**
     * Get ApiKey config
     *
     * @return string
     */
    public function getApiKey()
    {
        return $this->getConfig('general/api_key');
    }

    /**
     * Get placeholder
     *
     * @return string
     */
    public function getPlaceholder()
    {
        return $this->getConfig('frontend/placeholder');
    }

    /**
     * Get coordinates option config
     *
     * @return string
     */
    public function getCoordinates()
    {
        return $this->getConfig('general/save_coordinates');
    }

    /**
     * Get near option config
     *
     * @return string
     */
    public function getNearest()
    {
        return $this->getConfig('general/save_nearest');
    }

    /**
     * Get clipping config
     *
     * @return string
     */
    public function getClipping()
    {
        return $this->getConfig('general/clipping');
    }

    /**
     * Get contry iso config
     *
     * @return string
     */
    public function getCountryIso()
    {
        return $this->getConfig('general/country');
    }

    /**
     * Get circle coords config
     *
     * @return string
     */
    public function getCircleCoords()
    {
        return $this->getConfig('general/circle') . ',' . $this->getConfig('general/circle_radius');
    }

    /**
     * Get box coords config
     *
     * @return string
     */
    public function getBoxCoords()
    {
        return $this->getConfig('general/bounding_box_sw') . ',' . $this->getConfig('general/bounding_box_ne');
    }

    /**
     * Get polygon config
     *
     * @return string
     */
    public function getPolygonCoords()
    {
        return $this->getConfig('general/polygon');
    }

    /**
     * Get show tooltip option
     *
     * @return bool
     */
    public function getShowTooltip()
    {
        return $this->getConfig('frontend/show_tooltip');
    }

    /**
     * Get override label option
     *
     * @return bool
     */
    public function getOverrideLabel()
    {
        return $this->getConfig('frontend/override_label');
    }

    /**
     * Get custom label
     *
     * @return string
     */
    public function getCustomLabel()
    {
        return $this->getConfig('frontend/field_label');
    }

    /**
     * Get magento version
     *
     * @return string
     */
    public function getMagentoVersion()
    {
        return $this->productMetadata->getVersion();
    }

    /**
     * Get autosuggest_focus admin option
     *
     * @return bool
     */
    public function getAutosuggestFocus()
    {
        return $this->getConfig('frontend/autosuggest_focus');
    }

    /**
     * Get custom invalid error message
     *
     * @return string | null
     */
    public function getInvalidErrorMessage()
    {
        return $this->getConfig('frontend/invalid_error_message');
    }

    /**
     * Return the tooltip text if set and Show tooltip is set to Yes
     *
     * @return mixed|null
     */
    public function getTooltipText()
    {
        return $this->getShowTooltip() ? $this->getConfig('frontend/tooltip_text') : __(self::TOOLTIP_TEXT);
    }

    /**
     * Get Dir RTL if option
     *
     * @return bool
     */
    public function getRtlDirection()
    {
        return $this->getConfig('frontend/dir_rtl');
    }

    /**
     * Return autocomplete Lang if set and RTL dir is set to Yes
     *
     * @return mixed|null
     */
    public function getAutocompleteLang()
    {
        return $this->getConfig('frontend/autocomplete_lang') ?? null;
    }
}

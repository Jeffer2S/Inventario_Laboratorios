<?php
/**
* Copyright (c) Microsoft Corporation.  All Rights Reserved.  Licensed under the MIT License.  See License in the project root for license information.
* 
* UserExperienceAnalyticsSettings File
* PHP version 7
*
* @category  Library
* @package   Microsoft.Graph
* @copyright (c) Microsoft Corporation. All rights reserved.
* @license   https://opensource.org/licenses/MIT MIT License
* @link      https://graph.microsoft.com
*/
namespace Microsoft\Graph\Model;
/**
* UserExperienceAnalyticsSettings class
*
* @category  Model
* @package   Microsoft.Graph
* @copyright (c) Microsoft Corporation. All rights reserved.
* @license   https://opensource.org/licenses/MIT MIT License
* @link      https://graph.microsoft.com
*/
class UserExperienceAnalyticsSettings extends Entity
{
    /**
    * Gets the configurationManagerDataConnectorConfigured
    * When TRUE, indicates Tenant attach is configured properly and System Center Configuration Manager (SCCM) tenant attached devices will show up in endpoint analytics reporting. When FALSE, indicates Tenant attach is not configured. FALSE by default.
    *
    * @return bool|null The configurationManagerDataConnectorConfigured
    */
    public function getConfigurationManagerDataConnectorConfigured()
    {
        if (array_key_exists("configurationManagerDataConnectorConfigured", $this->_propDict)) {
            return $this->_propDict["configurationManagerDataConnectorConfigured"];
        } else {
            return null;
        }
    }

    /**
    * Sets the configurationManagerDataConnectorConfigured
    * When TRUE, indicates Tenant attach is configured properly and System Center Configuration Manager (SCCM) tenant attached devices will show up in endpoint analytics reporting. When FALSE, indicates Tenant attach is not configured. FALSE by default.
    *
    * @param bool $val The value of the configurationManagerDataConnectorConfigured
    *
    * @return UserExperienceAnalyticsSettings
    */
    public function setConfigurationManagerDataConnectorConfigured($val)
    {
        $this->_propDict["configurationManagerDataConnectorConfigured"] = $val;
        return $this;
    }
}

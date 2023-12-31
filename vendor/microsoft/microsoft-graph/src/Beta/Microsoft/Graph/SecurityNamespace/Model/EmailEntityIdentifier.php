<?php
/**
* Copyright (c) Microsoft Corporation.  All Rights Reserved.  Licensed under the MIT License.  See License in the project root for license information.
* 
* EmailEntityIdentifier File
* PHP version 7
*
* @category  Library
* @package   Microsoft.Graph
* @copyright (c) Microsoft Corporation. All rights reserved.
* @license   https://opensource.org/licenses/MIT MIT License
* @link      https://graph.microsoft.com
*/
namespace Beta\Microsoft\Graph\SecurityNamespace\Model;

use Microsoft\Graph\Core\Enum;

/**
* EmailEntityIdentifier class
*
* @category  Model
* @package   Microsoft.Graph
* @copyright (c) Microsoft Corporation. All rights reserved.
* @license   https://opensource.org/licenses/MIT MIT License
* @link      https://graph.microsoft.com
*/
class EmailEntityIdentifier extends Enum
{
    /**
    * The Enum EmailEntityIdentifier
    */
    const NETWORK_MESSAGE_ID = "networkMessageId";
    const RECIPIENT_EMAIL_ADDRESS = "recipientEmailAddress";
    const UNKNOWN_FUTURE_VALUE = "unknownFutureValue";
}

<?php
/**
* Copyright (c) Microsoft Corporation.  All Rights Reserved.  Licensed under the MIT License.  See License in the project root for license information.
* 
* MonthlyUserInsightMetricsRoot File
* PHP version 7
*
* @category  Library
* @package   Microsoft.Graph
* @copyright (c) Microsoft Corporation. All rights reserved.
* @license   https://opensource.org/licenses/MIT MIT License
* @link      https://graph.microsoft.com
*/
namespace Beta\Microsoft\Graph\Model;

/**
* MonthlyUserInsightMetricsRoot class
*
* @category  Model
* @package   Microsoft.Graph
* @copyright (c) Microsoft Corporation. All rights reserved.
* @license   https://opensource.org/licenses/MIT MIT License
* @link      https://graph.microsoft.com
*/
class MonthlyUserInsightMetricsRoot extends Entity
{

     /**
     * Gets the activeUsers
     *
     * @return array|null The activeUsers
     */
    public function getActiveUsers()
    {
        if (array_key_exists("activeUsers", $this->_propDict)) {
           return $this->_propDict["activeUsers"];
        } else {
            return null;
        }
    }

    /**
    * Sets the activeUsers
    *
    * @param ActiveUsersMetric[] $val The activeUsers
    *
    * @return MonthlyUserInsightMetricsRoot
    */
    public function setActiveUsers($val)
    {
        $this->_propDict["activeUsers"] = $val;
        return $this;
    }


     /**
     * Gets the activeUsersBreakdown
     *
     * @return array|null The activeUsersBreakdown
     */
    public function getActiveUsersBreakdown()
    {
        if (array_key_exists("activeUsersBreakdown", $this->_propDict)) {
           return $this->_propDict["activeUsersBreakdown"];
        } else {
            return null;
        }
    }

    /**
    * Sets the activeUsersBreakdown
    *
    * @param ActiveUsersBreakdownMetric[] $val The activeUsersBreakdown
    *
    * @return MonthlyUserInsightMetricsRoot
    */
    public function setActiveUsersBreakdown($val)
    {
        $this->_propDict["activeUsersBreakdown"] = $val;
        return $this;
    }


     /**
     * Gets the authentications
     *
     * @return array|null The authentications
     */
    public function getAuthentications()
    {
        if (array_key_exists("authentications", $this->_propDict)) {
           return $this->_propDict["authentications"];
        } else {
            return null;
        }
    }

    /**
    * Sets the authentications
    *
    * @param AuthenticationsMetric[] $val The authentications
    *
    * @return MonthlyUserInsightMetricsRoot
    */
    public function setAuthentications($val)
    {
        $this->_propDict["authentications"] = $val;
        return $this;
    }


     /**
     * Gets the inactiveUsers
     *
     * @return array|null The inactiveUsers
     */
    public function getInactiveUsers()
    {
        if (array_key_exists("inactiveUsers", $this->_propDict)) {
           return $this->_propDict["inactiveUsers"];
        } else {
            return null;
        }
    }

    /**
    * Sets the inactiveUsers
    *
    * @param MonthlyInactiveUsersMetric[] $val The inactiveUsers
    *
    * @return MonthlyUserInsightMetricsRoot
    */
    public function setInactiveUsers($val)
    {
        $this->_propDict["inactiveUsers"] = $val;
        return $this;
    }


     /**
     * Gets the inactiveUsersByApplication
     *
     * @return array|null The inactiveUsersByApplication
     */
    public function getInactiveUsersByApplication()
    {
        if (array_key_exists("inactiveUsersByApplication", $this->_propDict)) {
           return $this->_propDict["inactiveUsersByApplication"];
        } else {
            return null;
        }
    }

    /**
    * Sets the inactiveUsersByApplication
    *
    * @param MonthlyInactiveUsersByApplicationMetric[] $val The inactiveUsersByApplication
    *
    * @return MonthlyUserInsightMetricsRoot
    */
    public function setInactiveUsersByApplication($val)
    {
        $this->_propDict["inactiveUsersByApplication"] = $val;
        return $this;
    }


     /**
     * Gets the mfaCompletions
     *
     * @return array|null The mfaCompletions
     */
    public function getMfaCompletions()
    {
        if (array_key_exists("mfaCompletions", $this->_propDict)) {
           return $this->_propDict["mfaCompletions"];
        } else {
            return null;
        }
    }

    /**
    * Sets the mfaCompletions
    *
    * @param MfaCompletionMetric[] $val The mfaCompletions
    *
    * @return MonthlyUserInsightMetricsRoot
    */
    public function setMfaCompletions($val)
    {
        $this->_propDict["mfaCompletions"] = $val;
        return $this;
    }


     /**
     * Gets the requests
     *
     * @return array|null The requests
     */
    public function getRequests()
    {
        if (array_key_exists("requests", $this->_propDict)) {
           return $this->_propDict["requests"];
        } else {
            return null;
        }
    }

    /**
    * Sets the requests
    *
    * @param UserRequestsMetric[] $val The requests
    *
    * @return MonthlyUserInsightMetricsRoot
    */
    public function setRequests($val)
    {
        $this->_propDict["requests"] = $val;
        return $this;
    }


     /**
     * Gets the signUps
     *
     * @return array|null The signUps
     */
    public function getSignUps()
    {
        if (array_key_exists("signUps", $this->_propDict)) {
           return $this->_propDict["signUps"];
        } else {
            return null;
        }
    }

    /**
    * Sets the signUps
    *
    * @param UserSignUpMetric[] $val The signUps
    *
    * @return MonthlyUserInsightMetricsRoot
    */
    public function setSignUps($val)
    {
        $this->_propDict["signUps"] = $val;
        return $this;
    }


     /**
     * Gets the summary
     *
     * @return array|null The summary
     */
    public function getSummary()
    {
        if (array_key_exists("summary", $this->_propDict)) {
           return $this->_propDict["summary"];
        } else {
            return null;
        }
    }

    /**
    * Sets the summary
    *
    * @param InsightSummary[] $val The summary
    *
    * @return MonthlyUserInsightMetricsRoot
    */
    public function setSummary($val)
    {
        $this->_propDict["summary"] = $val;
        return $this;
    }

}

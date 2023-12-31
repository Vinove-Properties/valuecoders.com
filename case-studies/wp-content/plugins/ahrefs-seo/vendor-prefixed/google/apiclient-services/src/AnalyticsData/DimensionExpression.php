<?php

/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */
namespace ahrefs\AhrefsSeo_Vendor\Google\Service\AnalyticsData;

class DimensionExpression extends \ahrefs\AhrefsSeo_Vendor\Google\Model
{
    protected $concatenateType = \ahrefs\AhrefsSeo_Vendor\Google\Service\AnalyticsData\ConcatenateExpression::class;
    protected $concatenateDataType = '';
    protected $lowerCaseType = \ahrefs\AhrefsSeo_Vendor\Google\Service\AnalyticsData\CaseExpression::class;
    protected $lowerCaseDataType = '';
    protected $upperCaseType = \ahrefs\AhrefsSeo_Vendor\Google\Service\AnalyticsData\CaseExpression::class;
    protected $upperCaseDataType = '';
    /**
     * @param ConcatenateExpression
     */
    public function setConcatenate(\ahrefs\AhrefsSeo_Vendor\Google\Service\AnalyticsData\ConcatenateExpression $concatenate)
    {
        $this->concatenate = $concatenate;
    }
    /**
     * @return ConcatenateExpression
     */
    public function getConcatenate()
    {
        return $this->concatenate;
    }
    /**
     * @param CaseExpression
     */
    public function setLowerCase(\ahrefs\AhrefsSeo_Vendor\Google\Service\AnalyticsData\CaseExpression $lowerCase)
    {
        $this->lowerCase = $lowerCase;
    }
    /**
     * @return CaseExpression
     */
    public function getLowerCase()
    {
        return $this->lowerCase;
    }
    /**
     * @param CaseExpression
     */
    public function setUpperCase(\ahrefs\AhrefsSeo_Vendor\Google\Service\AnalyticsData\CaseExpression $upperCase)
    {
        $this->upperCase = $upperCase;
    }
    /**
     * @return CaseExpression
     */
    public function getUpperCase()
    {
        return $this->upperCase;
    }
}
// Adding a class alias for backwards compatibility with the previous class name.
\class_alias(\ahrefs\AhrefsSeo_Vendor\Google\Service\AnalyticsData\DimensionExpression::class, 'ahrefs\\AhrefsSeo_Vendor\\Google_Service_AnalyticsData_DimensionExpression');

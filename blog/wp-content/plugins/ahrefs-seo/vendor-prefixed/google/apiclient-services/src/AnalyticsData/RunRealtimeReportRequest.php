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

class RunRealtimeReportRequest extends \ahrefs\AhrefsSeo_Vendor\Google\Collection
{
    protected $collection_key = 'orderBys';
    protected $dimensionFilterType = \ahrefs\AhrefsSeo_Vendor\Google\Service\AnalyticsData\FilterExpression::class;
    protected $dimensionFilterDataType = '';
    protected $dimensionsType = \ahrefs\AhrefsSeo_Vendor\Google\Service\AnalyticsData\Dimension::class;
    protected $dimensionsDataType = 'array';
    /**
     * @var string
     */
    public $limit;
    /**
     * @var string[]
     */
    public $metricAggregations;
    protected $metricFilterType = \ahrefs\AhrefsSeo_Vendor\Google\Service\AnalyticsData\FilterExpression::class;
    protected $metricFilterDataType = '';
    protected $metricsType = \ahrefs\AhrefsSeo_Vendor\Google\Service\AnalyticsData\Metric::class;
    protected $metricsDataType = 'array';
    protected $minuteRangesType = \ahrefs\AhrefsSeo_Vendor\Google\Service\AnalyticsData\MinuteRange::class;
    protected $minuteRangesDataType = 'array';
    protected $orderBysType = \ahrefs\AhrefsSeo_Vendor\Google\Service\AnalyticsData\OrderBy::class;
    protected $orderBysDataType = 'array';
    /**
     * @var bool
     */
    public $returnPropertyQuota;
    /**
     * @param FilterExpression
     */
    public function setDimensionFilter(\ahrefs\AhrefsSeo_Vendor\Google\Service\AnalyticsData\FilterExpression $dimensionFilter)
    {
        $this->dimensionFilter = $dimensionFilter;
    }
    /**
     * @return FilterExpression
     */
    public function getDimensionFilter()
    {
        return $this->dimensionFilter;
    }
    /**
     * @param Dimension[]
     */
    public function setDimensions($dimensions)
    {
        $this->dimensions = $dimensions;
    }
    /**
     * @return Dimension[]
     */
    public function getDimensions()
    {
        return $this->dimensions;
    }
    /**
     * @param string
     */
    public function setLimit($limit)
    {
        $this->limit = $limit;
    }
    /**
     * @return string
     */
    public function getLimit()
    {
        return $this->limit;
    }
    /**
     * @param string[]
     */
    public function setMetricAggregations($metricAggregations)
    {
        $this->metricAggregations = $metricAggregations;
    }
    /**
     * @return string[]
     */
    public function getMetricAggregations()
    {
        return $this->metricAggregations;
    }
    /**
     * @param FilterExpression
     */
    public function setMetricFilter(\ahrefs\AhrefsSeo_Vendor\Google\Service\AnalyticsData\FilterExpression $metricFilter)
    {
        $this->metricFilter = $metricFilter;
    }
    /**
     * @return FilterExpression
     */
    public function getMetricFilter()
    {
        return $this->metricFilter;
    }
    /**
     * @param Metric[]
     */
    public function setMetrics($metrics)
    {
        $this->metrics = $metrics;
    }
    /**
     * @return Metric[]
     */
    public function getMetrics()
    {
        return $this->metrics;
    }
    /**
     * @param MinuteRange[]
     */
    public function setMinuteRanges($minuteRanges)
    {
        $this->minuteRanges = $minuteRanges;
    }
    /**
     * @return MinuteRange[]
     */
    public function getMinuteRanges()
    {
        return $this->minuteRanges;
    }
    /**
     * @param OrderBy[]
     */
    public function setOrderBys($orderBys)
    {
        $this->orderBys = $orderBys;
    }
    /**
     * @return OrderBy[]
     */
    public function getOrderBys()
    {
        return $this->orderBys;
    }
    /**
     * @param bool
     */
    public function setReturnPropertyQuota($returnPropertyQuota)
    {
        $this->returnPropertyQuota = $returnPropertyQuota;
    }
    /**
     * @return bool
     */
    public function getReturnPropertyQuota()
    {
        return $this->returnPropertyQuota;
    }
}
// Adding a class alias for backwards compatibility with the previous class name.
\class_alias(\ahrefs\AhrefsSeo_Vendor\Google\Service\AnalyticsData\RunRealtimeReportRequest::class, 'ahrefs\\AhrefsSeo_Vendor\\Google_Service_AnalyticsData_RunRealtimeReportRequest');

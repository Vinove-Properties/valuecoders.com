<?php

/*
 * This file is part of the Monolog package.
 *
 * (c) Jordi Boggiano <j.boggiano@seld.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace ahrefs\AhrefsSeo_Vendor\Monolog\Handler;

use ahrefs\AhrefsSeo_Vendor\Monolog\Formatter\FormatterInterface;
use ahrefs\AhrefsSeo_Vendor\Monolog\Formatter\ElasticaFormatter;
use ahrefs\AhrefsSeo_Vendor\Monolog\Logger;
use ahrefs\AhrefsSeo_Vendor\Elastica\Client;
use ahrefs\AhrefsSeo_Vendor\Elastica\Exception\ExceptionInterface;
/**
 * Elastic Search handler
 *
 * Usage example:
 *
 *    $client = new \Elastica\Client();
 *    $options = array(
 *        'index' => 'elastic_index_name',
 *        'type' => 'elastic_doc_type',
 *    );
 *    $handler = new ElasticSearchHandler($client, $options);
 *    $log = new Logger('application');
 *    $log->pushHandler($handler);
 *
 * @author Jelle Vink <jelle.vink@gmail.com>
 */
class ElasticSearchHandler extends \ahrefs\AhrefsSeo_Vendor\Monolog\Handler\AbstractProcessingHandler
{
    /**
     * @var Client
     */
    protected $client;
    /**
     * @var array Handler config options
     */
    protected $options = array();
    /**
     * @param Client $client  Elastica Client object
     * @param array  $options Handler configuration
     * @param int    $level   The minimum logging level at which this handler will be triggered
     * @param bool   $bubble  Whether the messages that are handled can bubble up the stack or not
     */
    public function __construct(\ahrefs\AhrefsSeo_Vendor\Elastica\Client $client, array $options = array(), $level = \ahrefs\AhrefsSeo_Vendor\Monolog\Logger::DEBUG, $bubble = \true)
    {
        parent::__construct($level, $bubble);
        $this->client = $client;
        $this->options = \array_merge(array(
            'index' => 'monolog',
            // Elastic index name
            'type' => 'record',
            // Elastic document type
            'ignore_error' => \false,
        ), $options);
    }
    /**
     * {@inheritDoc}
     */
    protected function write(array $record)
    {
        $this->bulkSend(array($record['formatted']));
    }
    /**
     * {@inheritdoc}
     */
    public function setFormatter(\ahrefs\AhrefsSeo_Vendor\Monolog\Formatter\FormatterInterface $formatter)
    {
        if ($formatter instanceof \ahrefs\AhrefsSeo_Vendor\Monolog\Formatter\ElasticaFormatter) {
            return parent::setFormatter($formatter);
        }
        throw new \InvalidArgumentException('ElasticSearchHandler is only compatible with ElasticaFormatter');
    }
    /**
     * Getter options
     * @return array
     */
    public function getOptions()
    {
        return $this->options;
    }
    /**
     * {@inheritDoc}
     */
    protected function getDefaultFormatter()
    {
        return new \ahrefs\AhrefsSeo_Vendor\Monolog\Formatter\ElasticaFormatter($this->options['index'], $this->options['type']);
    }
    /**
     * {@inheritdoc}
     */
    public function handleBatch(array $records)
    {
        $documents = $this->getFormatter()->formatBatch($records);
        $this->bulkSend($documents);
    }
    /**
     * Use Elasticsearch bulk API to send list of documents
     * @param  array             $documents
     * @throws \RuntimeException
     */
    protected function bulkSend(array $documents)
    {
        try {
            $this->client->addDocuments($documents);
        } catch (\ahrefs\AhrefsSeo_Vendor\Elastica\Exception\ExceptionInterface $e) {
            if (!$this->options['ignore_error']) {
                throw new \RuntimeException("Error sending messages to Elasticsearch", 0, $e);
            }
        }
    }
}

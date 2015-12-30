<?php

/**
 * @file
 * Contains \Drupal\Tests\taxonomy\Unit\Plugin\views\filter\TaxonomyIndexTidTest.
 */

namespace Drupal\Tests\taxonomy\Unit\Plugin\views\filter;

use \Drupal\Tests\UnitTestCase;

/**
 * @coversDefaultClass \Drupal\taxonomy\Plugin\views\filter\TaxonomyIndexTid
 * @group views
 */


class TaxonomyIndexTidTest extends UnitTestCase
{
    /**
     * The vocabulary storage.
     *
     * @var \Drupal\taxonomy\VocabularyStorageInterface
     */
    protected $vocabularyStorage;

    /**
     * The term storage.
     *
     * @var \Drupal\taxonomy\TermStorageInterface
     */
    protected $termStorage;

    /**
     * The TaxonomyIndexTid under test.
     *
     * @var \Drupal\taxonomy\Plugin\views\filter\TaxonomyIndexTid
     */
    protected $TaxonomyIndexTid;

    /**
     * {@inheritdoc}
     *
     * @covers ::__construct
     */
    public function setUp()
    {
        $this->vocabularyStorage
            = $this->getMock('\Drupal\taxonomy\VocabularyStorageInterface');

        $this->termStorage
            = $this->getMock('\Drupal\taxonomy\TermStorageInterface');

        $configuration = [];
        $plugin_id = $this->randomMachineName();
        $plugin_definition = [
          'title' => $this->randomMachineName(),
        ];

        $this->TaxonomyIndexTid
            = $this->getMockBuilder('\Drupal\taxonomy\Plugin\views\filter\TaxonomyIndexTid')
            ->setConstructorArgs([$configuration, $plugin_id, $plugin_definition, $this->vocabularyStorage, $this->termStorage])
            ->getMock();

        $this->TaxonomyIndexTid->expects($this->any())
            ->method('getValueOptions')
            ->willReturn(['key1' => 'foo']);
    }

    /**
     * @covers ::getValueOptions
     */
    public function testGetValueOptionsReturnsAnArrayValue()
    {
        $values = $this->TaxonomyIndexTid->getValueOptions();
        $this->assertInternalType('array', $values);
        $this->assertArrayEquals(['key1' => 'foo'], $values);
    }

}

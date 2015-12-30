<?php

/**
 * @file
 * Contains \Drupal\Tests\views\Unit\Plugin\filter\LanguageFilterTest.
 */

namespace Drupal\Tests\views\Unit\Plugin\filter;

use \Drupal\Tests\UnitTestCase;

/**
 * @coversDefaultClass \Drupal\views\Plugin\views\filter\LanguageFilter
 * @group views
 */
class LanguageFilterTest extends UnitTestCase
{
    /**
     * The language manager.
     *
     * @var \Drupal\Core\Language\LanguageManagerInterface|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $languageManager;

    /**
     * The filter under test.
     *
     * @var \Drupal\views\Plugin\views\filter\LanguageFilter
     *
     */
    protected $filter;

    /**
     * {@inheritdoc}
     *
     * @covers ::__construct
     */
    public function setUp()
    {

        $this->languageManager
            = $this->getMock('\Drupal\Core\Language\LanguageManagerInterface');

        $configuration = [];
        $plugin_id = $this->randomMachineName();
        $plugin_definition = [
        'title' => $this->randomMachineName(),
        ];

        $this->filter
          = $this->getMockBuilder('\Drupal\views\Plugin\views\filter\LanguageFilter')
            ->setConstructorArgs([$configuration, $plugin_id, $plugin_definition, $this->languageManager])
            ->getMock();

        $this->filter->expects($this->any())
            ->method('getValueOptions')
            ->willReturn(['key1' => 'foo']);
    }



    /**
     * @covers ::getValueOptions
     */
    public function testGetValueOptionsReturnsAnArrayValue()
    {
        $values = $this->filter->getValueOptions();
        $this->assertInternalType('array', $values);
        $this->assertArrayEquals(['key1' => 'foo'], $values);
    }
}
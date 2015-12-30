<?php

/**
 * @file
 * Contains \Drupal\Tests\user\Unit\Plugin\views\filter\RolesTest.
 */

namespace Drupal\Tests\user\Unit\Plugin\views\filter;

use \Drupal\Tests\UnitTestCase;

/**
 * @coversDefaultClass \Drupal\user\Plugin\views\filter\Roles
 * @group views
 */

class RolesTest extends UnitTestCase
{
    /**
     * The role storage.
     *
     * @var \Drupal\user\RoleStorageInterface
     */
    protected $roleStorage;

    /**
     * The roles under test.
     *
     * @var \Drupal\user\Plugin\views\filter\Roles
     */
    protected $roles;

    /**
     * {@inheritdoc}
     *
     * @covers ::__construct
     */
    public function setUp()
    {
        $this->roleStorage
            = $this->getMock('\Drupal\user\RoleStorageInterface');

        $configuration = [];
        $plugin_id = $this->randomMachineName();
        $plugin_definition = [
          'title' => $this->randomMachineName(),
        ];

        $this->roles
            = $this->getMockBuilder('\Drupal\user\Plugin\views\filter\Roles')
              ->setConstructorArgs([$configuration, $plugin_id, $plugin_definition, $this->roleStorage])
              ->getMock();

        $this->roles->expects($this->any())
            ->method('getValueOptions')
            ->willReturn(['key1' => 'foo']);
    }

    /**
     * @covers ::getValueOptions
     */
    public function testGetValueOptionsReturnsAnArrayValue()
    {
        $values = $this->roles->getValueOptions();
        $this->assertInternalType('array', $values);
        $this->assertArrayEquals(['key1' => 'foo'], $values);
    }
}

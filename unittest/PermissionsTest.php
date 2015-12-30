<?php
/**
 * @file
 * Contains \Drupal\Tests\user\Unit\Plugin\views\filter\PermissionsTest.
 *
 */
namespace Drupal\Tests\user\Unit\Plugin\views\filter;
use \Drupal\Tests\UnitTestCase;

/**
 * @coversDefaultClass \Drupal\user\Plugin\views\filter\Permissions
 * @group views
 */

class PermissionsTest extends UnitTestCase
{
    /**
     * The permission handler.
     *
     * @var \Drupal\user\PermissionHandlerInterface
     */
    protected $permissionHandler;

    /**
     * The module handler.
     *
     * @var \Drupal\Core\Extension\ModuleHandlerInterface
     */
    protected $moduleHandler;

    /**
     * The permissions under test.
     *
     * @var \Drupal\user\Plugin\views\filter\Permissions
     */
    protected $permissions;


    /**
     * {@inheritdoc}
     *
     * @covers ::__construct
     */
    public function setUp()
    {
        $this->permissionHandler
        = $this->getMock('\Drupal\user\PermissionHandlerInterface');

        $this->moduleHandler
        = $this->getMock('\Drupal\Core\Extension\ModuleHandlerInterface');

        $configuration = [];
        $plugin_id = $this->randomMachineName();
        $plugin_definition = [
          'title' => $this->randomMachineName(),
        ];

        $this->permissions
            = $this->getMockBuilder('\Drupal\user\Plugin\views\filter\Permissions')
          ->setConstructorArgs([$configuration, $plugin_id, $plugin_definition, $this->permissionHandler, $this->moduleHandler])
          ->getMock();

        $this->permissions->expects($this->any())
          ->method('getValueOptions')
          ->willReturn(['key1' => 'foo']);
    }

    /**
     * @covers ::getValueOptions
     */
    public function testGetValueOptionsReturnsAnArrayValue()
    {
        $values = $this->permissions->getValueOptions();
        $this->assertInternalType('array', $values);
        $this->assertArrayEquals(['key1' => 'foo'], $values);
    }

}

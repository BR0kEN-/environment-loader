<?php
/**
 * @author Sergii Bondarenko, <sb@firstvector.org>
 */
namespace Behat\Tests;

use Behat\EnvironmentLoader;
use Behat\Tests\ExampleExtension\ServiceContainer\ExampleExtension;
// Behat extension interface.
use Behat\Testwork\ServiceContainer\Extension;
// Tools for dependency injection.
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\ContainerBuilder;
// Behat context extension and tools.
use Behat\Behat\Context\ServiceContainer\ContextExtension;
use Behat\Behat\Context\Initializer\ContextInitializer;
// Behat environment extension and tools.
use Behat\Testwork\Environment\ServiceContainer\EnvironmentExtension;
use Behat\Testwork\Environment\Reader\EnvironmentReader as EnvironmentExtensionReader;

/**
 * Class EnvironmentLoaderTest.
 *
 * @package Behat\Tests
 */
class EnvironmentLoaderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var EnvironmentLoader
     */
    private $loader;
    /**
     * @var ExampleExtension
     */
    private $extension;
    /**
     * @var ContainerBuilder
     */
    private $container;

    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        $this->extension = new ExampleExtension();
        $this->container = new ContainerBuilder();
        $this->loader = new EnvironmentLoader($this->extension, $this->container);
    }

    /**
     * @test
     */
    public function testEnvironmentLoaderConstructor()
    {
        $namespace = sprintf('%s\ExampleExtension', __NAMESPACE__);
        $configKey = $this->extension->getConfigKey();

        foreach ([
            'path' => sprintf('%s/example-extension', __DIR__),
            'namespace' => $namespace,
            'container' => $this->container,
            'configKey' => $configKey,
            'classPath' => sprintf('%s\%s\Example', $namespace, '%s'),
        ] as $property => $value) {
            static::assertAttributeEquals($value, $property, $this->loader);
        }

        static::assertTrue($this->container->has(sprintf('%s.%s', $configKey, EnvironmentExtension::READER_TAG)));
        static::assertArrayHasKey(ContextExtension::INITIALIZER_TAG, $this->getEnvironmentLoaderDefinitions());
    }

    /**
     * @return array
     */
    private function getEnvironmentLoaderDefinitions()
    {
        return static::getObjectAttribute($this->loader, 'definitions');
    }
}

# Behat Environment Loader

This tool - is a Behat library for auto loading context classes of extension to context environment.

## Usage

See examples here:

- [TqExtension](https://github.com/BR0kEN-/TqExtension)
- [SoapExtension](https://github.com/asgorobets/SoapExtension)

```php
namespace Behat\ExampleExtension\ServiceContainer;

// ...

class ExampleExtension implements Extension
{
    // ...
    
    /**
     * {@inheritdoc}
     */
    public function load(ContainerBuilder $container, array $config)
    {
        // Load all context classes from "Behat\ExampleExtension\Context\*" namespace.
        $loader = new EnvironmentLoader($this, $container, $config);
        // Your own environment reader can be easily added.
        // $loader->addEnvironmentReader();
        $loader->load();
    }
    
    // ...
}
```

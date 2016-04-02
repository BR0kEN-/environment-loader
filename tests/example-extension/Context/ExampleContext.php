<?php
/**
 * @author Sergii Bondarenko, <sb@firstvector.org>
 */
namespace Behat\Tests\ExampleExtension\Context;

/**
 * Class ExampleContext.
 *
 * @package Behat\Tests\ExampleExtension\Context
 */
class ExampleContext extends RawExampleContext
{
    /**
     * @Then /^(?:|I )do nothing$/
     */
    public function exampleStep()
    {
    }
}

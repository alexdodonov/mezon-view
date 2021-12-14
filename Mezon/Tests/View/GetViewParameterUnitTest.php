<?php
namespace Mezon\Tests\View;

use PHPUnit\Framework\TestCase;
use Mezon\Tests\TestingView;
use Mezon\Tests\TestingTemplate;

/**
 * Test cases for the view
 *
 * @psalm-suppress PropertyNotSetInConstructor
 */
class GetViewParameterUnitTest extends TestCase
{

    /**
     * Testing method getViewParameter
     */
    public function testGetViewParameterOnly(): void
    {
        // setup
        $view = new TestingView(new TestingTemplate(__DIR__ . '/../Res'));

        // test body
        $view->setViewParameter('view-only', true, false);

        // assertions
        $this->assertTrue($view->getViewParameter('view-only'));
    }

    /**
     * Testing method getViewParameter
     */
    public function testGetViewAndTemplateParameter(): void
    {
        // setup
        $view = new TestingView(new TestingTemplate(__DIR__ . '/../Res'));

        // test body
        $view->setViewParameter('view-and-template', true, true);

        // assertions
        $this->assertTrue($view->getViewParameter('view-and-template'));
    }

    /**
     * Testing method getViewParameter
     */
    public function testGetTemplateParameterOnlySuccessMessage(): void
    {
        // setup
        $view = new TestingView(new TestingTemplate(__DIR__ . '/../Res'));

        // test body
        $view->setSuccessMessageContent('success-message');

        // assertions
        $this->assertEquals('sm: success message', $view->getViewParameter('action-message'));
    }

    /**
     * Testing method getViewParameter
     */
    public function testGetTemplateParameterOnlyErrorMessage(): void
    {
        // setup
        $view = new TestingView(new TestingTemplate(__DIR__ . '/../Res'));

        // test body
        $view->setErrorMessageContent('error-message');

        // assertions
        $this->assertEquals('em: error message', $view->getViewParameter('action-message'));
    }

    /**
     * Testing method getViewParameter
     */
    public function testGetUnexistingParameter(): void
    {
        // setup
        $view = new TestingView(new TestingTemplate(__DIR__ . '/../Res'));

        // test body and assertions
        $this->assertEquals(null, $view->getViewParameter('unexisting'));
    }

    /**
     * Testing method getViewParameter
     */
    public function testGetUnexistingParameterWithConcreteDefault(): void
    {
        // setup
        $view = new TestingView(new TestingTemplate(__DIR__ . '/../Res'));

        // test body and assertions
        $this->assertEquals('default', $view->getViewParameter('unexisting', 'default'));
    }

    /**
     * Testing method getViewParameter
     */
    public function testGetParameterForNotSetupTemplate(): void
    {
        // setup
        $view = new TestingView();

        // test body and assertions
        $this->assertEquals('default', $view->getViewParameter('unexisting', 'default'));
    }
}

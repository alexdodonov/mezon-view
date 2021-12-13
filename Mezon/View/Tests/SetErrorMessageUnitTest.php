<?php
namespace Mezon\View\Tests;

use Mezon\HtmlTemplate\HtmlTemplate;
use PHPUnit\Framework\TestCase;

/**
 * Test cases for the view
 *
 * @psalm-suppress PropertyNotSetInConstructor
 */
class SetErrorMessageUnitTest extends TestCase
{

    /**
     * Testing method setErrorMessage
     */
    public function testSetErrorMessage(): void
    {
        // setup
        $view = new TestingView(new HtmlTemplate(__DIR__));

        // test body
        $view->setErrorMessage('111');

        // assertions
        $this->assertEquals('111', $view->getErrorMessage());
        $this->assertEquals('111', $view->getTemplate()
            ->getPageVar(TestingView::ERROR_MESSAGE));
    }
}

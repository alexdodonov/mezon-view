<?php
namespace Mezon\Tests\View;

use Mezon\HtmlTemplate\HtmlTemplate;
use PHPUnit\Framework\TestCase;
use Mezon\Tests\TestingView;

/**
 * Test cases for the view
 *
 * @psalm-suppress PropertyNotSetInConstructor
 */
class SetSuccessMessageUnitTest extends TestCase
{

    /**
     * Testing method setSuccessMessage
     */
    public function testSetSuccessMessage(): void
    {
        // setup
        $view = new TestingView(new HtmlTemplate(__DIR__ . '/../Res/'));

        // test body
        $view->setSuccessMessage('111');

        // assertions
        $this->assertEquals('111', $view->getSuccessMessage());
        $this->assertEquals('111', $view->getTemplate()
            ->getPageVar(TestingView::SUCCESS_MESSAGE));
    }
}

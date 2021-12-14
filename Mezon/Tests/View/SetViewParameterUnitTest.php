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
class SetViewParameterUnitTest extends TestCase
{

    /**
     * Testing method setViewParameter
     */
    public function testSetViewParameter(): void
    {
        // setup
        $view = new TestingView(new HtmlTemplate(__DIR__ . '/../Res/Templates/'));

        // test body
        $view->setViewParameter('view-only', true, false);
        $view->setViewParameter('view-and-template-default', true);
        $view->setViewParameter('view-and-template', true, true);

        // assertions
        $this->assertFalse($view->getTemplate()
            ->pageVarExists('view-only'));
        $this->assertTrue($view->getTemplate()
            ->pageVarExists('view-and-template-default'));
        $this->assertTrue($view->getTemplate()
            ->pageVarExists('view-and-template'));
    }
}

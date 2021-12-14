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
class GetTemplateUnitTest extends TestCase
{

    /**
     * Testing template getter
     */
    public function testGetTemplate(): void
    {
        // setup
        $view = new TestingView(new HtmlTemplate(__DIR__ . '/../Res/Templates/'));

        // test body and assertions
        $this->assertInstanceOf(HtmlTemplate::class, $view->getTemplate());
    }

    /**
     * Testing template getter with exception
     */
    public function testGetTemplateException(): void
    {
        // setup
        $view = new TestingView();

        // assertions
        $this->expectException(\Exception::class);
        $this->expectExceptionCode(- 1);
        $this->expectExceptionMessage('Template was not set for the view');

        // test body
        $view->getTemplate();
    }
}

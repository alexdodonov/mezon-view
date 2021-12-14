<?php
namespace Mezon\Tests\ViewStatic;

use Mezon\HtmlTemplate\HtmlTemplate;
use Mezon\ViewStatic;
use PHPUnit\Framework\TestCase;

/**
 * Test cases for the static view
 *
 * @psalm-suppress PropertyNotSetInConstructor
 */
class RenderUnitTest extends TestCase
{

    /**
     * Testing constructor
     */
    public function testRender(): void
    {
        // setup
        $template = new HtmlTemplate(__DIR__ . '/../Res/');
        $template->setPageVar('block', 'BLOCK!!!');
        $view = new ViewStatic($template, 'block');

        // test body
        $content = $view->render();

        // assertions
        $this->assertEquals('some BLOCK!!! {unexisting-var}', $content);
        $this->assertEquals('block', $view->getViewName());
    }
}

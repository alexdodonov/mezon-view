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
class EmptyBlockExceptionUnitTest extends TestCase
{

    /**
     * Testing unexisting block renderring
     */
    public function testEmptyBlockName(): void
    {
        // assertions
        $this->expectException(\Exception::class);
        $this->expectExceptionCode(- 1);
        $this->expectExceptionMessage('Block name must be set');

        // setup
        $template = new HtmlTemplate(__DIR__ . '/../Res/');
        $view = new ViewStatic($template);

        // test body
        $view->render();
    }
}

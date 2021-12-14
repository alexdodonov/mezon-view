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
class TemplateWasSetupUnitTest extends TestCase
{

    /**
     * Testing templateWasSetup method
     */
    public function testTemplateWasSetup(): void
    {
        // setup
        $view1 = new TestingView(new HtmlTemplate(__DIR__ . '/../Res/Templates/'));
        $view2 = new TestingView();

        // test body and assertions
        $this->assertTrue($view1->templateWasSetup());
        $this->assertFalse($view2->templateWasSetup());
    }
}

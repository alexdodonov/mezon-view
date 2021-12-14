<?php
namespace Mezon\Tests\View;

use Mezon\HtmlTemplate\HtmlTemplate;
use PHPUnit\Framework\TestCase;
use Mezon\Tests\TestingView;
use Mezon\Tests\TestingViewUnexistingDefault;

/**
 * Test cases for the view
 *
 * @psalm-suppress PropertyNotSetInConstructor
 */
class ViewUnitTest extends TestCase
{

    /**
     * Testing constructor
     */
    public function testConstructor(): void
    {
        // setup
        $view = new TestingView(null, 'test');

        // test body and assertions
        $this->assertEquals('test', $view->getViewName(), 'Invalid constructor call');
    }

    /**
     * Testing render
     */
    public function testRender(): void
    {
        // setup
        $view = new TestingView(null, 'test');

        // test body and assertions
        $this->assertEquals('rendered content', $view->render(), 'Invalid view renderring');
        $this->assertEquals('rendered content 2', $view->render('test2'), 'Invalid view renderring');
    }

    /**
     * Testing render
     */
    public function testUnexistingDefault(): void
    {
        // setup
        $view = new TestingViewUnexistingDefault();

        // assertions
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('View "Default" was not found');
        $this->expectExceptionCode(- 1);

        // test body
        $view->render();
    }

    /**
     * Testing method setErrorCode
     */
    public function testSetErrorCode(): void
    {
        // setup
        $view = new TestingView(new HtmlTemplate(__DIR__ . '/../Res/'));

        // test body
        $view->setErrorCode(111);

        // assertions
        $this->assertEquals(111, $view->getErrorCode());
        $this->assertEquals(111, $view->getTemplate()
            ->getPageVar(TestingView::ERROR_CODE));
    }
}

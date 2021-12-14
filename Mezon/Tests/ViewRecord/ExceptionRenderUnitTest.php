<?php
namespace Mezon\Tests\ViewRecord;

use Mezon\HtmlTemplate\HtmlTemplate;
use PHPUnit\Framework\TestCase;
use Mezon\Router\Router;
use Mezon\Transport\Request;
use Mezon\Tests\TestingView;
use Mezon\Tests\TestingModel;

/**
 * Test cases for the record view
 *
 * @psalm-suppress PropertyNotSetInConstructor
 */
class ExceptionRenderUnitTest extends TestCase
{

    /**
     *
     * {@inheritdoc}
     * @see TestCase::setUp()
     */
    protected function setUp(): void
    {
        $_GET['id'] = 1;
    }

    /**
     * Testing exception
     */
    public function testExceptionForUnexistringModel(): void
    {
        // assertions
        $this->expectException(\Exception::class);
        $this->expectExceptionCode(- 1);
        $this->expectExceptionMessage('Model class name was not defined');

        // setup
        $view = new TestingView(new HtmlTemplate(__DIR__ . '/../Res/'));

        // test body
        $view->viewRecord();
    }

    /**
     * Testing exception
     */
    public function testExceptionForUnexistringTemplate(): void
    {
        // assertions
        $this->expectException(\Exception::class);
        $this->expectExceptionCode(- 1);
        $this->expectExceptionMessage('Template name was not defined');

        // setup
        $view = new TestingView(new HtmlTemplate(__DIR__ . '/../Res/'));
        $view->setViewParameter('model', TestingModel::class);

        // test body
        $view->viewRecord();
    }
}

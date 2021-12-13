<?php
namespace Mezon\View\Tests;

use Mezon\HtmlTemplate\HtmlTemplate;
use PHPUnit\Framework\TestCase;
use Mezon\Router\Router;
use Mezon\Transport\Request;

/**
 * Test cases for the record view
 *
 * @psalm-suppress PropertyNotSetInConstructor
 */
class ViewRecordUnitTest extends TestCase
{

    /**
     * Path to resources
     *
     * @var string
     */
    const RES_DIR = __DIR__ . '/Res/';

    /**
     * Default setup
     */
    public static function setUpBeforeClass(): void
    {
        $_GET['id'] = 1;
    }

    /**
     * Data provider for the test testViewRecordForm
     *
     * @return array testing data
     */
    public function viewRecordFormDataProvider(): array
    {
        return [
            # 0, success path
            [
                function () {
                    $view = new TestingView(new HtmlTemplate(ViewRecordUnitTest::RES_DIR));

                    $view->setViewParameter('model', TestingModel::class);
                    $view->setViewParameter('id-field-name', 'id');
                    $view->setViewParameter('template', 'single-record');
                    $view->setViewParameter('get-record-function', 'getById');

                    return $view;
                }
            ],
            # 1, default values
            [
                function () {
                    $view = new TestingView(new HtmlTemplate(ViewRecordUnitTest::RES_DIR));

                    $view->setViewParameter('model', TestingModel::class);
                    $view->setViewParameter('template', 'single-record');

                    return $view;
                }
            ],
        ];
    }

    /**
     * Testing view record form
     *
     * @param callable():TestingView $setup
     *            setup method
     * @dataProvider viewRecordFormDataProvider
     */
    public function testViewRecordForm(callable $setup): void
    {
        // setup
        $router = new Router();
        Request::registerRouter($router);
        $view = $setup();

        // test body
        $result = $view->viewRecord();

        // assertions
        $this->assertStringContainsString('some title', $result);
    }

    /**
     * Data provider for the test testExceptions
     *
     * @return array testing data
     */
    public function exceptionsDataProvider(): array
    {
        return [
            # 0, model class name is not defined
            [
                function () {
                    return new TestingView(new HtmlTemplate(ViewRecordUnitTest::RES_DIR));
                }
            ],
            # 1, template name is not defined
            [
                function () {
                    $view = new TestingView(new HtmlTemplate(ViewRecordUnitTest::RES_DIR));

                    $view->setViewParameter('model', TestingModel::class);

                    return $view;
                }
            ]
        ];
    }

    /**
     * Testing exceptions
     *
     * @param callable():TestingView $setup
     *            setup method
     * @dataProvider exceptionsDataProvider
     */
    public function testExceptions(callable $setup): void
    {
        // assertions
        $this->expectException(\Exception::class);

        // setup
        $view = $setup();

        // test body
        $view->viewRecord();
    }
}

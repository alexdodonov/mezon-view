<?php
namespace Mezon\Tests\ViewRecord;

use Mezon\HtmlTemplate\HtmlTemplate;
use PHPUnit\Framework\TestCase;
use Mezon\Router\Router;
use Mezon\Transport\Request;
use Mezon\Tests\TestingModel;
use Mezon\Tests\TestingView;
use Mezon\Conf\Conf;

/**
 * Test cases for the record view
 *
 * @psalm-suppress PropertyNotSetInConstructor
 */
class SuccessRenderUnitTest extends TestCase
{

    /**
     *
     * {@inheritdoc}
     * @see TestCase::setUp()
     */
    protected function setUp(): void
    {
        // TODO move to the base class
        $_GET['id'] = 1;
        Conf::setConfigStringValue('headers/layer', 'mock');
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
                    $view = new TestingView(new HtmlTemplate(__DIR__ . '/../Res/'));

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
                    $view = new TestingView(new HtmlTemplate(__DIR__ . '/../Res/'));

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
}

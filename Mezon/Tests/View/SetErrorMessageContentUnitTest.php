<?php
namespace Mezon\Tests\View;

use PHPUnit\Framework\TestCase;
use Mezon\Tests\TestingView;
use Mezon\Tests\TestingTemplate;
use Mezon\Conf\Conf;

/**
 * Test cases for the view
 *
 * @psalm-suppress PropertyNotSetInConstructor
 */
class SetErrorMessageContentUnitTest extends TestCase
{

    /**
     *
     * {@inheritdoc}
     * @see TestCase::setUp()
     */
    protected function setUp(): void
    {
        unset($_GET['success-message']);
        unset($_GET['error-message']);
        Conf::setConfigStringValue('headers/layer', 'mock');
    }

    /**
     *
     * {@inheritdoc}
     * @see TestCase::tearDown()
     */
    protected function tearDown(): void
    {
        unset($_GET['success-message']);
        unset($_GET['error-message']);
    }

    /**
     * Testing method setErrorMessageContent
     */
    public function testSetErrorMessageContent(): void
    {
        // setup
        $view = new TestingView(new TestingTemplate(__DIR__ . '/../Res'));

        // test body
        $view->setErrorMessageContent('error-message');

        // assertions
        $this->assertEquals('em: error message', $view->getTemplate()
            ->getPageVar('action-message'));
    }

    /**
     * Testing stetting error message from $_GET
     */
    public function testSetErrorMessageContentFromGet(): void
    {
        // setup
        $_GET['error-message'] = 'error-message';
        $view = new TestingView(new TestingTemplate(__DIR__ . '/../Res'));

        // test body
        $view->render('Test');

        // assertions
        $this->assertEquals('em: error message', $view->getTemplate()
            ->getPageVar('action-message'));
    }
}

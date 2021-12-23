<?php
namespace Mezon\Tests\View;

use PHPUnit\Framework\TestCase;
use Mezon\Tests\TestingView;
use Mezon\Tests\TestingTemplate;

/**
 * Test cases for the view
 *
 * @psalm-suppress PropertyNotSetInConstructor
 */
class SetSuccessMessageContentUnitTest extends TestCase
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
     * Testing method setSuccessMessageContent
     */
    public function testSetSuccessMessageContent(): void
    {
        // setup
        $view = new TestingView(new TestingTemplate(__DIR__ . '/../Res'));

        // test body
        $view->setSuccessMessageContent('success-message');

        // assertions
        $this->assertEquals('sm: success message', $view->getTemplate()
            ->getPageVar('action-message'));
    }

    /**
     * Testing stetting success message from $_GET
     */
    public function testSetSuccessMessageContentFromGet(): void
    {
        // setup
        $_GET['success-message'] = 'success-message';
        $view = new TestingView(new TestingTemplate(__DIR__ . '/../Res'));

        // test body
        $view->render('Test');

        // assertions
        $this->assertEquals('sm: success message', $view->getTemplate()
            ->getPageVar('action-message'));
    }
}

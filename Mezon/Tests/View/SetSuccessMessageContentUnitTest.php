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
}
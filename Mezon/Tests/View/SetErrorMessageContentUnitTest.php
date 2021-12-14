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
class SetErrorMessageContentUnitTest extends TestCase
{

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
}

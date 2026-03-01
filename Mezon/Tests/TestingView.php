<?php
namespace Mezon\Tests;

use Mezon\View;
use Mezon\HtmlTemplate\HtmlTemplate;
use Mezon\Views\ViewRecordTrait;

/**
 * View class for testing purposes
 *
 * @author Dodonov A.A.
 */
class TestingView extends View
{

    use ViewRecordTrait;

    public function __construct(?HtmlTemplate $template = null, string $viewName = 'default')
    {
        parent::__construct($template, $viewName);
    }

    /**
     *
     * @psalm-suppress PossiblyUnusedMethod
     * @return string
     */
    public function viewTest(): string
    {
        return 'rendered content';
    }

    /**
     *
     * @psalm-suppress PossiblyUnusedMethod
     * @return string
     */
    public function viewTest2(): string
    {
        return 'rendered content 2';
    }

    /**
     *
     * @psalm-suppress PossiblyUnusedMethod
     * @return string
     */
    public function viewTest3(): string
    {
        return 'View rendered content';
    }

    /**
     * Was the default view called
     *
     * @var boolean
     */
    public static $defaultViewWasRendered = false;

    /**
     *
     * @psalm-suppress PossiblyUnusedMethod
     * @return string
     */
    public function viewDefault(): string
    {
        self::$defaultViewWasRendered = true;

        return 'Default';
    }

    /**
     *
     * @psalm-suppress PossiblyUnusedMethod
     * @return string
     */
    public function viewMainFromConfig(): string
    {
        return 'Main From Config';
    }
}

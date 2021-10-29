<?php
namespace Mezon\Application;

/**
 * Interface ViewInterface
 *
 * @package Application
 * @subpackage ViewInterface
 * @author Dodonov A.A.
 * @version v.1.0 (2020/01/12)
 * @copyright Copyright (c) 2020, aeon.org
 */

/**
 * Base interface for all views
 */
interface ViewInterface
{

    /**
     * Method renders content from view
     *
     * @param string $viewName
     *            View name to be rendered
     * @return string Generated content
     */
    public function render(string $viewName = ''): string;

    /**
     * Method returns view name
     *
     * @return string view name
     */
    public function getViewName(): string;

    /**
     * Method returns code of the last error
     *
     * @return int code of the last error
     */
    public function getErrorCode(): int;

    /**
     * Method sets code of the last error
     *
     * @param int $code
     *            code of the last error
     * @codeCoverageIgnore
     */
    public function setErrorCode(int $errorCode): void;

    /**
     * Method return last error message
     *
     * @return string last error message
     */
    public function getErrorMessage(): string;

    /**
     * Method sets last error message
     *
     * @param
     *            string last error message
     * @codeCoverageIgnore
     */
    public function setErrorMessage(string $errorMessage): void;

    /**
     * Method sets last success message
     *
     * @param
     *            string last success message
     * @codeCoverageIgnore
     */
    public function setSuccessMessage(string $successMessage): void;

    /**
     * Method return last success message
     *
     * @return string last success message
     */
    public function getSuccessMessage(): string;

    /**
     * Method sets view's var
     *
     * @param string $name
     *            var name
     * @param mixed $value
     *            var value
     * @param bool $setTemplateVar
     *            do we need to set template parameter
     */
    public function setViewParameter(string $name, $value, bool $setTemplateVar): void;

    /**
     * Method sets view's var
     *
     * @param string $name
     *            var name
     * @return mixed view's variable value
     */
    public function getViewParameter(string $name);
}

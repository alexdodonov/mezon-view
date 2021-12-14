<?php
namespace Mezon\Tests;

use Mezon\HtmlTemplate\HtmlTemplate;

/**
 * Template class for testing purposes
 *
 * @author Dodonov A.A.
 */
class TestingTemplate extends HtmlTemplate
{

    /**
     * Method sets success action message
     *
     * @param string $successMessage
     *            success message
     * @return string compiled success message
     */
    protected function getSuccessMessageContent(string $successMessage): string
    {
        return 'sm: ' . $successMessage;
    }

    /**
     * Method sets error action message
     *
     * @param string $errorMessage
     *            error message
     * @return string compiled error message
     */
    protected function getErrorMessageContent(string $errorMessage): string
    {
        return 'em: ' . $errorMessage;
    }
}

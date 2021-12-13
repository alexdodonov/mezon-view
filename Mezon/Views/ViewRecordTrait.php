<?php
namespace Mezon\Views;

use Mezon\TemplateEngine\TemplateEngine;
use Mezon\HtmlTemplate\HtmlTemplate;
use Mezon\Transport\Request;

/**
 * Trait ViewRecordTrait
 *
 * @package Mezon
 * @subpackage View
 * @author Dodonov A.A.
 * @version v.1.0 (2020/12/02)
 * @copyright Copyright (c) 2020, aeon.org
 */

/**
 * Default view for displaying record
 */
trait ViewRecordTrait
{

    /**
     * Method sets view's var
     *
     * @param string $name
     *            var name
     * @param mixed $default
     *            default value for unexisting parameter
     * @return mixed view's variable value
     */
    public abstract function getViewParameter(string $name, $default = null);

    /**
     * Method returns template
     *
     * @return HtmlTemplate template
     */
    public abstract function getTemplate(): HtmlTemplate;

    /**
     * Default view for displaying single record
     *
     * @return string
     */
    public function viewRecord(): string
    {
        $modelClass = (string) $this->getViewParameter('model');
        if ($modelClass === '') {
            throw (new \Exception('Model class name was not defined', - 1));
        }

        $fieldName = (string) $this->getViewParameter('id-field-name', 'id');

        $template = (string) $this->getViewParameter('template');
        if ($template === '') {
            throw (new \Exception('Template name was not defined', - 1));
        }

        $method = (string) $this->getViewParameter('get-record-function', 'getById');

        $model = new $modelClass();

        /**
         *
         * @psalm-var mixed $record result of the model
         */
        $record = call_user_func([
            $model,
            $method
        ], Request::getParam($fieldName));

        if (is_array($record) || is_object($record)) {
            return TemplateEngine::printRecord($this->getTemplate()->getBlock($template), $record);
        }

        throw (new \Exception($modelClass . '->' . $method . ' must return object or array', - 1));
    }
}

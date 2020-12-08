<?php
namespace Mezon\Application\Views;

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
        $modelClass = $this->getViewParameter('model');
        if ($modelClass === null) {
            throw (new \Exception('Model class name was not defined', - 1));
        }

        $fieldName = $this->getViewParameter('id-field-name', 'id');

        $template = $this->getViewParameter('template');
        if ($template === null) {
            throw (new \Exception('Template name was not defined', - 1));
        }

        $method = $this->getViewParameter('get-record-function', 'getById');

        $model = new $modelClass();

        $record = $model->$method(Request::getParam($fieldName));

        return TemplateEngine::printRecord($this->getTemplate()->getBlock($template), $record);
    }
}

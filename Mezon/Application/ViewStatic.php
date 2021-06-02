<?php
namespace Mezon\Application;

use Mezon\HtmlTemplate\HtmlTemplate;

/**
 * Class ViewStatic
 *
 * @package Mezon
 * @subpackage View
 * @author Dodonov A.A.
 * @version v.1.0 (2019/08/06)
 * @copyright Copyright (c) 2019, aeon.org
 */

/**
 * Class outputs static block by it's name
 */
class ViewStatic extends ViewBase
{

    /**
     * Block name
     *
     * @var string
     */
    private $blockName = '';

    /**
     * Constructor
     *
     * @param HtmlTemplate $template
     *            template
     * @param string $blockName
     *            View's block name to be rendered
     */
    public function __construct(HtmlTemplate $template, string $blockName = '')
    {
        parent::__construct($template);

        $this->blockName = $blockName;
    }

    /**
     *
     * {@inheritdoc}
     * @see \Mezon\Application\ViewInterface::render()
     */
    public function render(string $viewName = ''): string
    {
        if ($viewName === '') {
            $viewName = $this->blockName;
        }

        if ($viewName === '') {
            throw (new \Exception('Block name must be set', - 1));
        }

        $content = $this->getTemplate()->getBlock($viewName);

        $this->getTemplate()->compilePageVars($content);

        return $content;
    }

    /**
     * Method returns view name
     *
     * @return string view name
     */
    public function getViewName(): string
    {
        return $this->blockName;
    }
}

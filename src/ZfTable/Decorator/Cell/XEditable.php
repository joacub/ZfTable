<?php
/**
 * ZfTable ( Module for Zend Framework 2)
 *
 * @copyright Copyright (c) 2013 Piotr Duda dudapiotrek@gmail.com
 * @license   MIT License
 */

namespace ZfTable\Decorator\Cell;

use Nette\Diagnostics\Debugger;
use ZfTable\Decorator\Exception;

class XEditable extends AbstractCellDecorator
{

    /**
     * Array of variable attribute for link
     * @var array
     */
    protected $vars;

    /**
     * Link url
     * @var string
     */
    protected $url;


    /**
     * Rendering decorator
     * @param string $context
     * @return string
     */
    public function render($context)
    {

        $cell = $this->getCell();
        $cell->addClass('xeditable');
        $cell->addAttr('data-column', $cell->getHeader()->getName());
        $row = $cell->getActualRow();
        if(is_object($row)) {
            $pk = $row->getId();
        } else {
            $pk = $row['id'];
        }
        return sprintf('<a id="%s" data-pk="%d" data-url="%s" data-type="text" data-title="Edita %s"  href="#">%s</a>', $cell->getHeader()->getName(), $pk, $cell->getTable()->getOptions()->getRowAction(), $cell->getHeader()->getName(), $context);
    }
}

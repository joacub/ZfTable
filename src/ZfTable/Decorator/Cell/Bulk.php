<?php
/**
 * ZfTable ( Module for Zend Framework 2)
 *
 * @copyright Copyright (c) 2013 Piotr Duda dudapiotrek@gmail.com
 * @license   MIT License
 */

namespace ZfTable\Decorator\Cell;

use ZfTable\Decorator\Exception;

class Bulk extends AbstractCellDecorator
{

    /**
     * Array of variable attribute for link
     * @var array
     */
    protected $vars = ['id'];

    /**
     * Constructor
     *
     * @param array $options
     * @throws Exception\InvalidArgumentException
     */
    public function __construct(array $options = array())
    {
        if (isset($options['vars'])) {
            $this->vars = is_array($options['vars']) ? $options['vars'] : array($options['vars']);
        }
    }

    /**
     * Rendering decorator
     * @param string $context
     * @return string
     */
    public function render($context)
    {
        $values = array();
        if (count($this->vars)) {
            $actualRow = $this->getCell()->getActualRow();

            $getter = false;
            if(is_object($actualRow)) {
                $getter = true;
            }

            if($getter) {
                foreach ($this->vars as $var) {
                    $getter = 'get' . ucfirst($var);
                    $id = $actualRow->$getter();
                }
            } else {
                foreach ($this->vars as $var) {
                    $id = $actualRow[$var];
                }
            }

        }
        return sprintf('<input type="checkbox" class="checkbox bulkactions" name="bulkZfTable[]"  value="%s"/>', $id);
    }
}

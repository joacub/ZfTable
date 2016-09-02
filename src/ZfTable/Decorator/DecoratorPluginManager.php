<?php
/**
 * ZfTable ( Module for Zend Framework 2)
 *
 * @copyright Copyright (c) 2013 Piotr Duda dudapiotrek@gmail.com
 * @license   MIT License
 */

namespace ZfTable\Decorator;

use Zend\ServiceManager\AbstractPluginManager;
use Zend\ServiceManager\Factory\InvokableFactory;

class DecoratorPluginManager extends AbstractPluginManager
{

    /**
     * Default set of helpers
     *
     * @var array
     */
    protected $aliases = array(

        'cellattr' => 'ZfTable\Decorator\Cell\AttrDecorator',
        'cellvarattr' => 'ZfTable\Decorator\Cell\VarAttrDecorator',
        'cellclass' => 'ZfTable\Decorator\Cell\ClassDecorator',
        'cellicon' => 'ZfTable\Decorator\Cell\Icon',
        'cellmapper' => 'ZfTable\Decorator\Cell\Mapper',
        'celllink' => 'ZfTable\Decorator\Cell\Link',
        'celltemplate' => 'ZfTable\Decorator\Cell\Template',
        'celleditable' => 'ZfTable\Decorator\Cell\Editable',
        'cellxeditable' => 'ZfTable\Decorator\Cell\XEditable',
        'cellbulk' => 'ZfTable\Decorator\Cell\Bulk',
        'cellcallable' => 'ZfTable\Decorator\Cell\CallableDecorator',


        'rowclass' => 'ZfTable\Decorator\Row\ClassDecorator',
        'rowvarattr' => 'ZfTable\Decorator\Row\VarAttr',
        'rowseparatable' => 'ZfTable\Decorator\Row\Separatable',
    );

    protected $factories = [
         'ZfTable\Decorator\Cell\AttrDecorator' => InvokableFactory::class,
         'ZfTable\Decorator\Cell\VarAttrDecorator' => InvokableFactory::class,
         'ZfTable\Decorator\Cell\ClassDecorator' => InvokableFactory::class,
         'ZfTable\Decorator\Cell\Icon' => InvokableFactory::class,
         'ZfTable\Decorator\Cell\Mapper' => InvokableFactory::class,
         'ZfTable\Decorator\Cell\Link' => InvokableFactory::class,
         'ZfTable\Decorator\Cell\Template' => InvokableFactory::class,
         'ZfTable\Decorator\Cell\Editable' => InvokableFactory::class,
         'ZfTable\Decorator\Cell\XEditable' => InvokableFactory::class,
         'ZfTable\Decorator\Cell\Bulk' => InvokableFactory::class,
         'ZfTable\Decorator\Cell\CallableDecorator' => InvokableFactory::class,
         'ZfTable\Decorator\Row\ClassDecorator' => InvokableFactory::class,
         'ZfTable\Decorator\Row\VarAttr' => InvokableFactory::class,
         'ZfTable\Decorator\Row\Separatable' => InvokableFactory::class,
     ];

    /**
     * Don't share header by default
     *
     * @var bool
     */
    protected $shareByDefault = false;

    /**
     * @param mixed $plugin
     */
    public function validate($plugin)
    {
        if ($plugin instanceof AbstractDecorator) {
            return;
        }
        throw new \DomainException('Invalid Decorator Implementation');
    }
}

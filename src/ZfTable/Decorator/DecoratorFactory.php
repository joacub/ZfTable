<?php
/**
 * ZfTable ( Module for Zend Framework 2)
 *
 * @copyright Copyright (c) 2013 Piotr Duda dudapiotrek@gmail.com
 * @license   MIT License
 */

namespace ZfTable\Decorator;

use Interop\Container\ContainerInterface;

class DecoratorFactory
{

    /**
     * The decorator manger
     *
     * @var null|DecoratorPluginManager
     */
    protected static $decoratorManager = null;

    protected static $container = null;

    const CELL_PREFIX = 'cell';
    const HEADER_PREFIX = 'header';
    const ROW_PREFIX = 'row';

    public static function setContainer(ContainerInterface $container)
    {

        self::$container = $container;
    }

    /**
     *
     * @param string $name
     * @param array $options
     * @return AbstractDecorator
     */
    public static function factoryCell($name, $options)
    {
        $decorator = static::getPluginManager()->get(self::CELL_PREFIX . $name, $options);
        return $decorator;
    }

    /**
     *
     * @param string $name
     * @param array $options
     * @return AbstractDecorator
     */
    public static function factoryRow($name, $options)
    {
        $decorator = static::getPluginManager()->get(self::ROW_PREFIX . $name, $options);
        return $decorator;
    }

    /**
     *
     * @param string $name
     * @param array $options
     * @return AbstractDecorator
     */
    public static function factoryHeader($name, $options)
    {
        $decorator = static::getPluginManager()->get(self::HEADER_PREFIX . $name, $options);
        return $decorator;
    }

    /**
     * Get the pattern plugin manager
     *
     * @return DecoratorPluginManager
     */
    public static function getPluginManager()
    {
        if (static::$decoratorManager === null) {
            static::$decoratorManager = new DecoratorPluginManager(self::$container);
        }
        return static::$decoratorManager;
    }
}

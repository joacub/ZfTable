<?php
/**
 * ZfTable ( Module for Zend Framework 2)
 *
 * @copyright Copyright (c) 2013 Piotr Duda dudapiotrek@gmail.com
 * @license   MIT License
 */
namespace ZfTable\Options;

use Zend\Stdlib\AbstractOptions;
use Nette\Diagnostics\Debugger;

class ModuleOptions extends AbstractOptions implements TableOptionsInterface, DataTableInterface, RenderInterface, PaginatorInterface
{

    /**
     * Name of table
     * 
     * @var null | string
     */
    protected $name = '';

    /**
     * Show or hide pagination view
     * 
     * @var boolean
     */
    protected $showPagination = true;

    /**
     * Show or hide quick search view
     *
     * @var boolean
     */
    protected $showQuickSearch = false;

    /**
     * Show or hide quick search view
     *
     * @var boolean
     */
    protected $showQuickEdit = false;

    /**
     * Show or hide item per page view
     * 
     * @var boolean
     */
    protected $showItemPerPage = true;

    /**
     * Show or hide item per page view
     *
     * @var array
     */
    protected $bulkActions = ['select-all' => ['label' => 'Select all', 'icon' => 'fa-check-square'], 'unselect-all' => ['label' => 'Unselect All', 'icon' => 'fa-check-square-o'], 'separator', 'delete' => ['label' => 'Delete', 'icon' => 'fa-trash']];

    /**
     * Show or hide item per page view
     *
     * @var boolean
     */
    protected $showBulkActions = true;

    /**
     * Show or hide item per page view
     *
     * @var boolean
     */
    protected $showHeadingTitle = true;

    /**
     *
     * @todo item and default count per page
     *       Default value for item count per page
     * @var int
     */
    protected $itemCountPerPage = 10;

    /**
     * Flag to show row with filters (for each column)
     * 
     * @var boolean
     */
    protected $showColumnFilters = false;

    /**
     * Flag to show row with filters (for each column)
     *
     * @var boolean
     */
    protected $showColumnFiltersInHeader = false;

    /**
     * Definition of
     * 
     * @var string | boolean
     */
    protected $rowAction = false;

    /**
     * Show or hide exporter to CSV
     * 
     * @var boolean
     */
    protected $showExportToCSV = false;

    /**
     * Value to specify items per page (pagination)
     * 
     * @var array
     */
    protected $valuesOfItemPerPage = array(
        5,
        10,
        20,
        50,
        100
    );

    /**
     * Get maximal rows to returning.
     * Data tables can use
     * pagination, but also can get data by ajax, and use
     * java script to pagination (and variable destiny for this case)
     *
     * @var int
     */
    protected $dataTablesMaxRows = 999;

    /**
     * Template Map
     * 
     * @var array
     */
    protected $templateMap = array();

    protected $defaultItemCountPerPage = 10;

    public function __construct($options = null)
    {
        $this->templateMap = array(
            'paginator-slide' => __DIR__ . '/../../../view/templates/slide-paginator.phtml',
            'default-params' => __DIR__ . '/../../../view/templates/default-params.phtml',
            'container' => __DIR__ . '/../../../view/templates/container-b3.phtml',
            'data-table-init' => __DIR__ . '/../../../view/templates/data-table-init.phtml',
            'custom-b2' => __DIR__ . '/../../../view/templates/custom-b2.phtml',
            'custom-b3' => __DIR__ . '/../../../view/templates/custom-b3.phtml'
        );
        
        parent::__construct($options);
    }

    /**
     * @return array
     */
    public function getBulkActions()
    {
        return $this->bulkActions;
    }

    /**
     * @param array $bulkActions
     */
    public function setBulkActions($bulkActions)
    {
        $this->bulkActions = $bulkActions;
    }

    /**
     * @return boolean
     */
    public function isShowBulkActions()
    {
        return $this->showBulkActions;
    }

    /**
     * @return boolean
     */
    public function isShowHeadingTitle()
    {
        return $this->showHeadingTitle;
    }

    /**
     * @param boolean $showBulkActions
     */
    public function setShowBulkActions($showBulkActions)
    {
        $this->showBulkActions = $showBulkActions;
    }


    public function getShowExportToCSV()
    {
        return $this->showExportToCSV;
    }

    public function setShowExportToCSV($showExportToCSV)
    {
        $this->showExportToCSV = $showExportToCSV;
    }

    /**
     * Set template map
     * 
     * @param array $templateMap            
     */
    public function setTemplateMap($templateMap)
    {
        $this->templateMap = $templateMap;
    }

    /**
     * Set template map
     *
     * @return array
     */
    public function getTemplateMap()
    {
        return $this->templateMap;
    }

    /**
     * Get maximal rows to returning
     *
     * @return int
     */
    public function getDataTablesMaxRows()
    {
        return $this->dataTablesMaxRows;
    }

    /**
     * Set maximal rows to returning.
     *
     * @param int $dataTablesMaxRows            
     * @return $this
     */
    public function setDataTablesMaxRows($dataTablesMaxRows)
    {
        $this->dataTablesMaxRows = $dataTablesMaxRows;
        return $this;
    }

    /**
     * Get Array of values to set items per page
     * 
     * @return array
     */
    public function getValuesOfItemPerPage()
    {
        return $this->valuesOfItemPerPage;
    }

    /**
     *
     * Set Array of values to set items per page
     *
     * @param array $valuesOfItemPerPage            
     * @return $this
     */
    public function setValuesOfItemPerPage($valuesOfItemPerPage)
    {
        $this->valuesOfItemPerPage = $valuesOfItemPerPage;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getShowPagination()
    {
        return $this->showPagination;
    }

    public function getShowQuickSearch()
    {
        return $this->showQuickSearch;
    }

    public function getShowQuickEdit()
    {
        return $this->showQuickEdit;
    }

    public function getShowItemPerPage()
    {
        return $this->showItemPerPage;
    }

    public function getItemCountPerPage()
    {
        return $this->itemCountPerPage;
    }

    public function getShowColumnFilters()
    {
        return $this->showColumnFilters;
    }

    public function getRowAction()
    {
        return $this->rowAction;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setShowPagination($showPagination)
    {
        $this->showPagination = $showPagination;
    }

    public function setShowQuickSearch($showQuickSearch)
    {
        $this->showQuickSearch = $showQuickSearch;
    }

    public function setShowQuickEdit($showQuickEdit)
    {
        $this->showQuickEdit = $showQuickEdit;
    }

    public function setShowHeadingTitle($showHeadingTitle)
    {
        $this->showHeadingTitle = $showHeadingTitle;
    }

    public function setShowItemPerPage($showItemPerPage)
    {
        $this->showItemPerPage = $showItemPerPage;
    }

    public function setItemCountPerPage($itemCountPerPage)
    {
        $this->itemCountPerPage = $itemCountPerPage;
    }

    public function setShowColumnFilters($showColumnFilters)
    {
        $this->showColumnFilters = $showColumnFilters;
    }

    public function setRowAction($rowAction)
    {
        $this->rowAction = $rowAction;
    }

    /**
     *
     * @return the $defaultItemCountPerPage
     */
    public function getDefaultItemCountPerPage()
    {
        return $this->defaultItemCountPerPage;
    }

    /**
     *
     * @param number $defaultItemCountPerPage            
     */
    public function setDefaultItemCountPerPage($defaultItemCountPerPage)
    {
        $this->defaultItemCountPerPage = $defaultItemCountPerPage;
    }

    /**
     * @return boolean
     */
    public function getShowColumnFiltersInHeader()
    {
        return $this->showColumnFiltersInHeader;
    }

    /**
     * @param boolean $showColumnFiltersInHeader
     */
    public function setShowColumnFiltersInHeader($showColumnFiltersInHeader)
    {
        $this->showColumnFiltersInHeader = $showColumnFiltersInHeader;
    }



}

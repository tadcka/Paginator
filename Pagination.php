<?php

/*
 * This file is part of the Tadcka package.
 *
 * (c) Tadcka <tadcka89@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tadcka\Component\Paginator;

/**
 * @author Tadas Gliaubicas <tadcka89@gmail.lt>
 *
 * @since 1/26/14 5:19 PM
 */
class Pagination
{
    /**
     * @var int
     */
    private $totalItems;

    /**
     * @var int
     */
    private $currentPage;

    /**
     * @var int
     */
    private $itemsPerPage;

    /**
     * @var int
     */
    private $offset = 0;

    /**
     * @var int
     */
    private $itemsInPage = 0;

    /**
     * @var int
     */
    private $totalPages = 1;

    /**
     * Constructor.
     *
     * @param int $totalItems
     * @param int $currentPage
     * @param int $itemsPerPage
     */
    public function __construct($totalItems, $currentPage = 1, $itemsPerPage = 30)
    {
        $this->totalItems = $totalItems;
        $this->itemsPerPage = $itemsPerPage;
        $this->currentPage = $currentPage;

        $this->int();
    }

    /**
     * Initialize.
     */
    private function int()
    {
        if (0 !== $this->totalItems) {
            $this->totalPages = (int)($this->totalItems / $this->itemsPerPage);
            $leftItems = $this->totalItems % $this->itemsPerPage;

            if (0 < $leftItems) {
                $this->totalPages += 1;
            }

            if (($this->currentPage - 1) > $this->totalPages) {
                $this->currentPage = $this->totalPages;
            }

            if (1 > $this->currentPage) {
                $this->currentPage = 1;
            }

            $this->offset = ($this->currentPage - 1) * $this->itemsPerPage;

            if ($this->currentPage === $this->totalPages && $leftItems > 0) {
                $this->itemsInPage = $leftItems;
            } else {
                $this->itemsInPage = $this->itemsPerPage;
            }
        }
    }

    /**
     * Get total items.
     *
     * @return int
     */
    public function getTotalItems()
    {
        return $this->totalItems;
    }

    /**
     * Get items per page.
     *
     * @return int
     */
    public function getItemsPerPage()
    {
        return $this->itemsPerPage;
    }

    /**
     * Get current page.
     *
     * @return int
     */
    public function getCurrentPage()
    {
        return $this->currentPage;
    }

    /**
     * Get total pages.
     *
     * @return int
     */
    public function getTotalPages()
    {
        return $this->totalPages;
    }

    /**
     * Get items in page.
     *
     * @return int
     */
    public function getItemsInPage()
    {
        return $this->itemsInPage;
    }

    /**
     * Get first item offset.
     *
     * @return int
     */
    public function getOffset()
    {
        return $this->offset;
    }

    /**
     * Is this page last.
     *
     * @return bool
     */
    public function isLastPage()
    {
        return (int)$this->currentPage === (int)$this->totalPages;
    }

    /**
     * Is this page first.
     *
     * @return bool
     */
    public function isFirstPage()
    {
        return (int)$this->currentPage === 1;
    }
}

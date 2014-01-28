<?php

/*
 * This file is part of the Tadcka package.
 *
 * (c) Tadcka <tadcka89@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tadcka\Component\Paginator\Tests;

use Tadcka\Component\Paginator\Pagination;

/**
 * @author Tadas Gliaubicas <tadcka89@gmail.com>
 *
 * @since 1/26/14 5:44 PM
 */
class PaginationTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test empty paginator.
     */
    public function testEmptyPaginator()
    {
        $paginator = new Pagination(0, 1, 30);

        $this->assertEquals(1, $paginator->getCurrentPage());
        $this->assertEquals(0, $paginator->getItemsInPage());
        $this->assertEquals(30, $paginator->getItemsPerPage());
        $this->assertEquals(0, $paginator->getOffset());
        $this->assertEquals(0, $paginator->getTotalItems());
        $this->assertEquals(1, $paginator->getTotalPages());
        $this->assertTrue($paginator->isFirstPage());
        $this->assertTrue($paginator->isLastPage());
    }

    /**
     * Test paginator first page, is not full.
     */
    public function testPaginatorFirstPageIsNotFull()
    {
        $paginator = new Pagination(25, 1, 30);

        $this->assertEquals(1, $paginator->getCurrentPage());
        $this->assertEquals(25, $paginator->getItemsInPage());
        $this->assertEquals(30, $paginator->getItemsPerPage());
        $this->assertEquals(0, $paginator->getOffset());
        $this->assertEquals(25, $paginator->getTotalItems());
        $this->assertEquals(1, $paginator->getTotalPages());
        $this->assertTrue($paginator->isFirstPage());
        $this->assertTrue($paginator->isLastPage());
    }

    /**
     * Test paginator first page, is full.
     */
    public function testPaginatorFirstPageIsFull()
    {
        $paginator = new Pagination(50, 1, 30);

        $this->assertEquals(1, $paginator->getCurrentPage());
        $this->assertEquals(30, $paginator->getItemsInPage());
        $this->assertEquals(30, $paginator->getItemsPerPage());
        $this->assertEquals(0, $paginator->getOffset());
        $this->assertEquals(50, $paginator->getTotalItems());
        $this->assertEquals(2, $paginator->getTotalPages());
        $this->assertTrue($paginator->isFirstPage());
        $this->assertFalse($paginator->isLastPage());
    }

    /**
     * Test paginator second page, is not full.
     */
    public function testPaginatorSecondPageIsNotFull()
    {
        $paginator = new Pagination(50, 2, 30);

        $this->assertEquals(2, $paginator->getCurrentPage());
        $this->assertEquals(20, $paginator->getItemsInPage());
        $this->assertEquals(30, $paginator->getItemsPerPage());
        $this->assertEquals(30, $paginator->getOffset());
        $this->assertEquals(50, $paginator->getTotalItems());
        $this->assertEquals(2, $paginator->getTotalPages());
        $this->assertFalse($paginator->isFirstPage());
        $this->assertTrue($paginator->isLastPage());
    }

    /**
     * Test paginator second page, is full.
     */
    public function testPaginatorSecondPageIsFull()
    {
        $paginator = new Pagination(61, 2, 30);

        $this->assertEquals(2, $paginator->getCurrentPage());
        $this->assertEquals(30, $paginator->getItemsInPage());
        $this->assertEquals(30, $paginator->getItemsPerPage());
        $this->assertEquals(30, $paginator->getOffset());
        $this->assertEquals(61, $paginator->getTotalItems());
        $this->assertEquals(3, $paginator->getTotalPages());
        $this->assertFalse($paginator->isFirstPage());
        $this->assertFalse($paginator->isLastPage());
    }

    /**
     * Test paginator last page, is not full.
     */
    public function testPaginatorLastPageIsNotFull()
    {
        $paginator = new Pagination(61, 3, 30);

        $this->assertEquals(3, $paginator->getCurrentPage());
        $this->assertEquals(1, $paginator->getItemsInPage());
        $this->assertEquals(30, $paginator->getItemsPerPage());
        $this->assertEquals(60, $paginator->getOffset());
        $this->assertEquals(61, $paginator->getTotalItems());
        $this->assertEquals(3, $paginator->getTotalPages());
        $this->assertFalse($paginator->isFirstPage());
        $this->assertTrue($paginator->isLastPage());
    }
}

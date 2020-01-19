<?php

namespace Tests\Morebec\Collections;

use Morebec\Collections\ArrayCollection;
use PHPUnit\Framework\TestCase;

class ArrayCollectionTest extends TestCase
{
    public function test__construct()
    {
        $ac = new ArrayCollection();
        $this->assertNotNull($ac);
        $this->assertTrue($ac->isEmpty());
    }

    public function testContains()
    {
        $ac = new ArrayCollection();
        $element = 'I am contained';
        $ac->add($element);

        $this->assertTrue($ac->contains($element));
    }

    public function testRemove()
    {
        $ac = new ArrayCollection();
        $element = 'I am contained';
        $ac->add($element);
        $ac->remove($element);

        $this->assertFalse($ac->contains($element));
    }

    public function testToArray()
    {
        $arr = ['an item', 'another item'];
        $ac = new ArrayCollection($arr);
        $this->assertEquals($arr, $ac->toArray());
    }

    public function testLast()
    {
        $arr = ['first', 'middle', 'last'];
        $ac = new ArrayCollection($arr);
        $this->assertEquals('last', $ac->last());
    }

    public function testGetAt()
    {
        $arr = ['first', 'middle', 'last'];
        $ac = new ArrayCollection($arr);
        $this->assertEquals('middle', $ac->getAt(1));
    }

    public function testClear()
    {
        $arr = ['first', 'middle', 'last'];
        $ac = new ArrayCollection($arr);
        $ac->clear();
        $this->assertCount(0, $ac);
    }

    public function testRemoveAt()
    {
        $arr = ['first', 'middle', 'last'];
        $ac = new ArrayCollection($arr);
        $ac->removeAt(1);
        $this->assertCount(2, $ac);
    }

    public function testCount()
    {
        $arr = ['first', 'middle', 'last'];
        $ac = new ArrayCollection($arr);
        $this->assertCount(3, $ac);
    }

    public function testFirst()
    {
        $arr = ['first', 'middle', 'last'];
        $ac = new ArrayCollection($arr);
        $this->assertEquals('first', $ac->first());
    }

    public function testIsEmpty()
    {
        $ac = new ArrayCollection();
        $this->assertTrue($ac->isEmpty());

        $ac->add('No empty anymore');
        $this->assertFalse($ac->isEmpty());
    }

    public function testAdd()
    {
        $ac = new ArrayCollection();
        $ac->add('test');
        $this->assertTrue($ac->contains('test'));
    }
}

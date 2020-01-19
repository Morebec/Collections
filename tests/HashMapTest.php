<?php

namespace Tests\Morebec\Collections;

use Morebec\Collections\HashMap;
use PHPUnit\Framework\TestCase;

class HashMapTest extends TestCase
{
    public function test__construct()
    {
        $hm = new HashMap();
        $this->assertNotNull($hm);
        $this->assertEmpty($hm);
    }

    public function testGetSize()
    {
        $hm = new HashMap();
        $this->assertEquals(0, $hm->getSize());
        $hm->put('test', 'test');
        $this->assertEquals(1, $hm->getSize());
    }

    public function testGetOrDefault()
    {
        $hm = new HashMap();
        $this->assertEquals($hm->getOrDefault('not-there', 'default'), 'default');
    }

    public function testContainsKey()
    {
        $hm = new HashMap();
        $this->assertFalse($hm->containsKey('not-there'));

        $hm->put('Hello', '');
        $this->assertTrue($hm->containsKey('Hello'));
    }

    public function testGetValues()
    {
        $hm = new HashMap();
        $hm->put('key', 'value');

        $this->assertEquals(['value'], $hm->getValues());
    }

    public function testPutIfAbsent()
    {
        $hm = new HashMap();
        $hm->putIfAbsent('key', 'value');
        $hm->putIfAbsent('hey', 'new-val');
        $this->assertEquals('value', $hm->get('key'));
    }

    public function testIsEmpty()
    {
        $hm = new HashMap();
        $this->assertEmpty($hm);
    }

    public function testRemoveValue()
    {
        $hm = new HashMap();
        $hm->put('ok', 'v');
        $hm->removeValue('v');
        $this->assertFalse($hm->containsKey('ok'));
    }

    public function testGet()
    {
        $hm = new HashMap();
        $hm->put('key', 'value');
        $this->assertEquals('value', $hm->get('key'));
    }

    public function testToArray()
    {
        $hm = new HashMap();
        $hm->put('key', 'value');

        $this->assertEquals(['key' => 'value'], $hm->toArray());
    }

    public function testCurrent()
    {
        $array = ['key', 'value', 'key2', 'value2'];
        $hm = new HashMap($array);

        $this->assertSame(current($array), $hm->current());

        $hmNext = $hm->next();
        $arrayNext = next($array);

        $this->assertSame($arrayNext, $hmNext);
        $this->assertSame(key($array), $hm->key());
        $this->assertSame(current($array), $hm->current());

    }

    public function testRemove()
    {
        $hm = new HashMap(['key' => 'value']);
        $hm->remove('key');
        $this->assertCount(0, $hm);
    }

    public function testPut()
    {
        $hm = new HashMap();
        $hm->put('key', 'value');
        $this->assertCount(1, $hm);
    }

    public function testKey()
    {
        $array = ['key' => 'value'];
        $hm = new HashMap($array);
        $this->assertSame(key($array), $hm->key());
    }

    public function testClear()
    {
        $hm = new HashMap(['key' => 'value']);
        $hm->clear();
        $this->assertCount(0, $hm);
    }

    public function testGetIterator()
    {
        $hm = new HashMap(['key' => 'value']);
        $this->assertInstanceOf(\Iterator::class, $hm->getIterator());
    }

    public function testContainsValue()
    {
        $hm = new HashMap();
        $hm->put('key', 'value');
        $this->assertTrue($hm->containsValue('value'));
    }

    public function testGetKeys()
    {
        $hm = new HashMap(['key' => 'value']);
        $this->assertEquals(['key'], $hm->getKeys());
    }

    public function testNext()
    {
        $array = ['key', 'value', 'key2', 'value2'];
        $hm = new HashMap($array);
        $count = count($array);

        for ($i = 0; $i < $count; $i++)
        {
            $hmNext = $hm->next();
            $arrayNext = next($array);

            $this->assertSame($arrayNext, $hmNext);
            $this->assertSame(key($array), $hm->key());
            $this->assertSame(current($array), $hm->current());
        }

        $this->assertFalse($hm->next());
    }

    public function testCount()
    {
        $hm = new HashMap(['key' => 'value']);
        $this->assertEquals(1, $hm->count());
    }
}

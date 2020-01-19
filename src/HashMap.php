<?php


namespace Morebec\Collections;

use Doctrine\Common\Collections\ArrayCollection as DoctrineArrayCollection;

/**
 * Class HashMap
 */
class HashMap implements CollectionInterface
{
    /** @var DoctrineArrayCollection */
    private $map;

    public function __construct(array $data = [])
    {
        $this->map = new DoctrineArrayCollection($data);
    }

    /**
     * Insert a new value-key pair
     * @param string $key
     * @param $value
     */
    public function put(string $key, $value): void
    {
        $this->map->set($key, $value);
    }

    /**
     * If the given key is not already associated with a value, associates it with
     * the given value
     * @param string $key
     * @param mixed $value
     */
    public function putIfAbsent(string $key, $value): void
    {
        if ($this->containsValue($value)) {
            return;
        }

        $this->put($key, $value);
    }

    /**
     * Returns the value associated with key or null if none found
     * @param string $key
     * @return mixed|null
     */
    public function get(string $key)
    {
        return $this->map->get($key);
    }

    /**
     * Returns a value associated with a key or a default value if none was set for key
     * @param string $key
     * @param $default
     * @return mixed|null
     */
    public function getOrDefault(string $key, $default)
    {
        return $this->containsKey($key) ? $this->get($key) : $default;
    }

    /**
     * Removes a value with key
     * @param string $key
     */
    public function remove(string $key): void
    {
        $this->map->remove($key);
    }

    /**
     * Removes a value
     * @param $value
     */
    public function removeValue($value): void
    {
        $this->map->removeElement($value);
    }

    /**
     * @inheritDoc
     */
    public function clear(): void
    {
        $this->map->clear();
    }

    public function containsValue($value): bool
    {
        return $this->map->contains($value);
    }

    public function containsKey(string $key): bool
    {
        return $this->map->containsKey($key);
    }

    /**
     * Returns an array of the keys
     * @return array
     */
    public function getKeys(): array
    {
        return $this->map->getKeys();
    }

    public function getValues(): array
    {
        return $this->map->getValues();
    }

    /**
     * Returns the size of this map in terms of number of KeyValue pairs
     */
    public function getSize(): int
    {
        return $this->map->count();
    }

    /**
     * Indicates if this map is empty or not
     * @return bool
     */
    public function isEmpty(): bool
    {
        return $this->map->isEmpty();
    }

    /**
     * @inheritDoc
     */
    public function current()
    {
        return $this->map->current();
    }

    /**
     * @inheritDoc
     */
    public function next()
    {
        return $this->map->next();
    }

    /**
     * @inheritDoc
     */
    public function key()
    {
        return $this->map->key();
    }

    /**
     * @inheritDoc
     */
    public function valid()
    {
        $key = $this->key();
        return $key ? $this->containsKey($key) : false;
    }

    /**
     * @inheritDoc
     */
    public function rewind()
    {
        reset($this->map);
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return $this->map->toArray();
    }

    /**
     * @inheritDoc
     */
    public function getIterator()
    {
        return $this->map->getIterator();
    }

    /**
     * @inheritDoc
     */
    public function count()
    {
        return $this->map->count();
    }
}

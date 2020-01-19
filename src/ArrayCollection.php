<?php


namespace Morebec\Collections;

use Doctrine\Common\Collections\ArrayCollection as DoctrineArrayCollection;
use Iterator;

/**
 * A Simple Array Collection of elements
 * to use php arrays as if they were objects.
 * collection.
 *
 * This collection is an ordered collection;
 *
 * Internally uses Doctrine Array Collection
 */
class ArrayCollection implements CollectionInterface
{
    /**
     * @var DoctrineArrayCollection
     */
    private $collection;

    public function __construct(array $elements = [])
    {
        $this->collection = new DoctrineArrayCollection();

        foreach ($elements as $element) {
            $this->add($element);
        }
    }

    /**
     * Adds an element to this collection
     * @param mixed $element
     */
    public function add($element): void
    {
        $this->collection->add($element);
    }

    /**
     * Returns an element by its index
     * @param int $index
     * @return mixed|null
     */
    public function getAt(int $index)
    {
        return $this->collection->get($index);
    }

    /**
     * Clears the collection
     */
    public function clear(): void
    {
        $this->collection->clear();
    }

    /**
     * Removes the element at specified index
     * @param int $index
     */
    public function removeAt(int $index): void
    {
        $this->collection->remove($index);
    }

    /**
     * Removes a given element
     * @param mixed $element
     */
    public function remove($element): void
    {
        $this->collection->removeElement($element);
    }

    /**
     * Indicates if an element is contained in the array
     * @param mixed $element
     * @return bool
     */
    public function contains($element): bool
    {
        return $this->collection->contains($element);
    }

    /**
     * Counts ands returns the number of elements
     */
    public function count(): int
    {
        return $this->collection->count();
    }

    /**
     * Returns the first element in the collection
     * @return mixed
     */
    public function first()
    {
        return $this->collection->first();
    }

    /**
     * Returns the last element in the collection
     */
    public function last()
    {
        return $this->collection->last();
    }

    /**
     * Converts this collection to a PHP array
     * @return array
     */
    public function toArray(): array
    {
        return $this->collection->toArray();
    }

    /**
     * @inheritDoc
     */
    public function isEmpty(): bool
    {
        return $this->collection->isEmpty();
    }

    /**
     * @inheritDoc
     */
    public function getIterator(): Iterator
    {
        return $this->collection->getIterator();
    }
}

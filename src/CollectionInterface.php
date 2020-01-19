<?php


namespace Morebec\Collections;

use Countable;
use IteratorAggregate;
use Traversable;

/**
 * Interface CollectionInterface
 */
interface CollectionInterface extends Countable, Traversable, IteratorAggregate
{
    /**
     * Indicates if this collection is empty or not
     * @return bool
     */
    public function isEmpty(): bool;

    /**
     * Clears the collection
     */
    public function clear(): void;

    /**
     * Returns a native PHP array representation of this collection
     * @return array
     */
    public function toArray(): array;
}

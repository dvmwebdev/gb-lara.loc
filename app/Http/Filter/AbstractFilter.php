<?php

namespace App\Http\Filter;

use Illuminate\Database\Eloquent\Builder;


abstract class AbstractFilter implements FilterInterface
{
    /**
     * @param array $queryParams
     */
    public function __construct(
        private readonly array $queryParams = []
    )
    {
    }

    public function apply(Builder $builder): void
    {

        $this->before($builder);
        foreach ($this->getCallbacks() as $name => $callback) {
            if (isset($this->queryParams[$name])) {
                call_user_func($callback, $builder, $this->queryParams[$name]);
            }
        }
    }

    /**
     * @param Builder $builder
     * @return void
     */
    private function before(Builder $builder): void
    {
    }

    /**
     * @return array
     */
    abstract protected function getCallbacks(): array;
}

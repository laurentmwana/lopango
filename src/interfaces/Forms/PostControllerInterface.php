<?php

namespace interfaces\Forms;

interface PostControllerInterface
{
    /**
     * @return array
     */
    public function add (): array;

    /**
     * @param string $id
     * 
     * @return array
     */
    public function update (string $id): array;

    /**
     * @param string $id
     * 
     * @return array
     */
    public function delete (string $id): array;
}
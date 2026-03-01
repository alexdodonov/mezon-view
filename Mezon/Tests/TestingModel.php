<?php
namespace Mezon\Tests;

class TestingModel
{

    /**
     * @psalm-suppress PossiblyUnusedMethod
     * @param int $id
     * @return array
     */
    public function getById(int $id): array
    {
        return [
            'id' => $id,
            'title' => 'some title'
        ];
    }
}

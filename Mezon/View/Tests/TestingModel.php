<?php
namespace Mezon\View\Tests;

class TestingModel
{

    public function getById(int $id): array
    {
        return [
            'id' => $id,
            'title' => 'some title'
        ];
    }
}

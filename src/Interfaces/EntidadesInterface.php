<?php

namespace src\Interfaces;

interface EntidadesInterface
{
    public function getAll() :array;
    public function getById(int $id) :array;

}

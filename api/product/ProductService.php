<?php

interface ProductService
{
    function isActive(int $id) : bool;
    function findAll() :array;
}
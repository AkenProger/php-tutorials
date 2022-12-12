<?php

class ProductServiceImpl implements ProductService
{

    final function isActive(int $id): bool
    {
        if ($id != null) {
            return true;
        }
        return false;
    }

    final function findAll(): array
    {
        return array("asdas", "asdas", "dasda");
    }


}
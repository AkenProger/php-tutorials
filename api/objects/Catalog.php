<?php

class Categories
{
    public static function getAllCategories(): array
    {
        $sql = "select * from categories";
        return DataBaseHandler::getAll($sql);
    }
}
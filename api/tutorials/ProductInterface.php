<?php
interface ProductServiceInterface {
    function isProductActive(int $productId):bool;
    function getProductName(int $productId): string;
}

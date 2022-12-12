<?php
include_once "ProductNotFound.php";

class ProductServiceInterfaceImpl implements ProductServiceInterface
{

    private ProductServiceInterface $productService;

    final function isProductActive(int $productId): bool
    {
        $productName = $this->productService->getProductName($productId);
        if ($productName != null) {
            throw new ProductNotFound("Товар не найдена!", 404, null);
        }
        return true;
    }

    final function getProductName(int $productId): string
    {
        if ($productId != null) {
            if ($this->productService->getProductName($productId) == null) {
                throw new ProductNotFound("Товар не найдан!", 404, null);
            }
        }
        return "Good name";
    }
}


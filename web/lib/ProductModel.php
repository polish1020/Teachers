<?php

class ProductModel {

    private $dao;

    public function ProductModel ($dao) {
        $this->dao = $dao;
    }

    public function listProducts($start=1, $rows=50) {
        $this->dao->fetch("SELECT * FROM products LIMIT ".$start.", ".$rows);
    }

    public function listProduct($id) {
        $this->dao->fetch("SELECT * FROM products WHERE PRODUCTID='".$id."'");
    }

    public function getProduct() {
        if ( $product=$this->dao->getRow() )
            return $product;
        else
            return false;
    }
}

?>
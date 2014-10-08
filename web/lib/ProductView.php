<?php

class ProductView {

    private $model;

    private $output;

    public function ProductView ($model) {
        $this->model= $model;
    }

    public function header () {
        $this->output=<<<EOD
<!doctype html public "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<title> Our Products </title>
<style>
body { font-size: 13.75px; font-family: verdana }
td { font-size: 13.75px; font-family: verdana }
.title { font-size: 15.75px; font-weight: bold; font-family: verdana }
.heading {
    font-size: 13.75px; font-weight: bold;
    font-family: verdana; background-color: #f7f8f9 }
.nav { background-color: #f7f8f9 }
</style>
</head>
<body>
<div align="center" class="title">Our Products</div>
EOD;
        $this->output.="\n<div align=\"right\"><a href=\"".
            $_SERVER['PHP_SELF']."\">Start Over</a></div>\n";

    }

    public function footer () {
        $this->output.="</body>\n</html>";
    }

    public function productItem($id=1) {
        $this->model->listProduct($id);
        while ( $product=$this->model->getProduct() ) {
            $this->output.="<p><b>Name</b>:".$product['PRODUCTNAME']."</p>".
                "<p><b>Price</b>:".$product['UNITPRICE']."</p>".
                "<p><b># In Stock</b>:".$product['UNITSINSTOCK']."</p>";
            if ( $this->$product['DISCONTINUED']==1 ) {
                $this->output.="<p>This product has been discontinued.</p>";
            }
        }
    }

    public function productTable($rownum=1) {
        $rowsperpage='20';
        $this->model->listProducts($rownum,$rowsperpage);
        $this->output.="<table width=\"600\" align=\"center\">\n<tr>\n".
                "<td class=\"heading\">Name</td>\n".
                "<td class=\"heading\">Price</td>\n</tr>\n";
        while ( $product=$this->model->getProduct() ) {
            $this->output.="<tr>\n<td><a href=\"".$_SERVER['PHP_SELF'].
                "?view=product&id=".$product['PRODUCTID']."\">".
                $product['PRODUCTNAME']."</a></td>".
                "<td>".$product['UNITPRICE']."</td>\n</tr>\n";
        }
        $this->output.="<tr class=\"nav\">\n";
        if ( $rownum!=0 && $rownum > $rowsperpage ) {
            $this->output.="<td><a href=\"".$_SERVER['PHP_SELF'].
                "?view=table&rownum=".($rownum-$rowsperpage).
                "\"><< Prev</a></td>";
        } else {
            $this->output.="<td> </td>";            
        }
        if ( $product['PRODUCTID'] < ($rownum + $rowsperpage) ) {
            $this->output.="<td><a href=\"".$_SERVER['PHP_SELF'].
                "?view=table&rownum=".($rownum+$rowsperpage).
                "\">Next >></a></td>";
        } else {
            $this->output.="<td> </td>\n";            
        }
        $this->output.="</tr>\n</table>\n";
    }

    public function display () {
        return $this->output;
    }
}
?>
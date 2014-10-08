<?php

class ProductController extends ProductView {

    public function ProductController ($model,$getvars=null) {
        ProductView::ProductView($model);
        $this->header();
        switch ( $getvars['view'] ) {
            case "product":
                $this->productItem($getvars['id']);
                break;
            default:
                if ( empty ($getvars['rownum']) ) {
                    $this->productTable();
                } else {
                    $this->productTable($getvars['rownum']);
                }
                break;
        }
        $this->footer();
    }
}

?>
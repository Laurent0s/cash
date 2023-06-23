<?php
    function get_document_category_name($category) {
        return apply_filters('document_category_name', $category->name, $category->term_id);
    }
?>
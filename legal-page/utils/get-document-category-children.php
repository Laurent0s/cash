<?php
    function get_document_category_children($parent_category) {
        return get_terms('categories', 
            array (
                'parent' => $parent_category, 
                'hide_empty' => false
             )
        );
    }
?>
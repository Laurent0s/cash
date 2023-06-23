<?php 
        $branches = get_posts(array(
            'numberposts' => -1,
            'post_type' => 'branches',
        ));
       
        ?>
        
        <div> <?php 

        function isKassa($branchItem) {
            return get_field('cash_register_field', $branchItem->ID);
        }  
    

        $kassaArray = array_filter($branches, function($branch){
            return isKassa($branch);
        });

        if(!empty($kassaArray)){
            get_template_part('/contacts/table-template', null, array(
                    'caption' => __('Branches-kassa-heading','Cash-Theme'),
                    'caption-gray' => __('Branches-kassa-heading-gray','Cash-Theme'),
                    'data-table-container' => 'table-container', 
                    'data-table' => 'branches-table',
                    'filtered-branches' => $kassaArray,
                    'data-table-button' => 'table-button'
                ));
        }

        $currencyArray = array_filter($branches, function($branch){
            return !isKassa($branch);
        });

        if(!empty($currencyArray)){
                get_template_part('/contacts/table-template', null, array(
                    'caption' => __('Branches-ptks-heading','Cash-Theme'),
                    'caption-gray' => __('Branches-ptks-heading-gray','Cash-Theme'),
                    'data-table-container' => 'currency-table-container', 
                    'data-table' => 'currency-branches-table',
                    'filtered-branches' => $currencyArray,
                    'data-table-button' => 'currency-table-button'
                ));
            }?>
        </div>
        





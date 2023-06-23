<?php $branchesArray = array(    
    [
        "content" => '№',
        "field" => 'number',
        "class" => null,
        "isLeftAlignment" => false,
        "data-element" => null
    ],
    [
        "content" => __('Branches-names-name','Cash-Theme'),
        "field" => 'title',
        "class" => null,
        "isLeftAlignment" => true,
        "data-element" => null
    ],
    [
        "content" => __('Branches-names-place','Cash-Theme'),
        "field" => 'place_field',
        "class" => null,
        "isLeftAlignment" => true,
        "data-element" => null
    ],
    [
        "content" => __('Branches-names-work-hours','Cash-Theme'),
        "field" => 'work_hours_field',
        "class" => null,
        "isLeftAlignment" => true,
        "data-element" => 'td-hidden_xs'
    ],
    [
        "content" => __('Branches-names-financial-services','Cash-Theme'),
        "field" => 'financial_services_field',
        "class" => null,
        "isLeftAlignment" => false,
        "data-element" => 'td-hidden_sm'
    ],
    [
        "content" => __('Branches-names-payment-services','Cash-Theme'),
        "field" => 'payment_services_field',
        "class" => 'hidden',
        "isLeftAlignment" => false,
        "data-element" => 'td-hidden'
    ],
    [
        "content" => __('Branches-names-unit-head','Cash-Theme'),
        "field" => 'unit_head_field',
        "class" => 'hidden',
        "isLeftAlignment" => true,
        "data-element" => 'td-hidden'
    ],
    [
        "content" => __('Branches-names-phone','Cash-Theme'),
        "field" => 'phone_number_field',
        "class" => 'hidden',
        "isLeftAlignment" => true,
        "data-element" => 'td-hidden'
    ],
    [
        "content" => __('Branches-names-email','Cash-Theme'),
        "field" => 'email_address_field',
        'class' => 'hidden',
        "isLeftAlignment" => true,
        "data-element" => 'td-hidden'
    ],
    [
        "content" => __('Branches-names-closing','Cash-Theme'),
        "field" => 'closing_date_field',
        'class' => 'hidden',
        "isLeftAlignment" => false,
        "data-element" => 'td-hidden'
    ],
    [
        "content" => __('Branches-names-opening','Cash-Theme'),
        "field" => 'open_date_field',
        'class' => 'hidden',
        "isLeftAlignment" => false,
        "data-element" => 'td-hidden'
    ],
    [
        "content" => __('Branches-names-register','Cash-Theme'),
        "field" => 'register_inclusion_field',
        "class" => 'hidden',
        "isLeftAlignment" => false,
        "data-element" => 'td-hidden'
    ],
    [
        "content" =>__('Branches-names-work-status','Cash-Theme'),
        "field" => 'work_status_field',
        "class" => 'hidden',
        "isLeftAlignment" => false,
        "data-element" => 'td-hidden'
    ]
    );

    require_once('echoFilteredFields.php');
?>
<div class="branches-container hidden" data-element="branches-container">
<h2 class="table-caption"><?php echo $args['caption']?><span class="table-caption_gray"><?php echo $args['caption-gray']?></span></h2>
<div class="table-container" data-element="<?php echo $args['data-table-container']?>">
<table data-element="<?php echo $args['data-table']?>" class="branches__table">
    <tr>
    <?php foreach($branchesArray as $item_info) : ?>
            <th class="<?php echo $item_info["class"]?>"
                data-element="<?php echo $item_info["data-element"]?>">
            <?php echo $item_info["content"]?></th>
    <?  endforeach ?>
    </tr>
            <?php
            global $post; 
            $i = 0;
            foreach($args['filtered-branches'] as $post):
                setup_postdata($post); ?>
            <tr>
                <?php 
                $i++;
                foreach($branchesArray as $tableItem_info) {
                    echoFiltredFields($tableItem_info["field"], $tableItem_info["class"], $tableItem_info["isLeftAlignment"], $tableItem_info["data-element"], $post->ID, $i);
                } ?>
            
            </tr> <?php
            endforeach;
            wp_reset_postdata();
            ?>
</table>
</div>
<button class="table-button" data-element="<?php echo $args['data-table-button']?>"><?php _e('Branches-button', 'Cash-Theme')?></button> 
</div>
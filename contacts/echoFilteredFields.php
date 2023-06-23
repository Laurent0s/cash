<?php function echoFiltredFields($postField, $postClass, $postTextClass, $postData, $postId, $iteration) { ?>
        <td data-element="<?php echo $postData ?>"  
            class="<?php 
            echo $postClass;
            if($postTextClass) echo ' td-left-align';
            ?>">
            <?php switch($postField) {
                    case 'number':
                        echo $iteration;
                        break;
                    case 'title':
                        the_title();
                        break;
                    case 'work_status_field':  
                        echo get_field($postField) == 1 ? __('Table-work-status-opened', 'Cash-Theme') :  __('Table-work-status-closed', 'Cash-Theme');
                        break;
                    default:
                        the_field($postField);
                        break;
                    } ?>
        </td> 
    <?php } 

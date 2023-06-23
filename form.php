<form class="personal_consultation_info" action="<?php echo get_template_directory_uri() ?>/send.php" method="post"  id="submit-form">
    <input id="userName" placeholder="<?php _e('Form-name','Cash-Theme')?>" class="person_name" type="text" required name="userName">
    <p class="warning hidden" data-element="name-warning"><?php _e('Warning-name', 'Cash-Theme')?></p>
    <label for="userPhone" class="person_nomber_phone ukraine" data-element="phone-label">
        <span class='name-phone__phone'><?php _e('Form-phone','Cash-Theme')?></span>
        <div class="activ-png"></div>
        <input id="userPhone" class="info_phone" type="tel" name="tel" required>
        <p class="subtitle_phone"><?php _e('Form-example','Cash-Theme')?>+380 94 344 33 44</p>
        
    </label>
    <p class="warning hidden" data-element="phone-warning"><?php _e('Warning-phone', 'Cash-Theme')?></p>
    
    <input id="userEmail" placeholder="<?php _e('Form-email','Cash-Theme')?>" type="email" class="email_name" name="email" required>
    <textarea class="context" id="userText" placeholder="<?php _e('Form-message','Cash-Theme')?>" name="message"></textarea>
    <label class="save_checkbox " for="userChecbox">
        <div data-element="checkbox-container" class="checkbox-container">
            <input id="userChecbox" type="checkbox" class="click" >
            <span class="fake"  data-element="fake-checkbox"></span>
        </div>
        <div>
        <?php
                $file = get_page_by_title('Політика конфіденційності', OBJECT, 'post');
                ?>
            <p class="info_chexbox">
            <?php _e('Form-politic-part1','Cash-Theme')?>
                <a class="politic" data-element="politic-link" href="<?php echo get_field('privacy_policy', $file->ID)['url'] ?>"><?php _e('form-politic-part2','Cash-Theme')?>.</a> </p>
        </div>
    </label>
    <label for="form-submit" class="white_arrow">
        <input id="form-submit" type="submit" value="<?php _e('Form-button','Cash-Theme')?>" class="btn_call_me"></input>
    </label>
</form>
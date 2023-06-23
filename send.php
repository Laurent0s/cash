<?php

function getValueFromInputs($input)
{
    return trim(urldecode(htmlspecialchars($_POST[$input])));
}

if (mb_send_mail('info@ecexgroup.com.ua', 'Form reply',  "
Name: " . getValueFromInputs('userName') . "; \n
Phone: +380 " . getValueFromInputs('tel') . ";\n
Email: " . getValueFromInputs('email') . ";\n
Message: " . getValueFromInputs('message') . "
")) {
    header('Location: /done-page');
} else {
    echo ('Что-то пошло не так!');
}

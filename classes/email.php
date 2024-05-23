<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        hello
        <?php
        $to = 'nobody@example.com';
        $subject = 'the subject';
        $message = 'hello';
        $headers = 'From: patriciaalves10@gmail.com' . "\r\n" .
                'Reply-To: patriciaalves10@gmail.com' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();

        mail($to, $subject, $message, $headers);
        ?>
    </body>
</html>

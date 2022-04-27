<?php 
class ToolBox {
    public static function addMessageAlert($message) {
        $_SESSION['alert'][] = [
            "message" => $message,
        ];
    }

    public static function sendMail($receveur, $object, $message) {
        $headers = "From: liserochat@live.fr";
        if(mail($receveur, $object, $message, $headers)) {
            ToolBox::addMessageAlert("Mail envoyé");
        } else {
            ToolBox::addMessageAlert("Mail non envoyé");
        }
    }
}
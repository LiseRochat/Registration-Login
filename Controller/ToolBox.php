<?php 

class ToolBox {
    public static function addMessageAlert($message) {
        $_SESSION['alert'][] = [
            "message" => $message,
        ];
    }
}
<?php 
class ToolBox {
    public static function addMessageAlert($message) {
        $_SESSION['alert'][] = [
            "message" => $message,
        ];
    }

    public static function sendMail($receveur, $object, $message) {
        $headers = "From: rochatlise17@gmail.com";
        if(mail($receveur, $object, $message, $headers)) {
            ToolBox::addMessageAlert("Mail envoyé");
        } else {
            ToolBox::addMessageAlert("Mail non envoyé");
        }
    }

    public static function addPicture($file, $rep){
        if(!isset($file['name']) || empty($file['name']))
            throw new Exception("Vous devez indiquer une image");
    
        if(!file_exists($rep)) mkdir($rep,0777);
    
        $extension = strtolower(pathinfo($file['name'],PATHINFO_EXTENSION));
        $random = rand(0,99999);
        $target_file = $rep.$random."_".$file['name'];
        
        if(!getimagesize($file["tmp_name"]))
            throw new Exception("Le fichier n'est pas une image");
        if($extension !== "jpg" && $extension !== "jpeg" && $extension !== "png" && $extension !== "gif" && $extension !== "webp")
            throw new Exception("L'extension du fichier n'est pas reconnu");
        if(file_exists($target_file))
            throw new Exception("Le fichier existe déjà");
        if($file['size'] > 500000)
            throw new Exception("Le fichier est trop gros");
        if(!move_uploaded_file($file['tmp_name'], $target_file)) {
            throw new Exception("l'ajout de l'image n'a pas fonctionné");
        } else {
            return ($random."_".$file['name']);
        }
    }
}
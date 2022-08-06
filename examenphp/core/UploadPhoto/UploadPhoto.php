<?php 
namespace core\UploadPhoto;
/**
 *Cette classe enregistre le photo
 */
class UploadPhoto {
    /**
     * @param string $nameAtfomulaire io ilay anarana any anaty formulaire izay balise input type file name = ++
     * @param string $newNamePhoto io dia anarana vaovao izay amptitondraina an'ilay sary
     *  [$fileNemeNew; $message]; $fileNemeNew dia ilay nom du photo miaraka amin extension ary $message dia message d'erreur raha toa ka misy erreur  
     */
    public static function upload($nameAtformulaire, $newNamephoto) : array
    {
        $fileNemeNew = null;
        $message = null;
        if(isset($_FILES[$nameAtformulaire]) && $_FILES[$nameAtformulaire]['name'] != ''){
            $tmpName = $_FILES[$nameAtformulaire]['tmp_name'];
            $name = $_FILES[$nameAtformulaire]['name'];
            $size = $_FILES[$nameAtformulaire]['size'];
            $error = $_FILES[$nameAtformulaire]['error'];
        
            $allowedExt = array("jpg","jpeg","png");
            $fileExt = explode('.',$name);
            $fileActualExt = strtolower(end($fileExt));
        
            if(in_array($fileActualExt, $allowedExt)){
                //Checking, Is there any file error
                if($error == 0){
                    //Checking,The file size is bellow than the allowed file size
                    if($size < 10000000){
                        //Creating a unique name for file
                        $fileNemeNew = $newNamephoto.".".$fileActualExt;
                        //File destination
                        $fileDestination = ROOT.'/public/images/'.$fileNemeNew;
                        //function to move temp location to permanent location
                        move_uploaded_file($tmpName, $fileDestination);
                        //Message after success
                        $message = null;

                    }else{
                        $fileNemeNew = null;
                        $message = '<div class="alert alert-danger">La taille de fichier n\'est pas valider</div>';
                    }
                }
            }else{
            $fileNemeNew = null;
            $message = '<div class="alert alert-danger">Le type de fichier n\'est pas valider</div>';
            }
        } else {
            $fileNemeNew = 'default.jpg';
            $message = null;
        }
        
    return  ['filename' => $fileNemeNew, 'message' => $message];
    }
}
?>
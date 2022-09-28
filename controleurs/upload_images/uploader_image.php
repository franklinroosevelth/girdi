<?php 

    //recupération du file à joindre
    /* $file='';
    if (isset($_FILES['file']) AND $_FILES['file']['error'] == 0)
    {
        if ($_FILES['file']['size'] <= 10000000)
        {
            $infosfile = pathinfo($_FILES['file']['name']);
            $extension_upload = $infosfile['extension'];
            $extensions_autorisees = array('jpg', 'jpeg', 'gif','png','pdf');
            if (in_array($extension_upload, $extensions_autorisees))
            {
                move_uploaded_file($_FILES['file']['tmp_name'], 'images/' .basename($_FILES['file']['name']));
                $file = basename($_FILES['file']['name']);
            }
        }
    } */

    move_uploaded_file($_FILES['file']['tmp_name'], '../../modeles/images/'.basename($_FILES['file']['name']));

/* elseif($_GET['page']=='modifier' AND isset($_GET['url'], $_GET['id_identite_photo']))
{
    $url = $_GET['url'];
    $id = $_GET['id_identite_photo'];
    
    $url_photo = $req->modifier_identite_photo($url, $id);
    $chemin = 'images/';
    $url = $url_photo[0]['url_photo'];
    unlink($chemin.$url);
} */


?>
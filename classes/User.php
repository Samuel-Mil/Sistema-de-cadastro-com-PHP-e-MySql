<?php

class User{
    public static function userExist($user){
        $sql  = MySql::conectar()->prepare("SELECT `id` FROM `tb_site.users` WHERE login = ?");
        $sql->execute(array($user));
        if($sql->rowCount() == 1)
            return true;
        else
            return false;
    }

    public function addUser($login,$senha){
        $user = MySql::conectar()->prepare("INSERT INTO `tb_site.users` VALUES (null,?,?)");
        $user->execute(array($login,$senha));
    }

    public function alert($class,$mensage){
        echo '<div class="'.$class.'"><h3>'.$mensage.'</h3></div>';
    }
}


?>
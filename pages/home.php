<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/style.css">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
</head>
<body>
    <h2 style="color:#FFF;font-size:23px;">Users:</h2>
    <br>
    <?php
        $sql = MySql::conectar()->prepare("SELECT * FROM `tb_site.users`");
        $sql->execute(array());
        $sql = $sql->fetchAll();
        foreach($sql as $key => $value){
            echo '<li style="color:#FFF;">'.$value['login'].'</li>';
        } 
    ?>
    <section class="form-container">
        <form method="post">
        <h2>Register user</h2> 
            <fieldset>
                <?php
                    if(isset($_POST['acao'])){
                        $login = $_POST['login'];
                        $password = $_POST['senha'];

                        if($login == '')
                            User::alert('erro','Campo login vazio!');
                        else if($password == '')
                            User::alert('erro','Campo senha vazio!');
                        else{
                            if(User::userExist($login)){
                                User::alert('erro','This user already exists');
                            }else{
                                $user = new User();
                                $user->addUser($login,$password);
                                User::alert('success','User created successfully');
                            }
                        }
                    }
                ?> 
                <input type="text" name="login" placeholder="Login..." required>
                <input type="password" name="senha" placeholder="Password..." required>
                <input type="submit" name="acao" value="Login">
            </fieldset>
        </form>
        
    </section><!--form-container-->
</body>
</html>
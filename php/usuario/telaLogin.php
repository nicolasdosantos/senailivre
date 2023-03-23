<?php
    include("../config/cabecalho.php");
?>

<main>
    <form action="" method="POST">
            <div class="login">
            <div class="card">
                <a class="singup">Login</a>
                <div class="inputBox1">
                    <input type="text" required="required" name="login" id="login">
                    <span class="user">Login</span>
                </div>
        
                <div class="inputBox">
                    <input type="password" required="required" name="senha" id="senha">
                    <span>Password</span>
                </div>

                <div class="container">
                        <input type="checkbox" id="cbx" style="display: none;">
                        <label for="cbx" class="check">
                            <svg width="18px" height="18px" viewBox="0 0 18 18">
                                <path d="M1,9 L1,3.5 C1,2 2,1 3.5,1 L14.5,1 C16,1 17,2 17,3.5 L17,14.5 C17,16 16,17 14.5,17 L3.5,17 C2,17 1,16 1,14.5 L1,9 Z"></path>
                                <polyline points="1 9 7 14 15 4"></polyline>
                            </svg>
                        Não sou um robô</label>
                    </div>
        
                <button class="enter">Enter</button>
        
            </div>
        </div>
    </form>
</main>

<?php
    include("../conexao.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $login = $_POST["login"];
        $senha = $_POST["senha"];

        $sql = "SELECT * FROM usuario where login = :login AND senha= :senha";
        $stmt = $conexao->prepare($sql);
        $stmt -> bindValue(":login", $login);
        $stmt -> bindValue(":senha", $senha);
        $stmt -> execute();

        if($stmt -> rowCount() > 0) {
            echo "Login efetuado com sucesso";
        } else {
            echo "Erro ao fazer o login ";
        }
    }
?>

<?php
    include("../config/rodape.php");
?>
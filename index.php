<?php
require_once("Controller/ComentarioController.php");
require_once("Model/Comentario.php");
$comentarioController = new ComentarioController();

$resultado = "";
if (filter_input(INPUT_POST, "btnSubmit", FILTER_SANITIZE_STRING)) {
    $comentario = new Comentario();

    $comentario->setNome(filter_input(INPUT_POST, "txtNome", FILTER_SANITIZE_STRING));
    $comentario->setMensagem(filter_input(INPUT_POST, "txtComentario", FILTER_SANITIZE_STRING));
    $comentario->setLink('http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);

    if ($comentarioController->Cadastrar($comentario)) {
        $resultado = "<span style='color: green;'>Comentado com sucesso!</span>";
    } else {
        $resultado = "<span style='color: red;'>Não foi possível comentar!</span>";
    }
}

$listaComentario = $comentarioController->RetornarComentario('http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Lorem Ipsum</title>
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <style>
            *{
                margin: 0 auto;
                padding: 0;
                font-family: 'Roboto', sans-serif;
            }

            ul{
                list-style: none;
            }

            body{
                background-color: #f0f3fc;
            }

            input[type=text], textarea{
                padding:5px;
                width:100%;
                max-width: 500px;
            }

            .btnSubmit{
                padding:5px;
                border:1px solid #36406d;
                background-color: #758cf4;
                outline: none;   
                color: #FFF;
                cursor: pointer;
            }

            .clear{
                clear: both;
            }

            .padding{
                padding:5px;
            }

            .textCenter{
                text-align: center;
            }

            .textJustify{
                text-align: justify;
            }

            .bgWhite{
                background-color: #FFF;    
            }

            .maxWidth{
                width:100%;
                max-width:1024px;
            }

            .textoComentario{
                font-weight: bold;
            }

            .break{
                margin-bottom: 10px;
            }

            .fontBold{
                font-weight: bold;
            }

            .line{
                border-bottom: 1px solid #EEE;
            }
        </style>
    </head>
    <body>
        <div class="bgWhite maxWidth padding textCenter">
            <h1>Lorem Ipsum</h1>
        </div>
        <br />
        <div class="bgWhite maxWidth padding textJustify">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris porttitor congue felis nec vestibulum. Vivamus in massa sed lacus mattis dapibus sit amet id ex. Suspendisse vel leo nibh. Nam faucibus dictum nisi at hendrerit. Quisque arcu nunc, placerat a erat vitae, consequat dapibus urna. Aenean sed lorem blandit, lacinia nisl et, aliquet leo. Quisque vitae leo lacus. Integer sit amet consequat velit. Morbi quis risus ut sapien auctor porta. Pellentesque pulvinar pharetra eros, eu euismod quam euismod nec.</p>
            <br />
            <p>Etiam ex erat, fermentum sed vehicula sit amet, sagittis eget lectus. Vestibulum ac lacus quis magna porttitor tincidunt nec sit amet dui. Mauris ut lorem non leo pretium pretium. Cras eget mattis enim. Pellentesque tellus mi, dignissim et nisi at, mollis ultricies erat. Phasellus porta, tortor id accumsan facilisis, turpis nulla condimentum ante, et placerat erat urna vitae nibh. Donec vitae egestas tortor. Donec enim mi, commodo at ex ut, condimentum placerat lacus. Suspendisse interdum odio sit amet urna iaculis, nec condimentum est commodo. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Duis et metus condimentum, rhoncus quam quis, efficitur urna.</p>
            <br />
            <div class="textCenter">
                <img src="http://satellasoft.com/img/logo.png" alt="SatellaSoft" />
            </div>
            <br />
            <p>Phasellus imperdiet libero at lorem lobortis vulputate in quis sapien. Donec sed dapibus ante, eu lacinia leo. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Pellentesque laoreet nulla ut pharetra ullamcorper. Nullam sed dolor tortor. Praesent molestie at nulla non bibendum. Phasellus consectetur vulputate malesuada. In facilisis luctus mi eget rutrum. Duis vulputate nisl quis orci fermentum, sit amet fermentum nunc accumsan. Integer efficitur libero nunc, faucibus ultricies diam facilisis eget. Vestibulum sit amet iaculis est.</p>
            <br />
            <p>Maecenas ultrices tortor et feugiat suscipit. Mauris egestas est eget sem tristique, sit amet ornare nisl malesuada. Mauris sed mi malesuada, euismod urna ut, venenatis enim. Nulla et convallis metus, nec rutrum sapien. Maecenas est quam, eleifend non magna id, aliquam laoreet neque. Duis venenatis, elit blandit eleifend consectetur, velit nunc egestas tellus, non maximus mi nisi id sem. Suspendisse tempor odio vel nulla blandit, quis accumsan ipsum sodales. Donec tempor arcu in felis vestibulum molestie.</p>
            <br />
            <p>Phasellus lorem nunc, mattis venenatis commodo et, tristique ac nisi. Phasellus interdum lectus sit amet ligula sollicitudin sodales. Nullam posuere, mauris non commodo porta, metus dui accumsan ipsum, sed bibendum arcu libero eget ligula. Sed turpis enim, sodales vitae dictum non, suscipit at ligula. Mauris ut convallis tortor. Etiam euismod, dui vitae lobortis ullamcorper, metus metus mattis sapien, efficitur tristique urna augue non turpis. Maecenas cursus massa placerat dui euismod volutpat. Fusce rhoncus leo erat, vitae condimentum lorem congue et. Maecenas quis dui eget nisi tincidunt laoreet. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Suspendisse sodales nulla nec quam tempus, ut bibendum lacus tempor. Curabitur tempor dolor ex, et porta massa pellentesque non.</p>
        </div>
        <br />
        <div class="bgWhite maxWidth padding">
            <form method="post" name="frmComentario" id="frmComentario">
                <ul>
                    <li class="textoComentario">Nome</li>
                    <li class="break"><input type="text" name="txtNome" id="txtNome" /></li>

                    <li class="textoComentario">Comentário</li>
                    <li class="break"><textarea name="txtComentario" id="txtComentario"></textarea></li>

                    <li class="textoComentario"><?= $resultado; ?></li>
                    <li class="break"><input type="submit" name="btnSubmit" id="btnSubmit" value="Comentar" class="btnSubmit" /></li>
                </ul>
            </form>
        </div>
        <br />
        <div class="bgWhite maxWidth padding">
            <?php
            foreach ($listaComentario as $comentario) {
                ?>
                <div class="dvComentario">
                    <p class="fontBold"><?= $comentario->getNome() ?></p>
                    <p><?= $comentario->getMensagem() ?></p>
                        <br />
                    <div class="line"></div>
                    <br />
                </div>
                <?php
            }
            ?>
        </div>
        <br />
        <br />
    </body>
</html>

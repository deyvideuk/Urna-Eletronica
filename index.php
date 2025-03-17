<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Urna Eleitoral - Uninassau</title>
        <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
        <link rel="stylesheet" href="urnaStyle.css"> <!-- Link para o CSS -->
    </head>

    <body>

        <div class="nassau">
            <div class="area-nassau">
                <img src="images/uninassau-logo.png" alt="Logo da Uninasau">
            </div>
        </div>

        <div class="urna">
            <!-- Tela da Urna -->
            <div class="tela">
                <p>Digite o número do candidato: </p>
                <input type="text" id="visor" maxlenght="2" readonly>
                <div id="info-candidato">
                    <p id="nome-candidato"></p>
                    <img id="foto-candidato" src="" alt="Foto do candidato" style="display: none;">
                </div>
            </div>

            <div class="container">
                <div class="area-logo">
                    <img src="images/urna.png" alt="">
                </div>

                
                <div class="teclado">
                    <div class="area-teclado">
                        <button class="numeros" onclick="digitarNumero('1')">1</button>
                        <button class="numeros" onclick="digitarNumero('2')">2</button>
                        <button class="numeros" onclick="digitarNumero('3')">3</button>
                        <button class="numeros" onclick="digitarNumero('4')">4</button>
                        <button class="numeros" onclick="digitarNumero('5')">5</button>
                        <button class="numeros" onclick="digitarNumero('6')">6</button>
                        <button class="numeros" onclick="digitarNumero('7')">7</button>
                        <button class="numeros" onclick="digitarNumero('8')">8</button>
                        <button class="numeros" onclick="digitarNumero('9')">9</button>
                        <button class="numeros dpNone" onclick="digitarNumero('0')">0</button>
                        <button class="numeros" onclick="digitarNumero('0')">0</button>
                    </div>
            
                    <!-- Botoes da Urna-->
                    <div class="botoes">
                        <button class="branco " onclick="votoBranco()">Branco</button>
                        <button class="corrige " onclick="corrigirVoto()">Corrige</button>
                        <button class="confirma " onclick="confirmarVoto()">Confirma</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="btn-cadastro">
            <a href="/pagCadastro/cadastro.php">Cadastro</a>
        </div>


    <script src="Index.js"></script> <!-- Link para o JavaScript-->

    </body>
</html>
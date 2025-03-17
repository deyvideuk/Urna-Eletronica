// Seleciona os elementos do DOM
const numeroInput = document.getElementById("visor");
const nomeCandidato = document.getElementById("nome-candidato");
const fotoCandidato = document.getElementById("foto-candidato");

// Simulação de candidatos (substitua com dados do back-end quando pronto)
const candidatos = {
    "13": { nome: "Lula", foto: "images/lula=foto.jpg", votos: ""},
    "22": { nome: "Bolsonaro", foto: "images/bolsonaro=foto.jpg", votos:""},
    "45": { nome: "Candidato C", foto: "candidatoC.jpg", votos: ""}
};

// Função para digitar o número e buscar o candidato
function digitarNumero(num) {
    // Adiciona o número ao input se ainda não tiver 2 dígitos
    if (numeroInput.value.length < 2) {
        numeroInput.value += num;
    }

    // Quando o número tiver 2 dígitos, tenta encontrar o candidato
    if (numeroInput.value.length === 2) {
        verificarCandidato(numeroInput.value);
    }
}

// Função para verificar se o número é de um candidato
function verificarCandidato(numero) {
    // Se o candidato existe, mostra as informações
    if (candidatos[numero]) {
        nomeCandidato.textContent = "Nome: " + candidatos[numero].nome;
        fotoCandidato.src = candidatos[numero].foto;
        fotoCandidato.style.display = "block";
    } else {
        // Se não existir, mostra mensagem de erro
        nomeCandidato.textContent = "Candidato não encontrado!";
        fotoCandidato.style.display = "none";
    }
}

// Função para corrigir o voto (limpar tudo)
function corrigirVoto() {
    numeroInput.value = "";
    nomeCandidato.textContent = "";
    fotoCandidato.style.display = "none";
}

// Função para votar em branco
function votoBranco() {
    numeroInput.value = "BRANCO";
    nomeCandidato.textContent = "Voto em Branco";
    fotoCandidato.style.display = "none";
}

// Função para confirmar o voto
function confirmarVoto() {
    const voto = numeroInput.value;

    // Se o voto for válido, confirma e envia para o back-end
    if (voto === "BRANCO" || candidatos[voto]) {
        alert("Voto confirmado: " + voto);
        corrigirVoto(); // Limpa a urna para o próximo voto
    } else {
        // Se o voto for inválido, pede correção
        alert("Número inválido! Corrija seu voto.");
    }
}
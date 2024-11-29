document.getElementById('estoque-form').addEventListener('submit', function(event) {
    event.preventDefault(); // Evita o envio padrão do formulário

    const nome = document.getElementById('nome').value.trim();
    const quantidade = document.getElementById('quantidade').value.trim();

    if (nome === "" || quantidade === "") {
        document.getElementById('response').innerText = "Por favor, preencha todos os campos.";
        return;
    }

    fetch('server.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `nome=${encodeURIComponent(nome)}&quantidade=${encodeURIComponent(quantidade)}`
    })
    .then(response => response.text())
    .then(data => {
        document.getElementById('response').innerText = data;
        document.getElementById('estoque-form').reset(); // Limpa o formulário
    })
    .catch(error => {
        console.error('Erro:', error);
        document.getElementById('response').innerText = "Ocorreu um erro ao adicionar o item.";
    });
});

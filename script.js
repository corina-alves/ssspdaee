document.addEventListener('DOMContentLoaded', function() {
    // Dados de exemplo
    const rainfallData = [
        { date: '2024-06-01', amount: 10 },
        { date: '2024-06-02', amount: 30 },
        { date: '2024-06-03', amount: 5 },
        { date: '2024-06-04', amount: 50 }
    ];

    const tableBody = document.querySelector('#rainfall-table tbody');

    // Função para determinar a intensidade da chuva
    function getRainfallIntensity(amount) {
        if (amount < 10) {
            return 'Fraca';
        } else if (amount < 30) {
            return 'Moderada';
        } else {
            return 'Forte';
        }
    }

    // Função para adicionar uma linha na tabela
    function addTableRow(date, amount) {
        const row = document.createElement('tr');
        const dateCell = document.createElement('td');
        const amountCell = document.createElement('td');
        const intensityCell = document.createElement('td');

        dateCell.textContent = date;
        amountCell.textContent = amount + ' mm';
        const intensity = getRainfallIntensity(amount);
        intensityCell.textContent = intensity.charAt(0).toUpperCase() + intensity.slice(1);
        row.classList.add(intensity);

        row.appendChild(dateCell);
        row.appendChild(amountCell);
        row.appendChild(intensityCell);
        tableBody.appendChild(row);
    }

    // Adicionar dados de exemplo na tabela
    rainfallData.forEach(data => addTableRow(data.date, data.amount));
});

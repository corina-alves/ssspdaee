

window.onload = function(){
  
    //carregarTabelaDado()
    // carregarRelatos()
    //  carregarRelatosModal()
    // CarregaMap()
    // categorizarValores()
     carregaPrevisao()
    // teste()
}

function carregarTabelaDado() {
    fetch("https://cors-anywhere.herokuapp.com/https://cth.daee.sp.gov.br/sibh/api/v1/measurements/last_hours_events?hours=24&show_all=true")
        .then(function(response) {
            response.json().then(function(dados) {
                console.log(dados);
                let medicoes = dados.json;
                // Ordenar e cortar as maiores
                let maiores = medicoes.sort((a, b) => b.value - a.value).slice(0, 8);
                // Instanciar tabela
                let tabela = document.getElementById("tabela_eventos");
                // Instanciar corpo tabela
                let tbody = tabela.getElementsByTagName("tbody")[0];
                // Apagar os dados da tabela
                tbody.innerHTML = null;
                // Para cada medição..
                maiores.forEach(maior => {
                    // Criar linha tabela
                    let tr = document.createElement("tr");

                    // Definir cor com base no valor da precipitação
                    if (maior.value > 50) {
                        tr.style.backgroundColor = 'red'; // Chuva forte
                    } else if (maior.value >= 20 && maior.value <= 50) {
                        tr.style.backgroundColor = 'orange'; // Chuva moderada
                    } else {
                        tr.style.backgroundColor = '#0299d8'; // Chuva fraca
                    }

                    // Preencher linha tabela
                    tr.innerHTML = "<td><strong>" + maior.city +
                        "</strong></td><td>" + maior.value.toFixed(1) +
                        "</td><td>" + maior.station_prefix_id +
                        "</td><td>" + maior.value.toFixed(1) +
                        "</td>";
                    // Anexar linha no corpo da tabela
                    tbody.appendChild(tr);
                });

                if (maiores.length == 0) {
                    let tr = document.createElement("tr");

                    tr.innerHTML = "<td colspan='4'>Sem Dados</td>";

                    tbody.appendChild(tr);
                }
            });
        });
}


 function carregarRelatos(){
    
    fetch("https://cors-anywhere.herokuapp.com/https://cth.daee.sp.gov.br/sibh/api/v1/control_rooms/1/get_reports?limit=20&offset=0").then(function(response){
         response.json().then(function(relatos){
            // let relatos = []
            console.log(relatos);

            let relato = relatos[0]

            let textoRelato = document.createElement("div")
            
            let card= document.getElementById("card_relatos")
            card.innerHTML = null

            textoRelato.innerHTML = "<div><b>" +relato.start_date+"</b></div><div>"+relato.desc+"</div>"

            card.appendChild(textoRelato)


         })

       
     })

}
// function carregaPrevisao(){

//     let latLngs = [
       
//         {text:'-23.031009, -45.566196', name:'Taubaté'},
//         {text:'-21.172541, -47.812758', name:'Ribeirão Preto'},
//         {text:'-22.738662, -47.645608', name:'Piracicaba'},
//         {text:'-23.624199, -46.676390', name:'São Paulo'},
//     ]

//     latLngs.forEach(latLng=>{
//         fetch("https://weather.visualcrossing.com/VisualCrossingWebServices/rest/services/timeline/"+latLng.text+"?unitGroup=metric&key=F25Q6KUDD73CMRSWWS8US97X6&contentType=json").then(function(response){
//             response.json().then(function(previsao){
//                 console.log(previsao);

//                 let climaAgora = previsao.currentConditions    
//                 let data = previsao.days[0]      
                
//                 let previsaoTempo = document.createElement("div") 
               
//                 previsaoTempo.innerHTML = "<div class='row'><div class='col-lg-2'>"+ data.datetime + "<br/>"+ 
//                 latLng.name+ "<br/>" +climaAgora.temp + "°C"+
//                 "</div></div>"

//                 let prev = document.getElementById("previsao")

//                 prev.appendChild(previsaoTempo)

//             })
            
//         })
//     })

// }

function carregaPrevisao() {
    let latLngs = [
        { text: '-23.031009, -45.566196', name: 'Taubaté' },
        { text: '-21.172541, -47.812758', name: 'Ribeirão Preto' },
        { text: '-22.738662, -47.645608', name: 'Piracicaba' },
        { text: '-23.624199, -46.676390', name: 'São Paulo' },

        { text: '-20.819188, -49.378521', name: 'São José do Rio Preto' },
        { text: '-22.219694, -49.950266', name: 'Marília' },
        { text: '-24.187076, -46.801280', name: 'Itanhaém' },
        { text: '-24.496514, -47.846099', name: 'Registro' },
        
        
    ];

    // let weakCount = 0;
    // let moderateCount = 0;
    // let heavyCount = 0;

    latLngs.forEach(latLng => {
        fetch("https://weather.visualcrossing.com/VisualCrossingWebServices/rest/services/timeline/" + latLng.text + "?unitGroup=metric&key=F25Q6KUDD73CMRSWWS8US97X6&contentType=json")
            .then(response => response.json())
            .then(previsao => {
                console.log(previsao);

                let climaAgora = previsao.currentConditions;
                let data = previsao.days[1];

                let chuva = data.precip || 0;

                // if (chuva < 15) {
                //     weakCount++;
                //     document.getElementById('weakCount').innerText = weakCount;
                // } else if (chuva >= 15 && chuva < 20) {
                //     moderateCount++;
                //     document.getElementById('moderateCount').innerText = moderateCount;
                // } else if (chuva >= 20) {
                //     heavyCount++;
                //     document.getElementById('heavyCount').innerText = heavyCount;
                // }
                //formata data mes/dia/ano
                let formattedDate = new Date(data.datetime).toLocaleDateString('pt-BR', {
                    day: '2-digit',
                    month: '2-digit',
                    year: 'numeric'

                // ${formattedDate} <br/>
                // ${data.datetime} <br/>
                 });
                let previsaoTempo = document.createElement("div");
                previsaoTempo.classList.add('card');
                previsaoTempo.classList.add('cardPrev');
                previsaoTempo.innerHTML = `
                    <div class='row'>
                        <div class='col'>
                            <strong> ${latLng.name} </strong><br/>
                            ${climaAgora.temp} °C <br/>
                            Chuva: ${chuva} mm
                        </div>
                    </div>`;

                let prev = document.getElementById("previsao");
                prev.appendChild(previsaoTempo);
            });
    });
}


// function CarregaMap(){
//     // Inicializar o mapa
//     var map = L.map('map').setView([-23.5505, -46.6333], 10); // São Paulo
  
//     // Adicionar a camada de mapa
//     L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
//         attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
//     }).addTo(map);

//     // Adicionar marcador
//     // var marker = L.marker([-23.5505, -46.6333]).addTo(map);
//     // marker.bindPopup("<b>São Paulo</b><br>Capital do estado de São Paulo.").openPopup();
// }



// // Array de valores para categorizar e colorir
// const valores = [0, 2, 6, 11, 3, 8, 15];

// // // Função para categorizar e colorir os valores
// function categorizarValores(valores) {
//     const tabela = document.getElementById('valores');
    
//     valores.forEach(valor => {
//         const tr = document.createElement('tr');                                                 
        
//         const tdValor = document.createElement('td');
//         tdValor.textContent = valor;

//         const tdCategoria = document.createElement('td');

//         if (valor > 1 && valor <= 5) {
//             tdCategoria.textContent = 'Fraca';
//             tdCategoria.className = 'fraca';
//         } else if (valor > 5 && valor <= 10) {
//             tdCategoria.textContent = 'Moderada';
//             tdCategoria.className = 'moderada';
//         } else if (valor > 10) {
//             tdCategoria.textContent = 'Forte';
//             tdCategoria.className = 'forte';
//         } else {
//             tdCategoria.textContent = 'N/A';
//         }

//         tr.appendChild(tdValor);
//         tr.appendChild(tdCategoria);
//         tabela.appendChild(tr);
//     });
// }


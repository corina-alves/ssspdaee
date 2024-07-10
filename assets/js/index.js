

window.onload = function(){
  
    //  carregarTabelaDado()
    // carregarRelatos()
    // CarregaMap()
    // categorizarValores()
     
    carregaPrevisao()
    // console.log('antes');
    carregaDadosChuva().then(resp=>{    
        carregaCityRain(resp)
        carregarTabelaDado(resp)

        // console.log('carregou');
     })
    //  console.log('depois');
}

function carregaDadosChuva(){
    return fetch(apiUrl)
        .then(response => response.json())
        // .then(dados => {
            
           
        // });
}

// URL da API
const apiUrl = 'https://cors-anywhere.herokuapp.com/https://cth.daee.sp.gov.br/sibh/api/v1/measurements/last_hours_events?hours=24&show_all=true';

// Função para carregar e processar dados da API
function carregaCityRain(dados) {
    let contadores = [0,0,0,0]
    
    dados.json.forEach(dado=>{
        if(dado.value >= 50){
            contadores[0] += 1
        }else if(dado.value >= 20){
            contadores[1] += 1
        }else if(dado.value < 20){
            contadores[2] += 1
        }else {
            contadores[3] += 1
        }
    })
    // Atualizar o conteúdo do HTML com os resultados
    document.getElementById('chuvaForte').textContent = contadores[0];
    document.getElementById('chuvaModerada').textContent = contadores[1];
    document.getElementById('chuvaFraca').textContent = contadores[2];
    document.getElementById('semChuva').textContent = contadores[3];

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
                        tr.style.color = '#DC143C'; // Chuva forte
                    } else if (maior.value >= 15 && maior.value <= 50) {
                        tr.style.color = '#FFA500'; // Chuva moderada
                    } else {
                        tr.style.color = '#1E90FF'; // Chuva fraca
                    }

                    // Preencher linha tabela
                    tr.innerHTML = "<td>" + maior.city +
                        "</td><td>" + maior.value.toFixed(1) +
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
                let teste = data.icon;

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
                // Agora: ${climaAgora.temp} °C <br/>
                 });
                let previsaoTempo = document.createElement("div");
                previsaoTempo.classList.add('card');
                // previsaoTempo.classList.add('col-lg-4');
                // previsaoTempo.classList.add('cardPrev');
                previsaoTempo.innerHTML = `
                    <div class='row'>
                        <div class='col'>
                            <strong> ${latLng.name} </strong><br/>
                            <i class="fa-solid fa-arrow-down" style="color:#7d9bfc;"></i> ${data.tempmin} <i class="fa-solid fa-arrow-up" style="color:#f36951;"></i> ${data.tempmax} °C <br/>
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


    // Inicializar o mapa
    var map = L.map('map').setView([-23.5505, -46.6333], 10); // São Paulo

    // Adicionar a camada de mapa
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    // Adicionar marcador
     var marker = L.marker([-23.5505, -46.6333]).addTo(map);
     marker.bindPopup("<b>São Paulo</b><br>Capital do estado de São Paulo.").openPopup();


// URL da API
// const apiUrl = 'https://cors-anywhere.herokuapp.com/https://cth.daee.sp.gov.br/sibh/api/v1/measurements/last_hours_events?hours=24&show_all=true';
        // Inicializar o mapa
        // let map = L.map('map').setView([-23.55052, -46.633308], 6);

        // // Adicionar uma camada de mapa base
        // L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        //   attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        // }).addTo(map);
        
        // // Função para carregar e processar dados da API e adicionar ao mapa
        // function carregarMapa() {
        //   fetch(apiUrl)
        //     .then(response => response.json())
        //     .then(dados => {
        //       console.log(dados);
        
        //       // Limpar camadas anteriores do mapa
        //       map.eachLayer((layer) => {
        //         if (!!layer.toGeoJSON) {
        //           map.removeLayer(layer);
        //         }
        //       });
        
        //       // Adicionar a camada base novamente
        //       L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        //         attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        //       }).addTo(map);
        
        //       // Adicionar marcadores no mapa
        //       dados.forEach(event => {
        //         const { latitude, longitude, municipality, value } = event;
        
        //         let color;
        //         if (value > 50) {
        //           color = '#DC143C'; // Chuva forte
        //         } else if (value >= 15 && value <= 50) {
        //           color = '#FFA500'; // Chuva moderada
        //         } else if (value > 0 && value < 15) {
        //           color = '#1E90FF'; // Chuva fraca
        //         } else {
        //           color = '#00FF00'; // Sem chuva
        //         }
        
        //         L.circleMarker([latitude, longitude], {
        //           radius: 8,
        //           fillColor: color,
        //           color: color,
        //           weight: 1,
        //           opacity: 1,
        //           fillOpacity: 0.8
        //         })
        //         .bindPopup(`<b>Município:</b> ${municipality}<br><b>Precipitação:</b> ${value.toFixed(1)} mm`)
        //         .addTo(map);
        //       });
        //     })
        //     .catch(error => console.error('Erro ao buscar dados da API:', error));
        // }


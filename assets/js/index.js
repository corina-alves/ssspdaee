

window.onload = function(){
  
    // carregarTabelaDado()
    // carregarRelatos()
    //  carregarRelatosModal()
    // CarregaMap()
    // categorizarValores()
    carregaPrevisao()
    // teste()
}

function carregarTabelaDado(){
   fetch("https://cors-anywhere.herokuapp.com/https://cth.daee.sp.gov.br/sibh/api/v1/measurements/last_hours_events?hours=24&show_all=true").then(function(response){
         response.json().then(function(dados){
             console.log(dados);
             let medicoes = dados.json

            //ordenar e cortar as  maiores
             let maiores = medicoes.sort((a,b)=>b.value-a.value).slice(0,8)

            //intancia tabela
            let tabela = document.getElementById("tabela_eventos")
            
            //instancia corpo tabela
           let tbody = tabela.getElementsByTagName("tbody")[0]

             //apaga os dados da tabela
            tbody.innerHTML = null
            
            //para cada medicao..
             maiores.forEach(maior => {

                 //criar linha tabela
                let tr = document.createElement("tr")

                //preencher linha tabela
                tr.innerHTML = "<td>"+maior.city+
                "</td><td>"+maior.value.toFixed(1)+
                "</td><td>"+maior.station_prefix_id+
                "</td><td>"+maior.value.toFixed(1)
                +"</td>"

                //append = anexar linha no corpo da tabela
                 tbody.appendChild(tr)
            });

             if(maiores.length == 0){
                let tr = document.createElement("tr")

                tr.innerHTML = "<td colspan='4'>Sem Dados</td>"

                 tbody.appendChild(tr)
             }

      
        })
      })
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
function carregaPrevisao(){

    let latLngs = [
        {text:'-23.624199, -46.676390', name:'Centro'},
        {text:'-23.556239, -46.424378', name:'Zona Leste'}
    ]

    latLngs.forEach(latLng=>{
        fetch("https://weather.visualcrossing.com/VisualCrossingWebServices/rest/services/timeline/"+latLng.text+"?unitGroup=metric&key=F25Q6KUDD73CMRSWWS8US97X6&contentType=json").then(function(response){
            response.json().then(function(previsao){
                console.log(previsao);

                let climaAgora = previsao.currentConditions    
                let data = previsao.days        

                let previsaoTempo = document.createElement("div") 
                previsaoTempo.innerHTML = "<div class='card-group' style='border-solid 1px #F00;'>"+latLng.name+"</div><div>"+ "<div>"+data.description+"</div><div>"+climaAgora.datetime+"</div><div>"+climaAgora.temp +"</div>"

                let prev = document.getElementById("previsao")

                prev.appendChild(previsaoTempo)

            })
        })
    })

    
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



// Array de valores para categorizar e colorir
// const valores = [0, 2, 6, 11, 3, 8, 15];

// // Função para categorizar e colorir os valores
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


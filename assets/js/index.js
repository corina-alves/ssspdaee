

window.onload = function(){
  
    //carregarTabelaDado()
    carregarRelatos()

}



function carregarTabelaDado(){
    fetch("https://cors-anywhere.herokuapp.com/https://cth.daee.sp.gov.br/sibh/api/v1/measurements/last_hours_events?hours=24&show_all=true").then(function(response){
        response.json().then(function(dados){
            console.log(dados);
            let medicoes = dados.json

            //ordenar e cortar as  maiores
            let maiores = medicoes.sort((a,b)=>b.value-a.value).slice(0,5)


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
                tr.innerHTML = "<td>"+maior.city+"</td><td>"+maior.value.toFixed(1)+"</td><td>-</td><td>-</td>"

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
    fetch("https://cors-anywhere.herokuapp.com/https://cth.daee.sp.gov.br/sibh/api/v1/control_rooms/1/get_reports?limit=20&offset=0").then(function(respostaRelatos){
         respostaRelatos.json().then(function(relatos){
            //let relatos = []
            console.log(relatos);

            let relato = relatos[0]

            let textoRelato = document.createElement("div")
            
            let card= document.getElementById("card_relatos")
            card.innerHTML = null

            textoRelato.innerHTML = "<div>"+relato.start_date+"</div><div>"+relato.desc+"</div>"

            card.appendChild(textoRelato)


         })

       
     })
}




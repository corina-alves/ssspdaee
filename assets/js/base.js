


const loadHeader = () =>{
    let el = document.getElementById('header')

    el.innerHTML ='<div class="container d-flex align-items-center justify-content-between">'+

      '<div class="logo">'+
        '<h1 class="text-light"><a href="index.html"><img src="assets/img/logo/daee_up.png"></a></h1>'+
      '</div>'+

      '<nav id="navbar" class="navbar">'+
        '<ul>'+
          '<li><a class="active" href="index.html">Home</a></li>'+
          '<li><a href="noticias.html">Notícias</a></li>'+
          '<li class="dropdown"><a href="#"><span>Sala de Situação</span> <i class="bi bi-chevron-down"></i></a>'+

            '<ul>'+
              '<li><a href="sobre.html">Sobre</a></li>'+
              '<li><a href="salas-de-situacao.html">Salas de Situação</a></li>'+
              '<li><a href="monitoramento.html">Monitoramento</a></li>'+
              // '<li><a href="equipe.html">Equipe</a></li>'+
              '<li><a href="galeria.html"> Galeria</a></li>'+
            '</ul>'+
          '</li>'+

          '<li class="dropdown"><a href="#"><span>Boletins</span> <i class="bi bi-chevron-down"></i></a>'+
            '<ul>'+
              '<li><a href="https://drive.google.com/drive/folders/0B4yicqLa_Dj8YTE5ZDUyNTItMjkzYS00ZGJlLTg2M2ItZTI0ZjRjODQ3ZDNk?resourcekey=0-n6Kjkz-jNDVJdgI1dJ1A1A" target="_black">Boletim Diário</a></li>'+
              '<li><a href="https://drive.google.com/drive/folders/0B4yicqLa_Dj8VFFVb3B4bW5xZkk?resourcekey=0-9rWDTUK16xaKOQnDIPFlnw" target="_black">Boletim Mensal</a></li>'+
              '<li><a href="https://docs.google.com/document/d/11qxQPqNc1RW7mMYw_uXdw-Gmh7lr8UUbaH2AnG6k6g0/edit#heading=h.7vzq6ltz512f" target="_black">Último Boletim</a></li>'+
            '</ul>'+
          '</li>'+
          '<li><a href="estacoes.html">Estações</a></li>'+
          '<li><a href="hidrologia.html">Hidrologia</a></li>'+
        

        '</ul>'+
        '<i class="bi bi-list mobile-nav-toggle"></i>'+
      '</nav>'+

    '</div>';

}

const loadFooter = () =>{
    let rodape = document.getElementById('footer')

    rodape.innerHTML = 

    '<div class="footer-top">'+
    '<div class="container">'+
      '<div class="row">'+

        '<div class="col-lg-3 col-md-6 footer-info">'+
          '<h3>SSSP-DAEE</h3>'+
          '<p>Rede Hidrológica básica do Estado de São Paulo é operada pelo DAEE desde 1951.</p>'+
          '<p>Sala de Situação de São Paulo, apresenta produtos e relatos por redes sociais e e-mails. </p>'+
        '</div>'+

        '<div class="col-lg-3 col-md-6 footer-links">'+
          '<h4>Boletins</h4>'+
          '<ul>'+
            '<li><a href="#">Boletins Diários</a></li>'+
            '<li><a href="#">Boletins Mensais</a></li>'+
            '<li><a href="#">Ultimos Boletim</a></li>'+
          '</ul>'+
           '<h4>Sobre</h4>'+
           '<ul>'+
            '<li><a href="sobre.php">Sobre Nós</a></li>'+
            '<li><a href="equipe.php">Equipes</a></li>'+
          '</ul>'+
        '</div>'+
        '<div class="col-lg-3 col-md-6 footer-links">'+
          '<h4>Situação</h4>'+
          '<ul>'+
            '<li><a href="#">Chuvas Diárias Alto Tietê/Cubatão</a></li>'+
            '<li><a href="#">Últimos Alertas</a></li>'+
            '<li><a href="#">Ultimas Publicações da SSSP / DAEE</a></li>'+
          '</ul>'+
        '</div>'+

        '<div class="col-lg-3 col-md-6 footer-contact">'+
          '<h4>Contato</h4>'+
          '<p>'+
            'Rua Boa Vista, 170 <br>'+
            '11º andar, Bloco 5<br>'+
           'São Paulo / SP <br>'+
            '<strong>Telefone:</strong> (11) 3293 - 8461<br>'+
            '<strong>Email:</strong> salasituacao@daee.sp.gov.br<br>'+
          '</p>'+

          '<div class="social-links"> <p>Redes Sociais DAEE</p>'+
            '<a href="https://www.facebook.com/DAEESP/" target="_black" class="facebook"><i class="bi bi-facebook"></i></a>'+
            '<a href="https://www.instagram.com/daeesp/" target="_black" class="instagram"><i class="bi bi-instagram"></i></a>'+
            

            '<a href="https://www.youtube.com/channel/UCOEBfJpTq7LE25rdjX9tdUQ" target="_black" class=""><i class="bi bi-youtube"></i></a>'+
          '</div>'+

        '</div>'+

      '</div>'+
    '</div>'+
  '</div>'+

  '<div class="container">'+
    '<div class="copyright">'+
      '&copy;  <strong><span>SSSP-DAEE</span></strong>. '+
    '</div>'+
    '<div class="credits">'+
    '</div>'+
  '</div>';
}

loadHeader()
loadFooter()
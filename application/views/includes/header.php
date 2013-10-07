<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />      
        <title><?php echo $titulopag; ?></title>

        <!-- Meta tags -->
        <?php echo meta($meta); ?>
        <link rel="shortcut icon" href="<?php echo base_url('assets'); ?>/favicon.ico"/>

        <!-- Facebook Meta tags -->
        <?php echo meta($metaface); ?>

        <!-- Css
        ================================================== -->
        <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/reset.css'); ?>" />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/stylle.css'); ?>" />

        <?php if (isset($map['js'])) { echo $map['js']; }?>
    </head>

    <body>
        <div id="container">

            <!-- Topo
            ================================================== -->
            <div id="topo">
                <div id="logo" class"">
                    <a href="<?php echo base_url(); ?>" title="Clicando aqui você vai para a página inicial"><img src="<?php echo base_url('assets'); ?>/images/logo.png" alt="Logo"/></a>
                </div>
                <div id="campo_estado" class="">
                    <img src="<?php echo base_url('assets'); ?>/images/bandeira_pe.jpg" alt="Bandeira de Pernambuco" class="conteudo_estado" />
                    <div id="titulo_estado">Você está em Pernambuco</div>
                    <div id="link_estado"><a href="" title="Clicando aqui você pode ver o guia de outros estados">Mudar de estado</a></div>
                </div>
                <div id="campo_pesquisa" class="">
                    <div id="busca">
                        <img src="<?php echo base_url('assets'); ?>/images/lupa.png" alt="Buscar..."/>
                        <input type="text" id="texto_busca" placeholder="O que você deseja encontrar?"/>
                        <input type="submit" id="botao_busca" value="Buscar"/>
                    </div>
                </div>
            </div>

            <!-- Menu
            ================================================== -->
            <div id="menu" class="area_conteudo">
                <div  id="restaurantes" class="link_menu">
                    <a href="<?php echo base_url('restaurantes/'); ?>" title="">
                        <img src="<?php echo base_url('assets'); ?>/images/prato.png" alt="Prato" />
                        <h3 class="">Restaurantes</h3>
                        <div class="v"></div>
                    </a>
                    <div id="menu_restaurantes" class="menus">
                        <h1 class="titulo_menu">Escolha o que você deseja comer:</h1>
                        <div id="" class="sub_menu">
                            <h4 class="titulo_sub_menus">Por cozinha</h4>
                            <ul>
                                <li class="sub_menus"><a href="<?php echo base_url('restaurantes/categoria/africanas'); ?>" title="Veja os restaurantes que vendem comida(s) africana(s)">Africana</a></li>
                                <li class="sub_menus"><a href="<?php echo base_url('restaurantes/categoria/arabes'); ?>" title="Veja os restaurantes que vendem comida(s) árabe(s)">Árabe</a></li>
                                <li class="sub_menus"><a href="<?php echo base_url('restaurantes/categoria/brasileiras'); ?>" title="Veja os restaurantes que vendem comida(s) Brasileira(s)">Brasileira</a></li>
                                <li class="sub_menus"><a href="<?php echo base_url('restaurantes/categoria/europeias'); ?>" title="Veja os restaurantes que vendem comida(s) Europeia(s)">Europeia</a></li>
                                <li class="sub_menus"><a href="<?php echo base_url('restaurantes/categoria/italianas'); ?>" title="Veja os restaurantes que vendem comida(s) Italiana(s)">Italiana</a></li>
                                <li class="sub_menus"><a href="<?php echo base_url('restaurantes/categoria/latinas'); ?>" title="Veja os restaurantes que vendem comida(s) Latina(s)">Latina</a></li>
                                <li class="sub_menus"><a href="<?php echo base_url('restaurantes/categoria/orientais'); ?>" title="Veja os restaurantes que vendem comida(s) Oriental(is)">Oriental</a></li>
                            </ul>
                            <ul>
                                <li class="sub_menus"><a href="<?php echo base_url('restaurantes/categoria/regionais'); ?>" title="Veja os restaurantes que vendem comida(s) Regional(is)">Regional</a></li>
                            </ul>
                        </div>

                        <span class="ou">ou</span>
                        <div id="" class="sub_menu">
                            <h4 class="titulo_sub_menus">Por tipo</h4>
                            <ul>
                                <li class="sub_menus"><a href="<?php echo base_url('restaurantes/categoria/carnes'); ?>" title="Veja os restaurantes que vendem Carne(s)">Carnes</a></li>
                                <li class="sub_menus"><a href="<?php echo base_url('restaurantes/categoria/crustaceos'); ?>" title="Veja os restaurantes que vendem Crustáceo(s)">Crustáceos / Moluscos</a></li>
                                <li class="sub_menus"><a href="<?php echo base_url('restaurantes/categoria/especiais'); ?>" title="Veja os restaurantes que vendem comida(s) Light / Especial(is)">Light / Especiais</a></li>
                                <li class="sub_menus"><a href="<?php echo base_url('restaurantes/categoria/massas'); ?>" title="Veja os restaurantes que vendem Massa(s)">Massas</a></li>
                                <li class="sub_menus"><a href="<?php echo base_url('restaurantes/categoria/naturais'); ?>" title="Veja os restaurantes que vendem comida(s) Natural(is)">Natural</a></li>
                                <li class="sub_menus"><a href="<?php echo base_url('restaurantes/categoria/peixes'); ?>" title="Veja os restaurantes que vendem Peixe(s)">Peixes</a></li>
                                <li class="sub_menus"><a href="<?php echo base_url('restaurantes/categoria/vegetais'); ?>" title="Veja os restaurantes que vendem Vegetal(is)">Vegetais</a></li>
                            </ul>
                        </div>
                        <span class="ou">ou</span>
                        <div id="" class="sub_menu">
                            <h4 class="titulo_sub_menus">Por serviço</h4>
                            <ul>
                                <li class="sub_menus"><a href="<?php echo base_url('restaurantes/categoria/alacartes'); ?>" title="Veja os restaurantes que vendem por À la carte">À la carte</a></li>
                                <li class="sub_menus"><a href="<?php echo base_url('restaurantes/categoria/delivery'); ?>" title="Veja os restaurantes que vendem por Delivery">Delivery</a></li>
                                <li class="sub_menus"><a href="<?php echo base_url('restaurantes/categoria/drive-thrur'); ?>" title="Veja os restaurantes que vendem por Drive-thrur">Drive-thrur</a></li>
                                <li class="sub_menus"><a href="<?php echo base_url('restaurantes/categoria/rodizios'); ?>" title="Veja os restaurantes que vendem por Rodizio">Rodizio</a></li>
                                <li class="sub_menus"><a href="<?php echo base_url('restaurantes/categoria/self-service'); ?>" title="Veja os restaurantes que vendem por Self-serviçe">Self-serviçe</a></li>
                            </ul>
                        </div>
                        <div id="" class="rodape_menu">
                            <a href="#" title="Clique aqui e acesse a pagina de Restaurante">
                                <img src="<?php echo base_url('assets'); ?>/images/mais.png" alt=""/>
                                <h2 id="" class="titulo_rodape_menu">Veja mais sobre restaurantes clicando aqui</h2>
                            </a>
                        </div>
                    </div>
                </div>
                <div id="lanchonetes" class="link_menu">
                    <a href="<?php echo base_url('lanchonetes/'); ?>" title="">
                        <img src="<?php echo base_url('assets'); ?>/images/lanche.png" alt="Prato" />
                        <h3 class="">Lanchonetes</h3>
                        <div class="v"></div>
                    </a>
                    <div id="menu_lanchonete" class="menus">
                        <h1 class="titulo_menu">Escolha o que você deseja lanchar:</h1>
                        <div id="" class="sub_menu">
                            <h4 class="titulo_sub_menus">Por tipo</h4>
                            <ul>
                                <li class="sub_menus"><a href="<?php echo base_url('lanchonetes/categoria/doces'); ?>" title="Veja as lanchonetes que vendem lanches tipo Doces">Doces</a></li>
                                <li class="sub_menus"><a href="<?php echo base_url('lanchonetes/categoria/gelados'); ?>" title="Veja as lanchonetes que vendem lanches tipo Gelados">Gelados</a></li>
                                <li class="sub_menus"><a href="<?php echo base_url('lanchonetes/categoria/massas'); ?>" title="Veja as lanchonetes que vendem lanches tipo Massas">Massas</a></li>
                                <li class="sub_menus"><a href="<?php echo base_url('lanchonetes/categoria/especiais'); ?>" title="Veja as lanchonetes que vendem lanches Light / Especiais">Light/Especiais</a></li>
                                <li class="sub_menus"><a href="<?php echo base_url('lanchonetes/categoria/naturais'); ?>" title="Veja as lanchonetes que vendem lanches naturais">Naturais</a></li>
                                <li class="sub_menus"><a href="<?php echo base_url('lanchonetes/categoria/salgados'); ?>" title="Veja as lanchonetes que vendem lanches tipo salgados">Salgados</a></li>
                            </ul>
                        </div>
                        <span class="ou">ou</span>
                        <div id="" class="sub_menu">
                            <h4 class="titulo_sub_menus">Por comida</h4>
                            <ul>
                                <li class="sub_menus"><a href="<?php echo base_url('lanchonetes/categoria/acai'); ?>" title="Veja as lanchonetes que vendem Açaí(s)">Açaí</a></li>
                                <li class="sub_menus"><a href="<?php echo base_url('lanchonetes/categoria/crepes'); ?>" title="Veja as lanchonetes que vendem Crepe(s)">Crepe</a></li>
                                <li class="sub_menus"><a href="<?php echo base_url('lanchonetes/categoria/doces'); ?>" title="Veja as lanchonetes que vendem Doces">Doces</a></li>
                                <li class="sub_menus"><a href="<?php echo base_url('lanchonetes/categoria/fondue'); ?>" title="Veja as lanchonetes que vendem Fondue">Fondue</a></li>
                                <li class="sub_menus"><a href="<?php echo base_url('lanchonetes/categoria/hamburguers'); ?>" title="Veja as lanchonetes que vendem Hamburguer">Hamburguer</a></li>
                                <li class="sub_menus"><a href="<?php echo base_url('lanchonetes/categoria/iorgutes'); ?>" title="Veja as lanchonetes que vendem Iogurte">Iogurte</a></li>
                                <li class="sub_menus"><a href="<?php echo base_url('lanchonetes/categoria/pasteis'); ?>" title="Veja as lanchonetes que vendem Pastel">Pastel</a></li>
                                
                            </ul>
                            <ul>
                                <li class="sub_menus"><a href="<?php echo base_url('lanchonetes/categoria/pizzas'); ?>" title="Veja as lanchonetes que vendem Pizza">Pizza</a></li>
                                <li class="sub_menus"><a href="<?php echo base_url('lanchonetes/categoria/sanduiches'); ?>" title="Veja as lanchonetes que vendem Sanduiche">Sanduiche</a></li>
                                <li class="sub_menus"><a href="<?php echo base_url('lanchonetes/categoria/sorvete-picole'); ?>" title="Veja as lanchonetes que vendem Sorvete ou picolé">Sorvete / Picolé</a></li>
                                <li class="sub_menus"><a href="<?php echo base_url('lanchonetes/categoria/sushi-temaki'); ?>" title="Veja as lanchonetes que vendem Sushi ou Temaki">Sushi / Temaki</a></li>
                            </ul>
                        </div>
                        <span class="ou">ou</span>
                        <div id="" class="sub_menu">
                            <h4 class="titulo_sub_menus">Por serviço</h4>
                            <ul>
                                <li class="sub_menus"><a href="<?php echo base_url('lanchonetes/categoria/fast-food'); ?>" title="Veja as lanchonetes que vendem por Fast-food">Fast-food</a></li>
                                <li class="sub_menus"><a href="<?php echo base_url('lanchonetes/categoria/dilivery'); ?>" title="Veja as lanchonetes que vendem por Delivery">Delivery</a></li>
                                <li class="sub_menus"><a href="<?php echo base_url('lanchonetes/categoria/drive-thrur'); ?>" title="Veja as lanchonetes que vendem por Drive-thrur">Drive-thrur</a></li>
                                <li class="sub_menus"><a href="<?php echo base_url('lanchonetes/categoria/rodizios'); ?>" title="Veja as lanchonetes que vendem por Rodizio">Rodizio</a></li>
                            </ul>
                        </div>
                        <div id="" class="rodape_menu">
                            <a href="#" title="Clique aqui e acesse a pagina de lanchonetes">
                                <img src="<?php echo base_url('assets'); ?>/images/mais.png" alt=""/>
                                <h2 id="" class="titulo_rodape_menu">Veja mais sobre lanchonetes clicando aqui</h2>
                            </a>
                        </div>
                    </div>
                </div>
                <div id="bebidas" class="link_menu">
                    <a href="<?php echo base_url('bebidas/'); ?>" title="">
                        <img src="<?php echo base_url('assets'); ?>/images/drink.png" alt="Prato" />
                        <h3 class="">Bebidas</h3>
                        <div class="v"></div>
                    </a>
                    <div id="menu_bebidas" class="menus">
                        <h1 class="titulo_menu">Escolha o que você quer beber:</h1>
                        <div id="" class="sub_menu">
                            <h4 class="titulo_sub_menus">Por local</h4>
                            <ul>
                                <li class="sub_menus"><a href="<?php echo base_url('bebidas/categoria/bares'); ?>" title="Veja os bares onde você quer beber">Bar</a></li>
                                <li class="sub_menus"><a href="<?php echo base_url('bebidas/categoria/botecos'); ?>" title="Veja os botecos onde você quer beber">Boteco</a></li>
                                <li class="sub_menus"><a href="<?php echo base_url('bebidas/categoria/cafeterias'); ?>" title="Veja as cafeterias onde você quer beber">Cafeteria</a></li>
                                <li class="sub_menus"><a href="<?php echo base_url('bebidas/categoria/lanchonetes'); ?>" title="Veja as lanchonetes onde você quer beber">Lanchonete</a></li>
                                <li class="sub_menus"><a href="<?php echo base_url('bebidas/categoria/restaurantes'); ?>" title="Veja os restaurantes onde você quer beber">Restaurante</a></li>
                            </ul>
                        </div>
                        <span class="ou">ou</span>
                        <div id="" class="sub_menu">
                            <h4 class="titulo_sub_menus">Por bebida</h4>
                            <ul>
                                <li class="sub_menus"><a href="<?php echo base_url('bebidas/categoria/batidas'); ?>" title="Veja os locais onde vende batidas(s)">Batidas</a></li>
                                <li class="sub_menus"><a href="<?php echo base_url('bebidas/categoria/cachacas'); ?>" title="Veja os locais onde vende cachaça">Cachaça</a></li>
                                <li class="sub_menus"><a href="<?php echo base_url('bebidas/categoria/cafes'); ?>" title="Veja os locais onde vende café">Café</a></li>
                                <li class="sub_menus"><a href="<?php echo base_url('bebidas/categoria/caipirinhas'); ?>" title="Veja os locais onde vende caipirinha">Caipirinha</a></li>
                                <li class="sub_menus"><a href="<?php echo base_url('bebidas/categoria/cervejas'); ?>" title="Veja os locais onde vende cerveja">Cerveja</a></li>
                                <li class="sub_menus"><a href="<?php echo base_url('bebidas/categoria/chopps'); ?>" title="Veja os locais onde vende chopp">Chopp</a></li>
                                <li class="sub_menus"><a href="<?php echo base_url('bebidas/categoria/energeticas'); ?>" title="Veja os locais onde vende bebidas energéticas">Energéticas</a></li>
                                
                            </ul>
                            <ul>
                                <li class="sub_menus"><a href="<?php echo base_url('bebidas/categoria/licor'); ?>" title="Veja os locais onde vende licor">Licor</a></li>
                                <li class="sub_menus"><a href="<?php echo base_url('bebidas/categoria/milk-shake'); ?>" title="Veja os locais onde vende milk-shake">Milk-shake</a></li>
                                <li class="sub_menus"><a href="<?php echo base_url('bebidas/categoria/refrigerantes'); ?>" title="Veja os locais onde vende refrigerante">Refrigerante</a></li>
                                <li class="sub_menus"><a href="<?php echo base_url('bebidas/categoria/sucos'); ?>" title="Veja os locais onde vende suco">Suco</a></li>
                                <li class="sub_menus"><a href="<?php echo base_url('bebidas/categoria/tequilas'); ?>" title="Veja os locais onde vende tequila">Tequila</a></li>
                                <li class="sub_menus"><a href="<?php echo base_url('bebidas/categoria/vinhos'); ?>" title="Veja os locais onde vende vinho">Vinho</a></li>
                                <li class="sub_menus"><a href="<?php echo base_url('bebidas/categoria/whisky'); ?>" title="Veja os locais onde vende wisky">Wisky</a></li>
                            </ul>
                        </div>
                        <span class="ou">ou</span>
                        <div id="" class="sub_menu">
                            <h4 class="titulo_sub_menus">Por extras</h4>
                            <ul>
                                <li class="sub_menus"><a href="<?php echo base_url('bebidas/categoria/jogos-ao-vivo'); ?>" title="Veja os locais onde transmite jogos ao vivo">Jogos ao vivo</a></li>
                                <li class="sub_menus"><a href="<?php echo base_url('bebidas/categoria/lutas-transmitidas'); ?>" title="Veja os locais onde transmite Lutas ao vivo">Lutas transmitidas</a></li>
                                <li class="sub_menus"><a href="<?php echo base_url('bebidas/categoria/musicas-ao-vivo'); ?>" title="Veja os locais onde transmite Musicas ao vivo">Musicas ao vivo</a></li>
                                <li class="sub_menus"><a href="<?php echo base_url('bebidas/categoria/open-bar'); ?>" title="Veja os locais onde possuem oppen bar">Open bar</a></li>
                            </ul>
                        </div>
                        <div id="" class="rodape_menu">
                            <a href="#" title="Clique aqui e acesse a pagina de bebidas">
                                <img src="<?php echo base_url('assets'); ?>/images/mais.png" alt=""/>
                                <h2 id="" class="titulo_rodape_menu">Veja mais sobre bebidas clicando aqui</h2>
                            </a>
                        </div>
                    </div>
                </div>
                <div id="passeio_e_lazer" class="link_menu">
                    <a href="<?php echo base_url('passeio-e-lazer/'); ?>" title="">
                        <img src="<?php echo base_url('assets'); ?>/images/bicicleta.png" alt="Prato" />
                        <h3 class="">Passeio e Lazer</h3>
                        <div class="v"></div>
                    </a>
                    <div id="menu_passeio" class="menus">
                        <h1 class="titulo_menu">Escolha o que você deseja fazer:</h1>
                        <div id="" class="sub_menu">
                            <h4 class="titulo_sub_menus">Visitar locais</h4>
                            <ul>
                                <li class="sub_menus"><a href="<?php echo base_url('locais/categoria/cachoeiras'); ?>" title="Veja as cachoeiras onde você pode visitar">Cachoeiras</a></li>
                                <li class="sub_menus"><a href="<?php echo base_url('locais/categoria/historicos'); ?>" title="Veja os locais históricos onde você pode visitar">Historicos</a></li>
                                <li class="sub_menus"><a href="<?php echo base_url('locais/categoria/matas'); ?>" title="Veja as matas onde você pode visitar">Matas</a></li>
                                <li class="sub_menus"><a href="<?php echo base_url('locais/categoria/museus'); ?>" title="Veja os museus onde você pode visitar">Museus</a></li>
                                <li class="sub_menus"><a href="<?php echo base_url('locais/categoria/parques'); ?>" title="Veja os parques onde você pode visitar">Parques</a></li>
                                <li class="sub_menus"><a href="<?php echo base_url('locais/categoria/pontos-turisticos'); ?>" title="Veja os pontos turisticos onde você pode visitar">Pontos turísticos</a></li>
                                <li class="sub_menus"><a href="<?php echo base_url('locais/categoria/pracas'); ?>" title="Veja as praças onde você pode visitar">Praças</a></li>
                            </ul>
                            <ul>
                                <li class="sub_menus"><a href="<?php echo base_url('locais/categoria/praias'); ?>" title="Veja as praias onde você pode visitar">Praias</a></li>
                                <li class="sub_menus"><a href="<?php echo base_url('locais/categoria/rios-lagos'); ?>" title="Veja os rios e lagos onde você pode visitar">Rios / Lagos</a></li>
                                <li class="sub_menus"><a href="<?php echo base_url('locais/categoria/zoologicos'); ?>" title="Veja os zoológicos onde você pode visitar">Zoológicos</a></li>
                            </ul>
                        </div>
                        <span class="ou">ou</span>
                        <div id="" class="sub_menu">
                            <h4 class="titulo_sub_menus">Praticar esportes</h4>
                            <ul>
                                <li class="sub_menus"><a href="<?php echo base_url('esportes/categoria/arborismo'); ?>" title="Veja os locais onde você pode praticar arborismo">Arborismo</a></li>
                                <li class="sub_menus"><a href="<?php echo base_url('esportes/categoria/ciclismo'); ?>" title="Veja os locais onde você pode andar de bicicleta">Ciclismo</a></li>
                                <li class="sub_menus"><a href="<?php echo base_url('esportes/categoria/escalada'); ?>" title="Veja os locais onde você pode praticar escalada">Escalada</a></li>
                                <li class="sub_menus"><a href="<?php echo base_url('esportes/categoria/futebol'); ?>" title="Veja os locais onde você pode jogar futebol">Futebol</a></li>
                                <li class="sub_menus"><a href="<?php echo base_url('esportes/categoria/futebol-de-areia'); ?>" title="Veja os locais onde você pode jogar futebol de areia">Futebol de areia</a></li>
                                <li class="sub_menus"><a href="<?php echo base_url('esportes/categoria/futsal'); ?>" title="Veja os locais onde você pode jogar futsal">Futsal</a></li>
                                <li class="sub_menus"><a href="<?php echo base_url('esportes/categoria/patins'); ?>" title="Veja os locais onde você pode andar de patins">Patins</a></li>
                            </ul>
                            <ul>
                                <li class="sub_menus"><a href="<?php echo base_url('esportes/categoria/skate'); ?>" title="Veja os locais onde você pode andar de skate">Skate</a></li>
                                <li class="sub_menus"><a href="<?php echo base_url('esportes/categoria/surf'); ?>" title="Veja os locais onde você pode surfar">Surf</a></li>
                                <li class="sub_menus"><a href="<?php echo base_url('esportes/categoria/tennis'); ?>" title="Veja os locais onde você pode jogar tênnis">Tênnis</a></li>
                                <li class="sub_menus"><a href="<?php echo base_url('esportes/categoria/volei'); ?>" title="Veja os locais onde você pode jogar volêi">Volei</a></li>
                                <li class="sub_menus"><a href="<?php echo base_url('esportes/categoria/outros'); ?>" title="Veja os locais onde você pode praticar outros esportes">Outros</a></li>
                            </ul>
                        </div>
                        <span class="ou">ou</span>
                        <div id="" class="sub_menu">
                            <h4 class="titulo_sub_menus">Rotas para passeio</h4>
                            <ul>
                                <li class="sub_menus"><a href="<?php echo base_url('esporte/categoria/aventura'); ?>" title="Veja as rotas para quem gosta de aventuras">Aventura</a></li>
                                <li class="sub_menus"><a href="<?php echo base_url('esporte/categoria/assustadores'); ?>" title="Veja as rotas para quem gosta de locais assustadores">Assustadoras</a></li>
                                <li class="sub_menus"><a href="<?php echo base_url('esporte/categoria/familiar'); ?>" title="Veja as rotas para fazer com sua familia">Familiar</a></li>
                                <li class="sub_menus"><a href="<?php echo base_url('esporte/categoria/locais-historicos'); ?>" title="Veja as rotas para quem gosta de locais históricos">Locais Históricos</a></li>
                                <li class="sub_menus"><a href="<?php echo base_url('esporte/categoria/romanticas'); ?>" title="Veja as rotas ideais para casais">Romanticas</a></li>
                            </ul>
                        </div>
                        <div id="" class="rodape_menu">
                            <a href="<?php echo base_url('lazer/'); ?>" title="Clique aqui e acesse a pagina de passeio e lazer">
                                <img src="<?php echo base_url('assets'); ?>/images/mais.png" alt=""/>
                                <h2 id="" class="titulo_rodape_menu">Veja mais sobre passeio e lazer clicando aqui</h2>
                            </a>
                        </div>
                    </div>
                </div>
                <div id="estadias" class="link_menu">
                    <a href="<?php echo base_url('estadias/'); ?>" title="">
                        <img src="<?php echo base_url('assets'); ?>/images/cama.png" alt="Prato" />
                        <h3 class="">Estadias</h3>
                        <div class="v"></div>
                    </a>
                    <div id="menu_estadias" class="menus">
                        <h1 class="titulo_menu">Escolha onde você deseja se hospedar:</h1>
                        <div id="" class="sub_menu">
                            <h4 class="titulo_sub_menus">Por tipo</h4>
                            <ul>
                                <li class="sub_menus"><a href="<?php echo base_url('pesquisar/estadia/albergue'); ?>" title="Veja onde tem albergues para você se hospedar">Albergue</a></li>
                                <li class="sub_menus"><a href="<?php echo base_url('pesquisar/estadia/chale'); ?>" title="Veja onde tem chalés para você se hospedar">Chalé</a></li>
                                <li class="sub_menus"><a href="<?php echo base_url('pesquisar/estadia/hotel'); ?>" title="Veja onde tem hotéis para você se hospedar">Hotel</a></li>
                                <li class="sub_menus"><a href="<?php echo base_url('pesquisar/estadia/pousada'); ?>" title="Veja onde tem pousadas para você se hospedar">Pousada</a></li>
                                <li class="sub_menus"><a href="<?php echo base_url('pesquisar/estadia/prive'); ?>" title="Veja onde tem privês para você se hospedar">Privê</a></li>
                                <li class="sub_menus"><a href="<?php echo base_url('pesquisar/estadia/resort'); ?>" title="Veja onde tem resorts para você se hospedar">Resort</a></li>
                            </ul>
                        </div>
                        <span class="ou">ou</span>
                        <div id="" class="sub_menu">
                            <h4 class="titulo_sub_menus">Por localidade</h4>
                            <ul>
                                <li class="sub_menus"><a href="<?php echo base_url('pesquisar/estadia/campo'); ?>" title="Veja locais no campo onde você pode se hospedar">Campo</a></li>
                                <li class="sub_menus"><a href="<?php echo base_url('pesquisar/estadia/cidade'); ?>" title="Veja locais na cidade onde você pode se hospedar">Cidade</a></li>
                                <li class="sub_menus"><a href="<?php echo base_url('pesquisar/estadia/mata'); ?>" title="Veja locais em matas onde você pode se hospedar">Mata</a></li>
                                <li class="sub_menus"><a href="<?php echo base_url('pesquisar/estadia/maritimo'); ?>" title="Veja locais sobre as águas onde você pode se hospedar">Marítimo</a></li>
                                <li class="sub_menus"><a href="<?php echo base_url('pesquisar/estadia/praia'); ?>" title="Veja locais na praia onde você pode se hospedar">Praia</a></li>
                            </ul>
                        </div>
                        <span class="ou">ou</span>
                        <div id="" class="sub_menu">
                            <h4 class="titulo_sub_menus">Por classificação</h4>
                            <ul>
                                <li class="sub_menus"><a href="<?php echo base_url('pesquisar/estadia/tres-estrelas'); ?>" title="Veja locais com classificação 3 estrelas onde você pode se hospedar">3 estrelas</a></li>
                                <li class="sub_menus"><a href="<?php echo base_url('pesquisar/estadia/quatro-estrelas'); ?>" title="Veja locais com classificação 4 estrelas onde você pode se hospedar">4 estrelas</a></li>
                                <li class="sub_menus"><a href="<?php echo base_url('pesquisar/estadia/cinco-estrelas'); ?>" title="Veja locais com classificação 5 estrelas onde você pode se hospedar">5 estrelas</a></li>
                                <li class="sub_menus"><a href="<?php echo base_url('pesquisar/estadia/seis-estrelas'); ?>" title="Veja locais com classificação 6 estrelas onde você pode se hospedar">6 estrelas</a></li>
                            </ul>
                        </div>
                        <div id="" class="rodape_menu">
                            <a href="#" title="Clique aqui e acesse a pagina de estadias">
                                <img src="<?php echo base_url('assets'); ?>/images/mais.png" alt=""/>
                                <h2 id="" class="titulo_rodape_menu">Veja mais sobre estadias clicando aqui</h2>
                            </a>
                        </div>
                    </div>
                </div>
                <div id="entretenimento" class="link_menu link_menu_ultimo">
                    <a href="<?php echo base_url('entretenimentos/'); ?>" title="">
                        <img src="<?php echo base_url('assets'); ?>/images/mascaras.png" alt="Prato" />
                        <h3 class="">Entretenimento</h3>
                        <div class="v"></div>
                    </a>
                    <div id="menu_entretenimento" class="menus">
                        <h1 class="titulo_menu">Escolha o entretenimento que você deseja:</h1>
                        <div id="" class="sub_menu">
                            <h4 class="titulo_sub_menus">Por tipo</h4>
                            <ul>
                                <li class="sub_menus"><a href="<?php echo base_url('pesquisar/entretenimento/cinemas'); ?>" title="Veja os cinemas e os filmes que estão em exibição">Cinemas</a></li>
                                <li class="sub_menus"><a href="<?php echo base_url('pesquisar/entretenimento/exposicoes'); ?>" title="Veja as exposições estão acontecendo">Exposições</a></li>
                                <li class="sub_menus"><a href="<?php echo base_url('pesquisar/entretenimento/feira-e-eventos'); ?>" title="Veja as feiras e eventos que estão acontecendo">Feiras e eventos</a></li>
                                <li class="sub_menus"><a href="<?php echo base_url('pesquisar/entretenimento/shows'); ?>" title="Veja onde tem shows para você">Shows</a></li>
                                <li class="sub_menus"><a href="<?php echo base_url('pesquisar/entretenimento/teatros'); ?>" title="Veja os teatros e as peças que estão em exibição">Teatros</a></li>
                            </ul>
                        </div>
                        <span class="ou">ou</span>
                        <div id="" class="sub_menu">
                            <h4 class="titulo_sub_menus">Por atividade</h4>
                            <ul>
                                <li class="sub_menus"><a href="<?php echo base_url('pesquisar/entretenimento/assistir'); ?>" title="Veja programações para você assistir">Assistir</a></li>
                                <li class="sub_menus"><a href="<?php echo base_url('pesquisar/entretenimento/comprar'); ?>" title="Veja os locais onde você deseja comprar coisas">Comprar</a></li>
                                <li class="sub_menus"><a href="<?php echo base_url('pesquisar/entretenimento/dancar'); ?>" title="Veja os locais onde você pode dançar">Dançar</a></li>
                                
                            </ul>
                        </div>
                        <span class="ou">ou</span>
                        <div id="" class="sub_menu">
                            <h4 class="titulo_sub_menus">Por público</h4>
                            <ul>
                                <li class="sub_menus"><a href="<?php echo base_url('pesquisar/entretenimento/adolecentes'); ?>" title="Veja as programações ideais para adolescentes">Adolescentes</a></li>
                                <li class="sub_menus"><a href="<?php echo base_url('pesquisar/entretenimento/adultos'); ?>" title="Veja as programações ideais para adultos">Adultos</a></li>
                                <li class="sub_menus"><a href="<?php echo base_url('pesquisar/entretenimento/criancas'); ?>" title="Veja as programações ideais para crianças">Crianças</a></li>
                                <li class="sub_menus"><a href="<?php echo base_url('pesquisar/entretenimento/idosos'); ?>" title="Veja as programações ideais para idosos">Idosos</a></li>
                                <li class="sub_menus"><a href="<?php echo base_url('pesquisar/entretenimento/jovens'); ?>" title="Veja as programações ideais para jovens">Jovens</a></li>
                            </ul>
                        </div>
                        <div id="" class="rodape_menu">
                            <a href="#" title="Clique aqui e acesse a pagina de Entretenimento">
                                <img src="<?php echo base_url('assets'); ?>/images/mais.png" alt=""/>
                                <h2 id="" class="titulo_rodape_menu">Veja mais sobre entretenimento clicando aqui</h2>
                            </a>
                        </div>
                    </div>
                </div> 
            </div>
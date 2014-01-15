<div id="publicidade_superior" class="publicidade">
    <div class="conteudo_publicidade">
        <div class="cycle-slideshow" data-cycle-fx="fade" data-cycle-slides="div.item-slider">
            <?php
            if (isset($pub_top)) {
                foreach ($pub_top as $pubtop) {
            ?>
            <div class="item-slider">
                    <a href="<?php echo $pubtop->link_publicidade; ?>" title="" target="<?php echo ($pubtop->newtab_publicidade == 0 ? '_self' : '_blank' ); ?>">
                        <?php echo image_thumb('uploads/publicidades/' . $pubtop->img_vd_publicidade, 914, 90, '', ''); ?>
                    </a>
                </div>
            <?php } } ?>
        </div>
    </div>
</div><!-- Publicidade -->

<!-- Conteudo
================================================== -->
<div id="conteudo"> 
    <?php foreach ($conteudo as $cinema) : ?>
    <div id="area_conteudo_superior"><!-- /inicio da area de conteudo superior -->
        <div id="topo_pagina_anunciante" class="">
            <div id="redes_sociais_pagina">
                <ul>
                    <li><a href="<?php echo $cinema->flickr_cinema; ?>" target="_blank" title="Flickr"><img src="<?php echo base_url('assets'); ?>/images/flickr_icon.jpg" alt="RS" /></a></li>
                    <li><a href="<?php echo $cinema->insta_cinema; ?>" target="_blank" title="Instagram"><img src="<?php echo base_url('assets'); ?>/images/instagram_icon.jpg" alt="RS" /></a></li>
                    <li><a href="<?php echo $cinema->youtube_cinema; ?>" target="_blank" title="Youtube"><img src="<?php echo base_url('assets'); ?>/images/youtube_icon.jpg" alt="RS" /></a></li>
                    <li><a href="<?php echo $cinema->orkut_cinema; ?>" target="_blank" title="Orkut"><img src="<?php echo base_url('assets'); ?>/images/orkut_icon.jpg" alt="RS" /></a></li>
                    <li><a href="<?php echo $cinema->googleplus_cinema; ?>" target="_blank" title="Google Plus"><img src="<?php echo base_url('assets'); ?>/images/gplus_icon.jpg" alt="RS" /></a></li>
                    <li><a href="<?php echo $cinema->twitter_cinema; ?>" target="_blank" title="Twitter"><img src="<?php echo base_url('assets'); ?>/images/twitter_icon.jpg" alt="RS" /></a></li>
                    <li><a href="<?php echo $cinema->facebook_cinema; ?>" target="_blank" title="Facebook"><img src="<?php echo base_url('assets'); ?>/images/facebook_icon.jpg" alt="RS" /></a></li>
                </ul>
            </div>
            <div id="logo_topo_pagina_anunciante" class="">
                <?php if (empty($cinema->logo_cinema)) { ?>
                    <?php echo image_thumb('uploads/logos/default.jpg', 366, 267, '', ''); ?>
                <?php } else { ?>
                    <?php echo image_thumb('uploads/logos/' . $cinema->logo_cinema, 366, 267, '', ''); ?>
                <?php } ?>

                <h3><?php echo $cinema->nome_cinema ?></h3>
            </div>
            <div id="contatos_pagina">
                <div class="contatos_pagina">
                    <h4 class="titulo_contatos_pagina">Telefone:</h4>
                    <h6><?php echo $cinema->fone_cinema ?></h6>
                </div>
                <div class="contatos_pagina">
                    <h4  class="titulo_contatos_pagina">Site:</h4>
                    <h6><?php echo $cinema->site_cinema ?></h6>
                </div>
                <div class="contatos_pagina">
                    <h4  class="titulo_contatos_pagina">E-mail:</h4>
                    <h6><?php echo $cinema->email_cinema ?></h6>
                </div>
            </div>
        </div>
    </div><!-- /fim da area de conteudo superior -->
    <div id="area_conteudo_esquerda"><!-- /inicio da area de conteudo esquerda -->  
        <div id="album">
            <div class="topo_area_pagina">
                <img src="<?php echo base_url('assets'); ?>/images/icone_foto.png" class="icone_area_pagina" />
                <h1 class="titulo_area_pagina">Fotos</h1>
            </div>
            </br></br></br>
            <div class="albun_fotos">   
                <div class="cycle-slideshow" 
                    data-cycle-fx=fade
                    data-cycle-pager="#adv-custom-pager"
                    data-cycle-pager-template="<a href=#><img src='{{src}}' width=80 height=80></a>"
                    >
                    <?php if (!empty($fotos)) { foreach ($fotos as $foto) { ?>
                        <?php echo image_thumb('uploads/fotos/' . $foto->img_foto, 666, 400, '', ''); ?>
                    <?php } } else { ?>
                        <?php echo image_thumb('uploads/fotos/default.jpg', 666, 400, '', ''); ?>
                    <?php } ?>
                </div>
                <!-- empty element for pager links -->
                <div id=adv-custom-pager class="center external"></div>
            </div>
        </div><!-- /album -->

        <div id="descricao_pagina_grande" class="w-grande">
            <div class="topo_area_pagina">
                <img src="<?php echo base_url('assets'); ?>/images/icone_descricao.png" class="icone_area_pagina" />
                <h1 class="titulo_area_pagina">Sobre o cinema</h1>
            </div>
                <p class="texto_pagina"> <?php echo $cinema->desc_cinema ?> </p>
        </div>
        <div id="cinema">
        <div class="topo_area_pagina">
            <img src="<?php echo base_url('assets'); ?>/images/icone_cardapio.png" class="icone_area_pagina" />
            <h1 class="titulo_area_pagina">Filmes em exibição</h1>
        </div>

        <?php if (!empty($filmes)) { foreach ($filmes as $filme) { ?>

        <div class="cartaz">
            <?php echo image_thumb('uploads/filmes/' . $filme->logo_filme, 108, 108, '', ''); ?>
            <h4><?php echo $filme->titulo_filme ?></h4>
            <p><?php echo $filme->sinopse_filme ?></p>
            <div class="classificacao_indicativa">
                <h4>Duração:</h4>
                <p title="duração"><?php echo $filme->duracao_filme ?></p>
                <span>/</span>
                <p title="Gênero"><?php echo $filme->categoria_filme ?></p>
                <span>/</span>
                <p title="Censura"><?php echo $filme->idade_filme ?></p>
            </div>
                
            <div class="horarios_exibicao">
                <h3>Dias e horários de exibição:</h3>
                <div class="dia_exibicao">
                    <h4>Seg</h4>
                    <p>
                    <?php 
                    $seg = $filme->h_seg;
                    $seg = explode(',', $seg);
                    for($i=0;$i<count($seg);$i++) { ?>
                    <p><?php echo $seg[$i]; ?></p>
                    <?php } ?>
                    </p>
                </div>
                <div class="dia_exibicao">
                    <h4>Ter</h4>
                    <p>
                    <?php 
                    $ter = $filme->h_ter;
                    $ter = explode(',', $ter);
                    for($i=0;$i<count($ter);$i++) { ?>
                    <p><?php echo $ter[$i]; ?></p>
                    <?php } ?>
                    </p>
                </div>
                <div class="dia_exibicao">
                    <h4>Qua</h4>
                    <p>
                    <?php 
                    $qua = $filme->h_qua;
                    $qua = explode(',', $qua);
                    for($i=0;$i<count($qua);$i++) { ?>
                    <p><?php echo $qua[$i]; ?></p>
                    <?php } ?>
                    </p>
                </div>
                <div class="dia_exibicao">
                    <h4>Qui</h4>
                    <p>
                    <?php 
                    $qui = $filme->h_qui;
                    $qui = explode(',', $qui);
                    for($i=0;$i<count($qui);$i++) { ?>
                    <p><?php echo $qui[$i]; ?></p>
                    <?php } ?>
                    </p>
                </div>
                <div class="dia_exibicao">
                    <h4>Sex</h4>
                    <p>
                    <?php 
                    $sex = $filme->h_sex;
                    $sex = explode(',', $sex);
                    for($i=0;$i<count($sex);$i++) { ?>
                    <p><?php echo $sex[$i]; ?></p>
                    <?php } ?>
                    </p>
                </div>
                <div class="dia_exibicao">
                    <h4>Sab</h4>
                    <p>
                    <?php 
                    $sab = $filme->h_sab;
                    $sab = explode(',', $sab);
                    for($i=0;$i<count($sab);$i++) { ?>
                    <p><?php echo $sab[$i]; ?></p>
                    <?php } ?>
                    </p>
                </div>
                <div class="dia_exibicao">
                    <h4>Dom</h4>
                    <p>
                    <?php 
                    $dom = $filme->h_dom;
                    $dom = explode(',', $dom);
                    for($i=0;$i<count($dom);$i++) { ?>
                    <p><?php echo $dom[$i]; ?></p>
                    <?php } ?>
                    </p>
                </div>
            </div>
        </div>

        <?php } } ?>
    </div>

        <div id="informacoes_pagina" >
            <div class="topo_area_pagina">
                <img src="<?php echo base_url('assets'); ?>/images/icone_informacao.png" class="icone_area_pagina" />
                <h1 class="titulo_area_pagina">Informações</h1>
            </div>
            <div class="informacoes_pagina_pagamento">
                <h4>Preço(s):</h4> 
                <ul class="dia">
                    <li class="titulo_dia_cinema">Dia</li>
                    <li>Segunda</li>
                    <li>Terça</li>
                    <li>Quarta</li>
                    <li>Quinta</li>
                    <li>Sexta</li>
                    <li>Sábado</li>
                    <li>Domingo</li>
                    <li>Feriados</li>
                </ul>
                <ul>
                    <li class="titulo_dia_cinema"><?php echo $cinema->t_1_cinema ?></li>
                    <li>R$ <?php echo $cinema->seg_1_cinema ?></li>
                    <li>R$ <?php echo $cinema->ter_1_cinema ?></li>
                    <li>R$ <?php echo $cinema->qua_1_cinema ?></li>
                    <li>R$ <?php echo $cinema->qui_1_cinema ?></li>
                    <li>R$ <?php echo $cinema->sex_1_cinema ?></li>
                    <li>R$ <?php echo $cinema->sab_1_cinema ?></li>
                    <li>R$ <?php echo $cinema->dom_1_cinema ?></li>
                    <li>R$ <?php echo $cinema->fer_1_cinema ?></li>
                </ul>
                <ul>
                    <li class="titulo_dia_cinema"><?php echo $cinema->t_2_cinema ?></li>
                    <li>R$ <?php echo $cinema->seg_2_cinema ?></li>
                    <li>R$ <?php echo $cinema->ter_2_cinema ?></li>
                    <li>R$ <?php echo $cinema->qua_2_cinema ?></li>
                    <li>R$ <?php echo $cinema->qui_2_cinema ?></li>
                    <li>R$ <?php echo $cinema->sex_2_cinema ?></li>
                    <li>R$ <?php echo $cinema->sab_2_cinema ?></li>
                    <li>R$ <?php echo $cinema->dom_2_cinema ?></li>
                    <li>R$ <?php echo $cinema->fer_2_cinema ?></li>
                </ul>
                <ul>
                    <li class="titulo_dia_cinema"><?php echo $cinema->t_3_cinema ?></li>
                    <li>R$ <?php echo $cinema->seg_3_cinema ?></li>
                    <li>R$ <?php echo $cinema->ter_3_cinema ?></li>
                    <li>R$ <?php echo $cinema->qua_3_cinema ?></li>
                    <li>R$ <?php echo $cinema->qui_3_cinema ?></li>
                    <li>R$ <?php echo $cinema->sex_3_cinema ?></li>
                    <li>R$ <?php echo $cinema->sab_3_cinema ?></li>
                    <li>R$ <?php echo $cinema->dom_3_cinema ?></li>
                    <li>R$ <?php echo $cinema->fer_3_cinema ?></li>
                </ul>
                <ul>
                    <li class="titulo_dia_cinema"><?php echo $cinema->t_4_cinema ?></li>
                    <li>R$ <?php echo $cinema->seg_4_cinema ?></li>
                    <li>R$ <?php echo $cinema->ter_4_cinema ?></li>
                    <li>R$ <?php echo $cinema->qua_4_cinema ?></li>
                    <li>R$ <?php echo $cinema->qui_4_cinema ?></li>
                    <li>R$ <?php echo $cinema->sex_4_cinema ?></li>
                    <li>R$ <?php echo $cinema->sab_4_cinema ?></li>
                    <li>R$ <?php echo $cinema->dom_4_cinema ?></li>
                    <li>R$ <?php echo $cinema->fer_4_cinema ?></li>
                </ul>
            </div>

            <div class="informacoes_pagina_pagamento">
                <h4>Formas de pagamento:</h4> 
                <div class="formas_pagamento">
                    <?php $pagamento = explode(',', $cinema->pag_cinema);
                    if (in_array('dinheiro', $pagamento)) { echo '<img src="'. base_url('assets') .'/images/icone_dinheiro.jpg" alt="Não aceitamos pagamento com dinheiro" title="Dinheiro" class="icone_esquerda"/>'; }
                    else { echo '<img src="'. base_url('assets') .'/images/icone_dinheiro_claro.jpg" alt="Não aceitamos pagamento com dinheiro" title="Dinheiro" class="icone_esquerda"/>'; }

                    if (in_array('visa', $pagamento)) { echo '<img src="'. base_url('assets') .'/images/icone_visa.jpg" alt="Visa crédito" title="Não aceitamos pagamento com visa crédito" class="icone_esquerda"/>'; }
                    else { echo '<img src="'. base_url('assets') .'/images/icone_visa_claro.jpg" alt="Visa crédito" title="Não aceitamos pagamento com visa crédito" class="icone_esquerda"/>'; }

                    if (in_array('master', $pagamento)) { echo '<img src="'. base_url('assets') .'/images/icone_master.jpg" alt="Não aceitamos pagamento com master Card" title="Master Card" class="icone_esquerda"/>'; }
                    else { echo '<img src="'. base_url('assets') .'/images/icone_master_claro.jpg" alt="Não aceitamos pagamento com master Card" title="Master Card" class="icone_esquerda"/>'; }

                    if (in_array('hiper', $pagamento)) { echo '<img src="'. base_url('assets') .'/images/icone_hiper.jpg" alt="HiperCard" title="Não aceitamos pagamento com hiperCard" class="icone_direita"/>'; }
                    else { echo '<img src="'. base_url('assets') .'/images/icone_hiper_claro.jpg" alt="HiperCard" title="Não aceitamos pagamento com hiperCard" class="icone_direita"/>'; }

                    if (in_array('diners', $pagamento)) { echo '<img src="'. base_url('assets') .'/images/icone_diners.jpg" alt="Diners club" title="Não aceitamos pagamento com diners club" class="icone_esquerda"/>'; }
                    else { echo '<img src="'. base_url('assets') .'/images/icone_diners_claro.jpg" alt="Diners club" title="Não aceitamos pagamento com diners club" class="icone_esquerda"/>'; }

                    if (in_array('elo', $pagamento)) { echo '<img src="'. base_url('assets') .'/images/icone_elo.jpg" alt="Elo" title="Não aceitamos pagamento com elo" class="icone_esquerda"/>'; }
                    else { echo '<img src="'. base_url('assets') .'/images/icone_elo_claro.jpg" alt="Elo" title="Não aceitamos pagamento com elo" class="icone_esquerda"/>'; }

                    if (in_array('american', $pagamento)) { echo '<img src="'. base_url('assets') .'/images/icone_american.jpg" alt="American" title="Não aceitamos pagamento com american express" class="icone_esquerda"/>'; }
                    else { echo '<img src="'. base_url('assets') .'/images/icone_american_claro.jpg" alt="American" title="Não aceitamos pagamento com american express" class="icone_esquerda"/>'; }

                    if (in_array('visaelectro', $pagamento)) { echo '<img src="'. base_url('assets') .'/images/icone_visaelectron.jpg" alt="Não aceitamos pagamento com visa Electron" title="Visa Electron" class="icone_direita"/>'; }
                    else { echo '<img src="'. base_url('assets') .'/images/icone_visaelectron_claro.jpg" alt="Não aceitamos pagamento com visa Electron" title="Visa Electron" class="icone_direita"/>'; }

                    if (in_array('paggo', $pagamento)) { echo '<img src="'. base_url('assets') .'/images/icone_paggo.jpg" alt="Paggo" title="Não aceitamos pagamento com paggo" class="icone_esquerda"/>'; }
                    else { echo '<img src="'. base_url('assets') .'/images/icone_paggo_claro.jpg" alt="Paggo" title="Não aceitamos pagamento com paggo" class="icone_esquerda"/>'; }

                    if (in_array('redeshop', $pagamento)) { echo '<img src="'. base_url('assets') .'/images/icone_redeshop.jpg" alt="RedeShop" title="Não aceitamos pagamento com redeShop" class="icone_esquerda"/>'; }
                    else { echo '<img src="'. base_url('assets') .'/images/icone_redeshop_claro.jpg" alt="RedeShop" title="Não aceitamos pagamento com redeShop" class="icone_esquerda"/>'; }

                    if (in_array('vr', $pagamento)) { echo '<img src="'. base_url('assets') .'/images/icone_vr.jpg" alt="VR" title="Não aceitamos pagamento com VR" class="icone_esquerda"/>'; }
                    else { echo '<img src="'. base_url('assets') .'/images/icone_vr_claro.jpg" alt="VR" title="Não aceitamos pagamento com VR" class="icone_esquerda"/>'; }

                    if (in_array('aura', $pagamento)) { echo '<img src="'. base_url('assets') .'/images/icone_aura.jpg" alt="Aura" title="Não aceitamos pagamento com aura" class="icone_direita"/>'; }
                    else { echo '<img src="'. base_url('assets') .'/images/icone_aura_claro.jpg" alt="Aura" title="Não aceitamos pagamento com aura" class="icone_direita"/>'; }

                    if (in_array('toppremium', $pagamento)) { echo '<img src="'. base_url('assets') .'/images/icone_top.jpg" alt="Top premium" title="Não aceitamos pagamento com top premium" class="icone_grande_esquerda"/>'; }
                    else { echo '<img src="'. base_url('assets') .'/images/icone_top_claro.jpg" alt="Top premium" title="Não aceitamos pagamento com top premium" class="icone_grande_esquerda"/>'; }

                    if (in_array('sodexo', $pagamento)) { echo '<img src="'. base_url('assets') .'/images/icone_sodexo.jpg" alt="Sodexo" title="Não aceitamos pagamento com sodexo" class="icone_grande_esquerda"/>'; }
                    else { echo '<img src="'. base_url('assets') .'/images/icone_sodexo_claro.jpg" alt="Sodexo" title="Não aceitamos pagamento com sodexo" class="icone_grande_esquerda"/>'; }

                    if (in_array('sodexopass', $pagamento)) { echo '<img src="'. base_url('assets') .'/images/icone_sodexopass.jpg" alt="Sodexo Pass" title="Não aceitamos pagamento com sodexo Pass" class="icone_grande_direita"/>'; }
                    else { echo '<img src="'. base_url('assets') .'/images/icone_sodexopass_claro.jpg" alt="Sodexo Pass" title="Não aceitamos pagamento com sodexo Pass" class="icone_grande_direita"/>'; }
                    ?>
                </div>
            </div>
        </div>
        
        <div id="endereco_pagina">
            <div id="" class="topo_area_pagina">
                <img src="<?php echo base_url('assets'); ?>/images/icone_place.png" class="icone_area_pagina" />
                <h1 class="titulo_area_pagina">Endereço</h1>
                <?php echo $map['html']; ?>
                <div id="directionsDiv"></div>
            </div>
            
        </div><!-- /endereco -->
    </div><!-- /fim da area de conteudo esquerda -->
    <div id="area_conteudo_direita_borda"><!-- /inicio da area de conteudo direita -->
        <div class="locais_proximos">
            <a href="" title="">
                <img src="" alt="logo do local" />
                <h3>Pizzaria e cinema Barretos</h3>
                <h5>Local: Graças - Recife</h5>
            </a>
        </div>
        <div class="locais_proximos">
            <a href="" title="">
                <img src="" alt="logo do local" />
                <h3>Pizzaria e cinema Barretos</h3>
                <h5>Local: Graças - Recife</h5>
            </a>
        </div>
        <div class="locais_proximos">
            <a href="" title="">
                <img src="" alt="logo do local" />
                <h3>Pizzaria e cinema Barretos</h3>
                <h5>Local: Graças - Recife</h5>
            </a>
        </div>
        <div class="locais_proximos">
            <a href="" title="">
                <img src="" alt="logo do local" />
                <h3>Pizzaria e cinema Barretos</h3>
                <h5>Local: Graças - Recife</h5>
            </a>
        </div>
        <div class="locais_proximos">
            <a href="" title="">
                <img src="" alt="logo do local" />
                <h3>Pizzaria e cinema Barretos</h3>
                <h5>Local: Graças - Recife</h5>
            </a>
        </div>
        <div class="locais_proximos">
            <a href="" title="">
                <img src="" alt="logo do local" />
                <h3>Pizzaria e cinema Barretos</h3>
                <h5>Local: Graças - Recife</h5>
            </a>
        </div>
        <div class="locais_proximos">
            <a href="" title="">
                <img src="" alt="logo do local" />
                <h3>Pizzaria e cinema Barretos</h3>
                <h5>Local: Graças - Recife</h5>
            </a>
        </div>
    
    </div><!-- /fim da area de conteudo direita -->
    <?php endforeach; ?>
</div>
<!-- /conteudo -->

<div id="publicidade_inferior" class="publicidade">
    <div class="cycle-slideshow" data-cycle-fx="fade" data-cycle-slides="div.item-slider">
        <?php
        if (isset($pub_bottom)) {
            foreach ($pub_bottom as $pubbottom) {
        ?>
        <div class="item-slider">
            <a href="<?php echo $pubbottom->link_publicidade; ?>" title="<?php echo $pubbottom->titulo_publicidade; ?>" target="<?php echo ($pubbottom->newtab_publicidade == 0 ? '_self' : '_blank' ); ?>">
                <img src="<?php echo base_url('tim.php?src=/uploads/publicidades') . '/' . $pubbottom->img_vd_publicidade; ?>&w=980&h=170" alt="<?php echo $pubbottom->titulo_publicidade; ?>"/>
            </a>
        </div>
        <?php }} ?>
    </div>
</div><!-- /publicidade -->
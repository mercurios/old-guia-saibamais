<div id="publicidade_superior" class="publicidade">
    <div class="conteudo_publicidade">
        <div class="cycle-slideshow" data-cycle-fx="fade" data-cycle-slides="div.item-slider">
            <?php
            if (isset($pub_top)) {
                foreach ($pub_top as $pubtop) {
            ?>
            <div class="item-slider">
                    <a href="<?php echo $pubtop->link_publicidade; ?>" title="" target="<?php echo ($pubtop->newtab_publicidade == 0 ? '_self' : '_blank' ); ?>">
                        <img src="<?php echo base_url('tim.php?src=uploads/publicidades/'. $pubtop->img_vd_publicidade .'&w=914&h=90'); ?>" alt="" />
                    </a>
                </div>
            <?php } } ?>
        </div>
    </div>
</div><!-- Publicidade -->

<!-- Conteudo
================================================== -->
<div id="conteudo">
    <?php foreach ($conteudo as $exposicao) : ?>
    <div id="area_conteudo_superior"><!-- /inicio da area de conteudo superior -->
        <div id="topo_pagina_anunciante" class="">
            <div id="redes_sociais_pagina">
                <ul>
                    <li><a href="<?php echo $exposicao->flickr_exposicao; ?>" target="_blank" title="Flickr"><img src="<?php echo base_url('assets'); ?>/images/flickr_icon.jpg" alt="RS" /></a></li>
                    <li><a href="<?php echo $exposicao->insta_exposicao; ?>" target="_blank" title="Instagram"><img src="<?php echo base_url('assets'); ?>/images/instagram_icon.jpg" alt="RS" /></a></li>
                    <li><a href="<?php echo $exposicao->youtube_exposicao; ?>" target="_blank" title="Youtube"><img src="<?php echo base_url('assets'); ?>/images/youtube_icon.jpg" alt="RS" /></a></li>
                    <li><a href="<?php echo $exposicao->orkut_exposicao; ?>" target="_blank" title="Orkut"><img src="<?php echo base_url('assets'); ?>/images/orkut_icon.jpg" alt="RS" /></a></li>
                    <li><a href="<?php echo $exposicao->googleplus_exposicao; ?>" target="_blank" title="Google Plus"><img src="<?php echo base_url('assets'); ?>/images/gplus_icon.jpg" alt="RS" /></a></li>
                    <li><a href="<?php echo $exposicao->twitter_exposicao; ?>" target="_blank" title="Twitter"><img src="<?php echo base_url('assets'); ?>/images/twitter_icon.jpg" alt="RS" /></a></li>
                    <li><a href="<?php echo $exposicao->facebook_exposicao; ?>" target="_blank" title="Facebook"><img src="<?php echo base_url('assets'); ?>/images/facebook_icon.jpg" alt="RS" /></a></li>
                </ul>
            </div>
            <div id="logo_topo_pagina_anunciante" class="">
                <?php if (empty($exposicao->logo_exposicao)) { ?>
                    <img src="<?php echo base_url('tim.php?src=uploads/logos/default.jpg&w=366&h=267'); ?>" alt="" />
                <?php } else { ?>
                    <img src="<?php echo base_url('tim.php?src=uploads/logos/'. $exposicao->logo_exposicao .'&w=366&h=267'); ?>" alt="" />
                <?php } ?>
                <h3><?php echo $exposicao->nome_exposicao ?></h3>
            </div>
            <div id="contatos_pagina">
                <div class="contatos_pagina">
                    <h4 class="titulo_contatos_pagina">Telefone:</h4>
                    <h6><?php echo $exposicao->fone_exposicao ?></h6>
                </div>
                <div class="contatos_pagina">
                    <h4  class="titulo_contatos_pagina">Site:</h4>
                    <h6><?php echo $exposicao->site_exposicao ?></h6>
                </div>
                <div class="contatos_pagina">
                    <h4 class="titulo_contatos_pagina">E-mail:</h4>
                    <h6><?php echo $exposicao->email_exposicao ?></h6>
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
                        <img src="<?php echo base_url('tim.php?src=uploads/fotos/'. $foto->img_foto .'&w=666&h=400'); ?>" alt="" />
                    <?php } } else { ?>
                        <img src="<?php echo base_url('tim.php?src=uploads/fotos/default.jpg&w=666&h=400'); ?>" alt="" />
                    <?php } ?>
                </div>
                <!-- empty element for pager links -->
                <div id=adv-custom-pager class="center external"></div>
            </div>
        </div><!-- /album -->

        <div id="descricao_pagina_grande" class="w-grande">
            <div class="topo_area_pagina">
                <img src="<?php echo base_url('assets'); ?>/images/icone_descricao.png" class="icone_area_pagina" />
                <h1 class="titulo_area_pagina">Descrição</h1>
            </div>
                <p class="texto_pagina"> <?php echo $exposicao->desc_exposicao ?></p>
        </div>
     
        <div id="informacoes_pagina" >
            <div class="topo_area_pagina">
                <img src="<?php echo base_url('assets'); ?>/images/icone_informacao.png" class="icone_area_pagina" />
                <h1 class="titulo_area_pagina">Informações</h1>
            </div>
            <div class="informacoes_pagina">
                <h4>Data(s):</h4> 
                <h6><?php echo $exposicao->data_exposicao ?></h6>
            </div>

            <div class="informacoes_pagina">
                <h4>Preço(s):</h4> 
                <div class="precos_informacoes_pagina">
                    <h6><?php echo $exposicao->titulo_preco_um ?></h6>
                    <p>R$ <?php echo $exposicao->val_preco_um ?></p>
                </div>
                <div class="precos_informacoes_pagina">
                    <h6><?php echo $exposicao->titulo_preco_dois ?></h6>
                    <p>R$ <?php echo $exposicao->val_preco_dois ?></p>
                </div>
                <div class="precos_informacoes_pagina">
                    <h6><?php echo $exposicao->titulo_preco_tres ?></h6>
                    <p>R$ <?php echo $exposicao->val_preco_tres ?></p>
                </div>
            </div>
            <div class="informacoes_pagina">
                <h4>Horário(s):</h4> 
                <h6>Das <?php echo $exposicao->horario_exposicao ?></h6>
            </div>
           
            <div class="informacoes_pagina">
                <h4>Censura:</h4> 
                <h6>12 anos</h6>
            </div>
            <div class="informacoes_pagina_pagamento">
                <h4>Formas de pagamento:</h4> 
                <div class="formas_pagamento">
                    <?php $pagamento = explode(',', $exposicao->pag_exposicao);
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
                <h1 class="titulo_area_pagina">Local</h1>
                <?php echo $map['html']; ?>
                <div id="directionsDiv"></div>
            </div>
            
        </div><!-- /endereco -->
    </div><!-- /fim da area de conteudo esquerda -->
    <div id="area_conteudo_direita_borda"><!-- /inicio da area de conteudo direita -->
        <div class="locais_proximos">
            <a href="" title="">
                <img src="" alt="logo do local" />
                <h3>Pizzaria e Restaurante Barretos</h3>
                <h5>Local: Graças - Recife</h5>
            </a>
        </div>
        <div class="locais_proximos">
            <a href="" title="">
                <img src="" alt="logo do local" />
                <h3>Pizzaria e Restaurante Barretos</h3>
                <h5>Local: Graças - Recife</h5>
            </a>
        </div>
        <div class="locais_proximos">
            <a href="" title="">
                <img src="" alt="logo do local" />
                <h3>Pizzaria e Restaurante Barretos</h3>
                <h5>Local: Graças - Recife</h5>
            </a>
        </div>
        <div class="locais_proximos">
            <a href="" title="">
                <img src="" alt="logo do local" />
                <h3>Pizzaria e Restaurante Barretos</h3>
                <h5>Local: Graças - Recife</h5>
            </a>
        </div>
        <div class="locais_proximos">
            <a href="" title="">
                <img src="" alt="logo do local" />
                <h3>Pizzaria e Restaurante Barretos</h3>
                <h5>Local: Graças - Recife</h5>
            </a>
        </div>
        <div class="locais_proximos">
            <a href="" title="">
                <img src="" alt="logo do local" />
                <h3>Pizzaria e Restaurante Barretos</h3>
                <h5>Local: Graças - Recife</h5>
            </a>
        </div>
        <div class="locais_proximos">
            <a href="" title="">
                <img src="" alt="logo do local" />
                <h3>Pizzaria e Restaurante Barretos</h3>
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
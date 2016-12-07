<div class="container main-container headerOffset">

    <div class="row innerPage">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="row userInfo">

                <section>
                    <header class="header">
                        <h1 class="h1error">  <span class="err404"> </span> TROCA DE MERCADORIAS </h1>
                        <p class="lead text-center"> Desculpe, mas não encontramos o que você procura!</p>
                        <p class="lead text-center">O conteúdo acessado não foi encontrado em nosso site. Sentimos muito por isso! Por favor. Faça uma pesquisa, ou ainda veja abaixo uma lista de nossos produtos mais vendidos!</p>
                    </header>
                    <form class="form-group" name="search" action="" method="post" enctype="multipart/form-data">
                        <input type="text" name="s" placeholder="Pesquisar Produtos:" required/>
                        <button class="btn btn_blue">Pesquisar</button>
                    </form>

                    <?php
                    $Read->ExeRead(DB_PDT, "WHERE (pdt_inventory >= 1 OR pdt_inventory IS NULL) AND pdt_status = 1 ORDER BY pdt_delivered DESC LIMIT 4");
                    if ($Read->getResult()):
                        foreach ($Read->getResult() as $PdtNot):
                            extract($PdtNot);
                            require 'inc/product.php';
                        endforeach;
                    endif;
                    ?>

                </section>

            </div>  <!--/row end-->
        </div>
    </div> <!--/.innerPage-->
    <div style="clear:both">  </div>
</div><!-- /.main-container -->
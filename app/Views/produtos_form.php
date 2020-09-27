<html>
    <head>
        <title><?php echo $titulo ?></title>
    </head>
    <body>
        <h2><?php echo $titulo ?></h2>
        <strong><?php echo $msg ?></strong>
        
        <!-- mensagem capturada de erro  -->

        <?php if($erros != '') :?>
            <ul style="color:red;">
                <?php foreach($erros as $erro) :?>
                    <li><?php echo $erro ?></li>
                <?php endforeach; ?>
            </ul>

        <?php endif; ?>

        <p>
            <a href="<?php echo base_url('produtos/') ?>">Lista de produtos</a>
        </p>
        
        <form method="post" >
            <p>Nome da produto:
                <input type="text" name="nomeproduto" value="<?php echo (isset($produto) ? $produto->nomeproduto : '' ) ?>"/>    
            </p>
            <p>valor do produto:
                <input type="text" name="valor" value="<?php echo (isset($produto) ? $produto->valor : '' ) ?>"/>    
            </p>
            <p>categoria:
                <?php echo (isset($comboCategoria) ? $comboCategoria : '' ) ?>
            </p>
            <input type="submit" value="<?php echo $acao ?>"/>
        </form>

    
<?php echo $this->include('footer') ?>
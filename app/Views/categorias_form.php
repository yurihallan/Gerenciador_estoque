<html>
    <head>
        <title><?php echo $titulo ?></title>
    </head>
    <body>
        <h2><?php echo $titulo ?></h2>
        <strong><?php echo $msg ?></strong>

        <p>
            <a href="<?php echo base_url('categorias/') ?>">Lista de Categorias</a>
        </p>
        
        <form method="post" >
            <p>Nome da categoria:
                <input type="text" name="nomecategoria" value="<?php echo (isset($categoria) ? $categoria->nomecategoria : '' ) ?>"/>    
            </p>
            <input type="submit" value="<?php echo $acao ?>"/>
        </form>

    </body>
</html>

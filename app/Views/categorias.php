<html>
    <head>
        <title><?php echo $titulo ?></title>
    
        <style>
            .tabela, .tabela td, .tabela tr{
                border: 1px solid;
            }
            .tabela{
                width: 500px;
            }
        </style>
    </head>
    <body>
        <h2><?php echo $titulo?></h2>

        <p>
            <a href="<?php echo base_url('categorias/inserir') ?>">Inserir nova Categoria</a>
        </p>

        <table class="tabela">
            <tr>
                <td>Código da Categoria</td>
                <td>Nome da Categoria</td>
            </tr>
            <?php foreach($categorias as $categoria) : ?>

            <tr>
                <td><?php echo $categoria->id ?></td>
                <td><?php echo $categoria->nomecategoria ?></td>
            </tr>    

            <?php endforeach ?>
        </table>
    </body>
</html>
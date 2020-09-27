<?php echo $this->include('header',array('titulo'=> $titulo)) ?>



    <div id="content">
        <h2><?php echo $titulo?></h2>
        <p><?php echo $msg ?></p>
        <hr>
    </div>

            
        <p>
            <a href="<?php echo base_url('produtos/inserir') ?>">Inserir novo produto</a>
        </p>

        <table class="tabela">
            <tr>
                <td>Código do produto</td>
                <td>Nome do produto</td>
                <td>Valor</td>
                <td>Categoria</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            
            <?php foreach($produtos as $produto) : ?>

            <tr>
                <td><?php echo $produto->id ?></td>
                <td><?php echo $produto->nomeproduto ?></td>
                <td><?php echo 'R$ '.$produto->valor ?></td>
                <td><?php echo $produto->categoria_id ?></td>
                <td><a href="<?php echo base_url('produtos/editar/'. $produto->id) ?>">Editar</td>
                <td><a href="<?php echo base_url('produtos/excluir/'. $produto->id) ?>">Deletar</td>
            </tr>    

            <?php endforeach ?>
        </table>


<?php echo $this->include('footer') ?>
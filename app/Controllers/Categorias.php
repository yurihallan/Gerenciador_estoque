<?php namespace App\Controllers;

use CodeIgniter\Config\View;

class Categorias extends BaseController {

    public function index(){
         $categoriaModel = new \App\Models\CategoriaModel();
         //metodo Find() vai buscar todas os dados da tabela categorias
         $data['categorias'] = $categoriaModel->find();
         $data['titulo'] = 'Listando todas as categorias';

      echo  view('categorias', $data);
    }

    public function inserir(){


        $data['titulo'] = 'Nova categoria';
        $data['acao'] = 'Inserir';
        $data['msg'] = '';

        if($this->request->getMethod() == 'post'){
            $categoriaModel = new \App\Models\CategoriaModel();
            $categoriaModel->set('nomecategoria',$this->request->getPost('nomecategoria'));

            if($categoriaModel->insert()){
                //deu certo
                $data['msg'] = 'Categoria inserida com sucesso';
            }else{
                //deu errado
                $data['msg'] = 'Erro ao inserir categoria';
            }
        }            

        echo view('categorias_form', $data);
    }
}
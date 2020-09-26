<?php namespace App\Controllers;

use CodeIgniter\Config\View;

class Categorias extends BaseController {


    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);

		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		// E.g.:
		 $this->session = \Config\Services::session();
	}

    public function index(){
         $categoriaModel = new \App\Models\CategoriaModel();
         //metodo Find() vai buscar todas os dados da tabela categorias
         $data['categorias'] = $categoriaModel->find();
         $data['titulo'] = 'Listando todas as categorias';
        $data['msg'] = $this->session->getFlashdata('msg');


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


    public function editar($id){
        $data['titulo'] = 'Editar categoria '. $id;
        $data['acao'] = 'Editar';
        $data['msg'] = '';

        $categoriaModel = new \App\Models\CategoriaModel();
        $categoria = $categoriaModel->find($id);

        if($this->request->getMethod() == 'post'){
                
            $categoria->nomecategoria = $this->request->getPost('nomecategoria');

            if($categoriaModel->update($id,$categoria)){
                $data['msg'] = 'Categoria editada com sucesso';
            }else{
                $data['msg'] = 'Erro ao editar categoria';
            }

        }

        $data['categoria'] = $categoria;
        echo view('categorias_form',$data);


    }


    public function excluir($id = null){

        if(is_null($id)){
            //verifica se o id é null, se for redireciona para o index
            $this->session->setFlashdata('msg', 'Categoria não encontrada');
            return redirect()->to(base_url(('categorias')));
        }

        $categoriaModel = new \App\Models\CategoriaModel();
        
        if($categoriaModel->delete($id)){
            //excluiu com sucesso
            $this->session->setFlashdata('msg', 'Categoria excluida com sucesso!');
            

        }else{

            $this->session->setFlashdata('msg', 'Erro ao excluir categoria');
        }
        
        return redirect()->to(base_url(('categorias')));

    }


}
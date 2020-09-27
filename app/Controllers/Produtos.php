<?php namespace App\Controllers;

class Produtos extends BaseController{

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

        $produtoModel = new \App\Models\ProdutoModel();
        //metodo Find() vai buscar todas os dados da tabela categorias
        $data['produtos'] = $produtoModel->find();
        $data['titulo'] = 'Lista de Produtos';
        $data['msg'] = $this->session->getFlashdata('msg');

       
        echo  view('produtos', $data);
    }

    public function inserir(){
        $data['titulo'] = 'Inserir novo produto';
        $data['acao'] = 'Inserir';
        $data['msg'] = '';
        $data['erros'] = '';

        if($this->request->getMethod() === 'post'){
            $produtoModel = new \App\Models\ProdutoModel();
            $dadosProduto = $this->request->getPost();
            
            
            if($produtoModel->insert($dadosProduto)){
                $data['msg'] = 'Produto Inserido com sucesso';
            }else{
                $data['msg'] = 'Erro ao inserir produto';
                $data['erros'] = $produtoModel->errors();
            }

        }

        $categoriaModel = new \App\Models\CategoriaModel();
        $listaCategorias = $categoriaModel->findAll();
        helper('form');
        $arrayCategorias = [];
        foreach($listaCategorias as $categoria){
            $arrayCategorias[$categoria->id] = $categoria->nomecategoria;
        }

        $data['comboCategoria'] = form_dropdown('categoria_id',$arrayCategorias);
        echo view('produtos_form',$data);
    }


    public function editar($id){
        $data['titulo'] = 'Editar produto '. $id;
        $data['acao'] = 'Editar';
        $data['msg'] = '';
        $data['erros'] = '';

        $produtoModel = new \App\Models\ProdutoModel();
        $dadosProduto = $produtoModel->find($id);

        if($this->request->getMethod() == 'post'){
                
            
            $dadosProduto->nomeproduto = $this->request->getPost('nomeproduto');
            $dadosProduto->valor = $this->request->getPost('valor');
            $dadosProduto->categoria_id = $this->request->getPost('categoria_id');
           
            
            if($produtoModel->update($id,$dadosProduto)){
                $data['msg'] = 'produto editada com sucesso';
            }else{
                $data['msg'] = 'Erro ao editar produto';
            }
            
        }

        $categoriaModel = new \App\Models\CategoriaModel();
        $listaCategorias = $categoriaModel->findAll();
        helper('form');
        $arrayCategorias = [];
        foreach($listaCategorias as $categoria){
            $arrayCategorias[$categoria->id] = $categoria->nomecategoria;
        }

        $data['comboCategoria'] = form_dropdown('categoria_id',$arrayCategorias);
       
       
        $data['produto'] = $dadosProduto;
        echo view('produtos_form',$data);


    }


    public function excluir($id = null){

        if(is_null($id)){
            //verifica se o id é null, se for redireciona para o index
            $this->session->setFlashdata('msg', 'produto não encontrada');
            return redirect()->to(base_url(('produtos')));
        }

        $produtoModel = new \App\Models\ProdutoModel();

        if($produtoModel->delete($id)){
            //excluiu com sucesso
            $this->session->setFlashdata('msg', 'produto excluido com sucesso!');
            

        }else{

            $this->session->setFlashdata('msg', 'Erro ao excluir produto');
        }
        
        return redirect()->to(base_url(('produtos')));

    }
    
}
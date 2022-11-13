<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\View\JsonView;

/**
 * api Controller
 *
 * @method \App\Model\Entity\api[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ApiController extends AppController
{
    public function viewClasses(): array
    {
        return [JsonView::class];
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index($empresa = null, $mes = null)
    {
        $this->loadModel('Employees');
        $this->viewBuilder()->setLayout('ajax');
        if($this->request->is('post')) {
            $jsonData = $this->request->input('json_decode');
            $empresa = $jsonData->empresa;
            $mes = $jsonData->mes ;
        }

        $employees = $this->Employees->find('all', ['fields'=>['Employees.nome', 'Employees.dataDeNascimento', 'Employees.telefone'], 'conditions'=>"Employees.dataDeNascimento like '__/$mes/____' and Employees.establishment_id = $empresa"]);

        // Set the view vars that have to be serialized.
        $this->set(compact('employees'));

        // Specify which view vars JsonView should serialize.
        $this->viewBuilder()->setOption('serialize', ['employees']);

    }

    public function establishments($empresa = null)
    {
        $this->loadModel('Establishments');
        $this->viewBuilder()->setLayout('ajax');
        if($this->request->is('post')) {
            $jsonData = $this->request->input('json_decode');
            $empresa = $jsonData->empresa;
            $mes = $jsonData->mes ;
        }

        $establishments = $this->Establishments->find('all', ['fields'=>
            [   'Establishments.razaoSocial', 'Establishments.cnpj', 'Establishments.telefone',
                'Establishments.email', 'Establishments.logradouro', 'Establishments.numero',
                'Establishments.complemento', 'Establishments.referencia', 'Establishments.bairro',
                'Establishments.cidade', 'Establishments.estado', 'Establishments.cep',
            ], 'conditions'=>"Establishments.id = $empresa and Establishments.ativo = 'S'",
            ]);

        $employees = $this->Establishments->Employees->find('all', ['fields'=>
            [
                'Employees.nome', 'Employees.dataDeNascimento', 'Employees.telefone', 'Employees.email',
            ], 'conditions'=>"Employees.establishment_id = $empresa and Employees.ativo = 'S'"]);

        $json = [];
        $json['establishments'] = $establishments;
        $json['employees'] = $employees;
        // Set the view vars that have to be serialized.
        $this->set(compact('json'));

        // Specify which view vars JsonView should serialize.
        $this->viewBuilder()->setOption('serialize', compact('json'));

    }

    public function manual()
    {

    }
}

<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Establishments Controller
 *
 * @property \App\Model\Table\EstablishmentsTable $Establishments
 * @method \App\Model\Entity\Establishment[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EstablishmentsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $establishments = $this->Establishments->find('all');

        $this->set(compact('establishments'));
    }

    /**
     * View method
     *
     * @param string|null $id Establishment id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $establishment = $this->Establishments->get($id, [
            'contain' => ['Employees'],
        ]);
        $this->set(compact('establishment'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $establishment = $this->Establishments->newEmptyEntity();
        if ($this->request->is('post')) {
            $form = $this->request->getData();
//            $form['cnpj'] = preg_replace("/[  ^0-9]/","", $form['cnpj']);
//            debug($form
//            );
            $establishment = $this->Establishments->patchEntity($establishment, $form);
//            debug($establishment);
//            exit;
            if ($this->Establishments->save($establishment)) {
                $this->Flash->success(__('O registro foi salvo.'));
                return $this->redirect(['action' => 'index']);
            }
            foreach($establishment->getErrors() as $error){
                if(!empty($error['custom'])){
                    $this->Flash->error($error['custom']);
                } else {
                    $this->Flash->error(__('O registro não pôde ser salvo. Tente novamente'));
                }
            }
        }
        $this->set(compact('establishment'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Establishment id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $establishment = $this->Establishments->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $establishment = $this->Establishments->patchEntity($establishment, $this->request->getData());
            if ($this->Establishments->save($establishment)) {
                $this->Flash->success(__('O registro foi salvo.'));
                return $this->redirect(['action' => 'index']);
            }
            foreach($establishment->getErrors() as $error){
                if(!empty($error['custom'])){
                    $this->Flash->error($error['custom']);
                } else {
                    $this->Flash->error(__('O registro não pôde ser salvo. Tente novamente'));
                }
            }
        }
        $this->set(compact('establishment'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Establishment id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function desativar($id = null)
    {
        $establishment = $this->Establishments->get($id);
        $establishment['ativo'] = ($establishment['ativo'] == 'S') ? 'N' : 'S';
        if ($this->Establishments->save($establishment)) {
            $this->Flash->success(__('O registro foi salvo.'));
        } else {
            $this->Flash->error(__('O registro não pôde ser salvo. Tente novamente'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

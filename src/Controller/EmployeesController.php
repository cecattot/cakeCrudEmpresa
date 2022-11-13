<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Employees Controller
 *
 * @property \App\Model\Table\EmployeesTable $Employees
 * @method \App\Model\Entity\Employee[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EmployeesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Establishments'],
        ];
        $employees = $this->paginate($this->Employees);

        $this->set(compact('employees'));
    }

    /**
     * View method
     *
     * @param string|null $id Employee id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $employee = $this->Employees->get($id, [
            'contain' => ['Establishments'],
        ]);

        $this->set(compact('employee'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $empresa = $this->request->getSession()->read('Empresa');
        $this->request->getSession()->delete('Empresa');
        $employee = $this->Employees->newEmptyEntity();
        $form = $this->request->getData();
        if ($this->request->is('post')) {
            $employee = $this->Employees->patchEntity($employee, $this->request->getData());
            if ($this->Employees->save($employee)) {
                $this->Flash->success(__('O registro foi salvo.'));
                $empresa = !empty($empresa) ? $empresa : $form['establishment_id'];
                return $this->redirect(['controller'=>'establishments', 'action' => 'view', $empresa]);
            }
            $this->Flash->error(__('O registro não pôde ser salvo. Tente novamente'));
        }

        $establishments = $this->Employees->Establishments->find('list', ['limit' => 1, 'conditions'=>"Establishments.id = $empresa"])->all();
        $this->set(compact('employee', 'establishments'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Employee id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $empresa = $this->request->getSession()->read('Empresa');
        $this->request->getSession()->delete('Empresa');
        $employee = $this->Employees->get($id, [
            'contain' => [],
        ]);
        $form = $this->request->getData();
        if ($this->request->is(['patch', 'post', 'put'])) {
            $employee = $this->Employees->patchEntity($employee, $form);
            if ($this->Employees->save($employee)) {
                $this->Flash->success(__('O registro foi salvo.'));
                $empresa = !empty($empresa) ? $empresa : $form['establishment_id'];
                return $this->redirect(['controller'=>'establishments', 'action' => 'view', $empresa]);
            }
            foreach($employee->getErrors() as $error){
                if(!empty($error['custom'])){
                    $this->Flash->error($error['custom']);
                } else {
                    $this->Flash->error(__('O registro não pôde ser salvo. Tente novamente'));
                }
            }
        }

        $establishments = $this->Employees->Establishments->find('list', ['limit' => 200])->all();
        $this->set(compact('employee', 'establishments'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Employee id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function desativar($id = null)
    {
        $empresa = $this->request->getSession()->read('Empresa');
        $this->request->getSession()->delete('Empresa');
        $employee = $this->Employees->get($id);
        $employee['ativo'] = ($employee['ativo'] == 'S') ? 'N' : 'S';
        if ($this->Employees->save($employee)) {
            $this->Flash->success(__('O registro foi salvo.'));
        } else {
            $this->Flash->error(__('O registro não pôde ser salvo. Por favor, tente novamente.'));
        }

        return $this->redirect(['controller'=>'establishments', 'action' => 'index', $empresa]);
    }
}

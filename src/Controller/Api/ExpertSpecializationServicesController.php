<?php
namespace App\Controller\Api;

use App\Controller\AppController;

/**
 * ExpertSpecializationServices Controller
 *
 * @property \App\Model\Table\ExpertSpecializationServicesTable $ExpertSpecializationServices
 *
 * @method \App\Model\Entity\ExpertSpecializationService[] paginate($object = null, array $settings = [])
 */
class ExpertSpecializationServicesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        if (!$this->request->is(['get'])) {
          throw new MethodNotAllowedException(__('BAD_REQUEST'));
        }

        $expertSpecializationServices = $this->ExpertSpecializationServices->find()
                                                ->contain(['Experts', 'ExpertSpecializations', 'SpecializationServices'])
                                                                            ->all();

        $this->set(compact('expertSpecializationServices'));
        $this->set('_serialize', ['expertSpecializationServices']);
    }

    /**
     * View method
     *
     * @param string|null $id Expert Specialization Service id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        if (!$this->request->is(['get'])) {
          throw new MethodNotAllowedException(__('BAD_REQUEST'));
        }

        $expertSpecializationService = $this->ExpertSpecializationServices->get($id, [
            'contain' => ['Experts', 'ExpertSpecializations', 'SpecializationServices']
        ]);

        $this->set('expertSpecializationService', $expertSpecializationService);
        $this->set('_serialize', ['expertSpecializationService']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        if (!$this->request->is(['post'])) {
          throw new MethodNotAllowedException(__('BAD_REQUEST'));
        }

        $expertSpecializationService = $this->ExpertSpecializationServices->newEntity();
    
        $expertSpecializationService = $this->ExpertSpecializationServices->patchEntity($expertSpecializationService, $this->request->getData());

        if (!$this->ExpertSpecializationServices->save($expertSpecializationService)) {
            throw new Exception("Expert specialization services could not be saved.");
        }
            
        $success = true;

        $this->set(compact('expertSpecializationService', 'success'));
        $this->set('_serialize', ['expertSpecializationService', 'success']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Expert Specialization Service id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        if (!$this->request->is(['patch', 'post', 'put'])) {
          throw new MethodNotAllowedException(__('BAD_REQUEST'));
        }

        $expertSpecializationService = $this->ExpertSpecializationServices->get($id, [
            'contain' => []
        ]);
    
        $expertSpecializationService = $this->ExpertSpecializationServices->patchEntity($expertSpecializationService, $this->request->getData());

        if ($this->ExpertSpecializationServices->save($expertSpecializationService)) {
            throw new Exception("Expert specialization service edits could not be saved.");
        }

        $success = true; 

        $this->set(compact('expertSpecializationService', 'success'));
        $this->set('_serialize', ['expertSpecializationService', 'success']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Expert Specialization Service id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        if (!$this->request->is(['patch', 'post', 'put','delete'])) {
            throw new MethodNotAllowedException(__('BAD_REQUEST'));
        }

        $expertSpecializationService = $this->ExpertSpecializationServices->get($id);
        if (!$this->ExpertSpecializationServices->delete($expertSpecializationService)) {
            throw new Exception("Expert specialization service could not be deleted.");
        }

        $success = true;
        
        $this->set(compact('success'));
        $this->set('_serialize', ['success']);
    }
}
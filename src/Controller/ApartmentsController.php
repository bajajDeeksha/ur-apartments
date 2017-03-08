<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Apartments Controller
 *
 * @property \App\Model\Table\ApartmentsTable $Apartments
 */
class ApartmentsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Areas']
        ];
        $apartments = $this->paginate($this->Apartments);

        $this->set(compact('apartments'));
        $this->set('_serialize', ['apartments']);
    }

    /**
     * View method
     *
     * @param string|null $id Apartment id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $apartment = $this->Apartments->get($id, [
            'contain' => ['Areas']
        ]);

        $this->set('apartment', $apartment);
        $this->set('_serialize', ['apartment']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $apartment = $this->Apartments->newEntity();
        if ($this->request->is('post')) {
            $apartment = $this->Apartments->patchEntity($apartment, $this->request->getData());
            if ($this->Apartments->save($apartment)) {
                $this->Flash->success(__('The apartment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The apartment could not be saved. Please, try again.'));
        }
        $areas = $this->Apartments->Areas->find('all')->toArray();
        $this->set(compact('apartment', 'areas'));
        $this->set('_serialize', ['apartment']);
    }

    public function getWards(){
        $this->autoRender=false;
        $data = [];
        $this->loadModel('Areas');
        $areas = $this->Areas->find('all',['conditions' => ['prefecture LIKE'=>key($this->request->data)]]);
        $data[0]="<option value=''>".'---'."</option>";
        foreach($areas as $area)
        {
            $data[]="<option value=$area->ward>".$area->ward."</option>";
        }
        print_r($data);
        //return $data;
    }

    /**
     * Edit method
     *
     * @param string|null $id Apartment id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $apartment = $this->Apartments->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $apartment = $this->Apartments->patchEntity($apartment, $this->request->getData());
            if ($this->Apartments->save($apartment)) {
                $this->Flash->success(__('The apartment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The apartment could not be saved. Please, try again.'));
        }
        $areas = $this->Apartments->Areas->find('list', ['limit' => 200]);
        $this->set(compact('apartment', 'areas'));
        $this->set('_serialize', ['apartment']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Apartment id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $apartment = $this->Apartments->get($id);
        if ($this->Apartments->delete($apartment)) {
            $this->Flash->success(__('The apartment has been deleted.'));
        } else {
            $this->Flash->error(__('The apartment could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

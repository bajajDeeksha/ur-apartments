<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\Apartment;

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
        $this->loadModel('Areas');
        $apartment = $this->Apartments->newEntity();
        $model = Apartment::MODEL;
        $facilities = Apartment::FACILITIES;
        $title = 'Apartment|Add';
        if ($this->request->is('post')) {
            $apartment = $this->Apartments->patchEntity($apartment, $this->request->getData());
            $apartment->area_id = $this->Areas->find()->select('Areas.id')->where(['Areas.ward' => $apartment->selected_ward])->andWhere(['Areas.prefecture' => $apartment->selected_pref]);
            if ($this->Apartments->save($apartment)) {
                $this->Flash->success(__('The apartment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The apartment could not be saved. Please, try again.'));
        }
        $areas = $this->Apartments->Areas->find('all')->toArray();
        $this->set(compact('apartment', 'areas', 'model', 'facilities', 'title'));
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

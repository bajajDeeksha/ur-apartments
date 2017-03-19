<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\Apartment;
use Cake\Filesystem\File;

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
        $title = 'Apartment|List';
        $this->paginate = [
            'contain' => ['Areas']
        ];
        $apartments = $this->paginate($this->Apartments);

        $this->set(compact('apartments', 'title'));
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
        $title = 'Apartment|View';
        $model = Apartment::MODEL;
        $facilities = explode(',', $apartment->facilities);
        $facility = Apartment::FACILITIES;
        $this->set(compact('apartment', 'model', 'facilities', 'facility', 'title'));
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
            if ($this->request->data['image1']){
                $apartment->image1 = $this->Upload->saveImage($apartment['name'], 'image1' ,$this->request->data['image1']);
            }
            if ($this->request->data['image2']){
                $apartment->image2 = $this->Upload->saveImage($apartment['name'], 'image2' ,$this->request->data['image2']);
            }
            if ($this->request->data['image3']){
                $apartment->image3 = $this->Upload->saveImage($apartment['name'], 'image3' ,$this->request->data['image3']);
            }
            if ($this->request->data['image4']){
                $apartment->image4 = $this->Upload->saveImage($apartment['name'], 'image4' ,$this->request->data['image4']);
            }
            $apartment->facilities = implode(',', $this->request->data['facilities']);
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
        $apartment = $this->Apartments->get($id);
        if ($this->Apartments->delete($apartment)) {
            $this->deleteImage('image1', $apartment['image1']);
            $this->deleteImage('image2', $apartment['image2']);
            $this->deleteImage('image3', $apartment['image3']);
            $this->deleteImage('image4', $apartment['image4']);
            $this->Flash->success(__('The apartment has been deleted.'));
        } else {
            $this->Flash->error(__('The apartment could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function deleteImage($imageType, $imageName){
        $file = new File(WWW_ROOT . 'img' . DS . 'uploads' . DS . $imageType . '/' . $imageName, false, 0777);
        $file->delete();
    }
}

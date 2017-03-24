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
        $flag = $this->request->session()->read('flagApt');
        $search = 0;
        $title = 'Apartment|List';
        $this->paginate = [
            'contain' => ['Areas'],
            'order' => ['id'=>'DESC']
        ];
        $apartments = $this->paginate($this->Apartments);

        if ($this->request->is('post')){
            $this->loadModel('Areas');
            $data = $this->request->data;
            if ($data['selected_pref'] && empty($data['selected_ward'])){
                $area_id = $this->getAreaID('', $data['selected_pref']);
                $apartments = $this->Apartments->find('all')->where(['Apartments.area_id IN' => $area_id])->contain('Areas');
            }

            if ($data['selected_pref'] && is_array($data['selected_ward'])){
                $area_id = $this->getAreaID($data['ward'], $data['selected_pref']);
                $apartments = $this->Apartments->find('all')->where(['Apartments.area_id IN' => $area_id])->contain('Areas');
            }
            
            if (!$data['selected_pref'] && is_array($data['selected_ward'])){
                $area_id = $this->getAreaID($data['ward'], null);
                $apartments = $this->Apartments->find('all')->where(['Apartments.area_id IN' => $area_id])->contain('Areas');
            }
            $apartments = $this->paginate($apartments);
            $search = 1;
        }

        $modelPlan = Apartment::MODEL;
        $areas = $this->Apartments->Areas->find('all')->toArray();
        $this->set(compact('apartments', 'title', 'modelPlan', 'areas', 'flag', 'search'));
        $this->set('_serialize', ['apartments']);
    }

    private function getAreaID($ward, $prefecture)
    {
        if ($prefecture && empty($ward)){
            return $this->Areas->find()
                ->select('Areas.id')
                ->where(['Areas.prefecture' => $prefecture]);
        }

        if ($prefecture && is_array($ward)){
            $id = [];

            foreach ($ward as $current_ward){
                $id = $this->Areas->find()
                    ->select('Areas.id')
                    ->where(['Areas.ward' => $current_ward])
                    ->andWhere(['Areas.prefecture' => $prefecture]);
            }

            return $id;
        }

        if (!$prefecture && is_array($ward)){
            $id = [];

            foreach ($ward as $current_ward){
                $id = $this->Areas->find()
                    ->select('Areas.id')
                    ->where(['Areas.ward' => $current_ward])->toArray();
            }
            return $id;
        }
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
        if($this->request->session()->read('currentUser')['auth'] > 0) {
            $this->loadModel('Areas');
            $apartment = $this->Apartments->newEntity();
            $model = Apartment::MODEL;
            $facilities = Apartment::FACILITIES;
            $title = 'Apartment|Add';
            if ($this->request->is('post')) {
                $apartment = $this->Apartments->patchEntity($apartment, $this->request->getData());
                $apartment->area_id = $this->Areas->find()->select('Areas.id')->where(['Areas.ward' => $apartment->selected_ward])->andWhere(['Areas.prefecture' => $apartment->selected_pref]);
                if ($this->request->data['image1']) {
                    $apartment->image1 = $this->Upload->saveImage($apartment['name'], 'image1', $this->request->data['image1']);
                }
                if ($this->request->data['image2']) {
                    $apartment->image2 = $this->Upload->saveImage($apartment['name'], 'image2', $this->request->data['image2']);
                }
                if ($this->request->data['image3']) {
                    $apartment->image3 = $this->Upload->saveImage($apartment['name'], 'image3', $this->request->data['image3']);
                }
                if ($this->request->data['image4']) {
                    $apartment->image4 = $this->Upload->saveImage($apartment['name'], 'image4', $this->request->data['image4']);
                }
                if (!empty($this->request->data('facilities'))) {
                    $apartment->facilities = implode(',', $this->request->data['facilities']);
                }
                if ($this->Apartments->save($apartment)) {
                    $this->request->session()->write('flagApt', 1);
                    $this->Flash->success(__('The apartment has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The apartment could not be saved. Please, try again.'));
            }
            $areas = $this->Apartments->Areas->find('all')->toArray();
            $this->set(compact('apartment', 'areas', 'model', 'facilities', 'title'));
            $this->set('_serialize', ['apartment']);
        } else {
            return $this->redirect(['action' => 'index']);
        }
    }

    public function getWards(){
        $this->autoRender=false;
        $data = [];
        $this->loadModel('Areas');
        $areas = $this->Areas->find('all',['conditions' => ['Areas.prefecture LIKE'=>key($this->request->data)]]);
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
        if($this->request->session()->read('currentUser')['auth'] > 0) {
            $apartment = $this->Apartments->get($id);
            if ($this->Apartments->delete($apartment)) {
                $this->deleteImage('image1', $apartment['image1']);
                $this->deleteImage('image2', $apartment['image2']);
                $this->deleteImage('image3', $apartment['image3']);
                $this->deleteImage('image4', $apartment['image4']);
                $this->request->session()->write('flagApt', 2);
                $this->Flash->success(__('The apartment has been deleted.'));
            } else {
                $this->Flash->error(__('The apartment could not be deleted. Please, try again.'));
            }
        }
        return $this->redirect(['action' => 'index']);
    }

    public function deleteImage($imageType, $imageName){
        $file = new File(WWW_ROOT . 'img' . DS . 'uploads' . DS . $imageType . '/' . $imageName, false, 0777);
        $file->delete();
    }
}

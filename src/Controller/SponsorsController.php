<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Sponsors Controller
 *
 * @property \App\Model\Table\SponsorsTable $Sponsors
 * @method \App\Model\Entity\Sponsor[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SponsorsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->Authorization->skipAuthorization();
        $this->paginate = [
            'contain' => ['Users'],
        ];
        $sponsors = $this->paginate($this->Sponsors);

        $this->set(compact('sponsors'));
    }

    /**
     * View method
     *
     * @param string|null $id Sponsor id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->Authorization->skipAuthorization();

        $sponsor = $this->Sponsors->get($id, [
            'contain' => ['Users', 'Categories', 'Products'],
        ]);

        $this->set(compact('sponsor'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sponsor = $this->Sponsors->newEmptyEntity();
        $this->Authorization->authorize($sponsor);

       
        if ($this->request->is('post')) {
            $sponsor = $this->Sponsors->patchEntity($sponsor, $this->request->getData());

            $sponsor->user_id = $this->request->getAttribute('identity')->getIdentifier();


            if ($this->Sponsors->save($sponsor)) {
                $this->Flash->success(__('The sponsor has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sponsor could not be saved. Please, try again.'));
        }
        $users = $this->Sponsors->Users->find('list', ['limit' => 200])->all();
        $categories = $this->Sponsors->Categories->find('list', ['limit' => 200])->all();
        $this->set(compact('sponsor', 'users', 'categories'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Sponsor id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($slug)
    {
        $sponsor = $this->Sponsors
        ->findBySlug($slug)
        ->contain('Categories')
        ->firstOrFail();
    $this->Authorization->authorize($sponsor);

        $sponsor = $this->Sponsors->get($id, [
            'contain' => ['Categories'],
        ]);
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sponsor = $this->Sponsors->patchEntity($sponsor, $this->request->getData(),[
                // Added: Disable modification of user_id.
                'accessibleFields' => ['user_id' => false]
            ]);
            if ($this->Sponsors->save($sponsor)) {
                $this->Flash->success(__('The sponsor has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sponsor could not be saved. Please, try again.'));
        }
        $users = $this->Sponsors->Users->find('list', ['limit' => 200])->all();
        $categories = $this->Sponsors->Categories->find('list', ['limit' => 200])->all();
        $this->set(compact('sponsor', 'users', 'categories'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Sponsor id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($slug)
    {
        $this->request->allowMethod(['post', 'delete']);

        $sponsor = $this->Sponsors->findBySlug($slug)->firstOrFail();
        $this->Authorization->authorize($sponsor);

        $sponsor = $this->Sponsors->get($id);
        if ($this->Sponsors->delete($sponsor)) {
            $this->Flash->success(__('The sponsor has been deleted.'));
        } else {
            $this->Flash->error(__('The sponsor could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

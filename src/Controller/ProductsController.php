<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Products Controller
 *
 * @property \App\Model\Table\ProductsTable $Products
 * @method \App\Model\Entity\Product[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductsController extends AppController
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
            'contain' => ['Sponsors'],
        ];
        $products = $this->paginate($this->Products);

        $this->set(compact('products'));
    }

    /**
     * View method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->Authorization->skipAuthorization();
        $product = $this->Products->get($id, [
            'contain' => ['Sponsors', 'Categories'],
        ]);

        $this->set(compact('product'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $product = $this->Products->newEmptyEntity();
        $this->Authorization->authorize($product);

        if ($this->request->is('post')) {
            $product = $this->Products->patchEntity($product, $this->request->getData());

            $product->user_id = $this->request->getAttribute('identity')->getIdentifier();


            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $sponsors = $this->Products->Sponsors->find('list', ['limit' => 200])->all();
        $categories = $this->Products->Categories->find('list', ['limit' => 200])->all();
        $this->set(compact('product', 'sponsors', 'categories'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($slug)
    {
        $product = $this->Products
        ->findBySlug($slug)
        ->contain('Categories') 
        ->firstOrFail();
    $this->Authorization->authorize($product);

        $product = $this->Products->get($id, [
            'contain' => ['Categories'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $product = $this->Products->patchEntity($product, $this->request->getData(),[
                // Added: Disable modification of user_id.
                'accessibleFields' => ['user_id' => false]
            ]);


            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $sponsors = $this->Products->Sponsors->find('list', ['limit' => 200])->all();
        $categories = $this->Products->Categories->find('list', ['limit' => 200])->all();
        $this->set(compact('product', 'sponsors', 'categories'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($slug)
    {
        $this->request->allowMethod(['post', 'delete']);

        $product = $this->Products->findBySlug($slug)->firstOrFail();
        $this->Authorization->authorize($product);

        $product = $this->Products->get($id);
        if ($this->Products->delete($product)) {
            $this->Flash->success(__('The product has been deleted.'));
        } else {
            $this->Flash->error(__('The product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

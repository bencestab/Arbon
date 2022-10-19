<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Sponsors Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\ProductsTable&\Cake\ORM\Association\HasMany $Products
 * @property \App\Model\Table\CategoriesTable&\Cake\ORM\Association\BelongsToMany $Categories
 *
 * @method \App\Model\Entity\Sponsor newEmptyEntity()
 * @method \App\Model\Entity\Sponsor newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Sponsor[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Sponsor get($primaryKey, $options = [])
 * @method \App\Model\Entity\Sponsor findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Sponsor patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Sponsor[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Sponsor|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Sponsor saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Sponsor[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Sponsor[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Sponsor[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Sponsor[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SponsorsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('sponsors');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Products', [
            'foreignKey' => 'sponsor_id',
        ]);
        $this->belongsToMany('Categories', [
            'foreignKey' => 'sponsor_id',
            'targetForeignKey' => 'category_id',
            'joinTable' => 'sponsors_categories',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('user_id')
            ->notEmptyString('user_id');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('slug')
            ->maxLength('slug', 255)
            ->requirePresence('slug', 'create')
            ->notEmptyString('slug')
            ->add('slug', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->email('email')
            ->allowEmptyString('email');

        $validator
            ->scalar('logo')
            ->maxLength('logo', 255)
            ->allowEmptyString('logo');

        $validator
            ->scalar('address')
            ->maxLength('address', 255)
            ->allowEmptyString('address');

        $validator
            ->scalar('zip')
            ->maxLength('zip', 11)
            ->requirePresence('zip', 'create')
            ->notEmptyString('zip');

        $validator
            ->scalar('city')
            ->maxLength('city', 255)
            ->requirePresence('city', 'create')
            ->notEmptyString('city');

        $validator
            ->scalar('country_id')
            ->maxLength('country_id', 2)
            ->allowEmptyString('country_id');

        $validator
            ->scalar('phone')
            ->maxLength('phone', 255)
            ->allowEmptyString('phone');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['slug']), ['errorField' => 'slug']);
        $rules->add($rules->existsIn('user_id', 'Users'), ['errorField' => 'user_id']);

        return $rules;
    }
}

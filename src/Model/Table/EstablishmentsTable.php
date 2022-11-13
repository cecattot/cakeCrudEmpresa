<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Establishments Model
 *
 * @property \App\Model\Table\EmployeesTable&\Cake\ORM\Association\HasMany $Employees
 *
 * @method \App\Model\Entity\Establishment newEmptyEntity()
 * @method \App\Model\Entity\Establishment newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Establishment[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Establishment get($primaryKey, $options = [])
 * @method \App\Model\Entity\Establishment findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Establishment patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Establishment[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Establishment|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Establishment saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Establishment[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Establishment[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Establishment[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Establishment[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class EstablishmentsTable extends Table
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

        $this->setTable('establishments');
        $this->setDisplayField('razaoSocial');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Employees', [
            'foreignKey' => 'establishment_id',
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
            ->scalar('razaoSocial')
            ->maxLength('razaoSocial', 255)
            ->requirePresence('razaoSocial', 'create')
            ->notEmptyString('razaoSocial');

        $validator
            ->scalar('cnpj')
            ->maxLength('cnpj', 14)
            ->add('cnpj', 'custom',
                ['rule' =>
                    function ($cnpj) {
                        if (empty($cnpj)) {
                            return false;
                        }
                        // Elimina possivel mascara
                        $cnpj = preg_replace("/[^0-9]/", "", $cnpj);
                        $cnpj = str_pad($cnpj, 14, '0', STR_PAD_LEFT);
                        $repeticoes = array('00000000000000', '11111111111111', '22222222222222', '33333333333333', '44444444444444', '55555555555555', '66666666666666', '77777777777777', '88888888888888', '99999999999999');
                        // Verifica se nenhuma das sequências invalidas abaixo foi digitada. Caso afirmativo, retorna falso
                        if (in_array($cnpj, $repeticoes)) {
                            return false;
                        } else {
                            // Calcula os digitos verificadores para verificar se o CNPJ é válido
                            $j = 5;
                            $k = 6;
                            $soma1 = 0;
                            $soma2 = 0;
//                            $cnpj = intval($cnpj);
                            for ($i = 0; $i < 13; $i++) {
                                $j = $j == 1 ? 9 : $j;
                                $k = $k == 1 ? 9 : $k;
                                $soma2 += (intval($cnpj[$i]) * $k);
                                if ($i < 12) {
                                    $soma1 += (intval($cnpj[$i]) * $j);
                                }
                                $k--;
                                $j--;
                            }
                            $digito1 = $soma1 % 11 < 2 ? 0 : 11 - $soma1 % 11;
                            $digito2 = $soma2 % 11 < 2 ? 0 : 11 - $soma2 % 11;
                            return ((intval($cnpj[12]) == $digito1) and (intval($cnpj[13]) == $digito2));

                        }
                    }
                    ,
                    // Caso retorne falso ele vai retornar uma mensagem falando que é inválido
                    'message' => 'CNPJ Inválido'
                ])
            ->requirePresence('cnpj', 'create')
            ->notEmptyString('cnpj');

        $validator
            ->scalar('telefone')
            ->maxLength('telefone', 16)
            ->requirePresence('telefone', 'create')
            ->notEmptyString('telefone');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email');

        $validator
            ->scalar('logradouro')
            ->maxLength('logradouro', 180)
            ->requirePresence('logradouro', 'create')
            ->notEmptyString('logradouro');

        $validator
            ->scalar('numero')
            ->maxLength('numero', 30)
            ->allowEmptyString('numero');

        $validator
            ->scalar('complemento')
            ->maxLength('complemento', 150)
            ->allowEmptyString('complemento');

        $validator
            ->scalar('referencia')
            ->maxLength('referencia', 180)
            ->allowEmptyString('referencia');

        $validator
            ->scalar('bairro')
            ->maxLength('bairro', 140)
            ->allowEmptyString('bairro');

        $validator
            ->scalar('cidade')
            ->maxLength('cidade', 140)
            ->requirePresence('cidade', 'create')
            ->notEmptyString('cidade');

        $validator
            ->scalar('estado')
            ->maxLength('estado', 2)
            ->requirePresence('estado', 'create')
            ->notEmptyString('estado');

        $validator
            ->scalar('cep')
            ->maxLength('cep', 10)
            ->requirePresence('cep', 'create')
            ->notEmptyString('cep');

        $validator
            ->scalar('ativo')
            ->maxLength('ativo', 1)
            ->allowEmptyString('ativo');

        return $validator;
    }
}

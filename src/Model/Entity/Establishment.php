<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Establishment Entity
 *
 * @property int $id
 * @property string $razaoSocial
 * @property string $cnpj
 * @property string $telefone
 * @property string $email
 * @property string $logradouro
 * @property string|null $numero
 * @property string|null $complemento
 * @property string|null $referencia
 * @property string|null $bairro
 * @property string $cidade
 * @property string $estado
 * @property string $cep
 * @property string|null $ativo
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Employee[] $employees
 */
class Establishment extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'razaoSocial' => true,
        'cnpj' => true,
        'telefone' => true,
        'email' => true,
        'logradouro' => true,
        'numero' => true,
        'complemento' => true,
        'referencia' => true,
        'bairro' => true,
        'cidade' => true,
        'estado' => true,
        'cep' => true,
        'ativo' => true,
        'created' => true,
        'modified' => true,
        'employees' => true,
    ];
}

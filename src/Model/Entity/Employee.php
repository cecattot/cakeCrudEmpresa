<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Employee Entity
 *
 * @property int $id
 * @property string $nome
 * @property string $telefone
 * @property string $email
 * @property string $dataDeNascimento
 * @property string|null $ativo
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $establishment_id
 *
 * @property \App\Model\Entity\Establishment $establishment
 */
class Employee extends Entity
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
        'nome' => true,
        'telefone' => true,
        'email' => true,
        'dataDeNascimento' => true,
        'ativo' => true,
        'created' => true,
        'modified' => true,
        'establishment_id' => true,
        'establishment' => true,
    ];
}

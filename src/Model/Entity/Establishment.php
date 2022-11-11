<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Establishment Entity
 *
 * @property int $id
 * @property string $razaoSocial
 * @property int $cnpj
 * @property string $telefone
 * @property string $email
 * @property string $endereco
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
        'endereco' => true,
        'employees' => true,
    ];
}

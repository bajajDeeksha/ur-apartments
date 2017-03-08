<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Apartment Entity
 *
 * @property int $id
 * @property string $name
 * @property int $area_id
 * @property string $address
 * @property int $floor
 * @property float $size
 * @property string $model_plan
 * @property int $rent
 * @property int $service_fee
 * @property string $facilities
 * @property string $traffic
 * @property string $remarks
 * @property string $image1
 * @property string $image2
 * @property string $image3
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\Area $area
 */
class Apartment extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}

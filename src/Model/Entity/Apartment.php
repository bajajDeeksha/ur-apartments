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

    const MODEL = [
        1=>'1K', 2=>'1DK', 3=>'1LDK',
        4=>'2K', 5=>'2DK', 6=>'2LDK',
        7=>'3K', 8=>'3DK', 9=>'3LDK',
        10=>'4DK', 11=>'4LDK',
        12=>'5LDK', 13=>'6LDK',

    ];

    const FACILITIES = [
        '1' => 'Elevator',
        '2' => 'Landing Floor Type Elevator',
        '3' => 'Balcony Landing Elevator',
        '4' => 'Delivery Box',
        '5' => 'Surveillance Camera',
        '6' => 'Pet friendly',
        '7' => 'CATV',
        '8' => 'BS',
        '9' => 'BS / 110 CS',
        '10' => ' VDSL',
        '11' => ' In-building LAN',
        '12' => 'ADSL',
        '13' => 'CATV Internet',
        '14' => 'Optical Wiring',
        '15' => 'South-east oriented',
        '16' => 'Top Floor',
        '17' => 'Corner Room',
        '18' => 'Sound Proof Room',
        '19' => 'Private Garden',
        '20' => 'Loft',
        '21' => 'Maisonette',
        '22' => 'Housing with one side brace',
        '23' => 'Housing with both side brace',
        '24' => 'DIY housing',
        '25' => 'Stage select',
        '26' => 'Wheelchair friendly',
        '27' => 'Auto door lock',
        '28' => 'Trunk Room',
        '29' => 'Interphone',
        '30' => 'Interphone with screen',
        '31' => 'FTTH optical outlet',
        '32' => 'All electrification',
        '33' => 'Bath and Toilet seperate',
        '34' => 'Shower set',
        '35' => 'Automatic Hot water supply',
        '36' => 'Reheating',
        '37' => 'Bathroom ventillation dryer',
        '38' => 'Mist sauna',
        '39' => 'Bathroom heater',
        '40' => 'Multifunctional Toilet seat',
        '41' => 'Toilet call',
        '42' => 'Vanity with washroom',
        '43' => 'In-room clother metal fitting',
        '44' => 'System Kitchen',
        '45' => 'L-shaped Kitchen',
        '46' => 'U-shaped Kitchen',
        '47' => 'Type II Kitchen',
        '48' => 'Independant Kitchen',
        '49' => 'Island Kitchen',
        '50' => 'Face-to-Face Kitchen',
        '51' => 'Disposal',
        '52' => 'Drop in stove',
        '53' => 'IH cooking heater',
        '54' => 'Electric cooking heater',
        '55' => 'Placed type stove',
        '56' => 'All room A/C',
        '57' => 'A/C',
        '58' => 'Floor heating (gas type)',
        '59' => 'Floor heating (electric type)',
        '60' => 'Floor heating',
        '61' => 'Ventilation system',
        '62' => 'Walk-in Closet',
        '63' => 'Shoe box',
        '64' => 'Shoe walk-in Closet',
        '65' => 'Balcony',
        '66' => 'L-shaped Balcony',
        '67' => 'Roof Balcony',
        '68' => 'Double window glazing',
        '69' => 'Screen Door',
        '70' => 'Parking lot available'
    ];

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

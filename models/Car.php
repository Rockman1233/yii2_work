<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Car".
 *
 * @property integer $car_id
 * @property integer $car_owner
 * @property string $colour
 * @property integer $consumption
 * @property integer $cost_less_30_inc
 * @property integer $cost_more_31
 * @property string $foto
 * @property string $mark
 * @property string $model
 * @property integer $mileage
 * @property string $state_num
 * @property integer $year
 *
 * @property Owner $carOwner
 * @property Contract[] $contracts
 */
class Car extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Car';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['car_owner', 'colour', 'consumption', 'cost_less_30_inc', 'cost_more_31', 'foto', 'mark', 'model', 'mileage', 'state_num', 'year'], 'required'],
            [['car_owner', 'consumption', 'cost_less_30_inc', 'cost_more_31', 'mileage', 'year'], 'integer'],
            [['colour', 'foto', 'mark', 'model'], 'string', 'max' => 255],
            [['state_num'], 'string', 'max' => 11],
            [['car_owner'], 'exist', 'skipOnError' => true, 'targetClass' => Owner::className(), 'targetAttribute' => ['car_owner' => 'owner_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'car_id' => 'Car ID',
            'car_owner' => 'Car Owner',
            'colour' => 'Colour',
            'consumption' => 'Consumption',
            'cost_less_30_inc' => 'Cost Less 30 Inc',
            'cost_more_31' => 'Cost More 31',
            'foto' => 'Foto',
            'mark' => 'Mark',
            'model' => 'Model',
            'mileage' => 'Mileage',
            'state_num' => 'State Num',
            'year' => 'Year',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCarOwner()
    {
        return $this->hasOne(Owner::className(), ['owner_id' => 'car_owner']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContracts()
    {
        return $this->hasMany(Contract::className(), ['car' => 'car_id']);
    }
}

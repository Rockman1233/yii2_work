<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Contract".
 *
 * @property integer $contract_id
 * @property integer $car
 * @property integer $driver
 * @property integer $status
 * @property string $start_date
 * @property string $finish_date
 * @property integer $cost
 *
 * @property Car $car0
 * @property Driver $driver0
 */
class Contract extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Contract';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['car', 'driver', 'status', 'start_date', 'finish_date', 'cost'], 'required'],
            [['car', 'driver', 'status', 'cost'], 'integer'],
            [['start_date', 'finish_date'], 'safe'],
            [['car'], 'exist', 'skipOnError' => true, 'targetClass' => Car::className(), 'targetAttribute' => ['car' => 'car_id']],
            [['driver'], 'exist', 'skipOnError' => true, 'targetClass' => Driver::className(), 'targetAttribute' => ['driver' => 'driver_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'contract_id' => 'Contract ID',
            'car' => 'Car',
            'driver' => 'Driver',
            'status' => 'Status',
            'start_date' => 'Start Date',
            'finish_date' => 'Finish Date',
            'cost' => 'Cost',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCar0()
    {
        return $this->hasOne(Car::className(), ['car_id' => 'car']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDriver0()
    {
        return $this->hasOne(Driver::className(), ['driver_id' => 'driver']);
    }
}

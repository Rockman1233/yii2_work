<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Driver".
 *
 * @property integer $driver_id
 * @property string $first_name
 * @property string $last_name
 * @property string $login
 * @property string $pass
 * @property integer $drive_license
 * @property string $email
 * @property integer $experience
 * @property integer $passport_num
 * @property integer $telephone
 * @property string $address
 *
 * @property Contract[] $contracts
 */
class Driver extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Driver';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'login', 'pass', 'drive_license', 'email', 'experience', 'passport_num', 'telephone', 'address'], 'required'],
            [['drive_license', 'experience', 'passport_num', 'telephone'], 'integer'],
            [['first_name', 'last_name', 'login', 'pass', 'email', 'address'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'driver_id' => 'Driver ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'login' => 'Login',
            'pass' => 'Pass',
            'drive_license' => 'Drive License',
            'email' => 'Email',
            'experience' => 'Experience',
            'passport_num' => 'Passport Num',
            'telephone' => 'Telephone',
            'address' => 'Address',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContracts()
    {
        return $this->hasMany(Contract::className(), ['driver' => 'driver_id']);
    }
}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Owner".
 *
 * @property integer $owner_id
 * @property string $login
 * @property string $pass
 * @property string $first_name
 * @property string $last_name
 * @property integer $telephone
 * @property string $email
 * @property integer $passport_num
 * @property string $address
 *
 * @property Car[] $cars
 */
class Owner extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Owner';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['login', 'pass', 'first_name', 'last_name', 'telephone', 'email', 'passport_num', 'address'], 'required'],
            [['telephone', 'passport_num'], 'integer'],
            [['login', 'pass', 'first_name', 'last_name', 'email', 'address'], 'string', 'max' => 255],
            [['login'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'owner_id' => 'Owner ID',
            'login' => 'Login',
            'pass' => 'Pass',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'telephone' => 'Telephone',
            'email' => 'Email',
            'passport_num' => 'Passport Num',
            'address' => 'Address',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCars()
    {
        return $this->hasMany(Car::className(), ['car_owner' => 'owner_id']);
    }
}

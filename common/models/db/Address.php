<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "address".
 *
 * @property int $id
 * @property int $user_id
 * @property string $house_name
 * @property string $house_no
 * @property string $road
 * @property string $thana
 * @property string $postal_code
 * @property string $country
 * @property string $city
 * @property string $type
 *
 * @property User $user
 */
class Address extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'address';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'thana', 'country', 'city', 'type'], 'required'],
            [['user_id'], 'integer'],
            [['type'], 'string'],
            [['house_name', 'house_no', 'road', 'thana', 'country', 'city'], 'string', 'max' => 150],
            [['postal_code'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'house_name' => 'House Name',
            'house_no' => 'House No',
            'road' => 'Road',
            'thana' => 'Thana',
            'postal_code' => 'Postal Code',
            'country' => 'Country',
            'city' => 'City',
            'type' => 'Type',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}

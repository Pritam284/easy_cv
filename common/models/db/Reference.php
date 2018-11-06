<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "reference".
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $designation
 * @property string $address
 * @property string $contact_no
 * @property string $email
 *
 * @property User $user
 */
class Reference extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reference';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'name', 'designation', 'address'], 'required'],
            [['user_id'], 'integer'],
            [['address'], 'string'],
            [['name', 'designation', 'email'], 'string', 'max' => 150],
            [['contact_no'], 'string', 'max' => 50],
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
            'name' => 'Name',
            'designation' => 'Designation',
            'address' => 'Address',
            'contact_no' => 'Contact No',
            'email' => 'Email',
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

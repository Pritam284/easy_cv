<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "personal_data".
 *
 * @property int $id
 * @property int $user_id
 * @property string $father_name
 * @property string $mother_name
 * @property string $dob
 * @property string $gender
 * @property string $religion
 * @property string $country
 * @property string $marital_status
 * @property string $blood_group
 * @property string $photo
 * @property string $email
 * @property string $contact_no
 *
 * @property User $user
 */
class PersonalData extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'personal_data';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'father_name', 'mother_name', 'dob', 'gender', 'religion', 'country', 'marital_status', 'blood_group', 'email', 'contact_no'], 'required'],
            [['user_id'], 'integer'],
            [['dob'], 'safe'],
            [['gender', 'marital_status', 'blood_group'], 'string'],
            [['father_name', 'mother_name', 'religion', 'country', 'contact_no'], 'string', 'max' => 50],
            [['photo', 'email'], 'string', 'max' => 255],
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
            'father_name' => 'Father Name',
            'mother_name' => 'Mother Name',
            'dob' => 'Dob',
            'gender' => 'Gender',
            'religion' => 'Religion',
            'country' => 'Country',
            'marital_status' => 'Marital Status',
            'blood_group' => 'Blood Group',
            'photo' => 'Photo',
            'email' => 'Email',
            'contact_no' => 'Contact No',
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

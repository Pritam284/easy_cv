<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "experience".
 *
 * @property int $id
 * @property int $user_id
 * @property string $company_name
 * @property string $designation
 * @property string $department
 * @property string $year_from
 * @property string $year_to
 * @property string $responsibilities
 * @property int $currently_working
 *
 * @property User $user
 */
class Experience extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'experience';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'company_name', 'designation', 'department', 'year_from', 'responsibilities'], 'required'],
            [['user_id', 'currently_working'], 'integer'],
            [['year_from', 'year_to'], 'safe'],
            [['responsibilities'], 'string'],
            [['company_name', 'designation', 'department'], 'string', 'max' => 150],
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
            'company_name' => 'Company Name',
            'designation' => 'Designation',
            'department' => 'Department',
            'year_from' => 'Year From',
            'year_to' => 'Year To',
            'responsibilities' => 'Responsibilities',
            'currently_working' => 'Currently Working',
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

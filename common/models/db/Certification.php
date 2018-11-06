<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "certification".
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $authority
 * @property string $year
 * @property string $certificate_no
 *
 * @property User $user
 */
class Certification extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'certification';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'name', 'authority', 'year'], 'required'],
            [['user_id'], 'integer'],
            [['year'], 'safe'],
            [['name', 'authority', 'certificate_no'], 'string', 'max' => 150],
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
            'authority' => 'Authority',
            'year' => 'Year',
            'certificate_no' => 'Certificate No',
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

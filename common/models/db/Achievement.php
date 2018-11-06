<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "achievement".
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $authority
 * @property string $year
 * @property string $description
 *
 * @property User $user
 */
class Achievement extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'achievement';
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
            [['description'], 'string'],
            [['name', 'authority'], 'string', 'max' => 150],
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
            'description' => 'Description',
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

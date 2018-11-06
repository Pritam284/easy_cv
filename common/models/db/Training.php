<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "training".
 *
 * @property int $id
 * @property int $user_id
 * @property string $institute
 * @property string $name
 * @property string $year_from
 * @property string $year_to
 * @property string $description
 * @property int $on_training
 *
 * @property User $user
 */
class Training extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'training';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'institute', 'name', 'year_from', 'description'], 'required'],
            [['user_id', 'on_training'], 'integer'],
            [['year_from', 'year_to'], 'safe'],
            [['description'], 'string'],
            [['institute', 'name'], 'string', 'max' => 150],
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
            'institute' => 'Institute',
            'name' => 'Name',
            'year_from' => 'Year From',
            'year_to' => 'Year To',
            'description' => 'Description',
            'on_training' => 'On Training',
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

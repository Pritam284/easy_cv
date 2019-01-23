<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "education".
 *
 * @property int $id
 * @property int $user_id
 * @property string $institute
 * @property string $degree
 * @property string $subject
 * @property string $year_from
 * @property string $year_to
 * @property double $result
 *
 * @property User $user
 */
class Education extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'education';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'institute', 'degree', 'subject', 'year_from', 'year_to', 'result'], 'required'],
            [['user_id'], 'integer'],
            [['year_from', 'year_to'], 'safe'],
            [['result'], 'number'],
            [['institute'], 'string', 'max' => 150],
            [['degree', 'subject'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
//            ['id', 'safe'],
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
            'degree' => 'Degree',
            'subject' => 'Subject',
            'year_from' => 'Year From',
            'year_to' => 'Year To',
            'result' => 'Result',
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

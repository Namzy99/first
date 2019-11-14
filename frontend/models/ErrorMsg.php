<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "error_msg".
 *
 * @property int $id
 * @property int $userid
 * @property string $message
 */
class ErrorMsg extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'error_msg';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['userid', 'message'], 'required'],
            [['userid'], 'integer'],
            [['message'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'userid' => 'Userid',
            'message' => 'Message',
        ];
    }
}

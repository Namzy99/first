<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "otp".
 *
 * @property int $id
 * @property int $userid
 * @property int $otp
 * @property int $status
 */
class Otp extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'otp';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['userid', 'otp'], 'required'],
            [['userid', 'otp', 'status'], 'integer'],
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
            'otp' => 'Otp',
            'status' => 'Status',
        ];
    }
    
    public function sendEmail($otp, $email)
    {
          $message = Yii::$app->mailer->compose( ['html' => 'otp'],
                ['otp' => $otp]);
           $message->getSwiftMessage()->getHeaders()->addTextHeader('name', 'value');
           $message->setFrom(['support@rockettrade.org' => 'Rocket Trade']);
           $message->setTo($email);
           $message->setSubject('Password reset for Rocket Trade');
           return $message->send();
    }
    
}

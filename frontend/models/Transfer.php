<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "transfer".
 *
 * @property int $id
 * @property int $userid
 * @property int $amount
 * @property string $date
 * @property string $bank
 * @property int $accountNumber
 * @property int $routingNumber
 * @property string $name
 * @property string $message
 */
class Transfer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'transfer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['userid', 'amount', 'bank', 'accountNumber', 'routingNumber', 'name', 'message'], 'required'],
            [['userid', 'amount', 'accountNumber', 'routingNumber'], 'integer'],
            [['date'], 'safe'],
            [['bank', 'name', 'message'], 'string', 'max' => 255],
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
            'amount' => 'Amount',
            'date' => 'Date',
            'bank' => 'Bank',
            'accountNumber' => 'Account Number',
            'routingNumber' => 'Routing Number',
            'name' => 'Name',
            'message' => 'Message',
        ];
    }
}

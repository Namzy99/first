<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "transactions".
 *
 * @property int $id
 * @property int $userid
 * @property int $transactionType 0 is transfer and 1 is deposit
 * @property int $transactionId
 * @property int $transactionStatus
 * @property string $date
 */
class Transactions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'transactions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['userid', 'transactionType', 'transactionId'], 'required'],
            [['userid', 'transactionType', 'transactionId', 'transactionStatus'], 'integer'],
            [['date'], 'safe'],
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
            'transactionType' => 'Transaction Type',
            'transactionId' => 'Transaction ID',
            'transactionStatus' => 'Transaction Status',
            'date' => 'Date',
        ];
    }
}

<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "transfer_by".
 *
 * @property int $id
 * @property int $userid
 * @property string $firstname
 * @property string $lastname
 * @property string $email
 * @property string $address
 * @property int $telephone
 * @property int $transferId
 */
class TransferBy extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'transfer_by';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['userid', 'firstname', 'lastname', 'email', 'address', 'telephone', 'transferId'], 'required'],
            [['userid', 'telephone', 'transferId'], 'integer'],
            [['firstname', 'lastname', 'email', 'address'], 'string', 'max' => 255],
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
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'email' => 'Email',
            'address' => 'Address',
            'telephone' => 'Telephone',
            'transferId' => 'Transfer ID',
        ];
    }
}

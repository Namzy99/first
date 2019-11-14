<?php

namespace backend\models;
use common\models\User;

use Yii;

/**
 * This is the model class for table "person".
 *
 * @property int $id
 * @property int $userid
 * @property string $firstname
 * @property string $lastname
 * @property int $accountNo
 * @property string $date
 * @property string $address
 * @property int $telephone
 * @property string $sex
 * @property string $nationality
 * @property string $maritalStatus
 * @property string $occupation
 * @property int $zip
 * @property string $dateOfBirth
 * @property string $Bio
 * @property int $balance
 * @property int $transferStatus 0 is enabled and 1 is disabled
 * @property string $profilePicture
 */
class Person extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'person';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['firstname', 'lastname', 'accountNo', 'address', 'telephone', 'sex', 'nationality', 'maritalStatus', 'occupation', 'zip', 'dateOfBirth', 'Bio', 'balance', 'profilePicture'], 'required'],
            [['userid', 'accountNo', 'telephone', 'zip', 'balance', 'transferStatus'], 'integer'],
            [['date'], 'safe'],
            [['firstname', 'lastname', 'address', 'sex', 'nationality', 'maritalStatus', 'occupation', 'dateOfBirth', 'Bio', 'profilePicture'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'accountNo' => 'Account No',
            'date' => 'Date',
            'address' => 'Address',
            'telephone' => 'Telephone',
            'sex' => 'Sex',
            'nationality' => 'Nationality',
            'maritalStatus' => 'Marital Status',
            'occupation' => 'Occupation',
            'zip' => 'Zip',
            'dateOfBirth' => 'Date Of Birth',
            'Bio' => 'Bio',
            'balance' => 'Balance',
            'transferStatus' => 'Transfer Status',
            'profilePicture' => 'Profile Picture',
        ];
    }
    
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'userid']);
    }
    public function getEmail()
    {
        return $this->user->email;
    }
    public function getName()
    {
        return $this->user->username;
    }
    public function getId()
    {
        return $this->user->id;
    }
}

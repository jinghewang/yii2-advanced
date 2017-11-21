<?php

namespace frontend\models;

use Yii;
use yii\filters\auth\HttpBasicAuth;
use yii\helpers\Url;
use yii\web\Link;
use yii\web\Linkable;
use yii\web\Response;

/**
 * This is the model class for table "rp_province".
 *
 * @property integer $province_id
 * @property string $province_code
 * @property string $province
 */
class Province extends \yii\db\ActiveRecord implements Linkable
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rp_province';
    }

    public function fields() {
        $fields =  parent::fields();
        $fields['province-full'] = function ($model) {
            return $model->province_id . ' ' . $model->province;
        };

        //unset($fields['province']);
        return $fields;
    }

    public function extraFields() {
        $fields = parent::extraFields();
        print_r($fields);die;
        return $fields;
    }

    public function behaviors() {
        $behaviors = parent::behaviors();
        //$behaviors['contentNegotiator']['formats']['text/html'] = Response::FORMAT_HTML;
        $behaviors['authenticator'] = [
            'class' => HttpBasicAuth::className(),
        ];

        return $behaviors;
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['province_code'], 'string', 'max' => 6],
            [['province'], 'string', 'max' => 40],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'province_id' => Yii::t('app', '省份id'),
            'province_code' => Yii::t('app', '省份编码'),
            'province' => Yii::t('app', '省份名称'),
        ];
    }

    /**
     * Returns a list of links.
     *
     * Each link is either a URI or a [[Link]] object. The return value of this method should
     * be an array whose keys are the relation names and values the corresponding links.
     *
     * If a relation name corresponds to multiple links, use an array to represent them.
     *
     * For example,
     *
     * ```php
     * [
     *     'self' => 'http://example.com/provinces/1',
     *     'friends' => [
     *         'http://example.com/provinces/2',
     *         'http://example.com/provinces/3',
     *     ],
     *     'manager' => $managerLink, // $managerLink is a Link object
     * ]
     * ```
     *
     * @return array the links
     */
    public function getLinks() {

        return [
            Link::REL_SELF => Url::to(['province/view', 'id' => $this->province_id], true),
            'edit' => Url::to(['province/view', 'id' => $this->province_id], true),
            'profile' => Url::to(['province/profile/view', 'id' => $this->province_id], true),
            'index' => Url::to(['provinces'], true),
        ];
    }
}

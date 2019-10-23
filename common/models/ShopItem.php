<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%shop_item}}".
 *
 * @property integer $id
 * @property integer $id_vendor
 * @property integer $id_type
 * @property string $name
 * @property string $f_name
 * @property integer $price
 * @property integer $price_sale
 * @property string $descr2
 * @property string $freq
 * @property string $created
 * @property string $page
 * @property string $foto
 * @property string $rule
 * @property integer $hidden
 * @property string $title
 * @property string $description
 * @property string $keywords
 */
class ShopItem extends \yii\db\ActiveRecord
{

	public $_images;

    public static function tableName()
    {
        return '{{%shop_item}}';
    }

    public function rules()
    {
        return [
            [['id_vendor', 'id_type', 'price', 'price_sale', 'hidden'], 'integer'],
            [['id_type', 'name', 'f_name', 'price_sale', 'created', 'page', 'rule', 'title', 'description', 'keywords'], 'required'],
            [['freq'], 'number'],
            [['created'], 'safe'],
            [['name', 'title', 'keywords'], 'string', 'max' => 60],
            [['f_name', 'page', 'foto'], 'string', 'max' => 50],
            [['descr2'], 'string', 'max' => 10000],
            [['rule'], 'string', 'max' => 40],
            [['description'], 'string', 'max' => 160],
            [['page'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_vendor' => 'Id Vendor',
            'id_type' => 'Тип игры',
            'name' => 'Название',
            'f_name' => 'F Name',
            'price' => 'Цена',
            'price_sale' => 'Цена со скидкой',
            'descr2' => 'Описание',
            'freq' => 'Freq',
            'created' => 'Добавлена',
            'page' => 'Страница',
            'foto' => 'Фото',
            'rule' => 'Правила',
            'hidden' => 'Скрыт',
            'title' => 'Title',
            'description' => 'Description',
            'keywords' => 'Keywords',
        ];
    }

    public function getCharVal()
    {
        return $this->hasMany(ShopCharVal::className(), ['item_id' => 'id']);
    }

    public function getImages()
    {
    	if (!$_images)
    		return $this->hasMany(ShopItemImg::className(), ['item_id' => 'id'])->limit(10);
    	return $this->_images;
    }

    public function getImageMain()
    {
    	return $this->hasOne(ShopItemImg::className(), ['item_id' => 'id'])->where(['status' => 2]);
    }

    public function getImageHtml()
    {
    	return '<img src="/images/game/'.$this->id.'/'.$this->imageMain->filename.'">';
    }

    public function getImagesHtml()
    {
        $m =[];
        foreach ($this->images as $img) {
            $m[] = '<img src="/images/game/'.$this->id.'/'.$img->filename.'">';
        }
        return $m;
    }

    public function minMaxText($char1_id, $char2_id)
    {

        $char1 = ShopCharVal::find()->where(['item_id' => $this->id, 'char_id' => $char1_id])->one();
        $char2 = ShopCharVal::find()->where(['item_id' => $this->id, 'char_id' => $char2_id])->one();

        if ($char1) {
            if ($char2)
                if ($char2->val != 99)
                    return $char1->val.' - '.$char2->val;

            return $char1->val.'+';
        }
        return '-';
    }

    public function getZhanr()
    {
        return ShopCharVal::find()->where(['item_id' => $this->id, 'char_id' => 1])->all();
    }
    public function getNavyk()
    {
        return ShopCharVal::find()->where(['item_id' => $this->id, 'char_id' => 4])->all();
    }
    public function getSituaciya()
    {
        return ShopCharVal::find()->where(['item_id' => $this->id, 'char_id' => 5])->all();
    }
    public function getDevName()
    {
        $char = ShopCharVal::find()->where(['item_id' => $this->id, 'char_id' => 11])->one();

        return $char->valName;
    }

    public function moveImgToBD()
    {
    	if (!count($this->images)) {
    		$files = glob("/var/www/u0035406/data/www/kroko.online/frontend/web/images/game/".$this->id."/*");
	    	if (count($files)) {
	    		$i=0;
		    	foreach ($files as $file) {
		    		$file_bd = new ShopItemImg();
		    		$file_bd->item_id = $this->id;
		    		$file_bd->filename = end(explode("/", $file));
		    		if (!$i) 
		    			$file_bd->status = 2;
		    		else 
		    			$file_bd->status = 1;
		    		if ($file_bd->save()) $i++;

		    	}
		    	return 'Сохранено файлов: '.$i;
		    } else return 'Нет файлов картинок';
		} else {
			return 'Файлы в БД '.count($this->images).' штук';
		}
    }
}

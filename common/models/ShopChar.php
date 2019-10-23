<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%shop_char}}".
 *
 * @property integer $id
 * @property string $name
 * @property integer $type
 * @property integer $status
 */
class ShopChar extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return '{{%shop_char}}';
    }

    public function rules()
    {
        return [
            [['name', 'url_name'], 'required'],
            [['type', 'multi' , 'status', 'filter', 'sort', 'minmax', 'minmax_type'], 'integer'],
            [['name', 'url_name'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'url_name' => 'URL в фильтре',
            'type' => 'Тип',
            'multi' => 'Многозначность',
            'status' => 'Статус',
            'sort' => 'Сортировка',
            'filter' => 'Добавить в фильтр',
            'minmax' => 'Тип для фильтра',
            'minmax_type' => 'Тип ограничения для фильтра',
        ];
    }

    public static function urlByValEx($char_id, $val_id)
    {
        $char = self::findOne($char_id);
        if ($char && ($char->type == 1)) {
            $valEx = ShopCharValEx::findOne($val_id);

            if ($valEx && ($valEx->char_id == $char_id))
                return $valEx->url_name;
        }

        return $val_id;
    }
    public static function valExByUrl($char_id, $url_name)
    {
        $char = self::findOne($char_id);

        if ($char->type == 1) {

            $valEx = ShopCharValEx::find()->where(['url_name' => $url_name])->one();

            if ($valEx && ($valEx->char_id == $char_id))
                return $valEx->id;
        }

        return $url_name;
    }

    public static function filterToUrl($data)
    {
    	$url = '';
        foreach ($data as $val) {
        	$char = self::findOne($val['id']);
        	$url .= '/'.$char->url_name;
            if (is_array($val['val'])) {
            	$url .= '/';
                foreach ($val['val'] as $values) {
                    $url .= self::urlByValEx($val['id'], $values).'-';
                }
                $url = substr($url, 0, -1);
            } else {
            	$url .= '/'.self::urlByValEx($val['id'], $val['val']);
            }
        }
        return $url;
    }

    public static function UrlToFilter($url)
    {
    	$noslashurl = substr($url,1);

    	$m = explode('/', $noslashurl);
    	$return = [];
    	for ($i = 1; $i<=count($m)/2; $i++) {
    		$r['id'] = strval(self::find()->where(['url_name' => $m[$i*2-2]])->one()->id);
            $r['val'] = [];
    		if (strpos($m[$i*2-1], '-'))
    			foreach(explode('-', $m[$i*2-1]) as $url_name) {
                    $r['val'][] = self::valExByUrl($r['id'], $url_name);    
                }
    		else
    			$r['val'] = self::valExByUrl($r['id'], $m[$i*2-1]);

    		$return[] = $r;
    	}

    	return $return;
    }

    public static function urlToFilterCheck($url)
    {
        $res = [];
        foreach (self::urlToFilter($url) as $filter) {
            $res[$filter['id']] = $filter['val'];
        }
        return $res;
    }

    public static function findFilterIds($data)
    {
		$q = (new \yii\db\Query())->select('item_id')->from('shop_char_val');
        $first = true;
        $op = 'where';

        foreach ($data as $val) {
            $char = self::findOne($val['id']);
            $m = [];

            if (is_array($val['val'])) {
                foreach ($val['val'] as $value) {
                    $q->$op(['char_id' => $val['id'], 'val' => $value]);

                    if ($first) {
                        $first = false;
                        $op = 'orWhere';
                    }
                }
            } else {
                if ($char->minmax) {
                    if ( (($char->minmax == 1) AND ($char->minmax_type == 1)) OR (($char->minmax == 2) AND ($char->minmax_type == 2)) )
                        $q->$op('char_id ='.$val['id'].' AND val >= '.$val['val']);
                    else 
                        $q->$op('char_id ='.$val['id'].' AND val <= '.$val['val']);
                } else
                    $q->$op(['char_id' => $val['id'], 'val' => $val['val']]);
            }
            if ($first) {
                $first = false;
                $op = 'orWhere';
            }
        }
        $q->groupBy('item_id')->having('COUNT(*) > '.(count($data)-1));
        
        //var_dump($q->createCommand()->getRawSql());

        $ids = [];
        foreach ($q->all() as $item_id) {
            $ids[] = $item_id['item_id'];
        }

        return $ids;
    }

    public static function filterChars()
    {
        return self::find()->where(['status' => 1, 'filter' => 1])->orderBy('sort')->all();
    }

    /*public static function filterCharsNamedArray()
    {
        $chars = [];
        foreach(self::filterChars() as $char) {
            $chars[$char->url_name] = $char;
        }
        return $chars;
    }*/

    public static function choosesChars()
    {
        return self::findAll(['type' => 1]);
    }

    public function getCharValEx()
    {
        if ($this->type != 1) return false;

        return $this->hasMany(ShopCharValEx::className(), ['char_id' => 'id']);
    }
}

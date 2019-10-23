<?

namespace common\models;

use Yii;
use yii\base\Model;
use yii\helpers\ArrayHelper;

class Cart extends Model
{

    private $_data;
    private $_item_data;

    private $_price;

    public static function getCart()
    {
        $cart = new self();
        $cart->_data = self::cartData();

        $price = 0;
        if ($cart->items) {            
            foreach ($cart->items as $id => $count) {
                $price = $price + ShopItem::findOne($id)->price * $count;            
            }            
        }
        $cart->_price = $price;

        return $cart;
    }

    public static function addToCart($item_id, $count)
    {
        $session = Yii::$app->session;
        if (!$session->isActive) $session->open();
        
        if (!$session['cart']['items'][$item_id]) {
            if ($session['cart']['items'])
                $session['cart'] = [
                    'items' =>  ArrayHelper::merge([$item_id => $count], $session['cart']['items']),
                    'count' => $session['cart']['count'] + $count,
                ];
            else
                $session['cart'] = [
                    'items' => [
                        $item_id => $count
                    ],
                    'count' => $count,
                ];
        }
        else {
            $m = $session['cart'];
            $m['items'][$item_id] = $m['items'][$item_id] + $count;
            $m['count'] = $m['count'] + $count;
            $session['cart'] = $m;
        }

        return self::getCart();
    }

    public static function cartData()
    {
        $session = Yii::$app->session;
        if (!$session->isActive) $session->open();

        return $session['cart'];
    }

    public function getData()
    {
        if (!$this->_data) $this->_data = self::cartData();

        return $this->_data;
    }

    public function getCount()
    {
        return $this->data['count'] ? $this->data['count'] : 0;
    }

    public function getPrice()
    {
        return $this->_price;
    }

    public function getItems()
    {
        return $this->data['items'];
    }

    public function getShopItems()
    {
        $m = [];
        foreach ($this->items as $id => $count) {
            $m[] = [
                'shopItem' => ShopItem::findOne($id),
                'count' => $count,
            ];
        }
        return $m;
    }
}
?>
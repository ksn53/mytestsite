<?php

interface HasMoney
{
    public function getMoney();
}

class Shop implements HasMoney
{
    private $products =[];
    private $money;

    public function addProduct(Product $product)
    {
        $this->products[] = $product;
    }

    public function getProductsSortedByPrice()
    {
        usort($this->products, function($first,$second) {
            return $first->getPrice() < $second->getPrice();
        });
        return $this->products;
    }

    public function sellTheMostExpensiveProduct(Client $client)
    {
        foreach ($this->getProductsSortedByPrice() as $key => $product) {
            if ($client->canBuyProduct($product)) {
                $client->buyProduct($product);
                $this->sellProduct($product, $key);
                return true;
            }
        }
    return false;
    }

    private function sellProduct(Product $product, $key)
    {
        $this->money += $product->getPrice();
        unset($this->products[$key]);
    }

    public function getMoney()
    {
        return $this->money;
    }
}

class Client implements HasMoney
{
    private $product = null;
    protected $money;

    public function __construct(int $money)
    {
        $this->money = $money;
    }

    public function canBuyProduct(Product $product): bool
    {
        if ($product->getPrice() <= $this->money) {
            return true;
        }
        return false;
    }

    public function buyProduct(Product $product)
    {
        $this->product = $product;
        $this->money -= $product->getPrice();
    }

    public function getBoughtProduct()
    {
        return $this->product->getName();
    }

    public function getMoney()
    {
        return $this->money;
    }
}

class Product
{
    protected $name;
    protected $price;

    public function __construct(string $name, int $price)
    {
        $this->name = $name;
        $this->price = $price;
    }

    public function getPrice()
    {
        return (int) $this->price;
    }

    public function getName()
    {
        return $this->name;
    }
}

$clients = [new Client(100), new Client(1), new Client(10), new Client(100000), new Client(300)];
$productsToAdd = [new Product('Товар 100', 100), new Product('Товар 10', 10), new Product('Товар 1000', 1000), new Product('Товар 100', 100)];
$shop = new Shop;

echo "<pre>";
//заполняем магазин товарами
foreach ($productsToAdd as $product) {
    $shop->addProduct($product);
}

echo '<br>список продуктов<br>';
foreach ($shop->getProductsSortedByPrice() as $product) {
    echo $product->getName() . ' цена ' . $product->getPrice() . '<br>';
}
echo '<br>';

//клиенты заходят в магазин
foreach ($clients as $key => $client) {
    echo '<br>Клиент ' . $key . ' встал в очередь. У него было денег:' . $client->getMoney() . '<br>';
    if ($shop->sellTheMostExpensiveProduct($client)) {
        echo 'Клиент ' . $key . ' купил товар ' . $client->getBoughtProduct() . '. У него осталось денег: ' . $client->getMoney() . '<br>';
    } else {
        echo 'Клиент ' . $key . ' ничего не купил. У него осталось денег: ' . $client->getMoney() . '<br>';
    }
}
echo '<br>Товаров куплено на сумму:' . $shop->getMoney();


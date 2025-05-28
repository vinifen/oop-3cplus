<?php
class Market {
    private array $products;

    public function __construct(Products ...$products) 
    {
        $this->products = $products;
    }

    public function order(array $productsName, string $paymentMethod)
    {
        $result = [
            "info" => [
                "paymente_method" => $paymentMethod, 
                "total_price" => 0
            ], 
            "products" => [] 
        ];

        foreach ($productsName as $productName) {
            foreach ($this->products as $product) {
                if($product->getName() == $productName){
                    if($product->verifyStock()){
                        $result["info"]["total_price"] += $product->getPrice(); 
                        array_push(
                            $result["products"], [
                                "name" => $product->getName(), 
                                "price" => $product->getPrice()
                            ]
                        );
                        $product->remove(1);
                        
                    }else{
                        array_push(
                            $result["products"], [
                                "name" => $product->getName(), 
                                "massage" => "Product out of stock"
                            ]
                        );
                    }

                }
            }
        }
        return $result;
    }

    public function addProducts(Products ...$newProducts)
    {
        foreach ($newProducts as $newProduct) {
            array_push($this->products, $newProduct);
        }
    }
}

class Products {
    public function __construct(private string $name, private float $price, private int $stock) {
        
    }

    public function remove(int $n){
        if($this->stock - $n < 0){
            return ["message" => "Amount invalid: Stock will be minor than 0"];
        }
        $this->stock -= $n;
    }

    public function add(int $n){
        $this->stock += $n;
    }
    public function verifyStock(){
        if($this->stock == 0){
            return false;
        }
        return true;
    }

    public function getName(){
        return $this->name;
    }

    public function getPrice(){
        return $this->price;
    }

}



$bacon = new Products("bacon", 12.00, 120);
$milk = new Products("milk", 15.90, 50);
$market1 = new Market(...[$bacon, $milk]);
echo var_dump($market1->order(["milk", "bacon"], "card")); 
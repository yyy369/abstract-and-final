<?php
abstract Class Goods{
	protected $name;
	protected $price;
	protected $numbers;
}
public function __construct($name,$price,$number){
	$this->name=$name;
	$this->price=$price;
	$this->number=$number;
}
public function getprice(){
	return $this->price;
}
public abstract function discount($discount);//折扣
public abstract function introduce();
Class book extends Goods{
	private $publisher;
	private $author;
	public function __construct($publisher,$author,$name,$price,$number){
		parent::__construct($name,$price,$number);
		$this->publisher=$publisher;
		$this->author=$author;
	}
	public function discount($discount){
		if ($discount>=0.3) {
			$this->price=round($this->price*$discount,2);
		}else{
			trigger_error('图书商品折扣必须大于三折',E_USER_NOTICE);
		}
	}
	public function introduce(){
		echo"[图书信息:]<br>";
		echo "书名:{$this->name}<br>";
		echo "出版社：{$this->publisher}<br>";
		echo "作者：{$this->author}<br>";
		echo "单价:{$this->price}<br>";
		echo "库存:{$this->number}<br>";
	}
}
Class phone extends Goods{
	private $model;
	private $brand;
	public function __construct($model,$brand,$name,$price,$number){
		parent::__construct($name,$price,$number);
		$this->model=$model;
		$this->brand=$brand;
	}
	public function discount($discount){
		if ($discount>=0.7) {
			$this->price=round($this->price*$discount,2);
		}else{
			trigger_error('手机商品折扣必须大于七折',E_USER_NOTICE);
		}
	}
	public function introduce(){
		echo"[手机信息:]<br>";
		echo "型号:{$this->model}<br>";
		echo "品牌：{$this->brand}<br>";
		echo "作者：{$this->author}<br>";
		echo "单价:{$this->price}<br>";
		echo "库存:{$this->number}<br>";
	}
}
//无法创建 $goods1= new Goods(); 因为抽象类无法实例化
$book1= new book('河北大学出版社','张三','PHP',30.00,10);
$book1->discount(0.9);
echo $book1->getprice();
echo "<br>";
$book1->discount(0.2);//这个理论上不执行，会报错因为规定了图书折扣必须大于三折
echo $book1->getprice();
echo "<br>";
$book1->introduce();
echo "<br>";
$phone1= new phone('p20pro','华为','HUAWEI P20PRO',7999,10);
$phone1->discount(0.9);
echo $phone1->getprice();
echo "<br>";
$phone1->discount(0.2);//这个理论上不执行，会报错因为规定了手机折扣必须大于三折
echo $phone1->getprice();
echo "<br>";
$phone1->introduce();

?>

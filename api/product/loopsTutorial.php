<?php
//unset() сброс массива
$arr = array(1, 2, 3, 4);
$arr2 = array(1, 2, 3, 4);
//foreach ($arr as $value) {
//    $value = $value * 2;
//    echo "res = " . $value;
//}

//foreach ($arr as $key => $item) {
//    echo "KEY = {$key} => VALUE = {$item}";
//    print_r($arr);
//}

//foreach (array(1,4,6,75,44) as $item) {
//    $value = $value * 2;
//}

//$i = 0;
//foreach ($arr as $item) {
//    echo "\$arr[$i] => $item";
//    $i++;
//}
//

$array = [
    [1, 2], [3, 4]
];
//foreach ($array as list($a, $b)) {
//    echo "A: $a; B: $b; \n";
//}
//A: 1; B: 2;
//A: 3; B: 4;

//foreach ($array as list($a)) {
//    echo "$a \n";
//}
//1
//3

//foreach ($array as list($a, $b, $c)) {
//    echo "A: $a; B: $b; C: $c \n";
//}

//foreach ($array as $value) {
//    [$a, $b] = $value;
//    echo "A: $a; B: $b \n";
//}
//A: 1; B: 2
//A: 3; B: 4

//foreach ($array as [$a, $b]) {
//    echo "A: $a; B: $b \n";
//}
//A: 1; B: 2
//A: 3; B: 4

//condition
//
//if (2 > 5):
//    echo 2 > 5;
//elseif (2 < 5):
//    echo 2 < 5;
//else:
//    echo 2 == 5;
//endif;


//while
//$i = 1;
//while ($i <= 10):
//    echo $i++ . " | ";
//endwhile;

//$i = 1;
//while ($i <= 10) {
//    echo $i . ", ";
//    $i++;
//}
//$i = 1;
//$j = 1;
//while ($i < 10) {
//  while ($j < 10) {
//      echo $i * $j . "\t";
//      $j++;
//  }
//  echo "\n";
//  $j = 1;
//  $i++;
//}


//$i = 5;
//do {
//    echo $i;
//    $i--;
//}while($i > 0); res  = 5,4,3,2,1

//$people = array(
//    array('name' => 'Aken', 'salt' => 100),
//    array('name' => 'Bakr', 'salt' => 200)
//);
//for($i = 0; $i < count($people); $i++) {
//    $people[$i]['salt'] = mt_rand(0000, 5999);
//}
//var_dump($people);

//$arr = array('один', 'два', 'три', 'четыре', 'стоп', 'пять');
//foreach ($arr as $item) {
//    if ($item == 'стоп') {
//        break;
//    }
//    echo "$item \n";
//}


//$i = 0;
//while(++$i) {
//    switch ($i) {
//        case 5:
//            echo "Итерация 5 \n";
//            break;
//        case 10:
//            echo "Итерация 10 \n";
//            break 2; // Выход из switch и цикла
//        case 20:
//            echo "Итерация 20 \n";
//            break;
//        default:
//            break;
//    }
//}

$i = 2;
//switch ($i) {
//    case 1:
//    case 2:
//    case 3:
//        echo "Hello";
//        break;
//    case 4:
//    case 5:
//    case 6:
//        echo "hello my boss!";
//        break;
//    default:
//        echo "Exit";
//}

//echo match ($i) {
//    1, 2, 3 => "Hello",
//    4, 5, 6 => "hello my boss!",
//    default => "Exit",
//};

//function testSwitch($key)
//{
//    switch ($key) {
//        case 'non numeric string':
//            echo $key . 'matches "non numeric string"';
//            break;
//    }
//}
//
//
//testSwitch("asdasdas");

//function getTypes($element) {
//    foreach ($element as $item) {
//        echo gettype($item), "\n";
//    }
//}
//
//$data = array(1, 1., NULL, new stdClass, 'foo');
//
//getTypes($data);

//intval('0') конвертер числа / принимает str/ bool/ double/array

//function days_in_mouth(string $mouth) : int {
//    return match (strtolower(substr($mouth, 0 , 3))) {
//        'jan' => 1,
//        'feb' => 2,
//        'mar' => 3,
//        default => throw new InvalidArgumentException("Bogus month")
//    };
//}
//
//echo days_in_mouth("march");

//$food = 'cake';
//$return_value = [
//    'apple' => 'This food is an apple',
//    'bar' => 'This food is a bar',
//    'cake' => 'This food is a cake',
//][$food];
//print $return_value;


//$error_code = 400;
//$message = match ($error_code) {
//    200 => 'OK',
//    400=>"Bad Request",
//    401=>"Unauthorized",
//    403=>"Forbidden",
//    404=>"Not Found",
//    default=>"Unknown Error"
//};
//var_dump($message);


//if((include 'purePHPCreateProduct.php') == TRUE) {
//    echo "OK";
//}

interface Template
{
    public function setVariable($name, $var);

    public function getHtml($template);
}

 class  WorkingTemplate implements Template
{
    private $vars = [];

    public final function setVariable($name, $var): void
    {
        $this->vars[$name] = $var;
    }

    public function getHtml($template)
    {
        foreach ($this->vars as $name => $value) {
            $template = str_replace('{' . $name . '}', $value, $template);
        }
        return $template;
    }
}

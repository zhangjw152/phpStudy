# 数组函数
* array array_change_key_case(arrat $array[,int $case=CASE_LOWER])将数组中的全部键名修改为大写或小写
<pre>
$arr=array("FirSt"=>1,'SecoNd'=>4);
$new_arr=array_change_key_case($arr,CASE_UPPER);
print_r($new_arr);//Array ( [FIRST] => 1 [SECOND] => 4 )
</pre>

## 数组分割
* array array_chunk(array $array,int $size[,bool $preserve_keys=false])将一个数组分成多个，每个数组的单元数目由size决定，$preserve_keys为true则会保留原有的键名
<pre>
$input_array=array('a','b','c','d','e','f','g');
print_r(array_chunk($input_array,2,false));Array ( [0] => Array ( [0] => a [1] => b ) [1] => Array ( [0] => c [1] => d ) [2] => Array ( [0] => e [1] => f ) [3] => Array ( [0] => g ) )
print_r(array_chunk($input_array,2,true));Array ( [0] => Array ( [0] => a [1] => b ) [1] => Array ( [2] => c [3] => d ) [2] => Array ( [4] => e [5] => f ) [3] => Array ( [6] => g ) )
</pre>

* array array_slice(array $array,int $offset[,int $length=null[,bool $preserve_keys=false]])返回根据offset和lenth参数指定的array数组中的一段序列，$preserve_keys为true则会保留原有的键名
<pre>
$input_array=array('a','b','c','d','e','f','g');
print_r(array_slice($input_array,2,-1));//Array ( [0] => c [1] => d [2] => e [3] => f )
print_r(array_slice($input_array,2,-1,true));//Array ( [2] => c [3] => d [4] => e [5] => f )
</pre>

* array array_aplice(array &$input,int $offset,[,int length=count(input)[,mixed $replacement=array]])把input数组中由offset和length指定的单元去掉，并用replacements元素替代
<pre>
$input = array('red', 'green', 'blue', 'yellow');
array_splice($input, 2);
print_r($input);//Array ( [0] => red [1] => green )
$input = array('red', 'green', 'blue', 'yellow');
array_splice($input, 1, -1);
print_r($input);//Array ( [0] => red [1] => yellow )
$input = array('red', 'green', 'blue', 'yellow');
array_splice($input, 1, count($input), 'orange');
print_r($input);//Array ( [0] => red [1] => orange )
$input = array('red', 'green', 'blue', 'yellow');
array_splice($input, -1, 1, array('black', 'maroon'));
print_r($input);//Array ( [0] => red [1] => green [2] => blue [3] => black [4] => maroon )
$input = array('red', 'green', 'blue', 'yellow');
array_splice($input, 3, 0, 'purple');
print_r($input);//Array ( [0] => red [1] => green [2] => blue [3] => purple [4] => yellow )
</pre>

* array array_column(array $input,mixed $column_key[,mixed $index_key=null])返回$input数组中键值为column_key的列,并用index_key作为键值
<pre>
$records = array(
    array(
        'id' => 2135,
        'first_name' => 'John',
        'last_name' => 'Doe',
    ),
    array(
        'id' => 3245,
        'first_name' => 'Sally',
        'last_name' => 'Smith',
    ),
    array(
        'id' => 5342,
        'first_name' => 'Jane',
        'last_name' => 'Jones',
    ),
    array(
        'id' => 5623,
        'first_name' => 'Peter',
        'last_name' => 'Doe',
    )
);
$last_name=array_column($records,'last_name','id');
$last_name1=array_column($records,'last_name');
print_r($last_name);//Array ( [2135] => Doe [3245] => Smith [5342] => Jones [5623] => Doe )
print_r($last_name1);//Array ( [0] => Doe [1] => Smith [2] => Jones [3] => Doe )
</pre>

## 数组合并
* array array_combine(array $keys,array $values)返回一个array，用来自keys数组中的值作为键名，来自values中的值作为相应的值
<pre>
$keys=array('green','red','yellow');
$values=array('avocado','apple','banana');
$ret=array_combine($keys,$values);
print_r($ret);//Array ( [green] => avocado [red] => apple [yellow] => banana )
</pre>

* array array_merge(array $array1[,array $...])将一个或多个数组元素合并起来，作为结果返回，如果有相同的字符串键名，该键名后面的值将覆盖前面的值；相同的数字键名将不会覆盖，而是附在后面，并以连续方式重新索引
<pre>
$array1=array('color'=>'red',2,4);
$array2=array('a','b','color'=>'green','shape'=>'trapezoid',4);
$result=array_merge($array1,$array2);
print_r($result);//Array ( [color] => green [0] => 2 [1] => 4 [2] => a [3] => b [shape] => trapezoid [4] => 4 )
</pre>

* array_merge和+的区别：
键名为数字的数组合并时，array_merge将键名以连续的方式重新索引，+只是将后面的数组附加到前面的数组，两个数组有相同键名时，第一个数组中的同键名元素将会被保留，第二个数组中的元素将会被忽略
<pre>
$array1=array(0=>'zero_a',2=>'two_a',3=>'three_a');
$array2=array(1=>'one_b',3=>'three_b',4=>'four_b');
print_r(array_merge($array1,$array2));//Array ( [0] => zero_a [1] => two_a [2] => three_a [3] => one_b [4] => three_b [5] => four_b )
print_r($array1+$array2);//Array ( [0] => zero_a [2] => two_a [3] => three_a [1] => one_b [4] => four_b )
</pre>

* array array_merge_recursive(array $array1[,array $...])递归的合并一个或多个数组，数组具有相同的数组键名，后一个值将不会覆盖原来的值，而是会附加到后面
<pre>
$array1=array('color'=>array('favorite'=>'red'),5);
$array2=array(10,'color'=>array('favorite'=>'green','blue'));
print_r(array_merge_recursive($array1,$array2));//Array ( [color] => Array ( [favorite] => Array ( [0] => red [1] => green ) [0] => blue ) [0] => 5 [1] => 10 )
</pre>

## 数组统计
* array array_count_values(array $array)返回一个数组，键是array里元素的值，值是array元素的值出现的次数。
<pre>
$array=array(1,'hello','world',1,'world');
print_r(array_count_values($array));//Array ( [1] => 2 [hello] => 1 [world] => 2 )
</pre>

* int count(mixed $srray_or_countable[,int $mode=COUNT_NORMAL])统计出数组里的所有元素的数量或者对象里的东西，如果mode参数设置为COUNT_RECURSIVE,count()将递归地对数组计数，对计算多维数组单元尤其有用
<pre>
$food = array('fruit' => array('apple', 'orange', 'banana'), 'vegetable' => array('carrot','pea','collard'));
print_r(count($food));//2
print_r(count($food,COUNT_RECURSIVE));//8
</pre>

当用于循环的时候，将数组的个数赋给一个变量会更好
<pre>
for($i=0;$i< count($array);$i++)//✘
$arr_lenth=count($array);
for($i=0;$i< $array_lenth;$i++)//√
</pre>

* array array_unique(array $array[,int sort_flag=SORT_STRING])移除数组中重复元素，对每个值只保留第一个遇到的键名
<pre>
$input=array('a'=>'green','red','b'=>'green','blue','red');
print_r(array_unique($input));//Array ( [a] => green [0] => red [1] => blue )
</pre>

## 数组键名键值
* array array_keys(array $array[,$search_value=null[,bool $strict=false]])返回input数组中的键名。如果指定了search_value，只返回该值的键名
<pre>
$array1 = array(0 => 100, 'color' => 'red');
$array2 = array('blue', 'red', 'green', 'blue', 'blue');
print_r(array_keys($array1));//Array ( [0] => 0 [1] => color ) 
print_r(array_keys($array2, 'blue'));//Array ( [0] => 0 [1] => 3 [2] => 4 )
</pre>

* array array_values(array $array)返回数组中所有值并给其建立数字索引
<pre>
$a = array(3 => 11, 1 => 22, 2 => 33);
$a[0] = 44;
print_r(array_values($a));//Array ( [0] => 11 [1] => 22 [2] => 33 [3] => 44 )
</pre>

* array array_flip(array $array)交换数组中的键和名，如果同一个值出现多次，则最后一个键名将作为它的值，其他键会被丢弃。
<pre>
$a=array('a'=>1,'b'=>1,'c'=>2);
print_r(array_flip($a));//Array ( [1] => b [2] => c )
技巧：当在一个很大的数组里面，利用in_array查找值是否在数组里会变得非常慢，但是利用array_flip交换键值以后利用isset会变得更快
</pre>

* array array_reverse(array $array[,bool $preserve_keys=false])返回单元顺序相反的数组,如果preserve_keys为true会保留数字的键
<pre>
$input=array('php',4,array('green','red'));
print_r(array_reverse($input));//Array ( [0] => Array ( [0] => green [1] => red ) [1] => 4 [2] => php )
print_r(array_reverse($input,true));//Array ( [2] => Array ( [0] => green [1] => red ) [1] => 4 [0] => php )ƒ
</pre>

## 数组的差集
* array array_diff(array $array1,array $array2[,array $...])对比array1和其他一个或者多个数组，返回在array1中但不在其他array里的值。
<pre>
$array1=array('a'=>'green','red','blue','red');
$array2=array('b'=>'green','yellow','red');
print_r(array_diff($array1,$array2));//Array ( [1] => blue )
</pre>

* array array_diff_assoc(array $array1,array $array2[,array $...])返回一个数组，该数组包含了所有在array1中但是不在任何其他参数数组中的值，键名也用于比较
<pre>
$array1 = array('a' => 'green', 'b' => 'brown', 'c' => 'blue', 'red');
$array2 = array('a'=>'green','yelloe','red');
print_r(array_diff_assoc($array1,$array2));//Array ( [b] => brown [c] => blue [0] => red )
</pre>

* array array_diff_key(array $array1,array $array2[,array $...])使用键名来比较$array1和$array2,返回在array1中出现但未出现在其他参数数组中的键名的值。
<pre>
$array1 = array('blue'  => 1, 'red'  => 2, 'green'  => 3, 'purple' => 4);
$array2 = array('green' => 5, 'blue' => 6, 'yellow' => 7, 'cyan'   => 8);
print_r(array_diff_key($array1,$array2));//Array ( [red] => 2 [purple] => 4 )
</pre>

* array array_udiff(array $array1,array $array2[,array $...],callable $value_compare_func)用回调函数比较数据，计算数组的不同。
<pre>
$array1 = array(new stdclass, new stdclass, new stdclass, new stdclass,);
$array2 = array(new stdclass, new stdclass,);
$array1[0]->width=11;$array1[0]->length=3;
$array1[1]->width=7;$array1[1]->length=1;
$array1[2]->width=2;$array1[2]->length=9;
$array1[3]->width=5;$array1[3]->length=7;

$array2[0]->width=7;$array2[0]->length=5;
$array2[1]->width=9;$array2[1]->length=2;

function compare_by_area($a,$b){
    $areaA=$a->width*$a->length;
    $areaB=$b->width*$b->length;

    if($areaA<$areaB){
        return -1;
    }elseif ($areaA>$areaB){
        return 1;
    }else{
        return 0;
    }
}
print_r(array_udiff($array1,$array2,'compare_by_area'));//Array ( [0] => stdClass Object ( [width] => 11 [length] => 3 ) [1] => stdClass Object ( [width] => 7 [length] => 1 ) )
</pre>

## 数组的交集
* array array_intersect(array $array1,array $array2[,array $...])计算数组的交集，所有在array1出现也在其他参数数组中出现的值。
<pre>
$array1=array('a'=>'green','red','blue');
$array2=array('b'=>'green','yellow','red');
print_r(array_intersect($array1,$array2));//Array ( [a] => green [0] => red )
</pre>

* array array_intersect_assoc(array $array1,array $array2[,array $...])带索引检查计算数组的交集
<pre>
$array1 = array("a" => "green", "b" => "brown", "c" => "blue", "red");
$array2 = array("a" => "green", "b" => "yellow", "blue", "red");
print_r(array_intersect_assoc($array1,$array2));//Array ( [a] => green )
</pre>

* array array_intersect_key(array $array1,array $array2[,array $...])使用键名比较计算数组的交集
<pre>
$array1 = array('blue'  => 1, 'red'  => 2, 'green'  => 3, 'purple' => 4);
$array2 = array('green' => 5, 'blue' => 6, 'yellow' => 7, 'cyan'   => 8);
print_r(array_intersect_key($array1,$array2));//Array ( [blue] => 1 [green] => 3 )
</pre>

## 数组填充
* array array_fill(int $start_index,int $num,mixed $value)用value参数的值，将一个数组填充num个条目，键名由start_index参数指定的开始。
<pre>
print_r(array_fill(5,6,'banana'));//Array ( [5] => banana [6] => banana [7] => banana [8] => banana [9] => banana [10] => banana ) 
print_r(array_fill(-2,3,'pear'));//Array ( [-2] => pear [0] => pear [1] => pear )
</pre>

* array array_fill_keys(array $keys,mixed $value)使用keys数组的值作为键，value参数的值作为值来填充一个数组
<pre>
$keys=array('foo',5,10,'bar');
print_r(array_fill_keys($keys,'banaba'));//Array ( [foo] => banaba [5] => banaba [10] => banaba [bar] => banaba )
</pre>

* array array_pad(array $array,int $size,mixed $value),返回array的一个拷贝，并用value将其填充到size指定的长度，size为正时，填补到数组的右侧，size为负时，填补到数组的左侧。
<pre>
$input = array(12, 4, 7);
print_r(array_pad($input, 5, 3));//Array ( [0] => 12 [1] => 4 [2] => 7 [3] => 3 [4] => 3 )
print_r(array_pad($input, -7, 3));// Array ( [0] => 3 [1] => 3 [2] => 3 [3] => 3 [4] => 12 [5] => 4 [6] => 7 ) 
print_r(array_pad($input, 2, 3));//Array ( [0] => 12 [1] => 4 [2] => 7 )
//当数组的键值为数字时会重新排序
$input = array(56 => 'foo', 43 => 'tr');
print_r(array_pad($input, 5, 'de'));//Array ( [0] => foo [1] => tr [2] => de [3] => de [4] => de ) 
</pre>

* array range(mixed $start,mixed $end[,number $step=1])创建一个指定范围单元的数组
<pre>
print_r(range(1,6));
print_r(range(6,1));
print_r(range(1,6,2));//Array ( [0] => 1 [1] => 3 [2] => 5 )
print_r(range('a','e'));
print_r(range('e','a'));
</pre>

## 数组回调
* array array_filter(array $array[,callable $callback[,int $flag=0]])用回调函数过滤数组中的单元，依次将数组中的每个值传递给callback函数，如果callback函数返回true，则数组当前值包含在返回数组中
<pre>
|------------一个参数--------------|
$entry = array('foo', false, -1, null, '');
print_r(array_filter($entry));//Array ( [0] => foo [2] => -1 )
function odd($var)
{
    return ($var & 1);
}
|------------两个参数--------------|
$num = array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5);
print_r(array_filter($num, 'odd'));//Array ( [a] => 1 [c] => 3 [e] => 5 )
|------------三个参数--------------|
print_r(array_filter($num, function ($k) {
    return $k == 'b';
}, ARRAY_FILTER_USE_KEY));//Array ( [b] => 2 )
print_r(array_filter($num, function ($v, $k) {
    return $k == 'b' || $v == 4;
}, ARRAY_FILTER_USE_BOTH));// Array ( [b] => 2 [d] => 4 )
</pre>

* array array_map(callable $callback,array $array1[,array $...])返回$array1每个元素应用callback函数之后的数组
<pre>
|--------两个参数----------|
$func = function ($value) {
    return $value * 2;
};
print_r(array_map($func, range(1, 5)));//Array ( [0] => 2 [1] => 4 [2] => 6 [3] => 8 [4] => 10 )
|--------三个参数----------|
function show_spanish($n, $m)
{
    return("The number $n is called $m in Spanish");
}
$num=range(1,4);
$b = array("uno", "dos", "tres", "cuatro", "cinco");
print_r(array_map('show_spanish',$num,$b));//Array ( [0] => The number 1 is called uno in Spanish [1] => The number 2 is called dos in Spanish [2] => The number 3 is called tres in Spanish [3] => The number 4 is called cuatro in Spanish [4] => The number is called cinco in Spanish )
当后面数组的个数不一致时，会扩展短的数组，知道长度和最长的数组一样。
|--------三个参数----------|
$a = array(1, 2, 3, 4, 5);
$b = array("one", "two", "three", "four", "five");
$c = array("uno", "dos", "tres", "cuatro", "cinco");

$d = array_map(null, $a, $b, $c);
print_r($d);//Array ( [0] => Array ( [0] => 1 [1] => one [2] => uno ) [1] => Array ( [0] => 2 [1] => two [2] => dos ) [2] => Array ( [0] => 3 [1] => three [2] => tres ) [3] => Array ( [0] => 4 [1] => four [2] => cuatro ) [4] => Array ( [0] => 5 [1] => five [2] => cinco ) )
当null作为回调函数时，将创建多维数组
</pre>

* mixed array_reduce(array $array,callable $callback[,mixed initial=null])将回调函数callback迭代的作用到array数组中的每一个单元中，从而将数组简化为单一的值。callback(mixed $carry,mixed $item)$carry 携带上次迭代里的值，如果本次迭代是第一次，那么这个值是initial。
<pre>
function sum($carry, $item)
{
    $carry += $item;
    return $carry;
}

function product($carry, $item)
{
    $carry *= $item;
    return $carry;
}
$a=array(1,2,3,4,5);
$x=array();
print_r(array_reduce($a,'sum'));//15
print_r(array_reduce($a,'product',10));//1200  10*1*2*3*4*5
print_r(array_reduce($x,'sum','no data to reduce'));//no data to reduce
</pre>

* bool array_walk(array &$array,callable $callback[,mixed $userdata=null])使用用户自定义函数对数组中的每个元素做回调处理
<pre>
$fruit=array('d'=>'lemon','a'=>'orange','b'=>'banana','c'=>'apple');
function test_alter(&$item1,$key,$prefix){
    $item1="$prefix:$item1";
}
function test_print($item2,$key){
    echo "$key.$item2";
}
print_r(array_walk($fruit,'test_print'));//d.lemona.orangeb.bananac.apple
array_walk($fruit,'test_alter','fruit');
print_r(array_walk($fruit,'test_print'));//d.fruit:lemona.fruit:orangeb.fruit:bananac.fruit:apple
</pre>

## 数组中是否存在
* bool array_key_exists(mixed $key,array $array)检查数组里是否有指定的键名key
<pre>
$search_array=array('first'=>1,'second'=>4);
if(array_key_exists('first',$search_array)){
    echo "first in the key";//first in the key
}
</pre>

* bool isset(mixed $var[,mixed $...])检测变量是否设置且不是null。
<pre>
$a='test';
print_r(isset($a));//true
unset($a);
print_r(isset($a));//false
当数组的值为null时，isset检测为false，array_key_exists检测为true
$a=array('test'=>1,'hello'=>null);
print_r(isset($a['hello']));//false
print_r(array_key_exists('hello',$a));//true
</pre>

* bool in_array(mixed $needle,array $haystack[,bool $strict=FALSE])检查数组$haystack中是否存在某个值$needle
<pre>
$os=array('Mac','NT','Irix','Linux');
if(in_array('Mac',$os)){
    echo 'get mac';
}//get mac
</pre>

* array_search(mixed $needle,array $haystack[,bool $strict=false])在数组中搜索给定的值，如果成功则返回相应的键名
<pre>
$base=array('orange','banana','apple','raspberry');
print_r(array_search('apple',$base));//2
//多维数组的查找
$user = array(0 => array('uid' => '100', 'name' => 'Sandra', 'url' => 'urlof100'), 1 => array('uid' => '5465', 'name' => 'Stefanie', 'url' => 'urlof100'), 2 => array('uid' => '40489', 'name' => 'Michael', 'url' => 'urlof40489'));
$key=array_search(40489,array_column($user,'uid'));
print_r($key);//2
</pre>

## 数组排序
* bool sort(array &$srray[,int $sortflags=SORT_REGULAR])对数组进行从低到高排序，数组的键值会重新索引
<pre>
$fruits = array('lemon', 'orange', 'banana', 'apple');
sort($fruits);
print_r($fruits);//Array ( [0] => apple [1] => banana [2] => lemon [3] => orange )

$fruits=array('Orange1','orange20','ORange4','orange12');
sort($fruits,SORT_NATURAL|SORT_FLAG_CASE);
print_r($fruits);//Array ( [0] => Orange1 [1] => ORange4 [2] => orange12 [3] => orange20 )
</pre>

* bool asort(array &$array[,int $sort_flags=SORT_REGULAR])对数组进行排序并保持索引关系不变
<pre>
//asort会保持索引不变
$fruits=array('d'=>'lemon','a'=>'orange','b'=>'banana','c'=>'apple');
asort($fruits);
print_r($fruits);//Array ( [c] => apple [b] => banana [d] => lemon [a] => orange ) 
//sort会重新索引
$fruits=array('d'=>'lemon','a'=>'orange','b'=>'banana','c'=>'apple');
sort($fruits);
print_r($fruits);//Array ( [0] => apple [1] => banana [2] => lemon [3] => orange )
</pre>

* bool ksort(array &$array[,int $sort_flags=SORT_REGULAR])对数组按照键名排序
<pre>
$fruits=array('d'=>'lemon','a'=>'orange','b'=>'banana','c'=>'apple');
ksort($fruits);
print_r($fruits);//Array ( [a] => orange [b] => banana [c] => apple [d] => lemon )
</pre>

* bool usort(array &$array,callable $value_compare_func)使用用户自定义的比较函数对数组中的值进行由低到高排序
<pre>
function cmp($a, $b)
{
    if (abs($a) == abs($b)) {
        return 0;
    }
    elseif (abs($a)>abs($b)){
        return 1;
    }elseif (abs($a)<abs($b)){
        return -1;
    }
}
$array=array(23,-43,2,1,24);
usort($array,'cmp');
print_r($array);//Array ( [0] => 1 [1] => 2 [2] => 23 [3] => 24 [4] => -43 )
</pre>

* uasort(array &$array，cllable $value_compare_func)使用用户自定义的比较函数对数组的值进行排序并保持索引关联
<pre>
function cmp($a, $b)
{
    if (abs($a) == abs($b)) {
        return 0;
    } elseif (abs($a) > abs($b)) {
        return 1;
    } elseif (abs($a) < abs($b)) {
        return -1;
    }
}

$array = array('a' => 4, 'b' => 8, 'c' => -1, 'd' => -9, 'e' => 2, 'f' => 5, 'g' => 3, 'h' => -4);
uasort($array,'cmp');
print_r($array);//Array ( [c] => -1 [e] => 2 [g] => 3 [a] => 4 [h] => -4 [f] => 5 [b] => 8 [d] => -9 )
</pre>

* bool uksort(array &$array,callable $key_cmp_func)使用用户自定义的比较函数对数组中的键名进行排序
<pre>
function cmp($a, $b)
{
    $a = preg_replace('@^(a|an|the) @', '', $a);
    $b = preg_replace('@^(a|an|the) @', '', $b);
    return strcasecmp($a, $b);
}

$a = array("John" => 1, "the Earth" => 2, "an apple" => 3, "a banana" => 4);

uksort($a, "cmp");
print_r($a);//Array ( [an apple] => 3 [a banana] => 4 [the Earth] => 2 [John] => 1 )
</pre>

* bool rsort(array &$array[,int sort_flgs=SORT_REGULAR])对数组进行由高到低的逆向排序
<pre>
$fruits = array('lemon', 'orange', 'banana', 'apple');
rsort($fruits);
print_r($fruits);//Array ( [0] => orange [1] => lemon [2] => banana [3] => apple )
</pre>

* bool arsort(array &$array[,int sort_flgs=SORT_REGULAR])对数组进行逆向排序，并保持索引
<pre>
$fruits = array("d" => "lemon", "a" => "orange", "b" => "banana", "c" => "apple");
arsort($fruits);
print_r($fruits);//Array ( [a] => orange [d] => lemon [b] => banana [c] => apple )
</pre>

* bool krsort(array &$array[,int sort_flags=SORT_REGULAR])对数组按照键名逆向排序
<pre>
$fruits = array("d" => "lemon", "a" => "orange", "b" => "banana", "c" => "apple");
krsort($fruits);
print_r($fruits);//Array ( [d] => lemon [c] => apple [b] => banana [a] => orange )
</pre>

* bool array_multisort(array &$array1,[,mixed $array_sort_order=SORT_ASC[,mixed $array_sort_order=SORT_REGULAR[,mixed $...]]])用来一次对多个数组进行排序，或者根据某一维或者多位数组进行排序
<pre>
//多个数组排序，排序后第二个数组的项目对应第一个数组的项目进行排序
$ar1 = array(10, 100, 100, 0);
$ar2 = array(1, 3, 2, 4);
array_multisort($ar1, $ar2);
print_r($ar1);//Array ( [0] => 0 [1] => 10 [2] => 100 [3] => 100 )
print_r($ar2);//Array ( [0] => 4 [1] => 1 [2] => 2 [3] => 3 )
//排序多维数组
$data[] = array('volume' => 67, 'edition' => 2);
$data[] = array('volume' => 86, 'edition' => 1);
$data[] = array('volume' => 85, 'edition' => 6);
$data[] = array('volume' => 98, 'edition' => 2);
$data[] = array('volume' => 86, 'edition' => 6);
$data[] = array('volume' => 67, 'edition' => 7);
foreach ($data as $key => $row) {
    $volume[$key]  = $row['volume'];
    $edition[$key] = $row['edition'];
}
array_multisort($volume,SORT_ASC,$edition,SORT_DESC,$data);
print_r($data);//Array ( [0] => Array ( [volume] => 67 [edition] => 7 ) [1] => Array ( [volume] => 67 [edition] => 2 ) [2] => Array ( [volume] => 85 [edition] => 6 ) [3] => Array ( [volume] => 86 [edition] => 6 ) [4] => Array ( [volume] => 86 [edition] => 1 ) [5] => Array ( [volume] => 98 [edition] => 2 ) )
</pre>

* bool natsort(array &$array)用自然排序法对字符串数组进行排序
<pre>
$array1 = $array2 = array("img12.png", "img10.png", "img2.png", "img1.png");

asort($array1);
echo "Standard sorting\n";
print_r($array1);//Standard sorting Array ( [3] => img1.png [1] => img10.png [0] => img12.png [2] => img2.png )

natsort($array2);
echo "\nNatural order sorting\n";
print_r($array2);//Natural order sorting Array ( [3] => img1.png [2] => img2.png [1] => img10.png [0] => img12.png )
</pre>

* bool natcasesort ( array &$array )不区分大小写利用自然排序法对字符串数组进行排序
<pre>
$array= array('IMG0.png', 'img12.png', 'img10.png', 'img2.png', 'img1.png', 'IMG3.png');
natcasesort($array);
print_r($array);//Array ( [0] => IMG0.png [4] => img1.png [3] => img2.png [5] => IMG3.png [2] => img10.png [1] => img12.png )
</pre>

* bool shuffle ( array &$array )随机打乱数组
<pre>
$num=range(1,19);
shuffle($num);
print_r($num);//Array ( [0] => 4 [1] => 8 [2] => 12 [3] => 5 [4] => 11 [5] => 13 [6] => 18 [7] => 1 [8] => 17 [9] => 16 [10] => 2 [11] => 15 [12] => 7 [13] => 10 [14] => 6 [15] => 3 [16] => 19 [17] => 9 [18] => 14 )
</pre>

## 数组移入移出
* int array_push(array &$array,mixed,$value1[,mixed $...])将一个或多个单元压入数组的末尾
<pre>
$stack = array("orange", "banana");
array_push($stack, "apple", "raspberry");
print_r($stack);//Array ( [0] => orange [1] => banana [2] => apple [3] => raspberry )
// array_push() 等同于 $array[] =，但是$array[]=的效率更高
</pre>

* mixed array_pop(array &$array)弹出并返回array数组的最后一个单元，并将数组的长度减一
<pre>
$stack=array('orange','banana','apple','raspberry');
$fruit=array_pop($stack);
print_r($stack);//Array ( [0] => orange [1] => banana [2] => apple ) 
print_r($fruit);//raspberry
</pre>

* mixed array_shift(array &$shift)将数组的第一个单元移出并作为结果返回
<pre>
$stack=array('orange','banana','apple','raspberry');
$fruit=array_shift($stack);
print_r($stack);//Array ( [0] => banana [1] => apple [2] => raspberry ) 
print_r($fruit);//orange
</pre>

* mixed array_unshift(array &$array,mixed $value1[,mixed $...])将传入的单元插入到array数组的开头
<pre>
$queue = array("orange", "banana");
array_unshift($queue, "apple", "raspberry");
print_r($queue);//Array ( [0] => apple [1] => raspberry [2] => orange [3] => banana )
</pre>

## 数组计算
*number array_sum(array $array)计算数组中所有值得和
<pre>
$a = array(2, 4, 6, 8);
print_r(array_sum($a));//20
</pre>

* number array_product(array $array)计算数组中所有值得乘积
<pre>
$a = array(2, 4, 6, 8);
print_r(array_product($a));//384
</pre>

## 数组替换
* array array_replace(array $array1,array $array2[,array $...])使用传递的数组替换第一个数组的元素,如果一个键同时存在于第一个第二个数组，将被替换，如果存在于第二个数组，但不存在于第一个数组，将在第一个数组创建这个元素
<pre>
$base=array('orange','banana','apple','raspberry');
$replacements=array(0=>'pineapple',4=>'cherry');
$replacements2=array(0=>'grape');
$basket=array_replace($base,$replacements,$replacements2);
print_r($basket);//Array ( [0] => grape [1] => banana [2] => apple [3] => raspberry [4] => cherry )
</pre>

* array array_replace_recursive(array $array1,array $array2[,array $...])使用传递的数组递归替换第一个数组的元素,将遍历数组，并将相同的处理应用到数组的内部值
<pre>
$base=array('citrus'=>array('orange'),'berries'=>array('blackberry','raspberry'));
$replacements=array('citrus'=>array('pineapple'),'berries'=>array('blueberry'));
print_r(array_replace($base,$replacements));//Array ( [citrus] => Array ( [0] => pineapple ) [berries] => Array ( [0] => blueberry ) )
print_r(array_replace_recursive($base,$replacements));//Array ( [citrus] => Array ( [0] => pineapple ) [berries] => Array ( [0] => blueberry [1] => raspberry ) )
</pre>

## 数组创建和提取
* array compact(mixed $varname1[,mixed $...])建立一个数组，包括变量名和他们的值
<pre>
$city  = "San Francisco";
$state = "CA";
$event = "SIGGRAPH";
print_r(compact('city','nothing','state','event'));//Array ( [city] => San Francisco [state] => CA [event] => SIGGRAPH )
</pre>

* int extract(array &$array[,int flag=EXTR_OVERWRITE[,string $prefix=NULL]])将数组从变量导入到当前的符号表
<pre>
$size = "large";
$var_array = array("color" => "blue",
    "size"  => "medium",
    "shape" => "sphere");
extract($var_array, EXTR_PREFIX_SAME, "wddx");

echo "$color, $size, $shape, $wddx_size\n";//blue, large, sphere, medium
//$size 没有被覆盖，因为指定了 EXTR_PREFIX_SAME，这使得 $wddx_size 被建立
</pre>

* array list(mixed $val1[,mixed $...])把数组中的值赋给一组变量
<pre>
$info = array('coffee', 'brown', 'caffeine');
list($a[0], $a[1], $a[2]) = $info;
print_r($a);//Array ( [2] => caffeine [1] => brown [0] => coffee )
</pre>

## 数组的指针位置
* mixed current(array &$array)返回数组的当前单元
<pre>
$transport=array('foot','bike','car','train');
print_r(current($transport));//foot
</pre>

* mixed next(array &$array)将数组中的内部指针向前移动一位，并返回下一个数组的单元值
<pre>
$transport=array('foot','bike','car','train');
print_r(current($transport));//foot
print_r(next($transport));//bike
print_r(current($transport));//bike
</pre>

* mixed prev(array &$array)将数组的内部指针倒回一位，并返回当前值
<pre>
$transport=array('foot','bike','car','train');
print_r(current($transport));//foot
print_r(next($transport));//bike
print_r(current($transport));//bike
print_r(prev($transport));//foot
</pre>

* mixed end(array &$array)将数组内部的指针指向最后一个单元
<pre>
$transport=array('foot','bike','car','train');
print_r(current($transport));//foot
print_r(next($transport));//bike
print_r(current($transport));//bike
print_r(prev($transport));//foot
print_r(end($transport));//train
</pre>

* mixed reset(array &$array)将数组内部的指针指向第一个单元
<pre>
$transport=array('foot','bike','car','train');
print_r(current($transport));//foot
print_r(next($transport));//bike
print_r(current($transport));//bike
print_r(prev($transport));//foot
print_r(end($transport));//train
print_r(reset($transport));//foot
</pre>

* mixed each(array &$array)返回当前的键/值并将数组指针向前移动一步
<pre>
$fruit = array('a' => 'apple', 'b' => 'banana', 'c' => 'cranberry');
print_r(each($fruit));//Array ( [1] => apple [value] => apple [0] => a [key] => a )
//each() 经常和 list() 结合使用来遍历数组
$fruit = array('a' => 'apple', 'b' => 'banana', 'c' => 'cranberry');
while (list($key,$value)=each($fruit)){
    echo "$key=>$value";
}
</pre>
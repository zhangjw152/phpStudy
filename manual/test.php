<?php
/*字符串函数*/
//echo phpinfo();exit;
//$some_var = 0;
//$some_char = 89;
//echo ($some_var)? 'true':'false'; //错误，echo是语言构造器不能作为函数
//($some_var)? echo 'true':echo 'false';  //错误，echo是语言构造器不能作为函数
//($some_var) ? print 'true' : print 'false';//正确，print是语言构造器，但可以作为函数使用
//echo"$some_var_$some_char";//会出错
//echo "{$some_var}";//以后打印数组或字符串时尽量使用{}
//echo '</br>';
//$a = printf("%.1f", 0.27);//格式化输出
//echo '</br>';
//vprintf()
//var_dump($a);//返回3.。。
//echo '</br>';

//var_dump(sprintf("%.2f", 0.3423) + sprintf("%.2f", 1.34));//返回格式的字符串


//var_dump($_SERVER['HTTP_USER_AGENT']);

//var_dump((bool)"0");
//var_dump((bool)"0.0");
//var_dump(0 == "sdade");
//var_dump("sdade" == 0);
//var_dump("" == 0);
//echo(true);
//var_dump(-01253);
//var_dump(01253);
//var_dump(01386);
//var_dump(5000000000*5000000000000);
//var_dump(17/2);
//var_dump((int)12.9);
//var_dump((int)-1.6);
//var_dump($_SERVER['REMOTE_ADDR']);
//$ipArr = explode('.', $_SERVER['REMOTE_ADDR']);
//$ip = $ipArr[0] * 0x1000000
//    + $ipArr[1] * 0x10000
//    + $ipArr[2] * 0x100
//    + $ipArr[3];
//var_dump($ip);
//var_dump(decbin($ip));
//$ipArr[0] = floor($ip / 0x1000000);
//$ip = $ip - $ipArr[0] * 0x1000000;
//$ipArr[1] = ($ip & 0xFF0000) >> 16;
//$ipArr[2] = ($ip & 0xFF00) >> 8;
//$ipArr[3] = ($ip & 0xFF);
//$ipDotted = implode('.', $ipArr);
//var_dump(decbin($ip));
//var_dump($ipArr[1]);
//var_dump(decbin($ip & 0xff000000 >> 24));
//var_dump($ipDotted);
//$x = 0123;
//$y = "0123" + 0;     // 123
//var_dump($y);
//var_dump($x);
//echo (int)((0.1 + 0.7) * 10);
//$x = 8 - 6.4;
//$y = 1.6;
//var_dump($x == $y); // is not true
//var_dump(round($x,3) == round($y,3)); // is not true
//var_dump(1.8e308);

//echo 'I \'m coming in';
//echo 'C:\\movie';

//$str ='You can also have embedded newlines in
//strings this way as it is
//okay to do';
//
//var_dump($str);
//echo 'This will not expand: \n a newline';
//echo 'Variables do not $expand $either';
//class foo
//{
//    var $foo;
//    var $bar;
//
//    function foo()
//    {
//        $this->foo = 'Foo';
//        $this->bar = array('Bar1', 'Bar2', 'Bar3');
//    }
//}
//
//$foo = new foo();
//$name = 'MyName';
//
//var_dump( <<<EOT
//My name is "$name". I am printing some $foo->foo.
//Now, I am printing some {$foo->bar[1]}.
//This should print a capital 'A': \x41
//EOT
//);

//$juices = array("apple", "orange", "koolaid1" => "purple");
//echo "He drank some juice made of $juices[0]."; // Won't work

//class beers {
//    const softdrink = 'rootbeer';
//    public static $ale = 'ipa';
//}
//
//$rootbeer = 'A & W';
//$ipa = 'Alexander Keith\'s';
//
//// 有效，输出： I'd like an A & W
//echo "I'd like an {${beers::softdrink}}\n";
//
//// 也有效，输出： I'd like an Alexander Keith's
//echo "I'd like an {$beers::$ale}\n";

//$str='asfbh';
//echo  $str[3];

//if ('123abc' == 123) echo '(intstr == int) incorrectly tests as true.';
//class Test
//{
//    const ONE = 1;
//}
//
//echo Test::ONE;

//var_dump(array('4.3' => 4));//4 => int 4
//var_dump(array('04' => 4));//'04' => int 4
//var_dump(array(8.7 => 4));//  8 => int 4

//var_dump(array(true => 1, false => 0));//array (size=2)1 => int 1  0 => int 0

//var_dump([null=>'asd']);//'' => string 'asd'
//$a = array("foo", "bar", 11 => "hello", "world");//0 =>'foo' 1 =>'bar' 11 => 'hello'  12 => 'world'
//unset($a[12]);
//print_r($a);
//$a[] = 'new';
//print_r($a);
//$b=array_values($a);
//print_r($b);

//var_dump(range('a', 'z'));

//$testVar = "";
//$testVar[2] = "Meine eigene Lösung";
//echo $testVar[2];
// Result:
// M => $testVar is a STRING !!!

//class foo
//{
//    function do_foo()
//    {
//        echo "Doing foo.";
//    }
//}
//
//$bar = new foo;
//$bar->do_foo();

//$obj = (object) 'ciao';
//echo $obj->scalar;  // outputs 'ciao'

//var_dump((object)null);
//var_dump((object)array(2, 4, 'new' => 3));
//var_dump((object)'srtToObj');

//var_dump(new stdClass());
//$object = (object) [
//    'propertyOne' => 'foo',
//    'propertyTwo' => 42,
//];
//var_dump($object);
//var_dump((object)array('first'=>2, 'second'=>4, 'last' => 3));
//$obj = (object)array(2, 4, 'new' => 3);
//var_dump($obj->1);

//$a=array();
//var_dump($a==null);
//var_dump($a===null);
//var_dump(is_null($a));

//$dividend = 2;
//$divisor = 3;
//$quotient = $dividend/$divisor;
//print $quotient; // 0.66666666666667
//$a = TRUE;
//echo ($a++).$a;  // prints "11"

//$string='12345.678';
//$float=+$string;
//$integer=0|$string;
//$boolean=!!$string;
//var_dump($string);
//var_dump($float);
//var_dump($integer);
//var_dump($boolean);

//$foo = 'bob';
//$bar =& $foo;
//echo $bar;
//$foo = 'bib';
//echo $bar;
//$bar = "bab";
//echo $foo;


//function test()
//{
//    $foo = "local variable";
//
//    echo '$foo in global scope: ' . $GLOBALS["foo"] . "\n";
//    echo '$foo in current scope: ' . $foo . "\n";
//}
//
//$foo = "Example content";
//test();

//$_POST['A'] = 'B';
//
//$nonReferencedPostVar = $_POST;
//$nonReferencedPostVar['A'] = 'C';
//
//echo 'POST: '.$_POST['A'].', Variable: '.$nonReferencedPostVar['A']."\n\n";
//
//// Testing Globals
//$GLOBALS['A'] = 'B';
//
//$nonReferencedGlobalsVar = $GLOBALS;
//$nonReferencedGlobalsVar['A'] = 'C';
//
//echo 'GLOBALS: '.$GLOBALS['A'].', Variable: '.$nonReferencedGlobalsVar['A']."\n\n";
//var_export($_SERVER);

//$_GET['foo'] = 'a';
//$_POST['bar'] = 'b';
//var_dump($_GET); // Element 'foo' is string(1) "a"
//var_dump($_POST); // Element 'bar' is string(1) "b"
//var_dump($_REQUEST); // Does not contain elements 'foo' or 'bar'
//session_start();
//global $wppa;
//$wppa = array('elm1' => 'value1', 'elm2' => 'value2');
//
//if (!session_id()) @ session_start();
//if (!isset($_SESSION['wppa'])) $_SESSION['wppa'] = array();
//
//if (!isset($_SESSION['wppa']['album'])) $_SESSION['wppa']['album'] = array();
//$_SESSION['wppa']['album'][1234] = 1;
//
//$wppa['elm1'] = 'newvalue1';
//
//print_r($_SESSION);

//getenv("HOSTNAME");
//var_dump($argv);

//$a=1;$b=2;
//function test(){
//    global $a,$b;
//    $b=$a+$b;
//}
//test();
//echo $b;

//$a=1;$b=2;
//function test(){
//    $GLOBALS['b']=$GLOBALS['a']+$GLOBALS['b'];
//}
//test();
//echo $b;

//function test(){
//    static $a=0;
//    echo $a;
//    $a++;
//}
//test();
//test();
//test();

//function test(){
//    static $a=0;
//    echo $a;
//    $a++;
//    if($a<10){
//        test();
//    }
//}
//test();

//function test()
//{
//    static $a = 0;
//    static $b;
//    $b=$a;
//    static $c;
//    $c = sqrt(12);
//    echo $a;
//    echo $b;
//    echo $c;
//}
//
//test();

//function foo(){
//    $f_a = 'a';
//
//    function bar(){
//        global $f_a;
//        echo '"f_a" in BAR is: ' . $f_a . '<br />';  // doesn't work, var is empty!
//    }
//
//    bar();
//    echo '"f_a" in FOO is: ' . $f_a . '<br />';
//}
//foo();

//for ($i = 0; $i < 5; $i++) {
//    if ($i == 2)
//        $b = 90;
//}
//echo $b;

//for($j=0; $j<3; $j++)
//{
//    if($j == 1)
//        $a = 4;
//}
//echo $a;

//function father(){
//    global $var;
//    $var=9;
//    function child(){
//        global $var;
//        echo $var;
//    }
//    child();
//}
//father();

//class test1{}
//class test2{}
//class test3{}
//
//function cache( $class )
//{
//    static $loaders = array();
//
//    $loaders[ $class ] = new $class();
//
//    var_dump( $loaders );
//}
//print '<pre>';
//cache( 'test1' );
//cache( 'test2' );
//cache( 'test3' );

//function a($var)
//{
//    global $var1;
//    $var1=$var;
//    function b()
//    {
//        global $var1;
//        echo $var1; // there is no var1 in the global scope so nothing to echo
//
//    }
//
//    b();
//}
//
//a('hello');

//class A
//{
//    function Z(){
//        static $a=0;
//        printf('class name:%s,$a:%d</br>',get_class($this),$a);
//        $a++;
//    }
//}
//class B extends A{}
//$a=new A;
//$b=new B;
//$a->Z();
//$a->Z();
//$b->Z();
//$a->Z();


//function foo() {
////    $a = "a";
////    global $a;
//    echo $a;
//}
//$a=$foo;
//$$a();

//$a='hello';
//$$a='world';
//echo $$a;
//echo $hello;

//class foo {
//    var $bar = 'I am bar.';
//    var $arr = array('I am A.', 'I am B.', 'I am C.');
//    var $r   = 'I am r.';
//}
//
//$foo = new foo();
//$bar = 'bar';
//$baz = array('foo', 'bar', 'baz', 'quux');
//echo $foo->$bar . "\n";//I am bar.
//echo $foo->$baz[1] . "\n";//I am bar.
//
//$start = 'b';
//$end   = 'ar';
//echo $foo->{$start . $end} . "\n";//I am bar.
//
//$arr = 'arr';
//echo $foo->$arr[1] . "\n";//I am r.
//echo $foo->{$arr}[1] . "\n";//I am B.

//
//${date("M")} = "Worked";
//echo ${date("M")};

//$_POST['asdf'] = 'something';
//
//function test() {
//    // NULL -- not what initially expected
//    $string = '_POST';
//    var_dump(${$string});
//
//    // Works as expected
//    var_dump(${'_POST'});
//
//    // Works as expected
//    global ${$string};
//    var_dump(${$string});
//
//}

// Works as expected
//$string = '_POST';
//var_dump(${$string});
//test();

//$a = 'variable-name';
//$$a = 'hello';
//echo $variable-name . ' ' . $$a; // Gives     0 hello

//$foo = 'info';
//{'php'."$foo"}(); // Parse error

//class trick
//{
//    function a(){
//        echo __FUNCTION__;
//    }
//
//    function b(){
//        echo __METHOD__;
//    }
//}
//$obj=new trick();
//$obj->a();//a
//$obj->b();//trick::b

//class base_class
//{
//    function say_a()
//    {
//        echo "'a' - said the " . __CLASS__ . "<br/>";
//    }
//
//    function say_b()
//    {
//        echo "'b' - said the " . get_class() . "<br/>";
//    }
//
//}
//
//class derived_class extends base_class
//{
//    function say_a()
//    {
//        parent::say_a();
//        echo "'a' - said the " . __CLASS__ . "<br/>";
//    }
//
//    function say_b()
//    {
//        parent::say_b();
//        echo "'b' - said the " . get_class() . "<br/>";
//    }
//}
//
//$obj_b = new derived_class();
//
//$obj_b->say_a();
//echo "<br/>";
//$obj_b->say_b();

//class A
//{
//    function __construct()
//    {
//        echo __CLASS__;
//    }
//
//    static function name()
//    {
//        echo __CLASS__;
//    }
//}
//
//class B extends A
//{
//}
//
//$b = new B();//A
//B::name();//A

//class A
//{
//    function __construct()
//    {
//        echo get_called_class();
//    }
//
//    static function name()
//    {
//        echo get_called_class();
//    }
//}
//
//class B extends A
//{
//}
//
//$b = new B();//B
//B::name();//B

//$n = 3;
//echo $n * $n++;

//$a = true ? 0 : true ? 1 : 2;
//echo  $a;

//echo 7 % 3.5;
//echo 6.2 % 3.5;
//echo 5 % 3;//2
//echo 5 % -3;//2
//echo -5 % 3;//-2
//echo -5 % -3;//-2

//$instance = new stdClass();
//$assigned   =  $instance;
//$reference  =& $instance;
//
//$instance->var = '$assigned will have this value';
//$instance = null;
//
//var_dump($instance);
//var_dump($reference);
//var_dump($assigned);


//class C {}

/* The following line generates the following error message:
 * Deprecated: Assigning the return value of new by reference is deprecated in...
 */
//$o = new C;

//$a = 3;
//$b =& $a;
//echo $a;//3
//echo $b;//3
//$b=5;
//echo $a;//5
//echo $b;//5

//$map=array(100,200,300);
//foreach ($map as &$k){}
//print_r($k);
//foreach ($map as $k){}
//print_r($map);

//var_dump(0 == "a");
//var_dump(1=="01");

//echo 0 ?: 1 ?: 2 ?: 3; //1
//echo 1 ?: 0 ?: 3 ?: 2; //1
//echo 2 ?: 1 ?: 0 ?: 3; //2
//echo 3 ?: 2 ?: 1 ?: 0; //3

//echo "a string that has a " . (true) ? 'true' : 'false' . " condition in. ";

//$A = [1 => 1, 2 => 0, 3 => 1];
//$B = [1 => 1, 3 => 0, 2 => 1];
//
//var_dump($A < $B);  // TRUE
//var_dump($B < $A);  // TRUE
//
//var_dump($A > $B);  // TRUE
//var_dump($B > $A);  // TRUE
//$C = [1 => 1, 2 => 1, 3 => 0];
//$D = [1 => 1, 3 => 1, 2 => 0];
//
//var_dump($C < $D); // FALSE
//var_dump($D < $C); // FALSE
//
//var_dump($C > $D); // FALSE
//var_dump($D > $C); // FALSE
//
//var_dump($D == $C); // FALSE

//$a = array(2,    "a",  "11", 2);
//$b = array(2,    "11", "a",  2);
//sort($a);
//var_dump($a);
//sort($b);
//var_dump($b);
//$test=true;
//$test2=true;
//($test) ? "TEST1 true" : (($test2) ? "TEST2 true" : "false");

//$output = `ls -al`;
//echo "<pre>$output</pre>";
//
//$output = `ping www.baidu.com`;
//echo "<pre>$output</pre>";
//$host = 'www.baidu.com';
//echo `ping -n 3 {$host}`;

//$var = 3;
//
//echo "Result: " . $var + 3;

//$a=array('a'=>'apple','c'=>'banana');
//$b=array('a'=>'pear','b'=>'cherry');
//var_dump($a+$b);
//var_dump($b+$a);

//$a=array('apple','pear');
//$b=array(0=>'apple','1'=>'pear');
//var_dump($a===$b) ;

//$a=array('apple','pear');
//$b=array('1'=>'pear',0=>'apple');
//var_dump($a===$b) ;

//$map = array(1, 2, 3);
//foreach ($map as &$k) {
////    var_dump($map);
//}
//unset($k);
////print_r($map);
//foreach ($map as $k) {
//var_dump($map);
//}
//var_dump($map);

//class MyClass{}
//class NotMyClass{}
//$a=new MyClass();
//var_dump($a instanceof MyClass);
//var_dump($a instanceof NotMyClass);

//class ParentClass{}
//class MyClass extends ParentClass {}
//$a=new MyClass();
//var_dump($a instanceof ParentClass);
//var_dump($a instanceof MyClass);

//interface MyInterface{}
//class Myclass implements MyInterface{}
//$a=new Myclass();
//var_dump($a instanceof MyInterface);
//var_dump($a instanceof MyClass);

//class ParentClass{}
//class A extends ParentClass {}
//class B{}
//$parent=new ParentClass();
//$a=new A();
//$b=new B();
//$a1=new A();
//var_dump($a instanceof $b);
//var_dump($a instanceof $parent);
//var_dump($a instanceof $a1);

//class myclass {
//    function mymethod($otherObject) {
//        if ($otherObject instanceof self) {
////            $otherObject->mymethod(null);
//            return "hell";
//        }
//        return 'works!';
//    }
//}
//
//$a = new myclass();
//print $a->mymethod($a);

//$v = 'My Value';
//$r = ($v) ?: 'No Value'; // $r is set to 'My Value' because $v is evaluated to TRUE
//echo $r;

//for($col = 'R'; $col != 'AD'; $col++) {
//    echo $col.' ';
//}

//for ($i=0;$i<count($arr);$i++){
//
//}
//$len=count($arr);
//for ($i=0;$i<$len;$i++){
//
//}
//$arr=array(1,2,3,4);
//foreach ($arr as &$value){
//    $value=$value*2;
//}
//print_r($arr);

//$a = array(
//    "one" => 1,
//    "two" => 2,
//    "three" => 3,
//    "seventeen" => 17
//);
//
//foreach ($a as $k => $v) {
//    echo "\$a[$k] => $v.\n";
//}

//$array = [
//    [1, 2],
//    [3, 4],
//];
//
//foreach ($array as list($a, $b)) {
//    // $a contains the first element of the nested array,
//    // and $b contains the second element.
//    echo "A: $a; B: $b\n";
//}

//$i = 0;
//while (++$i) {
//    switch ($i) {
//        case 5:
//            echo "At 5<br />\n";
//            break 1;  /* 只退出 switch. */
//        case 10:
//            echo "At 10; quitting<br />\n";
//            break 2;  /* 退出 switch 和 while 循环 */
//        default:
//            break;
//    }
//}

//echo "hello";
//if (true)
//    break;
//echo " world";

//$i = 0;
//while ($i++ < 5) {
//    echo "Outer<br />\n";
//    while (1) {
//        echo "Middle<br />\n";
//        while (1) {
//            echo "Inner<br />\n";
//            continue 3;
//        }
//        echo "This never gets output.<br />\n";
//    }
//    echo "Neither does this.<br />\n";
//}

//$arr=array('first','second','third','fourth','fifth');
//foreach ($arr as $key){
//    if($key=='second')continue;
//    if($key=='fourth')break;
//    echo $key;
//}


//for($i=0; $i<8; ++$i)
//{
//    echo $i,"\t";
//    switch($i)
//    {
//        case 1: echo "One"; break;
//        case 2:
//        default: echo "Thingy"; break;
//        case 3:
//        case 4: echo "Three or Four"; break;
//        case 5: echo "Five"; break;
//    }
//    echo "\n";
//}

//$a = 'abc';
//goto $a; // NOPE: PARSE ERROR
//echo 'Foo';
//abc: echo 'Boom';

//goto a;
//echo 'Foo';
//a: echo 'Bar';

//function addSomeStr(&$str){
//    $str.=',and something extra';
//}
//$str='this is a thing';
//addSomeStr($str);
//echo $str;

//function addSomeStr(&$instr){
//    $instr.=',and something extra';
//}
//$outstr='this is a thing';
//addSomeStr($outstr);
//echo $outstr;//this is a thing,and something extra

//function eat($food='rice'){
//    return $food;
//}
//echo eat().'<br />';
//echo eat(null).'<br />';
//echo eat('noodle').'<br />';

//function makecoffee($types = array("cappuccino"), $coffeeMaker = NULL)
//{
//    $device = is_null($coffeeMaker) ? "hands" : $coffeeMaker;
//    return "Making a cup of ".join(", ", $types)." with $device.\n";
//}
//echo makecoffee();
//echo makecoffee(array("cappuccino", "lavazza"), "teapot");

//declare(strict_types=1);
//
//function sum(int $a, int $b) {
//    return $a + $b;
//}
//
//var_dump(sum(1, 2));
//var_dump(sum(1.5, 2.5));

//function sum(...$nums)
//{
//    $sum = 0;
//    foreach ($nums as $num) {
//        $sum += $num;
//    }
//    return $sum;
//}
//echo sum(2,45,7,8);

//class Obj {
//    public $x;
//}
//
//function obj_inc_x($obj) {
//    $obj->x++;
//    return $obj;
//}
//
//$obj = new Obj();
//$obj->x = 1;
//
//$obj2 = obj_inc_x($obj);
//obj_inc_x($obj2);
//
//print $obj->x . ', ' . $obj2->x . "\n";

//function &scalar_ref_inc_x(&$x) {
//    $x++;
//    return $x;
//}
//
//$x = 1;
//
//$x2 =& scalar_ref_inc_x($x);    # Need reference here as well as the function sig
//scalar_ref_inc_x($x2);
//
//print $x . ', ' . $x2 . "\n";


//function &testRet()
//{
//    return NULL;
//}
//
//if (testRet() === NULL)
//{
//    echo "NULL";
//}

//class Foo
//{
//    static function baz()//静态方法
//    {
//        echo 'baz';
//    }
//
//    function bar()
//    {
//        echo 'bar';
//    }
//}
//$baz=array('Foo','baz');
//$bar=array(new Foo,'bar');
//$baz();//baz
//$bar();//bar

//class hello
//{
//    private $funcname='myfunc';
//    public function run()
//    {
//        $var=$this->funcname;
//        $this->$var();
//    }
//
//    public function myfunc()
//    {
//        echo "Hello World！";
//    }
//}
//
//$run=new hello();
//$run->run();
//$fruits = array("d" => "lemon", "a" => "orange", "b" => "banana", "c" => "apple");
//
//function test_alter(&$item1, $key, $prefix)
//{
//    $item1 = "$prefix: $item1";
//}
//
//function test_print($item2, $key)
//{
//    echo "$key. $item2<br />\n";
//}
//
//echo "Before ...:\n";
//array_walk($fruits, 'test_print');
//
//echo "... and after:\n";
//array_walk($fruits, 'test_alter', 'fruit');
//
//array_walk($fruits, 'test_print');


//echo preg_replace_callback('~-([a-z])~', function ($match) {
//    return strtoupper($match[1]);
//}, 'hello-world');

//$greet = function ($name) {
//    echo 'hello' . $name;
//};
//$greet('world');

//$greet = 'hello';
//$message = function () use ($greet) {
//    echo $greet;
//};
//$message();

//class cart
//{
//    const PRICE_BUTTER = 1.00;
//    const PRICE_MILK = 3.00;
//    const PRICE_EGGS = 6.95;
//
//    protected $products = array();
//
//    public function add($product, $quality)
//    {
//        $this->products[$product] = $quality;
//    }
//
////    public function getQuality($product)
////    {
////        return isset($this->products[$product]) ? $this->products[$product] : false;
////    }
//
//    public function getTotal($tax)
//    {
////        var_dump($this->products);
//        $total = 0.00;
//        $callback = function ($quality, $product) use ($tax, &$total) {
//            $pricePerItem = constant(__CLASS__ . '::PRICE_' . strtoupper($product));
//            $total += $pricePerItem * $quality * ($tax + 1);
//        };
//        array_walk($this->products, $callback);
//        return round($total, 2);
//    }
//}
//
//$cart = new cart();
//
//$cart->add('butter', 2);
//$cart->add('milk', 1);
//$cart->add('eggs', 8);
//print $cart->getTotal(0.05);


//class Foo
//{
//    function fun()
//    {
//        echo 'fun';
//    }
//
//    function fun1()
//    {
//        $this->fun();
//    }
//}
//$myfoo=new Foo();
//$myfoo->fun1();

//class Test
//{
//    static public function getNew()
//    {
//        return new static;
//    }
//}
//
//class Child extends Test
//{}
//
//$obj1 = new Test();
//$obj2 = new $obj1;
//var_dump($obj1);
//var_dump($obj2);
//
//$obj3 = Test::getNew();
//var_dump($obj3 instanceof Test);
//
//$obj4 = Child::getNew();
//var_dump($obj4 instanceof Test);

//class ParentClass
//{
//    function fun($name)
//    {
//        echo $name;
//    }
//}
//
//class ChildClass extends ParentClass
//{
//    function fun($name)
//    {
//        echo 'hello'.$name;
//        parent::fun($name);
//    }
//}
//$child=new ChildClass();
//$child->fun('world');//helloworldworld
//namespace NS {
//    class ClassName {
//    }
//
//    echo ClassName::class;
//}


//class Test
//{
//    public $a='a';
//    const B='b';
//    function test()
//    {
//        echo $this->a;
//        echo self::B;
//    }
//}
//$test=new Test();
//$test->test();

//class MyTest
//{
//    public $var1 = 1;
//    private $var2 = 2;
//    protected $var3 = 3;
//    static $var4 = 4;
//
//    function toArray()
//    {
//        return array($this);
//        get_object_vars()
//    }
//}
//
//$t = new MyTest();
//print_r($t->toArray());//Array ( [0] => MyTest Object ( [var1] => 1 [var2:MyTest:private] => 2 [var3:protected] => 3 ) )

//class MyClass
//{
//    const constant = 'constant value';
//
//    function showConstant() {
//        echo  self::constant . "\n";
//    }
//}
//
//echo MyClass::constant . "\n";
//$class = new MyClass();
////$class->showConstant();
//
//echo $class::constant."\n";

//class DbClass
//{
//    const TBNAME = 'undefine';
//
//    public static function getAll()
//    {
//        $c = get_called_class();
//        return 'select * from ' . $c::TBNAME;
//    }
//}
//
//class DbPerson extends DbClass
//{
//    const TBNAME = 'person';
//}
//
//class DbAdmin extends DbClass
//{
//    const TBNAME = 'admin';
//}
//
////$person=new DbPerson();
//echo DbPerson::getAll();
//echo DbAdmin::getAll();

//spl_autoload_register(function ($className) {
//    include(__DIR__ . $className . ".php");
//});
//class BaseClass
//{
//    function __construct()
//    {
//        print 'base construct';
//    }
//}
//
//class SubClass extends BaseClass
//{
//    function __construct()
//    {
//        print 'Sub construct';
//        parent::__construct();
//    }
//}
//
//class AnotherSubClass extends BaseClass
//{
//
//}
//
//$base = new BaseClass();
//$sub = new SubClass();
//$anotherSub = new AnotherSubClass();

//class MyClass
//{
//    function __construct()
//    {
//        print 'construct function';
//        $this->name = __CLASS__;
//    }
//
//    function __destruct()
//    {
//        print 'destroy' . $this->name;
//    }
//}
//$obj=new MyClass();
//print 'balabala';

//class BaseClass
//{
//    public $public = 'public';
//    protected $protected = 'protected';
//    private $private = 'private';
//
//    function printAll()
//    {
//        echo $this->public;
//        echo $this->protected;
//        echo $this->private;
//    }
//}
//$base=new BaseClass();
//echo $base->public;
//echo $base->protected;
//echo $base->private;
//$base->printAll();
//class SubClass extends BaseClass
//{
//    public $public='public1';
//    protected $protected='protected1';
//    function printAll()
//    {
//        echo $this->public;
//        echo $this->protected;
//        echo $this->private;
//    }
//}
//$sub=new SubClass();
//echo $sub->public;
//echo $sub->protected;
//echo $sub->private;
//$sub->printAll();

//class Item
//{
//    protected $label = 'undefined';
//    protected $price = 0.00;
//
//    public function getLabel()
//    {
//        return $this->label;
//    }
//
//    public function getPrice()
//    {
//        return $this->price;
//    }
//
//    public function setLabel($label)
//    {
//        if (is_string($label)) {
//            $this->label = $label;
//        }
//    }
//
//    public function setPrice($price)
//    {
//        if (is_numeric($price)) {
//            $this->price = $price;
//        }
//    }
//}

//class A
//{
//}
//
//class B extends A
//{
//}
//
//class C extends B
//{
//}
//abstract class A
//{
//}
//
//class B extends A
//{
//}
//$a=new A();
//$b=new B();

//trait  custom
//{
//    public function hello()
//    {
//        echo "hello";
//    }
//}
//
//trait custom2
//{
//    public function hello()
//    {
//        echo "hello2";
//    }
//}
//
//class inheritsCustom
//{
//    use custom, custom2
//    {
//        custom2::hello insteadof custom;
//    }
//}
//
//$obj = new inheritsCustom();
//$obj->hello();

//class cA
//{
//    /**
//     * Test property for using direct default value
//     */
//    protected static $item = 'Foo';
//
//    /**
//     * Test property for using indirect default value
//     */
//    protected static $other = 'cA';
//
//    public static function method()
//    {
//        print self::$item."\r\n"; // It prints 'Foo' on everyway... :(
//        print self::$other."\r\n"; // We just think that, this one prints 'cA' only, but... :)
//    }
//
//    public static function setOther($val)
//    {
//        self::$other = $val; // Set a value in this scope.
//    }
//}
//
//class cB extends cA
//{
//    /**
//     * Test property with redefined default value
//     */
//    protected static $item = 'Bar';
//
//    public static function setOther($val)
//    {
//        self::$other = $val;
//    }
//}
//
//class cC extends cA
//{
//    /**
//     * Test property with redefined default value
//     */
//    protected static $item = 'Tango';
//
//    public static function method()
//    {
//        print self::$item."\r\n"; // It prints 'Foo' on everyway... :(
//        print self::$other."\r\n"; // We just think that, this one prints 'cA' only, but... :)
//    }
//
//    /**
//     * Now we drop redeclaring the setOther() method, use cA with 'self::' just for fun.
//     */
//}
//
//class cD extends cA
//{
//    /**
//     * Test property with redefined default value
//     */
//    protected static $item = 'Foxtrot';
//
//    /**
//     * Now we drop redeclaring all methods to complete this issue.
//     */
//}
//
//cB::setOther('cB'); // It's cB::method()!
//cB::method(); // It's cA::method()!
//cC::setOther('cC'); // It's cA::method()!
//cC::method(); // It's cC::method()!
//cD::setOther('cD'); // It's cA::method()!
//cD::method(); // It's cA::method()!

//class Myclass
//{
//    static $my_static = 'static value';
//
//    static function getStaticValue()
//    {
//        return self::$my_static;
//    }
//}
//$myObj=new Myclass();
//echo $myObj::$my_static;
//echo $myObj::getStaticValue();
//echo $myObj->$my_static;
//echo $myObj->getStaticValue();

//class A
//{
//    public static function who()
//    {
//        echo __CLASS__;
//    }
//
//    public static function test()
//    {
//        self::who();
//    }
//}
//
//class B extends A
//{
//    public static function who()
//    {
//        echo __CLASS__;
//    }
//}
//B::test();
//class A
//{
//    public static function who()
//    {
//        echo __CLASS__;
//    }
//
//    public static function test()
//    {
//        static::who();
//    }
//}
//
//class B extends A
//{
//    public static function who()
//    {
//        echo __CLASS__;
//    }
//}
//B::test();

//class A
//{
//    public static function foo()
//    {
//        static::who();
//    }
//
//    public static function who()
//    {
//        echo __CLASS__ . "\n";
//    }
//}
//
//class B extends A
//{
//    public static function test()
//    {
//        A::foo();
//        parent::foo();
//        self::foo();
//    }
//
//    public static function who()
//    {
//        echo __CLASS__ . "\n";
//    }
//}
//
//class C extends B
//{
//    public static function who()
//    {
//        echo __CLASS__ . "\n";
//    }
//}
//C::test();

//abstract class AbstractClass
//{
//    abstract protected function prefixName($name);
//}
//
//class ConcreateClass extends AbstractClass
//{
//    public function prefixName($name, $separator = '.')
//    {
//        if ($name == 'Pacman') {
//            $prefix = 'Mr';
//        } elseif ($name == 'Pacwoman') {
//            $prefix = 'Mrs';
//        } else {
//            $prefix = '';
//        }
//        return $prefix.$separator.$name;
//    }
//}
//$obj=new ConcreateClass();
//echo $obj->prefixName('Pacman');//Mr.Pacman
//echo $obj->prefixName('Pacwoman','_');//Mrs_Pacwoman

//interface A
//{
//    public function foo();
//}
//
//interface B
//{
//    public function bar();
//}
//
//interface C extends A, B
//{
//    public function baz();
//}
//
//class D implements C
//{
//    public function foo()
//    {
//    }
//    public function bar()
//    {
//    }
//    public function baz()
//    {
//    }
//}

//class Base
//{
//    function sayHello()
//    {
//        echo 'hello';
//    }
//}
//
//trait SayWorld
//{
//    function sayHello()
//    {
//        parent::sayHello();
//        echo 'world';
//    }
//}
//
//class MyHelloWorld extends Base
//{
//    use SayWorld;
//}
//
//$o = new MyHelloWorld();
//$o->sayHello();

//trait A
//{
//    function sayHello()
//    {
//        echo 'hello';
//    }
//}
//
//class B
//{
//    use A;
//    function sayHello()
//    {
//        echo 'world';
//    }
//}
//$b=new B();
//$b->sayHello();

//trait SayHello
//{
//    function sayHello()
//    {
//        echo 'hello';
//    }
//}
//
//trait SayWorld
//{
//    function sayWorld()
//    {
//        echo 'world';
//    }
//}
//
//class HelloWorld
//{
//    use SayHello, SayWorld;
//}
//
//$helloWorld = new HelloWorld();
//$helloWorld->sayHello();
//$helloWorld->sayWorld();

//trait MyTrait
//{
//    public $var = 1;
//}
//
//class MyClass
//{
//    use MyTrait;
//    public $var=2;
//}

//class Test
//{
//    public static $var;
//}
//class A extends Test{}
//class B extends Test{}
//A::$var='hello';
//B::$var='world';
//echo A::$var;
//echo B::$var;

//trait Test
//{
//    public static $var;
//}
//
//class A
//{
//    use Test;
//}
//
//class B
//{
//    use Test;
//}
//A::$var='hello';
//B::$var='world';
//echo A::$var;//hello
//echo B::$var;//world

//trait Foo {
//    function bar() {
//        return 'baz';
//    }
//}
//
//echo Foo::bar(),"\\n";

//class Person{
//    private $name;
//    public $nation;
//    function __get($para){//必须有一个参数
//        echo $para.'不存在';
//    }
//}
//$p=new Person();
//$name=$p->name;//call the __get function
//$nation=$p->nation;//never call the __get function

//class Person
//{
//    public $name;
//    private $age;
//
//    function walk($length)
//    {
//        echo $this->name . 'walk' . $length . 'km';
//    }
//
//    function __call($name, $arguments)
//    {
//        echo $name . 'cannot find the param is' ;
//        print_r($arguments);
//    }
//    static function __callStatic($name, $arguments)
//    {
//        echo $name . 'cannot find the static function the param is' ;
//        print_r($arguments);
//    }
//}
//$person=new Person();
//$person->name='joe';
//$person->walk(90);
//$person->run(89);
//Person::run(89);

//class Computer
//{
//    public $cpu='inter';
//    function __clone()
//    {
//        $this->cpu='AMD';
//    }
//}
//$c1=new Computer();
//$c2=clone $c1;
//echo $c1->cpu;//inter
//echo $c2->cpu;//AMD

//class Person
//{
//    public $name;
//    private $sex;
//    function __get($name)
//    {
//        echo $name.'不存在或者不可访问';
//    }
//}
//$person=new Person();
//$sex=$person->sex;//sex不存在或者不可访问

//class Person
//{
//    public $name;
//    private $sex;
//    function __set($name, $value)
//    {
//        echo '对'.$name.'赋值'.$value.'失败';
//    }
//
//}
//$person=new Person();
//$person->sex='male';//对sex赋值male失败

//class Phone{
////类的成员属性
//    private $brand;
//    private $model;
//    private $price;
////构造函数
//    function __construct($pbrand,$pmodel,$pprice){
//        $this->brand=$pbrand;
//        $this->model=$pmodel;
//        $this->price=$pprice;
//    }
////魔术方法__toString()
////    function __toString(){
////        return "{$this->brand} {$this->model} {$this->price}";//可以自定义操作但必须要返回一个字符串结果
////    }
//}// the end of class
////实例化一个对象
//$p=new Phone('Google','Nexus One',4200);
////如果没有在类中使用__toString函数则报错Catchable fatal error: Object of class Phone could not be converted to string
////如果在类中使用了__toString函数，则把对象当字符串输出时，执行__toString函数操作
//echo $p;

//class Person
//{
//    function __toString()
//    {
//        return '以字符的类型调用对象';
//    }
//}
//$p=new Person();
//echo $p;

//class User
//{
//    private $name;
//    private $age;
//    private $sex;
//    function __construct($pname,$page,$psex)
//    {
//        $this->name=$pname;
//        $this->age=$page;
//        $this->sex=$psex;
//    }
//    function __sleep()
//    {
//        return array('name','age','sex');
//    }
//    function __wakeup()
//    {
//        $this->name='Yue';
//    }
//}
//$user=new User('andy',22,'male');
//file_put_contents('info.txt',serialize($user));
//$str=file_get_contents('info.txt');
//$uu=unserialize($str);
//print_r($uu);

//class myClass{
//    public $data;
//}
//
//$sss ="aaa";
//$obj1 = new myClass();
//$obj1->data =$sss;
//$obj2 = clone $obj1;
//$obj2->data="bbb";
//
//print_r($obj1);
//print_r($obj2);

//class Person
//{
//    public $name;
//    public $age;
//    public $sex;
//}
//
//$p1 = new Person();
//$p2 = new Person();
//$p1->name = 'xiao';
//$p2->name = 'xiao';
//$p1->age = 22;
//$p2->age = 22;
//$p1->sex = 'male';
//$p2->sex = 'male';
//echo(int)($p1 == $p2);//1
//$p2->age=20;
//echo(int)($p1 > $p2);//1

//class Foo
//{
//    private static $used;
//    private $id;
//
//    public function __construct()
//    {
//        $this->id = self::$used++;
//    }
//
//    public function __clone()
//    {
//        $this->id = self::$used++;
//    }
//}
//
//$a = new Foo();//$a指向Foo对象0
//$b = $a; // $a指向Foo对象0,$b是$a的一份拷贝
//$c = &$a; // $c 和 $a是 一个指向Foo对象0的两个引用(别名)
//$a = new Foo;// $c 和 $a 是一起指向Foo对象1的引用，$b依旧指向Foo对象0
//unset($a);//$a不存在，$c 指向Foo对象1的引用，$b指向Foo对象0
//$a =& $b;//$a 和 $b 一个指向Foo对象0的两个引用(别名)，$c 指向Foo对象1的
//$a = NULL;//$a 和 $b 一起指向NULL,Foo对象0被回收，$c 指向Foo对象1
//unset($b);//$a指向NULL， $b不存在，$c 指向Foo对象1
//$a=clone $c;//$a指向Foo对象2，$c 指向Foo对象1
//unset($c);//$c不存在，$a指向Foo对象2,Foo对象0被回收
//$c=$a;// $a指向Foo对象0,$c是$a的一份拷贝，$a 和 $c 一起指向2
//unset($a);//$a不存在，$c指向Foo对象2
//$a=&$c;// $c 和 $a是 一个指向Foo对象2的两个引用(别名)
//$a=null;//Foo对象2被回收，$c 和 $a是 一个指向null的两个引用(别名)
//print_r($a);
//print_r($b);
//print_r($c);

//class A {
//    public $one = 1;
//
//    public function show_one() {
//        echo $this->one;
//    }
//}
//
//// page1.php:
//
////include("classa.inc");
//
//$a = new A;
//$s = serialize($a);
//echo $s;
//namespace MyProject;
//const CONNECT_OK=1;
//class connection{};
//function connect(){}
//namespace Foo\Bar\subnamespace;
//const FOO = 1;
//function foo()
//{
//}
//
//class foo
//{
//    static function staticmethod(){}
//}

//namespace Foo\Bar;
//include 'file1.php';
//const FOO = 2;
//function foo()
//{
//}
//
//class foo
//{
//    static function staticmethod()
//    {
//    }
//}
//
////非限定名称
//foo();//解析为Foo\Bar\foo();
//foo::staticmethod();//解析为Foo\Bar\foo的静态方法staticmethod()
//echo FOO;//解析为Foo\Bar\FOO;
////限定名称
//subnamespace\foo();//解析为Foo\Bar\subnamespace\foo();
//subnamespace\foo::staticmethod();//解析为Foo\Bar\subnamespace\foo的静态方法staticmethod();
//echo subnamespace\FOO;//解析为Foo\Bar\subnamespace\FOO;
////完全限定名称
//\Foo\Bar\foo();//解析为Foo\Bat\foo();
//\Foo\Bar\foo::staticmethod();//解析为Foo\Bar\foo中的静态方法staticmethod();
//echo \Foo\Bar\FOO;//解析为Foo\Bar\FOO;

//function get_one_to_three()
//{
//    for ($i = 1; $i <= 3; $i++) {
//        yield $i;
//    }
//}
//
//foreach (get_one_to_three() as $value) {
//    echo $value;
//}//输出1 2 3

//function getFiboncci()
//{
//    $i = 0;
//    $k = 1;
//    yield $k;
//    while (true) {
//        $k = $k + $i;
//        $i = $k - $i;
//        yield $k;
//    }
//}
//
//$y = 0;
//foreach (getFiboncci() as $fiboncci) {
//    echo $fiboncci . "\n";
//    $y++;
//    if ($y > 30) {
//        break;
//    }
//}

//$array1 = array(1,2);
//$x = &$array1[1];   // Unused reference
//$array2 = $array1;  // reference now also applies to $array2 !
//$array2[1]=22;      // (changing [0] will not affect $array1)
//print_r($array1);


//$arr1 = array(1);
//echo "\nbefore:\n";
//echo "\$arr1[0] == {$arr1[0]}\n";
//$arr2 = $arr1;
//$arr2[0]++;
//echo "\nafter:\n";
//echo "\$arr1[0] == {$arr1[0]}\n";
//echo "\$arr2[0] == {$arr2[0]}\n";
//
//// Example two
//$arr3 = array(1);
//$a =& $arr3[0];
//echo "\nbefore:\n";
//echo "\$a == $a\n";
//echo "\$arr3[0] == {$arr3[0]}\n";
//$arr4 = $arr3;
//$arr4[0]++;
//echo "\nafter:\n";
//echo "\$a == $a\n";
//echo "\$arr3[0] == {$arr3[0]}\n";
//echo "\$arr4[0] == {$arr4[0]}\n";
//$a = 1;
//$c = 2;
//$b =& $a;
//$a =& $c;
//echo $a;
//echo $b;
//function foo(&$var)
//{
//    $var++;
//}
//$var=5;
//foo($var);
//echo $var;
//$array1=array(1);
//$x=&$array1[0];
//$array2=$array1;
//$array2[0]++;
//print_r($array1);
//print_r($array2);

//function &fun()//指出返回是一个引用
//{
//    static $static = 0;
//    $static++;
//    return $static;
//}
//$var1=&fun();
//echo $var1;//1
//fun();
//fun();
//echo $var1;//3
//$var2=fun();
//echo $var2;//4
//fun();
//fun();
//echo $var2;//4

//$a=2;
//$b=&$a;
//unset($a);
//echo $b;

//$a = "hihaha";
//$b = &$a;
//$c = "eita";
//$b = &$c;
//echo $a;
//echo $b;

//$a=2;
//$b=&$a;
//$a=null;
//echo $b;//null

//$a = 1;
//xdebug_debug_zval('a');
//echo PHP_EOL;
//$b = $a;
//xdebug_debug_zval('a');
//echo PHP_EOL;
//
//$c = &$a;
//xdebug_debug_zval('a');
//echo PHP_EOL;
//
//xdebug_debug_zval('b');
//echo PHP_EOL;

//echo bin2hex('j');
//echo chunk_split('hujkokoefhuhusjd',4);
//print_r(str_split('hello world',3));//Array ( [0] => hel [1] => lo [2] => wor [3] => ld )
//print_r(array_filter(explode(':', "1:2::3:0:4")));
//$string='one|two|three|four';
//print_r(explode('|',$string));//Array ( [0] => one [1] => two [2] => three [3] => four )

//function multieExplode($delimiters, $str)
//{
//    $ready=str_replace($delimiters,$delimiters[0],$str);
//    $lauch=explode($delimiters[0],$ready);
//    return $lauch;
//}
//$text="here is a sample: this text, and this will be exploded. this also | this one too :)";
//$delimiters=array(',',':','.','|');
//print_r(multieExplode($delimiters,$text));//Array ( [0] => here is a sample [1] => this text [2] => and this will be exploded [3] => this also [4] => this one too [5] => ) )
//print_r(explode(',',''));//Array ( [0] => )
//print_r(array_map('trim',explode(',','2,,8,2,0,6')));
//print_r(preg_split("/[,\s]+/",'hypertext language, programming'));//Array ( [0] => hypertext [1] => language [2] => programming )

//$text = "A very long woooooooooooord.";
//$newtext = wordwrap($text, 8, "\n", true);
//echo "$newtext\n";
//$text = "A very long woooooooooooooooooord. and something";
//$newtext = wordwrap($text, 8, "\n", false);
//echo "$newtext\n";

//$data = "Two Ts and one F.";
//print_r(count_chars($data,1));
//$newstring = 'abcdef abcdef';
//$pos = strpos($newstring, 'ab', 0); // $pos = 7, 不是 0
//echo $pos;
//$str = 'abcde abcde';
//$needle = 'ab';
//$pos = strpos($str, $needle);
//if ($pos === false) {
//    echo $needle . ' not in ' . $str;
//} else {
//    echo $needle . ' in ' . $str;
//}//ab in abcde abcde

//$str = 'abcde abcde';
//$needle = 'ab';
//$pos = strpos($str, $needle,1);
//echo $pos;

//$text='this is a test';
//echo substr_count($text,'is');//2
//echo substr_count($text,'is',3);//1,实际是统计's is a test'中含有'is'个数
//echo substr_count($text,'is',3,3);//0,实际是统计's i'中含有'is'个数

//$text2 = 'gcdgcdgcd';
//echo substr_count($text2, 'gcdgcd');//输出1，因为函数不会计算重叠字符串

//function mulitStrpos($haystack, $needles, $offset = 0)
//{
//    $pos=array();
//    foreach ($needles as $needle) {
//        $pos[$needle]=strpos($haystack,$needle);
//    }
//    return $pos;
//}
//
//$text = 'dog,cat,wolf and mouse';
//$needles=['dog','wolf','bird'];
//print_r(mulitStrpos($text,$needles));//Array ( [dog] => 0 [wolf] => 8 [bird] => )

//$text='Abusa';
//echo stripos($text,'a');

//$text='abcd abcd abcd';
//echo strrpos($text,'b');//11
//echo strrpos($text,'b',-3);//11，去掉末尾2个字符然后进行查找，相当于在abcd abcd ab中找
//echo strrpos($text,'b',-4);//6，去掉末尾3个字符然后进行查找，相当于在abcd abcd a中找
//$text='abcd abcd abcd';
//echo strripos($text,'Ab');//10
//echo strrpos($text,'b',-3);//11，去掉末尾2个字符然后进行查找，相当于在abcd abcd ab中找
//echo strrpos($text,'b',-4);//6，去掉末尾3个字符然后进行查找，相当于在abcd abcd a中找




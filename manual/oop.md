#类与对象
##基本概念
* $this
当一个方法在内部被调用时，有一个可用的伪变量*$this*，*$this*是一个主叫对象的引用。
<pre><code>class Foo
           {
               function fun()
               {
                   echo 'fun';
               }
           
               function fun1()
               {
                   $this->fun();
               }
           }
           $myfoo=new Foo();
           $myfoo->fun1();//输出fun</code></pre>
* $this和self的区别：
<pre>
$this是指向当前所在类的实例(因为类还没有实例化没有实例名，用$this来代替)，self则是当前类本身，在类的内部访问类的方法和变量时，如该方法或变量被声明为静态则用self来访问，否则用$this访问。
</pre>
<pre><code>
class Test
{
    public $a='a';
    const B='b';
    function test()
    {
        echo $this->a;
        echo self::B;
    }
}
$test=new Test();
</code></pre>
* new
创建一个类的实例，必须用new关键字。类应该在被实例化之前定义。
* extends
一个类可以用extends继承另一个类的方法和属性。PHP不支持多继承，一个类只能继承一个基类
被继承的方法和属性可以通过同样的名字声明被覆盖，但是如果父类定义使用了*final*，则该方法不可以被覆盖。可以通过parent：：的方法来访问被覆盖的方法和属性。除构造函数外，覆盖方法时，参数必须保持一致。
<pre><code>
class ParentClass
{
    function fun($name)
    {
        echo $name;
    }
}

class ChildClass extends ParentClass
{
    function fun($name)
    {
        echo 'hello'.$name;
        parent::fun($name); 
    }
}
$child=new ChildClass();
$child->fun('world');//helloworld world
</code></pre>

##属性
<pre><code>
class MyTest
{
    public $var1 = 1;
    private $var2 = 2;
    protected $var3 = 3;
    static $var4 = 4;

    function toArray()
    {
        return array($this);
    }
}

$t = new MyTest();
print_r($t->toArray());
</code></pre>
上述代码会输出Array ( [0] => MyTest Object ( [var1] => 1 [var2:MyTest:private] => 2 [var3:protected] => 3 ) )
当object转化为array时会有一些隐藏属性输出，可以使用get_object_vars()来讲object转化为array避免输出隐藏属性。


可以在父类中对静态属性进行定义，在子类中进行重写，通过get_called_class在静态方法中获取到静态静态变量。
<pre><code>
class DbClass
{
    const TBNAME = 'undefine';

    public static function getAll()
    {
        $c = get_called_class();
        return 'select * from ' . $c::TBNAME;
    }
}

class DbPerson extends DbClass
{
    const TBNAME = 'person';
}

class DbAdmin extends DbClass
{
    const TBNAME = 'admin';
}

echo DbPerson::getAll();//select * from person
echo DbAdmin::getAll();//select * from admin
</code></pre>

##类的自动加载
在编写面向对象程序需要加载类所在文件的时候需要在文件开头加require，需要些很长的列表。
php5以后不需要这样做，可以使用 spl_autoload_register()注册任意数量的类自动加载器，当使用未定义的类和接口时候会自动加载。
<pre><code>
spl_autoload_register(function ($className) {
    include(__DIR__ . $className . ".php");
});
</code></pre>

##构造函数和析构函数
###构造函数
void __construct([mixd $args[,$...]])
一个类中定义一个方法为构造函数。具有构造函数的类会在每次创建新对象的时候先调用此方法，所以适合在使用对象之前做一些初始化工作。
如果子类中定义了构造函数则不会调用父类的构造函数，想要执行父类的构造函数需要在子类的构造函数中调用parent：：__construct()。如果没有定义，会继承父类的构造函数。
<pre><code>
class BaseClass
{
    function __construct()
    {
        print 'base construct';
    }
}

class SubClass extends BaseClass
{
    function __construct()
    {
        print 'Sub construct';
        parent::__construct();
    }
}

class AnotherSubClass extends BaseClass
{

}

$base = new BaseClass();//base construct
$sub = new SubClass();//Sub construct base construct
$anotherSub = new AnotherSubClass();//base construct
</code></pre>

###析构函数
void __deconstruct()
析构函数会在某个对象所有引用都被删除或者当对象被显式销毁时执行，当类的引用空间结束时会调用析构函数。
<pre><code>
class MyClass
{
    function __construct()
    {
        print 'construct function';
        $this->name = __CLASS__;
    }

    function __destruct()
    {
        print 'destroy' . $this->name;
    }
}
$obj=new MyClass();
print 'balabala';//construct function  balabala  destroyMyClass
</code></pre>

##访问控制(可见性)
对属性或方法的访问控制是通过在前面添加关键词public、protected、private、来实现的。
被定义为public的类成员在任何地方都可以被访问。
被定义为protected的类成员可以在自身类、父类以及子类中进行访问。
被定义为private的类成员只能被其所定义所在的类访问。
如果没有关键词，默认为public
<pre><code>
class BaseClass
{
    public $public = 'public';
    protected $protected = 'protected';
    private $private = 'private';

    function printAll()
    {
        echo $this->public;
        echo $this->protected;
        echo $this->private;
    }
}
$base=new BaseClass();
echo $base->public;//public
echo $base->protected;//错误
echo $base->private;//错误
$base->printAll();//public protected private
class SubClass extends BaseClass
{
    public $public='public1';
    protected $protected='protected1';
    function printAll()
    {
        echo $this->public;
        echo $this->protected;
        echo $this->private;//未定义，不能从父类继承
    }
}
$sub=new SubClass();
echo $sub->public;//public1
echo $sub->protected;//错误
echo $sub->private;//错误
$sub->printAll();//public1 protected1 undefined
</code></pre>

*eg.* 物品的属性有标签和价格，当设计物品的类的时候要考虑不能在类的外部直接访问类的内部属性，还有对外部的值进行类型过滤。
<pre><code>
class Item
{
    protected $label = 'undefined';
    protected $price = 0.00;

    public function getLabel()
    {
        return $this->label;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setLabel($label)
    {
        if (is_string($label)) {
            $this->label = $label;
        }
    }

    public function setPrice($price)
    {
        if (is_numeric($price)) {
            $this->price = $price;
        }
    }
}
</code></pre>

##继承
子类会继承父类所有公有和被保护的方法，除非子类覆盖父类的方法，被继承的方法都会保留原有功能。
php是单继承，不支持多继承。这是指php只能从一个类只能继承一个类不能继承多各类，但是可以继承一个子类
*eg.* 
<pre><code>
class A
{
}

class B extends A
{
}

class C extends B
{
}
</code></pre>

##范围解析操作符(::)
范围解析符用于访问静态成员，类常量，还可以用于覆盖类的方法和属性。
在类的内部使用self，parent和static关键词加：：对类的方法和属性进行访问。
在类的外部使用类名加：：对类的方法和属性进行操作访问。

##静态关键字static
声明类属性或方法为静态，就可以不实例化直接访问。静态属性不可以通过已经实例化的对象访问，但是静态方法可以。
由于静态方法不需要通过对象就可以调用，所以$this在静态方法中不可用。
静态属性只能被初始为文字和数字，不可以使用表达式
<pre><code>
class Myclass
{
    static $my_static = 'static value';

    static function getStaticValue()
    {
        return self::$my_static;
    }
}
$myObj=new Myclass();
echo $myObj::$my_static;//static value
echo $myObj::getStaticValue();//static value
echo $myObj->$my_static;//不可访问静态属性
echo $myObj->getStaticValue();//static value
</code></pre>

##后期静态绑定
static::后期静态绑定，不在被解析为定义当前方法所在的类，而是在实际运行中时计算的。也可称为静态绑定，是因为可以用于静态方法的调用
使用self对当前类的静态引用，取决于定义当前方法所在的类:
<pre><code>
class A
{
    public static function who()
    {
        echo __CLASS__;
    }

    public static function test()
    {
        self::who();
    }
}

class B extends A
{
    public static function who()
    {
        echo __CLASS__;
    }
}
B::test();//A
</code></pre>

使用static时：
<pre><code>
class A
{
    public static function who()
    {
        echo __CLASS__;
    }

    public static function test()
    {
        static::who();
    }
}

class B extends A
{
    public static function who()
    {
        echo __CLASS__;
    }
}
B::test();//B
</code></pre>

<pre><code>
class A
{
    public static function foo()
    {
        static::who();
    }

    public static function who()
    {
        echo __CLASS__ . "\n";
    }
}

class B extends A
{
    public static function test()
    {
        A::foo();
        parent::foo();
        self::foo();
    }

    public static function who()
    {
        echo __CLASS__ . "\n";
    }
}

class C extends B
{
    public static function who()
    {
        echo __CLASS__ . "\n";
    }
}
C::test();//A C C
</code></pre>
C类中没有test方法，从父类B中找，执行B类中的test方法。
A::foo调用的是A类的方法，输出A。
parent::foo是static调用当前类C的的foo方法，
self::foo是调用B类的foo方法，但是该类没有对foo复写，找父类A中的foo方法，打印调用类C中的类名

##抽象类
PHP5支持抽象类和抽象方法。定义为抽象的类不能被实例化。任何一个类，如果它里面的至少一个方法被声明为抽象的，那么这个类就必须被声明为抽象的。被声明为抽象的方法只是声明了其调用方式，不能定义其具体功能。
* 继承一个抽象类的时候，子类必须定义父类的所有方法；
* 实现类中方法的访问控制必须和抽象类一致，或者比抽象类更为宽松，如抽象方法如果是protected的，子类中实现方法必须是public或者protected的，而不能是private的；
* 方法的调用方式必须匹配，即类型和参数数量必须一致，子类中可以定义一个抽象类中没有的可选参数。 
<pre><code>
abstract class AbstractClass
{
    abstract protected function prefixName($name);
}

class ConcreateClass extends AbstractClass
{
    public function prefixName($name, $separator = '.')
    {
        if ($name == 'Pacman') {
            $prefix = 'Mr';
        } elseif ($name == 'Pacwoman') {
            $prefix = 'Mrs';
        } else {
            $prefix = '';
        }
        return $prefix.$separator.$name;
    }
}
$obj=new ConcreateClass();
echo $obj->prefixName('Pacman');//Mr.Pacman
echo $obj->prefixName('Pacwoman','_');//Mrs_Pacwoman
</code></pre>

##对象接口
使用接口，必须指定某个类必须实现哪些方法，但不需要定义这些方法的具体内容。
接口是通过interface关键词定义的，定义的方法都必须是公有的。
###实现
实现一个操作通过implements操作符，类中必须实现接口中的所有方法，否则会报错。
接口可以多继承
<pre><code>
interface A
{
    public function foo();
}

interface B
{
    public function bar();
}

interface C extends A, B
{
    public function baz();
}

class D implements C
{
    public function foo()
    {
    }
    public function bar()
    {
    }
    public function baz()
    {
    }
}
</code></pre>

* 抽象类和接口：
1. 两者都不能实例化
2. 抽象类要被子类继承，接口要被类实现
3. 接口只能做方法声明，抽象类既可做方法声明也可做方法实现
4. 接口中定义的方法只能是public的，而抽象类可以是public或protected的
5. 抽象类所有抽象方法必须由的子类实现，如果子类不能实现，那么该子类只能为抽象类。同样一个实现接口的时候，如果不能实现全部接口方法，那该类也只能为抽象类。
6. 一个类只能继承一个抽象类，一个类可以实现多个接口
7. 抽象类是对一个事物的抽象，即对类的抽象，接口是对行为的抽象
8. 抽象类作很多子类的父类，是一种模板设计，而接口是一种行为规范

##trait
为php解决单继承的一种代码复用机制。使开发人员能够在不同层次结构内独立的类中复用method，无法通过trait自身来实例化。
为传统的继承增加了水平特性的组合，也就是说，应用的几个class之间不能继承。
###优先级
从基类继承的成员会被trait插入的成员覆盖。优先顺序：当前类成员>trait方法>被继承的方法
<pre>
class Base
{
    function sayHello()
    {
        echo 'hello';
    }
}

trait SayWorld
{
    function sayHello()
    {
        parent::sayHello();
        echo 'world';
    }
}

class MyHelloWorld extends Base
{
    use SayWorld;
}

$o = new MyHelloWorld();
$o->sayHello();//hello world
</pre>
<pre>
trait A
{
    function sayHello()
    {
        echo 'hello';
    }
}

class B
{
    use A;
    function sayHello()
    {
        echo 'world';
    }
}
$b=new B();
$b->sayHello();//world
</pre>
###多个trait
<pre>
trait SayHello
{
    function sayHello()
    {
        echo 'hello';
    }
}

trait SayWorld
{
    function sayWorld()
    {
        echo 'world';
    }
}

class HelloWorld
{
    use SayHello, SayWorld;
}

$helloWorld = new HelloWorld();
$helloWorld->sayHello();//hello
$helloWorld->sayWorld();//world
</pre>

trait也可以定义属性，定义了一个属性以后，类就不能定义相同名称的属性，否则会产生错误
<pre>
trait MyTrait
{
    public $var = 1;
}

class MyClass
{
    use MyTrait;
    public $var=2;//出错
}
</pre>
和继承不同，如果trait中有静态属性，则每个使用trait的类独立的含有该属性
<pre>
class Test
{
    public static $var;
}
class A extends Test{}
class B extends Test{}
A::$var='hello';
B::$var='world';
echo A::$var;//world
echo B::$var;//world
---------------------------------------
trait Test
{
    public static $var;
}

class A
{
    use Test;
}

class B
{
    use Test;
}
A::$var='hello';
B::$var='world';
echo A::$var;//hello
echo B::$var;//world
</pre>

##匿名类
PHP7开始支持匿名类。可以创建一次性对象
<pre>
$util->setLogger(new class {
    public function log($msg)
    {
        echo $msg;
    }
});
</pre>

##魔术方法
__construct(),__destruct(),__call(),__callStatic(),__get(),__set(),__isset(),__unset(),__sleep(),__wakeup(),__toString(),__invoke(),__set_state(),__clone(),__debugInfo()在PHP中被称为魔术方法
>__call(),当所调用的成员方法不存在(或者没有权限)该类时调用，对错误后做一些操作或者提示信息。
__callStatic(),所调用的方法为静态方法时调用该函数。
<pre>
class Person
{
    public $name;
    private $age;

    function walk($length)
    {
        echo $this->name . 'walk' . $length . 'km';
    }

    function __call($name, $arguments)
    {
        echo $name . 'cannot find the param is' ;
        print_r($arguments);
    }
    static function __callStatic($name, $arguments)
    {
        echo $name . 'cannot find the static function the param is' ;
        print_r($arguments);
    }
}
$person=new Person();
$person->name='joe';
$person->walk(90);//joe walk 90km
$person->run(89);//run cannot find the param isArray ( [0] => 89 )
Person::run(89);//run cannot find the static function the param isArray ( [0] => 89 )
</pre>
>__clone(),该函数在对象克隆是自动调用，其作用是是对克隆的副本做一些初始化操作。
<pre>
class Computer
{
    public $cpu='inter';
    function __clone()
    {
        $this->cpu='AMD';
    }
}
$c1=new Computer();
$c2=clone $c1;
echo $c1->cpu;//inter
echo $c2->cpu;//AMD
</pre>

>__get(),当所调用的成员属性未声明或者不可访问时，可在函数中做一些操作
<pre>
class Person
{
    public $name;
    private $sex;
    function __get($name)
    {
        echo $name.'不存在或者不可访问';
    }
}
$person=new Person();
$sex=$person->sex;//sex不存在或者不可访问
</pre>

>__set()当对未定义或者不可访问的成员属性进行赋值时调用此函数。
<pre>
class Person
{
    public $name;
    private $sex;
    function __set($name, $value)
    {
        echo '对'.$name.'赋值'.$value.'失败';
    }

}
$person=new Person();
$person->sex='male';//对sex赋值male失败
</pre>

>__isset(),当一个未声明或者访问受限的成员属性调用isset函数时调用该函数
__unset(),当一个未声明或者访问受限的成员属性调用unset函数时调用该函数
__toString(),将对象引用作为字符串操作时会调用该函数
<pre>
class Person
{
    function __toString()
    {
        return '以字符的类型调用对象';
    }
}
$p=new Person();
echo $p;//以字符的类型调用对象
</pre>
>__sleep(),该函数将在序列化时自动调用
__wakeup(),该函数将在反序列化时自动调用
<pre>
class User
{
    private $name;
    private $age;
    private $sex;
    function __construct($pname,$page,$psex)
    {
        $this->name=$pname;
        $this->age=$page;
        $this->sex=$psex;
    }
    function __sleep()
    {
        return array('name','age','sex');
    }
    function __wakeup()
    {
        $this->name='Yue';
    }
}
$user=new User('andy',22,'male');
file_put_contents('info.txt',serialize($user));
$str=file_get_contents('info.txt');
$uu=unserialize($str);
print_r($uu);//User Object ( [name:User:private] => Yue [age:User:private] => 22 [sex:User:private] => male )
</pre>

##final关键字
如果父类中的方法被声明为final，则子类无法覆盖该方法。如果一个类被声明为final，则不能被继承。
##对象复制
对象的复制是通过关键字clone来实现的。用clone克隆出来的对象与原对象没有任何关系，它是把原来的对象从当前的位置重新复制了一份，也就是相当于在内存中新开辟了一块空间。
<pre>
class myClass{
    public $data;
}

$sss ="aaa";
$obj1 = new myClass();
$obj1->data =$sss;
$obj2 = clone $obj1;
$obj2->data="bbb";

print_r($obj1);//myClass Object ( [data] => aaa ) 
print_r($obj2);//myClass Object ( [data] => bbb )
</pre>
##对象比较
果两个对象的属性和属性值 都相等，而且两个对象是同一个类的实例，那么这两个对象变量相等。
<pre>
class Person
{
    public $name;
    public $age;
    public $sex;
}

$p1 = new Person();
$p2 = new Person();
$p1->name = 'xiao';
$p2->name = 'xiao';
$p1->age = 22;
$p2->age = 22;
$p1->sex = 'male';
$p2->sex = 'male';
echo(int)($p1 == $p2);//1
$p2->age=20;
echo(int)($p1 > $p2);//1
</pre>
##对象和引用





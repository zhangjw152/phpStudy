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

*eg.*物品的属性有标签和价格，当设计物品的类的时候要考虑不能在类的外部直接访问类的内部属性，还有对外部的值进行类型过滤。
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





#命名空间
##命名空间概述
用于避免php用户编写的类，函数和常量与别人的重名。
##命名空间的定义
<pre>
namespace MyProject;
const CONNECT_OK=1;
class connection{};
function connect(){}
</pre>
也可以定义子命名空间
<pre>
namespace MyProject\sub\level;
const CONNECT_OK=1;
class connection{};
function connect(){}
</pre>
##命名空间的使用
###基础
php命名空间的元素通过三种方式引用
1. 非限定使用，不包含前缀的类名称，例如$a=new foo()或者foo::staticmethod()。如果当前命名空间是currentnamespace，foo将被解析为currentnamespace\foo,如果foo代码使用的是全局的，不包含在任何命名空间下，则foo将被解析为foo。如果命名空间内函数和常量未定义，则该非限定的函数名称或者常量名称将被解析为全局函数名称或者常量名称。
1. 限定名称，包含前缀名称，例如$a=new subnamespace\foo(),或subnamespace\foo::staticmethod(),如果当前的命名空间是currentnamespace，则foo会被解析为currentnamespace\subnamespace\foo。如果foo代码是全局的，则会被解析为subnamespace\foo。
1. 完全限定名称，包含全局前缀操作符的名称。例如，$a=new\currentnamespace\foo()或者\currentnamespace\foo::staticmethod()。会被解析为currentnamespace\foo。

下面是三种方式的实例：
file1.php
<pre>
namespace Foo\Bar\subnamespace;
const FOO = 1;
function foo()
{
}

class foo
{
    static function staticmethod(){}
}
</pre>

file2.php
<pre>
namespace Foo\Bar;
include 'file1.php';
const FOO = 2;
function foo()
{
}

class foo
{
    static function staticmethod()
    {
    }
}

//非限定名称
foo();//解析为Foo\Bar\foo();
foo::staticmethod();//解析为Foo\Bar\foo的静态方法staticmethod()
echo FOO;//解析为Foo\Bar\FOO;
//限定名称
subnamespace\foo();//解析为Foo\Bar\subnamespace\foo();
subnamespace\foo::staticmethod();//解析为Foo\Bar\subnamespace\foo的静态方法staticmethod();
echo subnamespace\FOO;//解析为Foo\Bar\subnamespace\FOO;
//完全限定名称
\Foo\Bar\foo();//解析为Foo\Bat\foo();
\Foo\Bar\foo::staticmethod();//解析为Foo\Bar\foo中的静态方法staticmethod();
echo \Foo\Bar\FOO;//解析为Foo\Bar\FOO;
</pre>
###别名/导入
PHP支持为类名称、接口、命名空间名称使用别名，使用use来实现
<pre>
use My\Full\Classname as Another;
use function My\Full\functionName as func;
use const My\Full\CONSTANT as anotherCONSTANT;
</pre>

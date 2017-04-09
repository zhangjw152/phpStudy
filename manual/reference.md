#引用
PHP的引用意味着用不同的名字访问同一个变量的内容。并不像c的指针：不能对他们做指针运算，他们并不是实际的内存地址。
<pre>
$a=&$b
</pre>
这意味着$a和$b是完全相同的，指向同一个变量，而不是$a指向$b或者$b指向$a。
<pre>
$a = 1;
$c = 2;
$b =& $a;
$a =& $c;
echo $a;//2
echo $b;//1
</pre>
<pre>
$array1=array(1);
$array2=$array1;
$array2[0]++;
print_r($array1);//Array ( [0] => 1 ) 
print_r($array2);//Array ( [0] => 2 )
-------------------------------------
$array1=array(1);
$x=&$array1[0];
$array2=$array1;
$array2[0]++;
print_r($array1);//Array ( [0] => 2 ) 
print_r($array2);//Array ( [0] => 2 )
</pre>

引用传递变量，函数内建立了一个本地变量引用一个变量实现
<pre>
function foo(&$var)
{
    $var++;
}
$var=5;
foo($var);
echo $var;
</pre>
##引用返回
引用返回用在当想用函数找到引用应该绑定到哪一个变量上时。
<pre>
function &fun()//指出返回是一个引用
{
    static $static = 0;
    $static++;
    return $static;
}
$var1=&fun();
echo $var1;//1
fun();
fun();
echo $var1;//3
$var2=fun();
echo $var2;//4
fun();
fun();
echo $var2;//4
</pre>

##取消引用
当unset一个引用时，只是断开了变量名和变量的联系，并不意味着销毁了变量内容。
=null,意味着销毁了变量内容
<pre>
$a=2;
$b=&$a;
unset($a);
echo $b;//2,不会销毁$b只会销毁$a
-------------------------------
$a=2;
$b=&$a;
$a=null;
echo $b;//null,销毁了变量内容
</pre>

<pre>
/* Imagine this is memory map
______________________________
|pointer | value | variable              |
-----------------------------------
|   1     |  NULL  |         ---           |
|   2     |  NULL  |         ---           |
|   3     |  NULL  |         ---           |
|   4     |  NULL  |         ---           |
|   5     |  NULL  |         ---           |
------------------------------------
Create some variables   */
$a=10;
$b=20;
$c=array ('one'=>array (1, 2, 3));
/* Look at memory
_______________________________
|pointer | value |       variable's       |
-----------------------------------
|   1     |  10     |       $a               |
|   2     |  20     |       $b               |
|   3     |  1       |      $c['one'][0]   |
|   4     |  2       |      $c['one'][1]   |
|   5     |  3       |      $c['one'][2]   |
------------------------------------
do  */
$a=&$c['one'][2];
/* Look at memory
_______________________________
|pointer | value |       variable's       |
-----------------------------------
|   1     |  NULL  |       ---              |  //value of  $a is destroyed and pointer is free
|   2     |  20     |       $b               |
|   3     |  1       |      $c['one'][0]   |
|   4     |  2       |      $c['one'][1]   |
|   5     |  3       |  $c['one'][2]  ,$a | // $a is now here
------------------------------------
do  */
$b=&$a;  // or  $b=&$c['one'][2]; result is same as both "$c['one'][2]" and "$a" is at same pointer.
/* Look at memory
_________________________________
|pointer | value |       variable's           |
--------------------------------------
|   1     |  NULL  |       ---                  |  
|   2     |  NULL  |       ---                  |  //value of  $b is destroyed and pointer is free
|   3     |  1       |      $c['one'][0]       |
|   4     |  2       |      $c['one'][1]       |
|   5     |  3       |$c['one'][2]  ,$a , $b |  // $b is now here
---------------------------------------
next do */
unset($c['one'][2]);
/* Look at memory
_________________________________
|pointer | value |       variable's           |
--------------------------------------
|   1     |  NULL  |       ---                  |  
|   2     |  NULL  |       ---                  |  
|   3     |  1       |      $c['one'][0]       |
|   4     |  2       |      $c['one'][1]       |
|   5     |  3       |      $a , $b              | // $c['one'][2]  is  destroyed not in memory, not in array
---------------------------------------
next do   */
$c['one'][2]=500;    //now it is in array
/* Look at memory
_________________________________
|pointer | value |       variable's           |
--------------------------------------
|   1     |  500    |      $c['one'][2]       |  //created it lands on any(next) free pointer in memory
|   2     |  NULL  |       ---                  |  
|   3     |  1       |      $c['one'][0]       |
|   4     |  2       |      $c['one'][1]       |
|   5     |  3       |      $a , $b              | //this pointer is in use
---------------------------------------
lets tray to return $c['one'][2] at old pointer an remove reference $a,$b.  */
$c['one'][2]=&$a;
unset($a);
unset($b);   
/* look at memory
_________________________________
|pointer | value |       variable's           |
--------------------------------------
|   1     |  NULL  |       ---                  |  
|   2     |  NULL  |       ---                  |  
|   3     |  1       |      $c['one'][0]       |
|   4     |  2       |      $c['one'][1]       |
|   5     |  3       |      $c['one'][2]       | //$c['one'][2] is returned, $a,$b is destroyed
</pre>
<pre>
$a = "hihaha";
$b = &$a;
$c = "eita";
$b = $c;
echo $a; // shows "eita"

$a = "hihaha";
$b = &$a;
$c = "eita";
$b = &$c;
echo $a; // shows "hihaha"

$a = "hihaha";
$b = &$a;
$b = null;
echo $a; // shows nothing (both are set to null)

$a = "hihaha";
$b = &$a;
unset($b);
echo $a; // shows "hihaha"

$a = "hihaha";
$b = &$a;
$c = "eita";
$a = $c;
echo $b; // shows "eita"

$a = "hihaha";
$b = &$a;
$c = "eita";
$a = &$c;
echo $b; // shows "hihaha"

$a = "hihaha";
$b = &$a;
$a = null;
echo $b; // shows nothing (both are set to null)

$a = "hihaha";
$b = &$a;
unset($a);
echo $b; // shows "hihaha"
</pre>



#垃圾回收：
1. 在5.2版本或之前版本，PHP会根据refcount值来判断是不是垃圾
如果refcount值为0，PHP会当做垃圾释放掉
这种回收机制有缺陷，对于环状引用的变量无法回收

1. 在5.3之后版本改进了垃圾回收机制
如果发现一个zval容器中的refcount在增加，说明不是垃圾
如果发现一个zval容器中的refcount在减少，如果减到了0，直接当做垃圾回收
如果发现一个zval容器中的refcount在减少，并没有减到0，PHP会把该值放到缓冲区，当做有可能是垃圾的怀疑对象。
当缓冲区达到了临界值，PHP会自动调用一个方法去遍历每一个值，如果发现是垃圾就清理
<pre>
$a = 1;
xdebug_debug_zval('a');//a: (refcount=1, is_ref=0),int 1
echo PHP_EOL;
$b = $a;
xdebug_debug_zval('a');//a: (refcount=2, is_ref=0),int 1
echo PHP_EOL;

$c = &$a;
xdebug_debug_zval('a');//a: (refcount=2, is_ref=1),int 1
echo PHP_EOL;

xdebug_debug_zval('b');//a: (refcount=1, is_ref=0),int 1
echo PHP_EOL;
</pre>

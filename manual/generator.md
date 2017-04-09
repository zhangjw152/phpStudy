#生成器
生成器允许在foreach代码块中写代码来迭代一组数据而不需要在内存中创建数组，减少内存占用以及处理时间。
生成器函数和普通函数的区别：普通函数只返回一次结果，生成器可以根据需求yield多次，以便生成需要迭代的值。
当每一个生成器被调用的时候，它返回一个可以被遍历的对象。当你遍历这个对象的时候，PHP会将每次需要值得时候调用生成器函数，并在产生一个值之后保存生成器的状态，这样它就可以在需要产生下一个值的时候恢复调用状态。
<pre>
<code>
function get_one_to_three()
{
    for ($i = 1; $i < = 3; $i++) {
        yield $i;
    }
}
foreach (get_one_to_three() as $value) {
    echo $value;
}//输出1 2 3
</code>
</pre>

菲波那切数列
<pre>
function getFiboncci()
{
    $i = 0;
    $k = 1;
    yield $k;
    while (true) {
        $k = $k + $i;
        $i = $k - $i;
        yield $k;
    }
}

$y = 0;
foreach (getFiboncci() as $fiboncci) {
    echo $fiboncci . "\n";
    $y++;
    if ($y > 30) {
        break;
    }
}
</pre>


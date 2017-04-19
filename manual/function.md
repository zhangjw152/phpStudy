# 字符串函数
## [chuck_spilt](#chuck_spilt)，[string_spilt](#string_spilt)，[explode](#explode)，[preg_spilt](#preg_spilt)以及[wordwrap](#wordwrap)
<h2 id="chuck_spilt"></h2>
* string chuck_spilt($sring body[,int $chucklen=76[,string $end="\r\n"]])将字符串分成小块
<pre>
echo chunk_split('hujkokoefhuhusjd',4);//hujk okoe fhuh usjd
</pre>
<h2 id="string_spilt"></h2>
* array string_spilt(string $body[,int spilt_length=1])将一个字符串转化为数组
<pre>
print_r(str_split('hello world',3));//Array ( [0] => hel [1] => lo [2] => wor [3] => ld )
</pre>
<h2 id="explode"></h2>
* array explode(string $delimiter,string $string[,int limit])将字符串分割成数组
<pre>
$string='one|two|three|four';
print_r(explode('|',$string));//Array ( [0] => one [1] => two [2] => three [3] => four )
</pre>
>多分隔符进行分割
<pre>
function multieExplode($delimiters, $str)
{
    $ready=str_replace($delimiters,$delimiters[0],$str);
    $lauch=explode($delimiters[0],$ready);
    return $lauch;
}
$text="here is a sample: this text, and this will be exploded. this also | this one too :)";
$delimiters=array(',',':','.','|');
print_r(multieExplode($delimiters,$text));//Array ( [0] => here is a sample [1] => this text [2] => and this will be exploded [3] => this also [4] => this one too [5] => ) )
</pre>
<h4 id="preg_spilt"></h4>
* array preg_spilt(string $patten,string $subject)通过一个正则表达式分隔字符串
<pre>
print_r(preg_split("/[,\s]+/",'hypertext language, programming'));//Array ( [0] => hypertext [1] => language [2] => programming )
</pre>
<h2 id="wordwrap"></h2>
* string wordwrap (string $str [, int $width = 75 [, string $break = "\n" [, bool $cut = false ]]])打断字符串为指定数量的字串
<pre>
$text = "A very long woooooooooooord.";
$newtext = wordwrap($text, 8, "\n", true);
echo "$newtext\n";//A very long wooooooo ooooord.
-------------------
$text = "A very long woooooooooooooooooord. and something";
$newtext = wordwrap($text, 8, "\n", false);
echo "$newtext\n";//A very long woooooooooooooooooord. and something
</pre>
* mixed count_chars(string $string[,int $mode=0]);统计string中每个字节值出现的次数
<pre>
$data = "Two Ts and one F.";
foreach (count_chars($data, 1) as $i => $val) {
   echo "There were $val instance(s) of \"" , chr($i) , "\" in the string.\n";
}
</pre>
>输出:There were 4 instance(s) of " " in the string.
    There were 1 instance(s) of "." in the string.
    There were 1 instance(s) of "F" in the string.
    There were 2 instance(s) of "T" in the string.
    There were 1 instance(s) of "a" in the string.
    There were 1 instance(s) of "d" in the string.
    There were 1 instance(s) of "e" in the string.
    There were 2 instance(s) of "n" in the string.
    There were 2 instance(s) of "o" in the string.
    There were 1 instance(s) of "s" in the string.
    There were 1 instance(s) of "w" in the string.

* int substr_count($haystack,$needle[,int $offset=0[,int $length]]) 统计$haystack中含有$needle的数目
 <pre>
 $text='this is a test';
 echo substr_count($text,'is');//2
 echo substr_count($text,'is',3);//1,实际是统计's is a test'中含有'is'个数
 echo substr_count($text,'is',3,3);//0,实际是统计's i'中含有'is'个数
 -------------------
 $text2 = 'gcdgcdgcd';
 echo substr_count($text2, 'gcdgcd');//输出1，因为函数不会计算重叠字符串
 </pre>
    
* mixed strpos(string $haystack,mixed $needle[,int $offset=0]);返回$needle字符串在$haystack字符串中首次出现的位置，如果没有会返回false
<pre>
$str = 'abcde abcde';
$needle = 'ab';
$pos = strpos($str, $needle);
if ($pos === false) {//在这里使用的是'==='而不可以使用'=='
    echo $needle . ' not in ' . $str;
} else {
    echo $needle . ' in ' . $str;
}//ab in abcde abcde
-----------------------------
$str = 'abcde abcde';
$needle = 'ab';
$pos = strpos($str, $needle,1);//忽视偏移量之前的字符进行查找
echo $pos;//6
-----------------------------
//找多个字符串首次出现的位置
function mulitStrpos($haystack, $needles, $offset = 0)
{
    $pos=array();
    foreach ($needles as $needle) {
        $pos[$needle]=strpos($haystack,$needle);
    }
    return $pos;
}

$text = 'dog,cat,wolf and mouse';
$needles=['dog','wolf','bird'];
print_r(mulitStrpos($text,$needles));//Array ( [dog] => 0 [wolf] => 8 [bird] => )
</pre>
* mixed stripos(string $haystack,string $needle[,int offset=0])查找字符串首次出现的位置(不区分大小写)
<pre>
$text='Abusa';
echo stripos($text,'a');//0而不是4
</pre>
* int strrpos(string $haystack,string $needle[,int offset=0])返回指定字符串在目标字符串中最后一次出现的位置，offset为负值时，在倒数第几个字符的位置结束查找。
<pre>
$text='abcd abcd abcd';
echo strrpos($text,'b');//11
echo strrpos($text,'b',-3);//11，去掉末尾2个字符然后进行查找，相当于在abcd abcd ab中找
echo strrpos($text,'b',-4);//6，去掉末尾3个字符然后进行查找，相当于在abcd abcd a中找
</pre>
* int strrpos(string $haystack,string $needle[,int offset=0])不区分大小写，返回指定字符串在目标字符串中最后一次出现的位置，offset为负值时，在倒数第几个字符的位置结束查找。
<pre>
$text='abcd abcd abcd';
echo strripos($text,'Ab');//10
</pre>



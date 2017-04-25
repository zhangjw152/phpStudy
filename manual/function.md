# 字符串函数
## 字符串的分割[chuck_spilt](#chuck_spilt)，[string_spilt](#string_spilt)，[explode](#explode)，[implode](#implode)，[preg_spilt](#preg_spilt)以及[wordwrap](#wordwrap)
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
<h4 id="implode"></h4>
* string implode(string $glue,array $piece)
    string implode(string $glue,array $piece)用$glue的值将一个一维数组合并成字符串
<pre>
$arr=array(1,23,45,4);
$ids=implode(',',$arr);
$sql="select * from TABLE  WHERE id IN ($ids)";
echo $sql;//select * from TABLE WHERE id IN (1,23,45,4)
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
## 统计字符串中字符的数目[count_chars](#count_chars)，[substr_count](#substr_count)
<h2 id="count_chars"></h2>
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

<h2 id="substr_count"></h2>
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
* int strripos(string $haystack,string $needle[,int offset=0])不区分大小写，返回指定字符串在目标字符串中最后一次出现的位置，offset为负值时，在倒数第几个字符的位置结束查找。
<pre>
$text='abcd abcd abcd';
echo strripos($text,'Ab');//10
</pre>
* string strstr(string $haystack,mixed $needle[,bool $before_needle=false])返回$haystack字符串从$needle第一次出现的位置到$haystack结束的字符串。
<pre>
$email='name@example.com';
echo strstr($email,'@');//example.com
echo strstr($email,'@',true);//name
</pre>
* string stristr(string $haystack,mixed $needle[,bool $before_needle=false])strstr的忽略大小写的版本
<pre>
$email='USER@EXAMPLE.COM';
echo stristr($email,'e');//ER@EXAMPLE.COM
echo stristr($email,'e',true);//US
</pre>
* string strrchr(string $haystack,mixed $needle)该函数返回$haystack以$needle的最后出现位置开始，直到$haystack末尾
<pre>
$fileName='search.asp.php';
echo strrchr($fileName,'.');//.php
</pre>
* string strpbrk(string $haystack,string $charlist)在$haystack字符串中查找$char_list中的字符，返回找到$haystack中第一个$char_list中的字符开头到$haystack结尾的字符串
<pre>
$text='This is a example text';
$char_list='mi';
echo strpbrk($text,$char_list);//is is a example text
</pre>
* string substr(string $haystack,int $start[,int $length])返回字符串$haystack由$start和$length参数指定的子字符串。
<pre>
$str='abcdefg';
echo substr($str,1,3);//bcd
echo substr($str,-2);//fg  $start为负值时，从倒数第n的值开始
echo substr($str,1,-2);//bcde  $length为负值时，末尾的n的字符将会被忽略
echo substr($str,-3,-1);//ef
</pre>
## 输入输出
* echo (string $arg1[,string $...])不是函数，是一个语言结构，输出一个或多个字符串
* print (string $arg1)和echo唯一区别是只可以输出一个字符串
* printf(string $format[,mixed $args[,mixed $...]])依据format格式输出字符串
<pre>
$num=2.12;
printf("%.1f",$num);//2.1
</pre>
* string sprintf(string $format[,mixed $args[,mixed $...]])依据format格式返回字符串
<pre>
$num=2.12;
$str=sprintf("%.1f",$num);
echo $str;//2.1
</pre>
* string vsprintf(string $format,array $agrs)依据format格式返回字符串，和sprintf函数类似，但是接收的参数是数组。
<pre>
$date='2017-4-22';
$formatDate=vsprintf('%04d-%02d-%02d',explode('-',$date));
echo $formatDate;//2017-04-22
</pre>
* mixed sscanf(string $str,string $format[,mixed &$...])根据指定的格式解析输入的字符
<pre>
list($series)=sscanf('SN/37767','SN/%d');
list($month,$day,$year)=sscanf('January 01 2000','%s %d %d');
echo 'Item '.$series.' is made at '.$year.substr($month,0,3).$day;//Item 37767 is made at 2000 Jan 1
</pre>
* mixed fscanf ( resource $handle , string $format [, mixed &$... ] )根据指定的格式解析文件中的字符
<pre>
$handle = fopen("users.txt", "r");
while ($userinfo = fscanf($handle, "%s\t%s\t%s\n")) {
    list ($name, $profession, $countrycode) = $userinfo;
    echo $name;
    echo PHP_EOL;
}//javier hiroshi robert luigi
fclose($handle);
--------------------
users.txt
javier  argonaut    pe
hiroshi sculptor    p
robert  slacker us
luigi   florist it
</pre>
##字母大小写转换
* string lcfirst(string $str)是字符串的第一个字符小写
<pre>
$str='Hello World';
echo lcfirst($str);//hello World
</pre>
* string ucfirst(string $str)将字符串的第一个字符转化为大写
<pre>
$str='hello World';
echo ucfirst($str);//Hello World
</pre>
* string ucwords(string $str[,srting $delimiters=" \t\r\n\f\v"])将字符串每个单词的首字符转化为大写，返回
<pre>
$str='hello world and hello you';
echo ucwords($str);//Hello World And Hello You
</pre>
* string strtoupper(string $str)将字符串中所有字符转化为大写,并返回
<pre>
$str = "Mary Had A Little Lamb and She LOVED It So";
echo strtoupper($str);//MARY HAD A LITTLE LAMB AND SHE LOVED IT SO
</pre>
* string strtolower(string $str)将字符串中所有字符转化为小写，并返回
<pre>
$str = "Mary Had A Little Lamb and She LOVED It So";
echo strtolower($str);//mary had a little lamb and she loved it so
</pre>
##删除空字符
* string ltrim(string $string[,string character_mask])删除字符串开头的空白字符
<pre>
$text = "\t\tThese are a few words :) ...  ";
echo ltrim($text);//These are a few words :) ...
</pre>
* string rtrim(string $string[,string character_mask])删除字符串末端的空白字符
<pre>
$text="These are a few words  \t";
echo rtrim($text);//These are a few words
</pre>
* string trim (string $string[,string character_mask])删除字符串收尾处的空白字符
<pre>
$text="   These are a few words  \t";
echo rtrim($text);//These are a few words
</pre>
##number_format()
* string number_format(float $number,int $decimal=0,string $dec_point=".",string $thousands_sep=",")以分隔符的方式格式化一个数字
$number要格式化的数字；$decimals要保留的小数位数；$dec_point指定小数的分割字符，默认为'.'；$thousands_sep指定千分位的分割字符，默认为','
<pre>
$num=12345.67;
echo number_format($num,3);//12,345.670
echo number_format($num,3,',','.');//12.345,670
</pre>
##ord和chr
int ord(string $string)返回字符串$string字符串的第一个字符的ASCII码
<pre>
$str='1234';
echo ord($str);//49
</pre>
string chr(int $ascii)返回ASCII码对应的字符
<pre>
$str=49;
echo chr($str);//1
</pre>
##格式解析
* void parse_str(string $str[,array &$arr])将字符串解析成多个变量，如果设置第二个参数$arr,变量会以数组元素的形式存入数组，作为替代。
<pre>
$str='first=value&arr[]=apple+pear&arr[]=banana';
parse_str($str);//value
echo $first;
print_r($arr);//Array ( [0] => apple pear [1] => banana )
parse_str($str,$output);
print_r($output);//Array ( [first] => value [arr] => Array ( [0] => apple pear [1] => banana ) )
</pre>





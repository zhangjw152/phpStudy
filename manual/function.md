# 字符串函数
## 字符串的分割[chuck_spilt](#chuck_spilt)，[string_spilt](#string_spilt)，[explode](#explode)，[implode](#implode)，[preg_spilt](#preg_spilt)，[wordwrap](#wordwrap)以及[strtok](#strtok)
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

* string strtok(string $str,string $token)
  string strtok(string $token)将字符串str分割为若干个子字符串，每个字符串以token中的字符分割，仅第一次调用strtok是使用str参数，后来每次调用strtok值使用token参数
<pre>
$string = "This is\tan example\nstring";
/* 使用制表符和换行符作为分界符 */
$tok = strtok($string, " \n\t");

while ($tok !== false) {
    echo "Word=$tok<br />";
    $tok = strtok(" \n\t");
}
结果为：
Word=This
Word=is
Word=an
Word=example
Word=string
</pre>

## 统计字符串中字符的数目[count_chars](#count_chars)，[substr_count](#substr_count)，[str_word_count](#str_word_countt)
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
 |-------------------|
 $text2 = 'gcdgcdgcd';
 echo substr_count($text2, 'gcdgcd');//输出1，因为函数不会计算重叠字符串
 </pre>
 
 <h2 id="str_word_count"></h2>
 mixed str_word_count(string $string[,int $format=0[,string $charlist]])返回字符串中单词的使用情况
 format：0返回单词的数量
        1返回一个包含string中全部单词的数组
        2返回关联数组。数组的键是单词在string中出现的数值位置，数组的值是这个单词
<pre>
$str='hello fri3end, you are looking    good today';
print_r(str_word_count($str));//8
print_r(str_word_count($str,1));//Array ( [0] => hello [1] => fri [2] => end [3] => you [4] => are [5] => looking [6] => good [7] => today
</pre>
   
## 字符串中的位置   
    
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
|-----------------------------|
$str = 'abcde abcde';
$needle = 'ab';
$pos = strpos($str, $needle,1);//忽视偏移量之前的字符进行查找
echo $pos;//6
|-----------------------------|
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
|--------------------|
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

##数组解析
* void parse_str(string $str[,array &$arr])将字符串解析成多个变量，如果设置第二个参数$arr,变量会以数组元素的形式存入数组，作为替代。
<pre>
$str='first=value&arr[]=apple+pear&arr[]=banana';
parse_str($str);//value
echo $first;
print_r($arr);//Array ( [0] => apple pear [1] => banana )
parse_str($str,$output);
print_r($output);//Array ( [first] => value [arr] => Array ( [0] => apple pear [1] => banana ) )
</pre>

* string http_build_query(mixed $queyr_data[,string $numeric_prefix[,string $arg_separator[,int $enc_type=PHP_QUERY_RFC1738]]])生成URL-encode之后的请求字符串
query_data可以是数组或包含属性的对象。
numeric_prefix此参数值将会作为基础数组中的数字下标元素的前缀。
arg_separator作为分隔参数。
<pre>
$data = array('foo' => 'bar',
    'baz' => 'boom',
    'cow' => 'milk',
    'php'=>'hypertext processor');
echo http_build_query($data);//foo=bar&baz=boom&cow=milk&php=hypertext+processor
|--------------------|
$data=array('foo','bar','baz','boom','cow'=>'milk','php'=>'hypertext processor');
echo http_build_query($data,'myvar_');//myvar_0=foo&myvar_1=bar&myvar_2=baz&myvar_3=boom&cow=milk&php=hypertext+processor
|---------------------|
$fruit=array('apple'=>array('red','yellow'),'orange');
echo http_build_query($fruit,'flags_');//apple%5B0%5D=red&apple%5B1%5D=yellow&flags_0=orange
</pre>

## 字符串编解码
string urlencode(string $str)编码URL字符串
string urldecode(string $str)解码已编码的URL字符串
<pre>
$ChineseName="我的名字";
$encodeStr=urlencode($ChineseName);
echo "<a href=/cgi/personal.cgi?name=$encodeStr>我的名字</a>";//将中文参数进行编码否则会导致乱码
$DecodeStr=urldecode($_GET['name']);//错误，浏览器会自动解码，不需手动解码
$DecodeStr=$_GET['name'];//正确，浏览器会自动解码 
</pre>

## 路径解析
* mixed parse_url(string $url[,int $component=-1])解析URL，返回器组成部分
<pre>
$url = 'http://username:password@hostname/path?arg=value#anchor';
print_r(parse_url($url));//Array ( [scheme] => http [host] => hostname [user] => username [pass] => password [path] => /path [query] => arg=value [fragment] => anchor )
</pre>

* mixed pathinfo(string $path[,int $option=PATHINFO_DIRNAME | PATHINFO_BASENAME | PATHINFO_EXTENSION | PATHINFO_FILENAME ])
<pre>
$path_parts = pathinfo('/www/htdocs/inc/lib.inc.php');
print_r($path_parts);//Array ( [dirname] => /www/htdocs/inc [basename] => lib.inc.php [extension] => php [filename] => lib.inc )
|-----------|
$path_parts = pathinfo('/www/htdocs/inc/lib');
print_r($path_parts);//Array ( [dirname] => /www/htdocs/inc [basename] => lib [filename] => lib )
</pre>

* string dirname(string $path)返回路径中的目录部分
<pre>
echo dirname(__FILE__);//给出当前文件所在目录
</pre>

* string basename(string $path[,$suffix])返回路径中的文件名部分，如果文件名是以$suffix结尾的，那么这一部分也会被去掉。
<pre>
echo basename("/etc/sudoers.d", ".d");//sudoers
</pre>

## 字符串替换
* mixed str_replace(mixed $search,mixed $replace,mixed $subject[,int &$count])子字符串替换，返回一个字符串或者数组。字符串或者数组是将subject中全部的search被replace替换之后的结果
str_ireplace不区分大小写
<pre>
$phrase  = "You should eat fruits, and fiber every day.";
$healthy = array("fruits", "vegetables", "fiber");
$yummy   = array("pizza", "beer", "ice cream");

$newphrase = str_replace($healthy, $yummy, $phrase);
echo $newphrase;//You should eat pizza, and ice cream every day.
|-----------|
$str=str_replace("ll","","good golly miss molly!",$count);
echo $str;//good goy miss moy!
echo $count;//2
|------------|
//str_replace()的替换时从左到右依次进行的，进行多重替换的时候可能会替换掉之前插入的值
$letters=array('a','p');
$fruit=array('apple','pear');
$text='a p';
$output=str_replace($letters,$fruit,$text);
echo $output;//apearpearle pear,apple中的p被pear代替
</pre>

* mixed substr_replace(mixed $string,mixed $replacement,mixed $start[,mixed $length])替换字符串中的子串
<pre>
$var = 'ABCDEFGH:/MNRPQR/';
echo substr_replace($var,'bob',10,-1);//$var = 'ABCDEFGH:/bob/';
</pre>

* string strtr(string $str,string $from,string $to)
string strtr(string $str,array $replace_pairs)转换指定字符串
<pre>
echo strtr('hello','e','de');//hdllo如果from和to长度不相等，那么多余的字符部分将被忽略
|——————————|
$trans = array("hello" => "hi", "hi" => "hello");
echo strtr("hi all, I said hello", $trans);//hello all, I said hi
</pre>

## 数组填充扩展
* stirng str_pad(string input,int $pad_length[,string $pad_string=''[,int $pad_type=STR_PAD_RIGHT]])使用另外一个字符串填充字符串为指定长度
<pre>
echo str_pad('input',10);//'input       '
echo str_pad('input',10,'p',STR_PAD_BOTH);//ppinputppp
</pre>

* string str_repeat(string $input,int $multiplier)返回$input重复multiplier次后的结果
<pre>
echo str_repeat("-=", 10);//-=-=-=-=-=-=-=-=-=-=
</pre>

## 随机打乱
* string str_shuffle(string $str)随机打乱一个字符串
<pre>
$str='abcdef';
$shuffled=str_shuffle($str);
echo $shuffled;//dcafbe
</pre>

* bool shuffle(array &$array)打乱数组
<pre>
$numbers=range(1,20);
shuffle($numbers);
print_r($numbers);//Array ( [0] => 13 [1] => 1 [2] => 18 [3] => 3 [4] => 20 [5] => 14 [6] => 2 [7] => 17 [8] => 9 [9] => 12 [10] => 7 [11] => 8 [12] => 11 [13] => 15 [14] => 4 [15] => 5 [16] => 10 [17] => 6 [18] => 16 [19] => 19 )
|---------------|
当数组是key=>value格式的时候
function shuffle_assoc(&$array)
{
    $keys = array_keys($array);
    shuffle($keys);
    foreach ($keys as $key) {
        $new[$key]=$array[$key];
    }
    $array=$new;
    return true;
}
</pre>

* rand产生一个随机整数
<pre>
echo rand();//1827969608
echo rand(5,15);//6
</pre>

## 字符串比较

* int strcmp(string $str1,string $str2)二进制安全字符串比较。str1小于str2返回<0，str1大于str2返回>2,相等返回0
<pre>
echo strcmp('hello','Hello');//32
echo strcmp('Hello','hello');//-32
</pre>

* int strncmp(string $str1,string $str2,int $len)二进制安全比较字符串开头的若干字符。str1小于str2返回<0，str1大于str2返回>2,相等返回0
<pre>
echo strncmp('hello world','hello php',6);//0
</pre>

* int strcasecmp(string $str1,string $str2)二进制安全比较字符串(不区分大小写)。str1小于str2返回<0，str1大于str2返回>2,相等返回0
<pre>
echo strcasecmp('Hello','hello');//0
</pre>

* int strncasecmp(string $str1,string $str2,int $len)二进制安全比较字符串开头的若干字符(不区分大小写)。str1小于str2返回<0，str1大于str2返回>2,相等返回0
<pre>
echo strncasecmp('Hello world','hello php',6);//0
</pre>

* int substr_compare(string $main_str,string $str,int $offset[,int length[,bool case_insensitivity=false]])从偏移位置offset开始比较main_str与str，比较长度为length个字符
如果mai_str从偏移位置offset起的子字符串小于str返回小于0的数，大于str返回大于0的数，等于str返回0
<pre>
echo substr_compare("abcde", "bc", 1, 2); // 0
echo substr_compare("abcde", "de", -2, 2); // 0
echo substr_compare("abcde", "bcg", 1, 2); // 0
echo substr_compare("abcde", "BC", 1, 2, true); // 0
echo substr_compare("abcde", "bc", 1, 3); // 1
echo substr_compare("abcde", "cd", 1, 2); // -1
</pre>

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

## 返回数组键名键值
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


#字符串函数
* string chuck_spilt($sring body[,int $chucklen=76[,string $end="\r\n"]])将字符串分成小块
<pre>
echo chunk_split('hujkokoefhuhusjd',4);//hujk okoe fhuh usjd
</pre>
* array string_spilt(string $body[,int spilt_length=1])将一个字符串转化为数组
<pre>
print_r(str_split('hello world',3));//Array ( [0] => hel [1] => lo [2] => wor [3] => ld )
</pre>
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
* array preg_spilt(string $patten,string $subject)通过一个正则表达式分隔字符串
<pre>
print_r(preg_split("/[,\s]+/",'hypertext language, programming'));//Array ( [0] => hypertext [1] => language [2] => programming )
</pre>
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




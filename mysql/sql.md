# 数据库基本操作
* 数据库连接
<pre>
mysql -h数据库host -u用户名 -p密码
mysql -hlocalhost -uroot
</pre>
* 查看数据库列表，返回可用的数据库列表
<pre>
show databases;
</pre>
* 使用数据库
<pre>
use 数据库名
use information_schema; 
</pre>
* 查看数据库中的表
<pre>
show tables;
</pre>
* 查看数据表中的列信息
<pre>
show columns from 表名;
show columns from FILES ;
</pre>


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
* 限制结果
select 语句用limit返回指定的行
<pre>
select prod_name from `products` limit 5//返回前五个结果
select prod_name from `products` limit 5, 5;//返回第六到第十个结果
</pre>
* 按多个列排序
<pre>
select * from `products` order by vend_id,`prod_price` DESC; //将products表中的数据按照vend_id升序，再按prod_price降序
</pre>
* 空值检查
在创建表时，可以指定其中的列是否可以不包含值。在一个列不包含值是，称其为包含空值NULL，空值和字段为0，空字符串不同。
<pre>
select `cust_id` from `customers` where cust_email <strong>is</strong> null;//选出表中的空值数据 
select `cust_id` from `customers` where cust_email <strong>is</strong> not null; //将空值数据进行过滤
</pre>
## 通配符进行过滤
* %通配符：表示字符出现任意次数
<pre>
select * from products where prod_name LIKE 'jet%';//匹配prod_name以jet开头的记录
select * from products where prod_name LIKE '%anvi%';//匹配prod_name中包含anvi字符的记录
select * from products where prod_name LIKE 's%e';//匹配prod_name以s开头e结尾的记录
</pre>
* _通配符：匹配单个字符
<pre>
select * from products where prod_name LIKE '__ton anvil';//匹配prod_name为两个字符串加ton anvi的记录
</pre>
* 通配符的处理速度比其他搜索慢，在搜索的时候应该讲通配符放在搜索条件的后面位置

* 执行算术计算，可以利用算术操作符对搜索出来的数据以及条件进行计算
<pre>
select prod_id,quantity,item_price,quantity*item_price as expanded_pricre from `orderitems` where `expanded_pricre`=20005;
select prod_id,quantity,item_price,quantity*item_price as expanded_pricre from `orderitems` where quantity*item_price>150;
</pre>
* count()函数，用来确定表中行的数目或符合特定条件行的数目
count(*)对表中行的数目进行计数，不管表列中包含的是空值null还是非空值
count(column)对特定列中具有值得行进行计数，忽略null值
<pre>
select COUNT(*)  from customers;
select COUNT(cust_email)  from customers;
</pre>

# 创建后台管理员表
create table bg_admin(
	admin_id tinyint unsigned primary key auto_increment,
	admin_name varchar(20) not null unique key,
	admin_pass char(32) not null,
	login_ip  varchar(30) not null,
	login_nums int unsigned not null default 0,
	login_time int unsigned not null
);

-- 插入体验数据
insert into bg_admin values
	(null, 'zhouyang', md5('12345678'),'127.0.0.1',default,unix_timestamp());



# 创建分类表
create table bg_category(
	cate_id smallint unsigned primary key auto_increment,
	cate_name varchar(20) not null,
	cate_pid smallint unsigned not null, -- 父类id号
	cate_sort smallint not null, -- 分类排序
	cate_desc varchar(255) -- 分类描述
)engine=innodb default charset=utf8;

-- 插入体验数据
insert into bg_category values
	(1, '技术', 0, 1, '技术'),
	(2, 'Web前端', 1, 1, 'Web前端技术'),
	(3, 'Web后端', 1, 2, 'Web后端技术'),
	(4, 'Linux', 1, 3, 'Linux系统'),
	(5, 'Mysql', 1, 4, 'Mysql数据库'),
	(6, '青春诗', 0, 2, '岁月安好'),
	(7, '迷茫', 6, 1, '迷茫岁月');


# 创建文章表
create table bg_article (
	art_id smallint unsigned primary key auto_increment,
	cate_id smallint unsigned not null comment '文章所属分类',
	title varchar(50) not null comment '文章标题',
	thumb varchar(100) not null default 'default.jpg',
	art_desc varchar(255) comment '文章描述',
	content text not null comment '文章内容',
	author varchar(20) not null comment '文章作者',
	hits smallint unsigned not null default 0 comment '点击次数',
	addtime int unsigned not null comment '添加时间',
	is_del enum('0','1') not null default '0' comment '是否删除'
)engine=innodb charset=utf8;



insert into bg_article (cate_id,title,art_desc,content,author,addtime) values(2,'论阿波罗','aaa','bbb','ccc',234123);
create table posts(
id int not null auto_increment primary key,
title text,
body text,
created datetime,
modified datetime
);
desc posts;
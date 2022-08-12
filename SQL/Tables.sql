
create table P_Users(
u_id Number(10)  constraint p_uid_pk primary key ,
email varchar2(50) constraint p_email_unq unique constraint p_email_nn not null,
password varchar2(40) constraint p_pwd_nn not null,
first_name varchar2(50),
last_name varchar2(50),
DOB date,
gender char(1),
user_type number(1),
mobile varchar2(12));

create table D_Users(
u_id number(10) constraint d_uid_pk primary key ,
email varchar2(50) constraint d_email_unq unique constraint d_email_nn not null,
password varchar2(40) constraint d_pwd_nn not null,
first_name varchar2(25),
last_name varchar2(25),
specialization varchar2(100));

create table appointments(
p_uid Number(10) constraint p_uid_afk references P_Users(u_id) on delete cascade constraint p_a_nn not null,
d_uid Number(10) constraint d_uid_afk references D_Users(u_id) on delete cascade constraint d_a_nn not null,
m_uid Number(10) constraint m_uid_afk references P_Users(u_id) on delete cascade NULL,
app_time timestamp,
constraint app_pk primary key(p_uid,d_uid)
);

create table P_History(
u_id number(10) constraint p_uid_hpk primary key constraint p_uid_hfk references P_Users(u_id) on delete cascade,
history varchar2(2000),
last_updated timestamp  --updated as varchar in wamp due to unavaiablity of TO_TIMESTAMP() funciton
);

create table D_Avail(
d_uid number(10) constraint d_uid_avfk references D_Users(u_id) on delete cascade,
avail_slot timestamp,  --starting from this time, till 30 mins later
constraint av_pk primary key(avail_slot,d_uid)
);

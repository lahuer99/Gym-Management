create database NEW_GYM;
use NEW_GYM;

create table trainer(trainerId integer NOT NULL AUTO_INCREMENT ,trainerName varchar(20) not null,trainerMobile varchar(20) not null,
trainerEmail varchar(30) not null,PRIMARY KEY (trainerId));

create table package(packageId integer not null AUTO_INCREMENT ,packageName varchar(30) not null,
packageAmount varchar(10) not null,pushUpCount integer,pullUpCount integer,sitUpCount integer,monday varchar(30),tuesday varchar(30),wednesday varchar(30),
thursday varchar(30),friday varchar(30),PRIMARY KEY (packageId));

create table member(memberId integer not null AUTO_INCREMENT ,memberName varchar(30) not null,memberMobile varchar(20) not null,
memberEmail varchar(30) not null,dues integer default 0,trainerId integer,packageId integer,FOREIGN KEY (trainerId) REFERENCES trainer(trainerId) ON DELETE SET NULL,
FOREIGN KEY (packageId) REFERENCES package(packageId) ON DELETE SET NULL,PRIMARY KEY (memberId)
);

create table loginMember(loginMemberId integer not null AUTO_INCREMENT ,username varchar(30) not null,password varchar(30) not null,memberId integer not null,
FOREIGN KEY (memberId) REFERENCES member(memberId) ON DELETE CASCADE ON UPDATE CASCADE,PRIMARY KEY (loginMemberId));

create table loginTrainer(loginTrainerId integer not null AUTO_INCREMENT,username varchar(30) not null,password varchar(30) not null,trainerId integer not null,
FOREIGN KEY (trainerId) REFERENCES trainer(trainerId) ON DELETE CASCADE ON UPDATE CASCADE ,PRIMARY KEY (loginTrainerId));

create table payment(paymentId integer not null AUTO_INCREMENT,paymentMemberId integer not null,paymentDate varchar(30) not null,paymentAmount varchar(10) not null,
FOREIGN KEY (paymentMemberId) REFERENCES member(memberId) ON DELETE CASCADE,PRIMARY KEY (paymentId));


insert into trainer values(1,'rajiv raj','9462738272','rajiv123@alphagym.com');
insert into trainer values(2,'john george','9242482737','john123@alphagym.com');
insert into trainer values(3,'Arnold Schwazneiger','9373516381','arnold123@alphagym.com');

insert into package values(1,'Bronze','12000',25,20,50,'cardio','legs','thighs','weight-lifting','chest');
insert into package values(2,'Silver','18000',30,25,50,'legs','cardio','thighs','chest','weight-lifting');
insert into package values(3,'Gold','24000',40,30,50,'legs','thighs','weight-lifting','chest','cardio');
insert into package values(4,'Platinum','30000',35,50,50,'weight-lifting','cardio','thighs','chest','legs');

insert into member values(1,'rizwan','8453534210','rizwan@alphagym.com',0,1,1);
insert into member values(2,'justine','9542789430','justine@alphagym.com',0,2,2);
insert into member values(3,'rahul','76542146793','rahul@alphagym.com',0,3,3);
insert into member values(4,'Basith','88965435650','basith@alphagym.com',0,1,4);
insert into member values(5,'Athul','9462748996','athul@alphagym.com',0,3,1);


insert into payment values(1,1,'01-01-2019','12000');
insert into payment values(2,2,'01-01-2019','18000');
insert into payment values(3,3,'01-01-2019','24000');
insert into payment values(4,4,'01-01-2019','30000');
insert into payment values(5,5,'01-01-2019','24000');


insert into loginMember values(1,'alpha_rizwan','alpha_rizwan',1);
insert into loginMember  values(2,'alpha_justine','alpha_justine',2);
insert into loginMember  values(3,'alpha_rahul','alpha_rahul',3);
insert into loginMember  values(4,'alpha_basith','alpha_basith',4);
insert into loginMember  values(5,'alpha_athul','alpha_athul',5);

insert into loginTrainer values(1,'trainer_rajiv123','rajiv123',1);
insert into loginTrainer values(2,'trainer_john123','john123',2);
insert into loginTrainer values(3,'trainer_arnold123','arnold23',3);





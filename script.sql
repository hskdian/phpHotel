SET foreign_key_checks = 0;
-- Drop tables
drop table users, managers, roomtypes, rooms, stays, customers, reservations, bills;

create table users(
  username char(15) primary key,
  points int(11) NOT NULL
);
create table managers(
  managerID int(11) primary key,
  name char(10) NOT NULL
);
create table roomtypes(
  roomType char(30) primary key,
  capacity int(11) NOT NULL,
  rate float NOT NULL
);
create table rooms(
  roomNo int(11) primary key,
  roomType char(30) NOT NULL,
  foreign key(roomType) references roomtypes(roomType)
);
create table stays(
  inDate date NOT NULL,
  outDate date NOT NULL,
  PRIMARY KEY (inDate, outDate)
);
create table customers(
  creditCardNo int(4) primary key,
  guestID int(11) NOT NULL,
  username char(15) DEFAULT NULL,
  name char(30) NOT NULL,
  UNIQUE KEY (guestID, username),
  foreign key(username) references users(username)
);

ALTER TABLE customers
   ADD FOREIGN KEY (username) references users(username);

create table reservations(
  confirmationNo int(11) primary key,
  inDate date NOT NULL,
  outDate date NOT NULL,
  availability tinyint(1) NOT NULL,
  roomNo int(11) NOT NULL,
  creditCardNo int(4) NOT NULL,
  foreign key(roomNo) references rooms(roomNo),
  foreign key(inDate, outDate) references stays(inDate, outDate)
  ON DELETE CASCADE,
  foreign key(creditCardNo) references customers(creditCardNo),
  CHECK(roomNo<=10)
);

create table bills(
  confirmationNo int(11) primary key,
  pointsEarned int(11) NOT NULL,
  amountDue float NOT NULL,
  foreign key(confirmationNo) references reservations(confirmationNo)
);

--  add in users
insert into users (username,points) values ('a',1560);
insert into users (username,points) values ('b',40);
insert into users (username,points) values ('c',40);
insert into users (username,points) values ('d',326);
insert into users (username,points) values ('e',228);

-- add customers
insert into customers (creditCardNo,guestID,username,name) values (1111,1,'a','Jim');
insert into customers (creditCardNo,guestID,username,name) values (2222,2,'b','Rachel');
insert into customers (creditCardNo,guestID,username,name) values (3333,3,'c','Michael');
insert into customers (creditCardNo,guestID,username,name) values (4444,4,'d','Janice');
insert into customers (creditCardNo,guestID,username,name) values (5555,5,'e','Patrice');
-- now insert Manager
insert into managers (managerID,name) values (123,'Ian');

--  first, add in the roomtypes
insert into roomtypes (roomType,capacity,rate) VALUES ('VIP',3,200.00);
insert into roomtypes (roomType, capacity,rate) values ('Special VIP',3,500.00);
insert into roomtypes (roomType,capacity,rate) VALUES ('double',2,100.00);
insert into roomtypes (roomType,capacity,rate) VALUES ('Queen double',2,400.00);
insert into roomtypes (roomType,capacity,rate) VALUES ('single',1,60.00);
insert into roomtypes (roomType, capacity,rate) values ('Queen single',1,300.00);


--now add in the rooms
insert into rooms (roomNo,roomType) values (1,'Special VIP');
insert into rooms (roomNo,roomType) values (2,'VIP');
insert into rooms (roomNo,roomType) values (3,'Queen double');
insert into rooms (roomNo,roomType) values (4,'double');
insert into rooms (roomNo,roomType) values (5,'double');
insert into rooms (roomNo,roomType) values (6,'Queen single');
insert into rooms (roomNo,roomType) values (7,'single');
insert into rooms (roomNo,roomType) values (8,'single');
insert into rooms (roomNo,roomType) values (9,'double');
insert into rooms (roomNo,roomType) values (10,'single');



--- now add in stays
insert into stays (inDate,outDate) values (20170101,20170105);
insert into stays (inDate,outDate) values (20161201,20161208);
insert into stays (inDate,outDate) values (20160301,20160310);
insert into stays (inDate,outDate) values (20160811,20160815);
insert into stays (inDate,outDate) values (20150901,20150917);
insert into stays (inDate,outDate) values (20150209,20150220);
insert into stays (inDate,outDate) values (20180601,20180605);
insert into stays (inDate,outDate) values (20140505,20140509);
insert into stays (inDate,outDate) values (20171205,20171208);
insert into stays (inDate,outDate) values (20170709,20170715);
insert into stays (inDate,outDate) values (20170601,20170605);
insert into stays (inDate,outDate) values (20140603,20140605);
insert into stays (inDate,outDate) values (20150604,20150605);
insert into stays (inDate,outDate) values (20160611,20160613);
insert into stays (inDate,outDate) values (20140601,20140607);
insert into stays (inDate,outDate) values (20140703,20140708);
-- once stay
insert into stays (inDate,outDate) values (20140702,20140705);
insert into stays (inDate,outDate) values (20160821,20160828);
-- demo day
insert into stays (inDate,outDate) values (20170404,20170404);
insert into stays (inDate,outDate) values (20170921,20170925);
insert into stays (inDate,outDate) values (20140801,20140805);
insert into stays (inDate,outDate) values (20160405,20160407);








-- now add in reservations
-- customer 'A'-- stayed in all rooms and most frequent

insert into reservations (confirmationNo,inDate,outDate,availability,roomNo,creditCardNo) values (1,20170701,20170705,true,1,1111);
insert into reservations (confirmationNo,inDate,outDate,availability,roomNo,creditCardNo) values (2,20161201,20161208,true,2,1111);
insert into reservations (confirmationNo,inDate,outDate,availability,roomNo,creditCardNo) values (3,20160301,20160310,true,3,1111);
insert into reservations (confirmationNo,inDate,outDate,availability,roomNo,creditCardNo) values (4,20160811,20160815,true,4,1111);
insert into reservations (confirmationNo,inDate,outDate,availability,roomNo,creditCardNo) values (5,20150901,20150917,true,5,1111);
insert into reservations (confirmationNo,inDate,outDate,availability,roomNo,creditCardNo) values (6,20150209,20150220,true,6,1111);
insert into reservations (confirmationNo,inDate,outDate,availability,roomNo,creditCardNo) values (7,20180601,20180605,true,7,1111);
insert into reservations (confirmationNo,inDate,outDate,availability,roomNo,creditCardNo) values (8,20140505,20140509,true,8,1111);
insert into reservations (confirmationNo,inDate,outDate,availability,roomNo,creditCardNo) values (9,20171205,20171208,true,9,1111);
insert into reservations (confirmationNo,inDate,outDate,availability,roomNo,creditCardNo) values (10,20170709,20170715,true,10,1111);

-- customer 'D' and 'E', and 'A'
insert into reservations (confirmationNo,inDate,outDate,availability,roomNo,creditCardNo) values (11,20170601,20170605,true,6,4444);
insert into reservations (confirmationNo,inDate,outDate,availability,roomNo,creditCardNo) values (12,20140603,20140605,true,10,5555);
insert into reservations (confirmationNo,inDate,outDate,availability,roomNo,creditCardNo) values (13,20150604,20150605,true,4,4444);
insert into reservations (confirmationNo,inDate,outDate,availability,roomNo,creditCardNo) values (14,20160611,20160613,true,1,5555);
insert into reservations (confirmationNo,inDate,outDate,availability,roomNo,creditCardNo) values (15,20140601,20140607,true,7,4444);
insert into reservations (confirmationNo,inDate,outDate,availability,roomNo,creditCardNo) values (16,20140703,20140708,true,3,5555);
insert into reservations (confirmationNo,inDate,outDate,availability,roomNo,creditCardNo) values (17,20140702,20140705,true,9,1111);
insert into reservations (confirmationNo,inDate,outDate,availability,roomNo,creditCardNo) values (18,20170921,20170925,true,8,1111);
insert into reservations (confirmationNo,inDate,outDate,availability,roomNo,creditCardNo) values (19,20140801,20140805,true,6,1111);
insert into reservations (confirmationNo,inDate,outDate,availability,roomNo,creditCardNo) values (20,20160821,20160828,true,10,1111);

-- customer 'B' and 'C' that have only stayed once
insert into reservations (confirmationNo,inDate,outDate,availability,roomNo,creditCardNo) values (21,20140505,20140509,true,4,2222);
insert into reservations (confirmationNo,inDate,outDate,availability,roomNo,creditCardNo) values (22,20160405,20160407,true,2,3333);

-- customers that have reservations for demo day 20170404
insert into reservations (confirmationNo,inDate,outDate,availability,roomNo,creditCardNo) values (23,20170404,20170404,true,4,4444);



-- now add in bills
insert into bills (confirmationNo,pointsEarned,amountDue) values (1,200,2000.00);
insert into bills (confirmationNo,pointsEarned,amountDue) values (2,140,1400.00);
insert into bills (confirmationNo,pointsEarned,amountDue) values (3,360,3600.00);
insert into bills (confirmationNo,pointsEarned,amountDue) values (4,40,400.00);
insert into bills (confirmationNo,pointsEarned,amountDue) values (5,160,1600.00);
insert into bills (confirmationNo,pointsEarned,amountDue) values (6,330,3300.00);
insert into bills (confirmationNo,pointsEarned,amountDue) values (7,24,240.00);
insert into bills (confirmationNo,pointsEarned,amountDue) values (8,24,240.00);
insert into bills (confirmationNo,pointsEarned,amountDue) values (9,30,300.00);
insert into bills (confirmationNo,pointsEarned,amountDue)  values (10,36,360.00);

insert into bills (confirmationNo,pointsEarned,amountDue) values (11,240,2400.00);
insert into bills (confirmationNo,pointsEarned,amountDue) values (12,12,120.00);
insert into bills (confirmationNo,pointsEarned,amountDue) values (13,40,400.00);
insert into bills (confirmationNo,pointsEarned,amountDue) values (14,10,100.00);
insert into bills (confirmationNo,pointsEarned,amountDue) values (15,36,360.00);
insert into bills (confirmationNo,pointsEarned,amountDue) values (16,200,2000.00);

insert into bills (confirmationNo,pointsEarned,amountDue) values (17,30,300.00);
insert into bills (confirmationNo,pointsEarned,amountDue) values (18,24,240.00);
insert into bills (confirmationNo,pointsEarned,amountDue) values (19,120,1200.00);
insert into bills (confirmationNo,pointsEarned,amountDue) values (20,42,420.00);
-- stayed once
insert into bills (confirmationNo,pointsEarned,amountDue) values (21,40,400.00);
insert into bills (confirmationNo,pointsEarned,amountDue) values (22,40,400.00);

-- demo bills
insert into bills (confirmationNo,pointsEarned,amountDue) values (23,10,100.00);

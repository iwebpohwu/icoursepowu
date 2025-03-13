## 學生選課資訊管理系統
##### 使用手冊
###### 2019年12月

#### 簡介
本套學生選課資訊管理系統基於PHP7 / MySQL編寫，部署簡易，功能強大，上手簡單。
系統可以準確地記錄和查詢學生資訊，包括學生的姓名、單位、年齡、性別以及身份證號碼等。
系統可以準確地記錄學生地每一次獎懲情況。
系統可以對學校的院科情況進行管理，包括設置學院名稱、修改某學院某專業方向的名稱等。
系統可以對基礎資料進行維護。
系統能夠對開設的課程進行管理
學生選課管理、考試（登記分數）、補考重修管理
提供強大資料統計、查詢、報表生成以及列印等功能。
用戶許可權管理
異常處理
 
#### 安裝
確保要部署的機器上已經安裝好主流版本的PHP/MySQL，配置好了Web伺服器，已將管理系統源碼檔複製到要部署的目錄中，賦予需要的檔許可權。建好資料庫，賦予資料庫使用者需要的讀寫許可權。

可以導入精簡示例資料 example_lite.sql 或按下面步驟進行全新安裝。

在 PHP7.2 + MYSQL5.6 及 PHP7.4 + MySQL8.0 下測試通過。

###### 執行建表命令

```sql

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `course`;
CREATE TABLE `course` (
  `cid` char(6) DEFAULT NULL,
  `cname` varchar(15) DEFAULT NULL,
  `credit` decimal(2,1) DEFAULT NULL,
  `cadd` varchar(20) DEFAULT NULL,
  `did` char(2) DEFAULT NULL,
  `tname` varchar(15) DEFAULT NULL,
  UNIQUE KEY `cid_2` (`cid`),
  KEY `cid` (`cid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `department`;
CREATE TABLE `department` (
  `did` char(2) DEFAULT NULL,
  `dname` varchar(15) NOT NULL,
  `dadd` varchar(30) DEFAULT NULL,
  `dmng` varchar(10) DEFAULT NULL,
  `dtel` varchar(15) DEFAULT NULL,
  UNIQUE KEY `did_2` (`did`),
  KEY `did` (`did`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `major`;
CREATE TABLE `major` (
  `did` char(2) DEFAULT NULL,
  `mname` varchar(20) DEFAULT NULL,
  UNIQUE KEY `did_2` (`did`,`mname`),
  KEY `did` (`did`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `student`;
CREATE TABLE `student` (
  `sid` char(12) NOT NULL,
  `name` varchar(10) NOT NULL,
  `sex` char(1) NOT NULL,
  `age` varchar(3) DEFAULT NULL,
  `class` varchar(10) DEFAULT NULL,
  `idnum` char(18) DEFAULT NULL,
  `did` char(2) DEFAULT NULL,
  `email` char(30) DEFAULT NULL,
  `tel` char(11) DEFAULT NULL,
  PRIMARY KEY (`sid`),
  UNIQUE KEY `sid` (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `student_course`;
CREATE TABLE `student_course` (
  `sid` char(12) NOT NULL,
  `cid` char(6) NOT NULL,
  `score` int(3) DEFAULT NULL,
  `status` char(1) DEFAULT NULL,
  KEY `sid` (`sid`),
  KEY `cid` (`cid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `student_log`;
CREATE TABLE `student_log` (
  `sid` varchar(12) DEFAULT NULL,
  `type` char(1) DEFAULT NULL,
  `reason` varchar(30) DEFAULT NULL,
  `detail` varchar(100) DEFAULT NULL,
  `logdate` date DEFAULT NULL,
  `addtime` datetime DEFAULT NULL,
  KEY `sid` (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `user_admin`;
CREATE TABLE `user_admin` (
  `adminID` varchar(15) DEFAULT NULL,
  `adminName` varchar(15) DEFAULT NULL,
  `pwd` char(32) DEFAULT NULL,
  KEY `adminID` (`adminID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `user_student`;
CREATE TABLE `user_student` (
  `sid` char(12) NOT NULL,
  `pwd` char(32) DEFAULT NULL,
  UNIQUE KEY `sid` (`sid`),
  KEY `sid_2` (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
```


新建管理員帳戶，在表 user_admin 中新建一行記錄，adminID 為管理員ID，adminName 為管理員姓名，pwd為MD5加密後的密碼。
實例代碼如下（通用的admin）：
``` sql
INSERT INTO `user_admin` (`adminID`, `adminName`, `pwd`) VALUES
('admin', 'A先生', '21232f297a57a5a743894a0e4a801fc3');
```

然後，修改 ./config/database.php 中的資料庫連接資訊。基於 PHP 的開源單頁資料庫管理程式 [Adminer](https://github.com/vrana/adminer/) 可以助你便捷管理資料庫。
 
#### 功能介紹
學生管理
- 新增學生，輸入所有需要的資訊，點擊提交即可新增學生記錄。
- 查詢學生，輸入要搜索的資訊，點擊搜索即可模糊搜索。
- 在搜索結果中，點擊修改可以修改學生資訊
- 點擊刪除可以刪除該學生

獎懲管理
- 輸入相應資訊可以模糊搜索
- 在搜索結果中點擊修改可以修改指定的記錄，點擊刪除可以刪除記錄。
- 在獎懲管理頁面點擊新增可以給指定學生新增獎懲記錄

院科管理
- 顯示院科資訊後，按一下後面的“修改”即可修改院科資訊
- 輸入修改的資訊後，按一下“修改資訊”即可提交修改的院科資訊
- 在提交之前，按一下“返回”就可以清除掉文字方塊內還沒有提交的內容並返回到上一級頁面
- 選擇專業清單就可以進入專業清單介面
- 輸入相關的資訊，按一下“提交”就可以查詢專業
- 顯示專業資訊後，按一下“改”即可更改專業
- 顯示專業資訊後，按一下“刪”即可刪除專業
- 按一下“新增專業”即可新增專業

課程管理
- 選擇課程查詢就可以進入課程查詢介面，輸入相關的資訊，按一下“提交”就可以新增課程
- 顯示課程資訊後，按一下後面的“刪除”即可刪除課程資訊
- 選擇新增課程就可以進入新增課程介面，輸入相關的資訊，按一下“提交”就可以新增課程，如果沒有輸入正確的資訊，系統會出現錯誤提示

選課管理
- 選擇學生選課就可以進入學生選課介面，輸入相關的資訊，按一下“提交”就可以查詢學生選課
- 顯示相關資訊後，按一下“退選”即可退選課程
- 選擇登錄分數就可以進入登錄分數介面，輸入相關的資訊，按一下“提交”就可以登記分數
- 顯示成績資訊後，按一下“登記成績”即可錄入成績
- 選擇補考重修就可以進入補考重修介面，輸入相關的資訊，按一下“提交”就可以更新重修資訊

資料統計
- 選擇成績統計就可以進入成績統計介面，輸入相關的資訊，按一下“提交”就可以查詢成績
- 點擊“成績詳情”即可查看每一門課的成績情況
- 按一下“列印”即可列印成績表
- 選擇選課統計就可以進入選課統計介面
- 輸入相關的資訊，按一下“提交”就可以選課情況
- 按一下“詳情”即可查看課程詳情
- 按一下“列印”即可列印課程情況

系統設置
- 選擇使用者管理就可以進入使用者管理介面
- 輸入相關的資訊，按一下“提交”就可以查找學生
- 顯示學生資訊後，按一下後面的“學生詳情”即可查看學生資訊
- 顯示學生資訊後，按一下後面的“重置密碼”即可重置密碼
- 輸入修改的資訊後，按一下“修改資訊”即可提交修改的學生資訊
- 選擇修改密碼就可以進入修改密碼介面，輸入相關的資訊，按一下“提交”就可以更新密碼



#### 運行截圖

![login](./img/login.png)



![admin](./img/admin.png)





With the help of @carbonium14

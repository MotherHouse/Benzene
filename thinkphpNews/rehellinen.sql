-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2017-04-25 11:46:58
-- 服务器版本： 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rehellinen`
--

-- --------------------------------------------------------

--
-- 表的结构 `cms_admin`
--

CREATE TABLE `cms_admin` (
  `admin_id` mediumint(6) UNSIGNED NOT NULL,
  `username` varchar(20) NOT NULL DEFAULT '',
  `password` varchar(32) NOT NULL DEFAULT '',
  `lastloginip` varchar(15) DEFAULT '0',
  `lastlogintime` int(10) UNSIGNED DEFAULT '0',
  `email` varchar(40) DEFAULT '',
  `realname` varchar(50) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `cms_admin`
--

INSERT INTO `cms_admin` (`admin_id`, `username`, `password`, `lastloginip`, `lastlogintime`, `email`, `realname`, `status`) VALUES
(7, 'rehellinen', '1efa78d7e525c026e2344c89f7d2bd57', '0', 1493018863, '', '', 1);

-- --------------------------------------------------------

--
-- 表的结构 `cms_menu`
--

CREATE TABLE `cms_menu` (
  `menu_id` smallint(6) UNSIGNED NOT NULL,
  `name` varchar(40) NOT NULL DEFAULT '',
  `parentid` smallint(6) NOT NULL DEFAULT '0',
  `m` varchar(20) NOT NULL DEFAULT '',
  `c` varchar(20) NOT NULL DEFAULT '',
  `f` varchar(20) NOT NULL DEFAULT '',
  `listorder` smallint(6) UNSIGNED NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `type` tinyint(1) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `cms_menu`
--

INSERT INTO `cms_menu` (`menu_id`, `name`, `parentid`, `m`, `c`, `f`, `listorder`, `status`, `type`) VALUES
(1, '菜单管理', 0, 'admin', 'menu', 'index', 6, -1, 1),
(2, '23332', 0, 'admin', 'index', 'index', 0, -1, 1),
(3, 'test1', 0, '233', '2333', '333333', 0, -1, 0),
(4, '23333', 0, 'sfsdf2222', 'adfsf', 'sdfdg', 0, -1, 1),
(5, '电信', 0, 'admin', 'gg', 'index', 0, -1, 0),
(6, '推荐位管理', 0, 'admin', 'position', 'index', 3, 1, 1),
(7, '软工', 0, 'admin', 'test', 'index', 2, -1, 0),
(8, '文章管理', 0, 'admin', 'content', 'add', 4, -1, 1),
(9, '汽车', 0, '2222', '222', '33333', 0, -1, 1),
(10, '推荐位内容管理', 0, 'admin', 'PositionContent', 'index', 2, 1, 1),
(11, '基本管理', 0, 'admin', 'Basic', 'index', 14, 1, 1),
(12, '电脑', 0, 'admin', 'index', 'index', 0, 1, 0),
(13, '科技', 0, 'admin', 'index', 'index', 0, 1, 0),
(14, '日', 0, '2人', '温柔', '温柔', 0, -1, 1),
(15, '菜单管理', 0, 'admin', 'menu', 'index', 10, 1, 1),
(16, '文章管理', 0, 'admin', 'content', 'index', 9, 1, 1),
(17, '用户管理', 0, 'admin', 'admin', 'index', 13, 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `cms_news`
--

CREATE TABLE `cms_news` (
  `news_id` mediumint(8) UNSIGNED NOT NULL,
  `catid` smallint(5) UNSIGNED NOT NULL DEFAULT '0',
  `title` varchar(80) NOT NULL DEFAULT '0',
  `small_title` varchar(30) NOT NULL DEFAULT '',
  `title_font_color` varchar(250) DEFAULT NULL COMMENT '标题颜色',
  `thumb` varchar(100) NOT NULL DEFAULT '',
  `keywords` char(40) NOT NULL DEFAULT '',
  `description` varchar(250) NOT NULL COMMENT '文章描述',
  `listorder` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `copyfrom` varchar(250) DEFAULT NULL COMMENT '来源',
  `username` char(20) NOT NULL,
  `create_time` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `update_time` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `count` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `cms_news`
--

INSERT INTO `cms_news` (`news_id`, `catid`, `title`, `small_title`, `title_font_color`, `thumb`, `keywords`, `description`, `listorder`, `status`, `copyfrom`, `username`, `create_time`, `update_time`, `count`) VALUES
(1, 13, '4K之路还有多远？解析超高分辨率的内幕', '4K显示器一直流行不起来', '', 'upload/2017/04/24/58fdd9441d41d.jpg', '4k显示器', 'Ps：穷屌丝表示买不起，买了显卡也带不动', 1, 1, '0', '', 1492417235, 0, 0),
(2, 12, '错失机遇 失陷没落的日本电子巨头艰难转型', '日本家电巨头近几年纷纷剥离昔日风光无限的消费电子业务', '', 'upload/2017/04/24/58fdd13089701.jpg', '日本电子产业衰落', 'Ps：跟不上潮流', 1, 1, '0', '', 1492423504, 0, 2),
(3, 6, '44', '3234', '', '', '3535', '2343225', 0, -1, '0', '', 1492426862, 0, 0),
(4, 5, '我爱你', '哈哈', '#ed568b', '', '我爱你==', '我爱你--', 0, -1, '1', '', 1492441315, 0, 0),
(5, 6, '我我', '我我我我', '#5674ed', '', '沙发违法', '个地方很合适', 0, -1, '0', '', 1492441382, 0, 0),
(6, 13, '最新iPhone 8模型机', '指纹不在后壳 电源键加长', '#ed568b', 'upload/2017/04/24/58fdcd1568559.jpg', 'iPhone', 'Ps：iPhone8又曝光2333', 1, 1, '0', '', 1492441396, 0, 3),
(7, 6, '宿舍', '上的', '#5674ed', '', '说过话', '各打个', 5, -1, '0', '', 1492441447, 0, 0),
(8, 6, '白百合', '出轨', '', '', '233', '2333', 0, -1, '4', '', 1492441835, 0, 0),
(9, 6, '江信江疑', '苟', '#5674ed', '', '苟', '苟', 0, -1, '2', '', 1492441873, 0, 0),
(10, 5, '牵牵牵手', '哈哈哈哈', '#5674ed', '', '东方红闪电发货2', '大哥大杀杀杀', 0, -1, '1', '', 1492441915, 0, 0),
(11, 5, '杀得好233', '三点半很多事233', '#ed568b', '', '湖南大厦2', '傻逼哈哈我', 0, -1, '1', '', 1492441930, 0, 0),
(12, 6, '2424', '是是是', '', 'upload/2017/04/17/58f4dd0ab83ab.png', '爱上哈', '我还该用户', 0, -1, '3', '', 1492442387, 0, 0),
(13, 12, 'Dva', '韩国人宋哈娜', '', 'upload/2017/04/20/58f8d0876f839.jpg', '问题根深蒂固', '可以可以', 9, -1, '0', '', 1492478267, 0, 3),
(14, 6, '我打个电话是', '大号是东方红', '', '', '多喝点水', '发货发动机', 4, -1, '0', '', 1492478278, 0, 0),
(15, 5, '广东省', '大号广东省', '', '', '说的很对', 'wheat', 7, -1, '0', '', 1492478460, 0, 0),
(16, 7, '委员会和地方', '多喝水', '', '', '电话号', '发挥好', 8, -1, '0', '', 1492478553, 0, 0),
(17, 7, '23', '543', '', '', '35', '3125', 0, -1, '0', '', 1492494261, 0, 0),
(18, 7, 'gda', 'hrwaf', '', '', 'sag', 'hegd', 0, -1, '0', '', 1492494270, 0, 0),
(19, 12, 'Win10全新界面流出', 'Win10全新设计界面确定 今年秋季能够用上', '#5674ed', 'upload/2017/04/24/58fdcc394671d.jpg', 'win10', 'Ps：感觉还不错', 1, 1, '0', '', 1492662602, 0, 9),
(20, 12, '纯白异类兼容日常 三星玄龙骑士游戏本体验', '价格段内很有特色的一台笔电，能选i7还是选i7', '', 'upload/2017/04/24/58fdcef052ed4.jpg', '三星 玄龙骑士', 'Ps：外观还可以，i7散热堪忧', 1, 1, '1', '', 1492770934, 0, 21),
(21, 13, 'AMD推下一代视频卡 Radeon RX 500系列上线', 'rx500系列发布，性能提升幅度小', '', 'upload/2017/04/24/58fde601f2ceb.jpg', 'rx500  amd', 'Ps：频率增加百分之7，性能增加百分之7，真·马甲', 1, 1, '0', 'rehellinen', 1493034909, 0, 3),
(22, 13, '苹果开售翻新版13英寸MacBook Pro', '售价：1529刀', '', 'upload/2017/04/24/58fde819433d9.jpg', 'MacBook  翻新', 'Ps：翻新也那么贵', 1, 1, '0', 'rehellinen', 1493035134, 0, 0),
(23, 12, '作者微信', '扫一扫二维码即可添加作者为好友', '', 'upload/2017/04/24/58fde99996036.jpg', '微信', 'Ps：个人微信', 0, 1, '0', 'rehellinen', 1493035448, 0, 0),
(24, 12, 'Surface Pro 3专属固件更新', '提升系统稳定性', '', 'upload/2017/04/24/58fdeb7b1babe.jpg', 'Surface Pro 3', 'Ps：土豪入一个吧', 0, 1, '3', 'rehellinen', 1493035574, 0, 1),
(25, 12, '首款ARM Win10 PC发布时间确认', '搭载骁龙835', '', 'upload/2017/04/24/58fdea64ae321.jpg', '高通  windows', 'Ps：感觉我的安卓机也可以刷windows了', 0, 1, '0', 'rehellinen', 1493035671, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `cms_news_content`
--

CREATE TABLE `cms_news_content` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `news_id` mediumint(8) UNSIGNED NOT NULL,
  `content` mediumtext NOT NULL,
  `create_time` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `update_time` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `cms_news_content`
--

INSERT INTO `cms_news_content` (`id`, `news_id`, `content`, `create_time`, `update_time`) VALUES
(1, 1, '&lt;p style=&quot;font-size:16px;text-indent:2em;font-family:\'Microsoft Yahei\';color:#404040;text-align:justify;background-color:#FFFFFF;&quot;&gt;\r\n	分辨率的竞争还没有停止，虽然4K的显示器已经足够细腻，并且超出了目前的硬件配套水平，但是行业内还是在开发8K显示器。日本还要在未来试播8K分辨率的节目，这样的道路真的是正确的吗？其实从显示技术的更迭来看，一味的在分辨率上做文章是没有太多的必要的，特别是当前的分辨率发展水平已经满足甚至超出大多数人的需求的时候。\r\n&lt;/p&gt;\r\n&lt;p class=&quot;f_center&quot; style=&quot;font-size:16px;font-family:\'Microsoft Yahei\';color:#404040;text-align:center;background-color:#FFFFFF;&quot;&gt;\r\n	&lt;img alt=&quot;4K之路还有多远？解析超高分辨率的内幕&quot; src=&quot;http://cms-bucket.nosdn.127.net/catchpic/2/21/216e33b45e22c5ab2ea1464941c802a8.jpg?imageView&amp;amp;thumbnail=550x0&quot; class=&quot;lazy&quot; title=&quot;4K之路有多远？解析超高分辨率的内幕&quot; width=&quot;600&quot; height=&quot;450&quot; /&gt;\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;text-indent:2em;font-family:\'Microsoft Yahei\';color:#404040;text-align:justify;background-color:#FFFFFF;&quot;&gt;\r\n	现在高分显示器很多，很多人在选择显示器的时候，也锁定了高分显示器。不过对于很多小白用户来说，对于高分显示器的了解还不够深。首先我们得说一下高分显示器的使用前提。购买高分显示器只是一个环节，用户的PC主机性能需要支持，软件也是不能忽略。不管是游戏还是电影，高分辨率的素材也是不能缺少的。三种缺一不可，都具备才可以体验高分显示器的优势。\r\n&lt;/p&gt;\r\n&lt;p class=&quot;f_center&quot; style=&quot;font-size:16px;font-family:\'Microsoft Yahei\';color:#404040;text-align:center;background-color:#FFFFFF;&quot;&gt;\r\n	&lt;img alt=&quot;4K之路还有多远？解析超高分辨率的内幕&quot; src=&quot;http://cms-bucket.nosdn.127.net/catchpic/7/73/733d6c07cac2a45f1948dba1d3b158dc.jpg?imageView&amp;amp;thumbnail=550x0&quot; class=&quot;lazy&quot; title=&quot;4K之路有多远？解析超高分辨率的内幕&quot; width=&quot;600&quot; height=&quot;480&quot; /&gt;\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;text-indent:2em;font-family:\'Microsoft Yahei\';color:#404040;text-align:justify;background-color:#FFFFFF;&quot;&gt;\r\n	因此在购买高分显示器的时候，一定要考虑到自己的硬件和软件环境。其实高分辨率还和尺寸有很大的关系。如果是24英寸或者更小的显示器，上高分辨率是没有必要的，1080P搭配24英寸是比较合适的选择。至于27英寸的显示器，2K也就是2560×1440的分辨率比较合适，如果分辨率过高，由于目前的系统优化不好，显示的元素太小，应用体验很不好。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;text-indent:2em;font-family:\'Microsoft Yahei\';color:#404040;text-align:justify;background-color:#FFFFFF;&quot;&gt;\r\n	目前正热的4K显示器，则是需要32英寸左右的屏幕尺寸，才可以有较好的应用，这样的产品价格不菲，可能并不适合一般的用户。综合来看，1080P仍旧是目前最主流的分辨率，低于这个分辨率的显示器，基本不用考虑了，2K分辨率对于大屏幕来说最合适，但是目前的产品比较少，4K显示器到是很多，但是应用效果不好，这也是目前显示器市场的一个怪相吧。\r\n&lt;/p&gt;\r\n&lt;p class=&quot;f_center&quot; style=&quot;font-size:16px;font-family:\'Microsoft Yahei\';color:#404040;text-align:center;background-color:#FFFFFF;&quot;&gt;\r\n	&lt;img alt=&quot;4K之路还有多远？解析超高分辨率的内幕&quot; src=&quot;http://cms-bucket.nosdn.127.net/catchpic/2/23/2338703caa9f2852fcef1065f4654b0b.jpg?imageView&amp;amp;thumbnail=550x0&quot; class=&quot;lazy&quot; title=&quot;4K之路有多远？解析超高分辨率的内幕&quot; width=&quot;600&quot; height=&quot;450&quot; /&gt;\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;text-indent:2em;font-family:\'Microsoft Yahei\';color:#404040;text-align:justify;background-color:#FFFFFF;&quot;&gt;\r\n	4K显示器一直流行不起来，不仅仅是因为价格的问题，上面我们提到的配套行业的短板也是让高分显示器的发展遭受了很大的挑战。尤其是短期看来，这些短板的突破也有很大的难度。\r\n&lt;/p&gt;\r\n&lt;p class=&quot;f_center&quot; style=&quot;font-size:16px;font-family:\'Microsoft Yahei\';color:#404040;text-align:center;background-color:#FFFFFF;&quot;&gt;\r\n	&lt;img alt=&quot;4K之路还有多远？解析超高分辨率的内幕&quot; src=&quot;http://cms-bucket.nosdn.127.net/catchpic/f/f5/f5c5f3da0cf84ed4ee64bc7a1910c690.jpg?imageView&amp;amp;thumbnail=550x0&quot; class=&quot;lazy&quot; title=&quot;4K之路有多远？解析超高分辨率的内幕&quot; width=&quot;600&quot; height=&quot;403&quot; /&gt;\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;text-indent:2em;font-family:\'Microsoft Yahei\';color:#404040;text-align:justify;background-color:#FFFFFF;&quot;&gt;\r\n	因此高分显示器只能是专业的产品，对于很小的一部分用户来说有实际的意义。比如医用显示器，设计用户等等。而对于8K显示器来说，即便是专业用户也很难凑齐这样强大的硬件了。\r\n&lt;/p&gt;\r\n&lt;br /&gt;\r\n&lt;br /&gt;', 1492417235, 0),
(2, 2, '&lt;p class=&quot;otitle&quot; style=&quot;font-size:16px;text-indent:2em;font-family:\'Microsoft Yahei\';color:#404040;text-align:justify;background-color:#FFFFFF;&quot;&gt;\r\n	（原标题：错失机遇，失陷的日本电子巨头艰难转型）\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;text-indent:2em;font-family:\'Microsoft Yahei\';color:#404040;text-align:justify;background-color:#FFFFFF;&quot;&gt;\r\n	继去年日本“液晶之父”夏普被台湾鸿海集团收购后，近日，东芝爆出巨亏49亿美元，公司首次公开表示业务或难以为继。回溯1995年，当时世界500强榜单上有149家日本企业，而到了2015年，只有54家日企登上了该榜单，日立跌到了78位，其他前述公司都跌到了100位以外。\r\n&lt;/p&gt;\r\n&lt;p class=&quot;f_center&quot; style=&quot;font-size:16px;font-family:\'Microsoft Yahei\';color:#404040;text-align:center;background-color:#FFFFFF;&quot;&gt;\r\n	&lt;img alt=&quot;错失机遇 失陷没落的日本电子巨头艰难转型&quot; src=&quot;http://cms-bucket.nosdn.127.net/catchpic/7/7e/7e535b8e376f2fbb57a1f9992aec23ef.jpg?imageView&amp;amp;thumbnail=550x0&quot; class=&quot;lazy&quot; title=&quot;错失机遇，失陷的日本电子巨头艰难转型&quot; width=&quot;600&quot; height=&quot;372&quot; /&gt;\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;text-indent:2em;font-family:\'Microsoft Yahei\';color:#404040;text-align:justify;background-color:#FFFFFF;&quot;&gt;\r\n	曾经辉煌的日本电子产业，到底为何衰落？还保有哪些独特优势？出路又会怎样？\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;text-indent:2em;font-family:\'Microsoft Yahei\';color:#404040;text-align:justify;background-color:#FFFFFF;&quot;&gt;\r\n	多数受困的日本电子巨头选择“去家电化”来进行业务重组，转而大力发展B2B业务。“更多的日企将业务转向高利润、高增长的上游以及社会公用型业务，无疑是止血或者复兴最有效的选择。”\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;text-indent:2em;font-family:\'Microsoft Yahei\';color:#404040;text-align:justify;background-color:#FFFFFF;&quot;&gt;\r\n	继去年日本“液晶之父”夏普被台湾鸿海集团收购后，近日，东芝爆出巨亏49亿美元，公司首次公开表示业务或难以为继。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;text-indent:2em;font-family:\'Microsoft Yahei\';color:#404040;text-align:justify;background-color:#FFFFFF;&quot;&gt;\r\n	回溯1995年，当时世界500强榜单上，有149家日本企业，更有多家日本电子企业进入前50，日立位列13，松下位列17，东芝位列36，索尼位列43，NEC位列48。而到了2015年，只有54家日企登上了该榜单，日立跌到了78位，其他前述公司都跌到了100位以外。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;text-indent:2em;font-family:\'Microsoft Yahei\';color:#404040;text-align:justify;background-color:#FFFFFF;&quot;&gt;\r\n	曾经辉煌的日本电子产业，到底为何衰落？出路又会怎样？\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;text-indent:2em;font-family:\'Microsoft Yahei\';color:#404040;text-align:justify;background-color:#FFFFFF;&quot;&gt;\r\n	财报连年亏损\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;text-indent:2em;font-family:\'Microsoft Yahei\';color:#404040;text-align:justify;background-color:#FFFFFF;&quot;&gt;\r\n	松下2012财年亏损7000亿日元，2013财年接着又亏损7000亿日元。索尼在2008财年至2015财年这8个财年当中，仅有2012财年和2015财年实现盈利。在被富士康收购之前，夏普连续2个财年亏损。据东芝在近期公布的2016财年预测来看，该公司预计将连续3个财年亏损。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;text-indent:2em;font-family:\'Microsoft Yahei\';color:#404040;text-align:justify;background-color:#FFFFFF;&quot;&gt;\r\n	就全球液晶电视市场来看，日系制造商的份额也连年下降。据面板研究调研机构DisplaySearch发布的报告显示，从2008年到2016年，索尼的液晶电视全球份额从13.7%下降到了5.6%；东芝2008年的份额为6.4%，到2015年被挤出了主要排名；2008年夏普还占有9%的份额，到2014年也被挤出了主要排名。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;text-indent:2em;font-family:\'Microsoft Yahei\';color:#404040;text-align:justify;background-color:#FFFFFF;&quot;&gt;\r\n	同样的情况还发生在全球电脑和手机等市场中，日本品牌的份额不断萎缩。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;text-indent:2em;font-family:\'Microsoft Yahei\';color:#404040;text-align:justify;background-color:#FFFFFF;&quot;&gt;\r\n	以家电为例，“二战后，由于美国的大力扶持加上日本活跃的工业氛围，日本制造业迅速崛起。在白色家电产业里，比较有代表性的是三洋、松下、东芝。在上世纪90年代，这些家电产品陆续进入中国，由此产生了一大批忠实的消费群体。多年来，随着消费门槛降低，中国居民消费水平不断提高，日企在中国获得了丰厚的效益。”奥维云网白电副总郭梅德接受21世纪经济报道记者表示，但最近十年，日本家电品牌在中国市场日益少见，取而代之的是中国品牌的迅速崛起。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;text-indent:2em;font-family:\'Microsoft Yahei\';color:#404040;text-align:justify;background-color:#FFFFFF;&quot;&gt;\r\n	错失数字革命机遇\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;text-indent:2em;font-family:\'Microsoft Yahei\';color:#404040;text-align:justify;background-color:#FFFFFF;&quot;&gt;\r\n	有分析指出，日企擅长硬件制造，软件技术则处于弱势，这也导致许多日本巨头在全球数字革命中陷入逆境。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;text-indent:2em;font-family:\'Microsoft Yahei\';color:#404040;text-align:justify;background-color:#FFFFFF;&quot;&gt;\r\n	日立CEO中西宏明曾对媒体表示：“数字化技术改变了一切，在电视行业只要一片芯片就可以生产一台高质量的电视。这就意味着来自韩国和中国的新公司拥有了优势。”\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;text-indent:2em;font-family:\'Microsoft Yahei\';color:#404040;text-align:justify;background-color:#FFFFFF;&quot;&gt;\r\n	“日企擅长制造工艺和质量控制方面的精益求精，以及在流程管理方面的严密规则。在当下，消费电子制造门槛的降低以及过剩的成熟产能，再加上互联网时代的冲击，日企的优势正在减弱，一些方面还略有冗余。因此，日企在全球范围内，无论家电还是消费电子都在下滑。”奥维云网副总裁、黑电事业部总经理董敏对21世纪经济报道记者表示。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;text-indent:2em;font-family:\'Microsoft Yahei\';color:#404040;text-align:justify;background-color:#FFFFFF;&quot;&gt;\r\n	“看起来，面对数字化革命，相较日本企业，韩国和台湾公司进行了更主动积极的应对。日本本土在智能手机和4G网络应用方面，和韩国等市场相比都稍显落后，这或许导致了这些以本土为导向的日本巨头错失了数字革命所带来的机遇。截至2016年底，日本的LTE（一种4G网络）采用率约为60%，韩国的水平超过了70%。”彭博行业研究亚太区科技、电信及互联网行业分析师赖雅婷接受21世纪经济报道采访表示。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;text-indent:2em;font-family:\'Microsoft Yahei\';color:#404040;text-align:justify;background-color:#FFFFFF;&quot;&gt;\r\n	“在2008年全球金融危机后，以三星和LG为代表的韩国企业利用了韩元对日元贬值的窗口时间，从日本竞争对手那里争到了一定的市场份额。即使汇率早已正常化了，许多日企仍然被诸多问题所困扰着，主要是因为多年投资不足使得运营效率低于同业水平。消费电子业务对日本巨头们的利润贡献不断下降，这就促使这些企业开始大型的业务重组。”赖雅婷告诉21世纪经济报道。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;text-indent:2em;font-family:\'Microsoft Yahei\';color:#404040;text-align:justify;background-color:#FFFFFF;&quot;&gt;\r\n	被迫转型：纷纷“去家电化”\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;text-indent:2em;font-family:\'Microsoft Yahei\';color:#404040;text-align:justify;background-color:#FFFFFF;&quot;&gt;\r\n	由此，日本家电巨头近几年纷纷剥离昔日风光无限的消费电子业务，寻求转型。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;text-indent:2em;font-family:\'Microsoft Yahei\';color:#404040;text-align:justify;background-color:#FFFFFF;&quot;&gt;\r\n	2011年，海尔收购了日本三洋的白电业务。2012年，日立宣布退出有着56年历史的电视制造业务，改为委托代工。2013年，东芝和松下宣布关闭在中国的电视工厂。2014年，索尼砍掉核心VAIO业务，全面退出电脑市场。2015年，东芝把印尼的电视和洗衣机工厂出售给了创维，松下全面退出在中国的电视生产。2016年，富士康收购夏普多数股份，NEC把电脑合资公司中的大部分股份出售给联想，东芝将白电业务出售给美的，松下公司决定完全退出电视液晶面板生产业务。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;text-indent:2em;font-family:\'Microsoft Yahei\';color:#404040;text-align:justify;background-color:#FFFFFF;&quot;&gt;\r\n	多数受困的日本电子巨头选择“去家电化”来进行业务重组，转而大力发展B2B业务。“更多的日企将业务转向高利润、高增长的上游以及社会公用型业务，无疑是止血或者复兴最有效的选择。”说。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;text-indent:2em;font-family:\'Microsoft Yahei\';color:#404040;text-align:justify;background-color:#FFFFFF;&quot;&gt;\r\n	日立的转型就是一个典型例子。当中西宏明2010年接手日立成为CEO时，面对巨额亏损，他决定进行重组：关闭或出售了一部分亏损的业务，其中大部分为消费电子，转而将重心回归到重工业制造，比如核电站和高铁等。中西宏明当时认为消费电子行业发生了结构性改变，日立没有办法适应环境，那就退回到日立仍有比较优势的业务上，而且发展中国家对基建仍有大量的需求。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;text-indent:2em;font-family:\'Microsoft Yahei\';color:#404040;text-align:justify;background-color:#FFFFFF;&quot;&gt;\r\n	据日立官网显示，目前该公司21%的收入来自社会产业系统（公共、城市、交通），信息通信系统业务的收入占19%，高性能材料的收入占14%，物流货运相关业务的收入占到了11%，另外还经营着建筑机械、电子装置系统和汽车系统等业务。虽然日立仍保留了数字媒体家电业务，不过其收入贡献仅为6%，在所有业务中排倒数第二。\r\n&lt;/p&gt;', 1492423504, 0),
(3, 3, '214124', 1492426862, 0),
(4, 4, '我爱你&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;', 1492441315, 0),
(5, 5, '双丰收高', 1492441382, 0),
(6, 6, '&lt;p style=&quot;font-size:16px;text-indent:2em;font-family:\'Microsoft Yahei\';color:#404040;&quot;&gt;\r\n	&lt;span style=&quot;color:#404040;font-family:\'Microsoft Yahei\';font-size:16px;line-height:28px;background-color:#FFFFFF;&quot;&gt;（原标题：最新iPhone 8模型机： 指纹不在后壳，电源键加长）&lt;/span&gt;\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;text-indent:2em;font-family:\'Microsoft Yahei\';color:#404040;&quot;&gt;\r\n	对于2017年的旗舰iPhone，传言有很多，而且彼此之间的差异都很大。最近一段时间，很多Touch ID后置的模型曝光，很多人都不喜欢这种设计。今天，Benjamin Geskin分享了更多iPhone 8模型机的照片，这次的模型机中我们可以看到无边框的显示屏，后壳上也没有Touch ID指纹识别传感器开孔，这可能意味着Touch ID将被集成在屏幕下。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;text-indent:2em;font-family:\'Microsoft Yahei\';color:#404040;&quot;&gt;\r\n	&lt;img id=&quot;aimg_744450&quot; src=&quot;http://cms-bucket.nosdn.127.net/catchpic/3/38/38e3c4689f0c7c8f1a625bf9a1f316e1.jpg?imageView&amp;amp;thumbnail=550x0&quot; class=&quot;zoom&quot; width=&quot;700&quot; alt=&quot;2.jpg&quot; title=&quot;2.jpg&quot; /&gt;\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;text-indent:2em;font-family:\'Microsoft Yahei\';color:#404040;&quot;&gt;\r\n	对于iPhone 8 ，可以确定的是双摄将采用垂直排列，有分析师认为这种设计是为了实现VR功能。iPhone 8的边框似乎是不锈钢材料，与iPhone 4的工业设计很相似。最后，iPhone 8的电源键似乎更长一些。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;text-indent:2em;font-family:\'Microsoft Yahei\';color:#404040;&quot;&gt;\r\n	&lt;img id=&quot;aimg_744451&quot; src=&quot;http://cms-bucket.nosdn.127.net/catchpic/d/d4/d4a3c5b52b9070aca1a93e45667f6a18.jpg?imageView&amp;amp;thumbnail=550x0&quot; class=&quot;zoom&quot; width=&quot;675&quot; alt=&quot;c-fvvkcxyaedatk-jpg-large.jpg&quot; title=&quot;c-fvvkcxyaedatk-jpg-large.jpg&quot; /&gt;&lt;img id=&quot;aimg_744452&quot; src=&quot;http://cms-bucket.nosdn.127.net/catchpic/6/6f/6f4bf5af51c81bdc393523308a18fe2d.jpg?imageView&amp;amp;thumbnail=550x0&quot; class=&quot;zoom&quot; width=&quot;675&quot; alt=&quot;c-fvulwwsaaxqkq-jpg-large.jpg&quot; title=&quot;c-fvulwwsaaxqkq-jpg-large.jpg&quot; /&gt;&amp;nbsp;\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;text-indent:2em;font-family:\'Microsoft Yahei\';color:#404040;&quot;&gt;\r\n	&lt;img id=&quot;aimg_744453&quot; src=&quot;http://cms-bucket.nosdn.127.net/catchpic/9/97/97aea4fafc886fccd2139c04d30eb771.jpg?imageView&amp;amp;thumbnail=550x0&quot; class=&quot;zoom&quot; width=&quot;675&quot; alt=&quot;c-fvvxvwaael0ld-jpg-large.jpg&quot; title=&quot;c-fvvxvwaael0ld-jpg-large.jpg&quot; /&gt;&lt;img id=&quot;aimg_744454&quot; src=&quot;http://cms-bucket.nosdn.127.net/catchpic/7/7f/7fcdf64e547f3dfb9cfeb7bd045871c7.jpg?imageView&amp;amp;thumbnail=550x0&quot; class=&quot;zoom&quot; width=&quot;674&quot; alt=&quot;c-fswtfxcaeeb4h-jpg-large.jpg&quot; title=&quot;c-fswtfxcaeeb4h-jpg-large.jpg&quot; /&gt;&amp;nbsp;\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;text-indent:2em;font-family:\'Microsoft Yahei\';color:#404040;&quot;&gt;\r\n	&lt;img id=&quot;aimg_744456&quot; src=&quot;http://cms-bucket.nosdn.127.net/catchpic/c/c1/c19fe7ad554c50d6d4d3f17c4b76dc8b.jpg?imageView&amp;amp;thumbnail=550x0&quot; class=&quot;zoom&quot; width=&quot;675&quot; alt=&quot;c-fsub0xgaad9el-jpg-large.jpg&quot; title=&quot;c-fsub0xgaad9el-jpg-large.jpg&quot; /&gt;\r\n&lt;/p&gt;\r\n&lt;div&gt;\r\n	&lt;br /&gt;\r\n&lt;/div&gt;', 1492441396, 0),
(7, 7, '1三个字十多个', 1492441447, 0),
(8, 8, '233333', 1492441835, 0),
(9, 9, '哈哈哈哈', 1492441873, 0),
(10, 10, '问题广东省', 1492441915, 0),
(11, 11, '无数个哈傻傻的23', 1492441930, 0),
(12, 12, '双丰收高', 1492442387, 0),
(13, 13, '大招扔出一个核弹', 1492478267, 0),
(14, 14, '翻江倒海', 1492478278, 0),
(15, 15, '等哈·1', 1492478460, 0),
(16, 16, '时代感和', 1492478553, 0),
(17, 17, '35', 1492494261, 0),
(18, 18, 'sag', 1492494270, 0),
(19, 19, '&lt;p class=&quot;otitle&quot; style=&quot;font-size:18px;text-indent:2em;font-family:\'Microsoft Yahei\';color:#404040;text-align:justify;background-color:#FFFFFF;&quot;&gt;\r\n	（原标题：Windows 10 全新设计界面确定亮相 Bulid 2017，今年秋季能够用上）\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:18px;text-indent:2em;font-family:\'Microsoft Yahei\';color:#404040;text-align:justify;background-color:#FFFFFF;&quot;&gt;\r\n	随着5月份的临近，微软也开始为今年最为重要的开发者大会 Bulid 2017预热了。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:18px;text-indent:2em;font-family:\'Microsoft Yahei\';color:#404040;text-align:justify;background-color:#FFFFFF;&quot;&gt;\r\n	Build 大会的重点，包括 Windows 10和 Hololens\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:18px;text-indent:2em;font-family:\'Microsoft Yahei\';color:#404040;text-align:justify;background-color:#FFFFFF;&quot;&gt;\r\n	就在近日，微软对外公布了今年 Build 大会与开发者相关的几个重点：\r\n&lt;/p&gt;\r\n&lt;ul style=&quot;color:#404040;font-family:\'Microsoft Yahei\';font-size:18px;text-align:justify;background-color:#FFFFFF;&quot;&gt;\r\n	&lt;li class=&quot;p2&quot;&gt;\r\n		更加漂亮的 UI 和更加自然的输入方式，以帮助开发者与用户更好地互动。\r\n	&lt;/li&gt;\r\n	&lt;li class=&quot;p2&quot;&gt;\r\n		团队协作和连接，以增强开发者的开发体验。\r\n	&lt;/li&gt;\r\n	&lt;li class=&quot;p2&quot;&gt;\r\n		可以帮助开发者接触消费者并了解其软件需求的新服务。\r\n	&lt;/li&gt;\r\n	&lt;li class=&quot;p2&quot;&gt;\r\n		跨屏互动体验，让端到端的体验更具粘性和参与度。\r\n	&lt;/li&gt;\r\n	&lt;li class=&quot;p2&quot;&gt;\r\n		混合现实（MR）和深度沉浸式体验。\r\n	&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;p style=&quot;font-size:18px;text-indent:2em;font-family:\'Microsoft Yahei\';color:#404040;text-align:justify;background-color:#FFFFFF;&quot;&gt;\r\n	可以看出，今年的 Build 开发者大会与去年相比，有着很强的继承性。这首先体现在，微软正在继续对 Windows 10平台进行提升和改进，包括 UI 设计和输入方式的变化。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:18px;text-indent:2em;font-family:\'Microsoft Yahei\';color:#404040;text-align:justify;background-color:#FFFFFF;&quot;&gt;\r\n	其中，关于输入方式，爱范儿（微信 ID：ifanr）认为随着语音交互技术和触控技术的发展，未来 Windows 10操作系统会越来越依赖于 Cortana 语音助手和触控操作。\r\n&lt;/p&gt;\r\n&lt;p class=&quot;f_center&quot; style=&quot;font-size:18px;font-family:\'Microsoft Yahei\';color:#404040;text-align:center;background-color:#FFFFFF;&quot;&gt;\r\n	&lt;img alt=&quot;Win10全新设计界面确定 今年秋季能够用上&quot; class=&quot;size-full wp-image-824307 aligncenter&quot; src=&quot;http://cms-bucket.nosdn.127.net/catchpic/0/05/0570f7c3bd1941720d6a9bdc08fbafce.jpg?imageView&amp;amp;thumbnail=550x0&quot; width=&quot;760&quot; height=&quot;424&quot; style=&quot;height:auto;&quot; /&gt;\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:18px;text-indent:2em;font-family:\'Microsoft Yahei\';color:#404040;text-align:justify;background-color:#FFFFFF;&quot;&gt;\r\n	另一方面是开发者在后台的开发体验的提升，并且越来越注重开发者和用户之间的互动和关联。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:18px;text-indent:2em;font-family:\'Microsoft Yahei\';color:#404040;text-align:justify;background-color:#FFFFFF;&quot;&gt;\r\n	至于混合现实（MR），毫无疑问指的就是微软的 Hololens。去年的 Build 大会上，微软宣布正式面向北美用户推出的开发者版本的 Hololens 眼镜和开发工具，价格3000美元。而在过去的一年中，Hololens 开发者版本已经相继登陆澳大利亚、新西兰、加拿大、爱尔兰、英国、日本、美国、法国、德国等9个国家。\r\n&lt;/p&gt;\r\n&lt;p class=&quot;f_center&quot; style=&quot;font-size:18px;font-family:\'Microsoft Yahei\';color:#404040;text-align:center;background-color:#FFFFFF;&quot;&gt;\r\n	&lt;img alt=&quot;Win10全新设计界面确定 今年秋季能够用上&quot; class=&quot;wp-image-824305 aligncenter&quot; src=&quot;http://cms-bucket.nosdn.127.net/catchpic/6/64/64fc6dc5dc75cb19b0d4947e8ca32257.jpg?imageView&amp;amp;thumbnail=550x0&quot; width=&quot;664&quot; height=&quot;325&quot; style=&quot;height:auto;&quot; /&gt;\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:18px;text-indent:2em;font-family:\'Microsoft Yahei\';color:#404040;text-align:justify;background-color:#FFFFFF;&quot;&gt;\r\n	因此，随着 Hololens 开发者群体的扩大，微软应该会在 Build 2017大会上对 Hololens 应用生态的现状和未来进行解读，并且很有可能还有一批面对开发者的新动作。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:18px;text-indent:2em;font-family:\'Microsoft Yahei\';color:#404040;text-align:justify;background-color:#FFFFFF;&quot;&gt;\r\n	Windows 10全新设计语言确定到来\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:18px;text-indent:2em;font-family:\'Microsoft Yahei\';color:#404040;text-align:justify;background-color:#FFFFFF;&quot;&gt;\r\n	虽然 Bulid 2017是面向开发者的，但对于普通用户来说，也可以从中解读出一个比较重要的信息：那就是下一个 Windows 10的年度更新将会拥有一个全新的交互界面，而且更加漂亮和好用。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:18px;text-indent:2em;font-family:\'Microsoft Yahei\';color:#404040;text-align:justify;background-color:#FFFFFF;&quot;&gt;\r\n	不出意外的话，这里所说的 UI 应该就是爱范儿（微信 ID：ifanr）此前报道过的全新设计语言，目前被暂时命名为 Project NEON。传言微软已经在 Project NEON 这一项目上投入了一年的时间。\r\n&lt;/p&gt;\r\n&lt;p class=&quot;f_center&quot; style=&quot;font-size:18px;font-family:\'Microsoft Yahei\';color:#404040;text-align:center;background-color:#FFFFFF;&quot;&gt;\r\n	&lt;img alt=&quot;Win10全新设计界面确定 今年秋季能够用上&quot; class=&quot; wp-image-824310 aligncenter&quot; src=&quot;http://cms-bucket.nosdn.127.net/catchpic/d/df/dfb7001809c2522fdc7a34deef2fa8b8.jpg?imageView&amp;amp;thumbnail=550x0&quot; width=&quot;770&quot; height=&quot;432&quot; style=&quot;height:auto;&quot; /&gt;\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:18px;text-indent:2em;font-family:\'Microsoft Yahei\';color:#404040;text-align:justify;background-color:#FFFFFF;&quot;&gt;\r\n	根据外媒&amp;nbsp;Windows Central&amp;nbsp;在2017年1月提供的几张截图，Project NEON 依然是扁平化设计，但在整体风格上更加清新，色调显得更加平易近人，不同板块之间的互动更加紧密和自然。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:18px;text-indent:2em;font-family:\'Microsoft Yahei\';color:#404040;text-align:justify;background-color:#FFFFFF;&quot;&gt;\r\n	例如下面这张 Groove 音乐播放器的动态图片。在新的设计规范之下，Groove 的 app 主界面划分为三个模块，左侧侧边栏以及底部显示进度条、音乐封面、播放操作的底栏透明度有明显提高，在确保清晰显示 app 界面的同时强化了窗口层次感。\r\n&lt;/p&gt;\r\n&lt;p class=&quot;f_center&quot; style=&quot;font-size:18px;font-family:\'Microsoft Yahei\';color:#404040;text-align:center;background-color:#FFFFFF;&quot;&gt;\r\n	&lt;img alt=&quot;Win10全新设计界面确定 今年秋季能够用上&quot; class=&quot;size-full wp-image-824312 aligncenter&quot; src=&quot;http://cms-bucket.nosdn.127.net/catchpic/1/1e/1eb9a34b2bb30cc34c202715cdf9c7c5.gif?imageView&amp;amp;tostatic=0&quot; width=&quot;800&quot; height=&quot;492&quot; style=&quot;height:auto;&quot; /&gt;\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:18px;text-indent:2em;font-family:\'Microsoft Yahei\';color:#404040;text-align:justify;background-color:#FFFFFF;&quot;&gt;\r\n	Windows Central 介绍说，这种设计风格的正式名称是 Acrylic（亚克力），在系统中会呈现出三种形态：Side-Nav（侧边栏） Acrylic、Background（背景） Acrylic、In-App（应用内） Acrylic。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:18px;text-indent:2em;font-family:\'Microsoft Yahei\';color:#404040;text-align:justify;background-color:#FFFFFF;&quot;&gt;\r\n	在另外一张新版的 Outlook 截图中，整个界面拥有大量的留白和间隔，从左到右依次分为不同层级，清晰可见；在整体观感上，显得更加清新和易于理解。\r\n&lt;/p&gt;\r\n&lt;p class=&quot;f_center&quot; style=&quot;font-size:18px;font-family:\'Microsoft Yahei\';color:#404040;text-align:center;background-color:#FFFFFF;&quot;&gt;\r\n	&lt;img alt=&quot;Win10全新设计界面确定 今年秋季能够用上&quot; class=&quot; wp-image-824313 aligncenter&quot; src=&quot;http://cms-bucket.nosdn.127.net/catchpic/9/97/9796418de1d6ae3479a77f9c41f32ed3.jpg?imageView&amp;amp;thumbnail=550x0&quot; width=&quot;758&quot; height=&quot;426&quot; style=&quot;height:auto;&quot; /&gt;\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:18px;text-indent:2em;font-family:\'Microsoft Yahei\';color:#404040;text-align:justify;background-color:#FFFFFF;&quot;&gt;\r\n	关于 Project NEON 将在 Build 2017 露面，还有一个证据。在今年2 月的 Windows 开发者日中，微软也在演讲中提到了 Windows 10 开发的一些问题，其中一张幻灯片说的是将提供“更加漂亮和更具参与感的体验”，并且这张幻片的背景图片也是一张不同风格的 WIndows 10 系统界面和应用商店界面。\r\n&lt;/p&gt;\r\n&lt;p class=&quot;f_center&quot; style=&quot;font-size:18px;font-family:\'Microsoft Yahei\';color:#404040;text-align:center;background-color:#FFFFFF;&quot;&gt;\r\n	&lt;img alt=&quot;Win10全新设计界面确定 今年秋季能够用上&quot; class=&quot; wp-image-824317 aligncenter&quot; src=&quot;http://cms-bucket.nosdn.127.net/catchpic/9/99/998da80f98fd850ded5d8d203611699c.jpg?imageView&amp;amp;thumbnail=550x0&quot; width=&quot;724&quot; height=&quot;405&quot; style=&quot;height:auto;&quot; /&gt;\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:18px;text-indent:2em;font-family:\'Microsoft Yahei\';color:#404040;text-align:justify;background-color:#FFFFFF;&quot;&gt;\r\n	所以，几乎可以断定，Project NEON 将登陆 Build 2017。而且这一设计语言有极大的可能性出现在今年秋季的 Windows 10 年度更新中；这对全球数亿的 Windows 10 用户来说将会是一个福音。\r\n&lt;/p&gt;', 1492662602, 0),
(20, 20, '&lt;p style=&quot;font-size:16px;text-indent:2em;font-family:\'Microsoft Yahei\';color:#404040;text-align:justify;background-color:#FFFFFF;&quot;&gt;\r\n	本来不温不火的游戏笔记本电脑市场在近几年电竞爆发的大趋势下，显得异常火热，各路性能飙高的笔电层出不穷，这样的情形连一直致力于轻薄商务笔电的三星近来也按捺不住，在年初的CES大展上发了游戏笔电系列——Odyssey，几个月后的中国国内的发布会上，三星游戏本系列的中文命名也终于揭晓：玄龙骑士，不得不说，是个本土化程度很高的“意译”版本。\r\n&lt;/p&gt;\r\n&lt;p class=&quot;f_center&quot; style=&quot;font-size:16px;font-family:\'Microsoft Yahei\';color:#404040;text-align:center;background-color:#FFFFFF;&quot;&gt;\r\n	&lt;img alt=&quot;纯白异类兼容日常 三星玄龙骑士游戏本体验&quot; src=&quot;http://cms-bucket.nosdn.127.net/d157d0f390be48e782d7dc251970970820170417212137.jpeg?imageView&amp;amp;thumbnail=550x0&quot; /&gt; \r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;text-indent:2em;font-family:\'Microsoft Yahei\';color:#404040;text-align:justify;background-color:#FFFFFF;&quot;&gt;\r\n	&lt;b&gt;中庸的外观 靓丽的白色&lt;/b&gt; \r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;text-indent:2em;font-family:\'Microsoft Yahei\';color:#404040;text-align:justify;background-color:#FFFFFF;&quot;&gt;\r\n	不知是约好了还是各大厂商的审美趋同还是怎地，市面上的打着游戏本的笔电，一个个都长着一副疑似跑车（杀马特？）的外观，线条硬气，棱角尖尖。对此笔者倒是没什么太多可吐槽的，甚至还觉得蛮不错，然而顺手问了一句妹子们对如此设计的感受，得到的回答都是：丑；委婉一点的回答是：太阳刚了。\r\n&lt;/p&gt;\r\n&lt;p class=&quot;f_center&quot; style=&quot;font-size:16px;font-family:\'Microsoft Yahei\';color:#404040;text-align:center;background-color:#FFFFFF;&quot;&gt;\r\n	&lt;img alt=&quot;纯白异类兼容日常 三星玄龙骑士游戏本体验&quot; src=&quot;http://cms-bucket.nosdn.127.net/944cc13e5c74453397d46106c0a0825520170417212600.jpeg?imageView&amp;amp;thumbnail=550x0&quot; /&gt; \r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;text-indent:2em;font-family:\'Microsoft Yahei\';color:#404040;text-align:justify;background-color:#FFFFFF;&quot;&gt;\r\n	三星玄龙骑士走的就不是那个路子，论长相，估计不会有人觉得它会是一台游戏本，毕竟实在是太正常，太不“杀马特”了。边角柔和，中规中矩，一副“我其实不是游戏本来着”的模样。其实换个角度想想，玄龙骑士在现阶段的游戏本中，反而是非常独特的。\r\n&lt;/p&gt;\r\n&lt;p class=&quot;f_center&quot; style=&quot;font-size:16px;font-family:\'Microsoft Yahei\';color:#404040;text-align:center;background-color:#FFFFFF;&quot;&gt;\r\n	&lt;img alt=&quot;纯白异类兼容日常 三星玄龙骑士游戏本体验&quot; src=&quot;http://cms-bucket.nosdn.127.net/cec253c3916349c1b081693a9d75d7f720170417212555.jpeg?imageView&amp;amp;thumbnail=550x0&quot; /&gt; \r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;text-indent:2em;font-family:\'Microsoft Yahei\';color:#404040;text-align:justify;background-color:#FFFFFF;&quot;&gt;\r\n	三星玄龙骑士的外壳均采用复合材质打造，其实也就是某种名字可能很复杂的塑料，整体做工精致，并经过了黑色磨砂质感处理。硬要比的话，和金属或者碳纤材料是有差距的，但是，塑料才是游戏本的王道呐（笑）。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;text-indent:2em;font-family:\'Microsoft Yahei\';color:#404040;text-align:justify;background-color:#FFFFFF;&quot;&gt;\r\n	外观很柔和，很中庸，很不“游戏”，这是在黑色机身的前提下。不得不说，白色版本的玄龙骑士的确能够给人了留下深刻的印象。而且也没有太多花里胡哨的光带，喜欢素净一点的朋友们一定会喜欢。\r\n&lt;/p&gt;\r\n&lt;p class=&quot;f_center&quot; style=&quot;font-size:16px;font-family:\'Microsoft Yahei\';color:#404040;text-align:center;background-color:#FFFFFF;&quot;&gt;\r\n	&lt;img alt=&quot;纯白异类兼容日常 三星玄龙骑士游戏本体验&quot; src=&quot;http://cms-bucket.nosdn.127.net/9d91a687e51a41fea8c6d434686cf2f520170417212136.jpeg?imageView&amp;amp;thumbnail=550x0&quot; /&gt; \r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;text-indent:2em;font-family:\'Microsoft Yahei\';color:#404040;text-align:justify;background-color:#FFFFFF;&quot;&gt;\r\n	顶盖能亮的只有logo部分，灯光呈红色。另外就是C面的触控板和键盘有背光，等下我们细说。\r\n&lt;/p&gt;\r\n&lt;p class=&quot;f_center&quot; style=&quot;font-size:16px;font-family:\'Microsoft Yahei\';color:#404040;text-align:center;background-color:#FFFFFF;&quot;&gt;\r\n	&lt;img alt=&quot;纯白异类兼容日常 三星玄龙骑士游戏本体验&quot; src=&quot;http://cms-bucket.nosdn.127.net/60d38fa277b4476bae0b6fa595e4254f20170417212144.jpeg?imageView&amp;amp;thumbnail=550x0&quot; /&gt; \r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;text-indent:2em;font-family:\'Microsoft Yahei\';color:#404040;text-align:justify;background-color:#FFFFFF;&quot;&gt;\r\n	屏幕方面，15.6英寸1920×1080分辨率。默认壁纸是黑色的，三星显然信心十足，事实上品控也真是不错，没有漏光。\r\n&lt;/p&gt;\r\n&lt;p class=&quot;f_center&quot; style=&quot;font-size:16px;font-family:\'Microsoft Yahei\';color:#404040;text-align:center;background-color:#FFFFFF;&quot;&gt;\r\n	&lt;img alt=&quot;纯白异类兼容日常 三星玄龙骑士游戏本体验&quot; src=&quot;http://cms-bucket.nosdn.127.net/3cad5155d1aa4d48b6b16290b691855020170417212142.jpeg?imageView&amp;amp;thumbnail=550x0&quot; /&gt; \r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;text-indent:2em;font-family:\'Microsoft Yahei\';color:#404040;text-align:justify;background-color:#FFFFFF;&quot;&gt;\r\n	C面的触控板部分采用了平行四边形的外框，两角红光亮起；键盘部分也是红色背光，白色的显然要比黑色红光更盛，个人感觉白色款的效果更好。而且，黑色版本的触控板外围很容易粘上指纹，拉低颜值。\r\n&lt;/p&gt;\r\n&lt;p class=&quot;f_center&quot; style=&quot;font-size:16px;font-family:\'Microsoft Yahei\';color:#404040;text-align:center;background-color:#FFFFFF;&quot;&gt;\r\n	&lt;img alt=&quot;纯白异类兼容日常 三星玄龙骑士游戏本体验&quot; src=&quot;http://cms-bucket.nosdn.127.net/fd21a1276d9044ed8a142ad0a2d34a1e20170417212140.jpeg?imageView&amp;amp;thumbnail=550x0&quot; /&gt; \r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;text-indent:2em;font-family:\'Microsoft Yahei\';color:#404040;text-align:justify;background-color:#FFFFFF;&quot;&gt;\r\n	这个价位段的游戏本显然不会用上机械键盘，于是玄龙骑士的键程也并不长，有些单薄。好在反馈明确，考虑到本子的厚度，在按键手感上妥协也是正常。有条件的话，请外接键盘。\r\n&lt;/p&gt;\r\n&lt;p class=&quot;f_center&quot; style=&quot;font-size:16px;font-family:\'Microsoft Yahei\';color:#404040;text-align:center;background-color:#FFFFFF;&quot;&gt;\r\n	&lt;img alt=&quot;纯白异类兼容日常 三星玄龙骑士游戏本体验&quot; src=&quot;http://cms-bucket.nosdn.127.net/a17e854c24c743edaec80a1967704af920170417212138.jpeg?imageView&amp;amp;thumbnail=550x0&quot; /&gt; \r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;text-indent:2em;font-family:\'Microsoft Yahei\';color:#404040;text-align:justify;background-color:#FFFFFF;&quot;&gt;\r\n	接口方面，右侧有1个SD卡槽，2个USB 2.0接口，左侧则是一个电源接口，一个RJ-45网线接口、1个HDMI接口，1个USB3.0接口以及1个音频输入输出接口。拓展够用，但不够全面。\r\n&lt;/p&gt;', 1492770934, 0),
(21, 21, '&lt;p style=&quot;font-size:16px;text-indent:2em;font-family:\'Microsoft Yahei\';color:#404040;text-align:justify;background-color:#FFFFFF;&quot;&gt;\r\n	AMD公司推出了下一代&lt;strong&gt;视频卡Radeon&amp;nbsp;RX&amp;nbsp;500系列&lt;/strong&gt;。与过去的视频卡阵容相同，这一新系列基于AMD公司现有的图形处理单元（GPU）架构&amp;nbsp;Polaris。是上一代的进步里程碑，如AMD&amp;nbsp;Radeon&amp;nbsp;300系列中，该公司已经突破了时钟速度，同时放低价格，Radeon&amp;nbsp;RX&amp;nbsp;500系列也不例外。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;text-indent:2em;font-family:\'Microsoft Yahei\';color:#404040;text-align:justify;background-color:#FFFFFF;&quot;&gt;\r\n	&lt;strong&gt;新的Radeon&amp;nbsp;RX&amp;nbsp;500系列是AMD新的Ryzen&amp;nbsp;5处理器的完美补充&lt;/strong&gt;。新产品基于相同的Polaris图形处理器，其中一个新的低端GPU的重点仅在于电子竞技和家庭影院PC。正如AMD所指出的那样，“Polaris的精炼和演变”。\r\n&lt;/p&gt;\r\n&lt;p class=&quot;f_center&quot; style=&quot;font-size:16px;font-family:\'Microsoft Yahei\';color:#404040;text-align:center;background-color:#FFFFFF;&quot;&gt;\r\n	&lt;img src=&quot;http://cms-bucket.nosdn.127.net/catchpic/3/32/32a6febedf0d7fb7d42add85a47513cc.jpg?imageView&amp;amp;thumbnail=550x0&quot; width=&quot;640&quot; height=&quot;358&quot; alt=&quot;AMD推出下一代视频卡Radeon RX 500系列 &quot; align=&quot;no&quot; /&gt;\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;text-indent:2em;font-family:\'Microsoft Yahei\';color:#404040;text-align:justify;background-color:#FFFFFF;&quot;&gt;\r\n	&lt;strong&gt;该Radeon&amp;nbsp;RX&amp;nbsp;580有一个1,256MHz基地和1,366MHz升压时钟脉冲&lt;/strong&gt;。支持这些频率单位使额定TDP从150W增加到185W。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;text-indent:2em;font-family:\'Microsoft Yahei\';color:#404040;text-align:justify;background-color:#FFFFFF;&quot;&gt;\r\n	该Radeon&amp;nbsp;RX&amp;nbsp;570&amp;nbsp;有一个1,168MHz基地和1,244MHz升压时钟脉冲。与Radeon&amp;nbsp;RX&amp;nbsp;470相比，这只有一个轻微的增长，因为它有1,206MHz的最大时钟。像RX&amp;nbsp;5850一样，额外的赫兹不是免费的，因为TDP也从120W增加到150W。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;text-indent:2em;font-family:\'Microsoft Yahei\';color:#404040;text-align:justify;background-color:#FFFFFF;&quot;&gt;\r\n	该Radeon&amp;nbsp;RX&amp;nbsp;560&amp;nbsp;有一个1,175MHz基地和1,275MHz升压时钟脉冲。有了这个数量，与RX&amp;nbsp;460相比，它提供了一个不错的颠覆。除此之外，它也是Polaris&amp;nbsp;11&amp;nbsp;GPU的完整版本。AMD拒绝分享这张卡的更多功能，但是与去年的RX&amp;nbsp;400系列相比肯定要好一些。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;text-indent:2em;font-family:\'Microsoft Yahei\';color:#404040;text-align:justify;background-color:#FFFFFF;&quot;&gt;\r\n	该Radeon&amp;nbsp;RX&amp;nbsp;550&amp;nbsp;是建立以吸引电子竞技游戏玩家以及家庭影院一个全新的模式展示给用户。它实际上是RX&amp;nbsp;560的一半和RX&amp;nbsp;570的三分之一，因为它具有1,183MHz的提升速度。它不需要补充电源连接器。\r\n&lt;/p&gt;', 1493034909, 0),
(22, 22, '&lt;p class=&quot;otitle&quot; style=&quot;font-size:16px;text-indent:2em;font-family:\'Microsoft Yahei\';color:#404040;text-align:justify;background-color:#FFFFFF;&quot;&gt;\r\n	（原标题：苹果开售翻新版13英寸Touch Bar MacBook Pro）\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;text-indent:2em;font-family:\'Microsoft Yahei\';color:#404040;text-align:justify;background-color:#FFFFFF;&quot;&gt;\r\n	据外媒Macrumors报道，苹果已经开始在美国和加拿大销售翻新版13吋Touch Bar MacBook Pro，该产品发布于2016年10月，这也是其翻新版首次开卖。\r\n&lt;/p&gt;\r\n&lt;p class=&quot;f_center&quot; style=&quot;font-size:16px;font-family:\'Microsoft Yahei\';color:#404040;text-align:center;background-color:#FFFFFF;&quot;&gt;\r\n	&lt;img alt=&quot;苹果开售翻新版13英寸MacBook Pro：1529刀&quot; src=&quot;http://cms-bucket.nosdn.127.net/catchpic/f/f4/f41a47dae3faa183c43bdbc3e7e4344e.jpg?imageView&amp;amp;thumbnail=550x0&quot; class=&quot;lazy&quot; title=&quot;苹果开售翻新版13英寸Touch Bar MacBook Pro&quot; width=&quot;600&quot; height=&quot;336&quot; /&gt;\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;text-indent:2em;font-family:\'Microsoft Yahei\';color:#404040;text-align:justify;background-color:#FFFFFF;&quot;&gt;\r\n	在美国市场，翻新版13吋Touch Bar MacBook Pro基本款配置为2.9GHz英特尔双核Core i5处理器、256GB闪存、8GB内存以及英特尔Iris Graphic 550显卡，颜色有银色和深空灰可选，售价1529美元，比全新版便宜270美元，基本款也支持升级到16GB内存，售价1699美元，比全新版便宜300美元。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;text-indent:2em;font-family:\'Microsoft Yahei\';color:#404040;text-align:justify;background-color:#FFFFFF;&quot;&gt;\r\n	高端型号搭载2.9GHz英特尔双核Core i5处理器、256GB闪存、8GB内存以及英特尔Iris Graphic 550显卡，售价1699美元，便宜300美元，同样支持升级到16GB内存，售价1869美元，比全新版便宜330美元。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;text-indent:2em;font-family:\'Microsoft Yahei\';color:#404040;text-align:justify;background-color:#FFFFFF;&quot;&gt;\r\n	值得一提的是，15英寸的Touch Bar MacBook Pro和13英寸的不带Touch Bar的MacBook Pro翻新版已经在3月份开卖。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;text-indent:2em;font-family:\'Microsoft Yahei\';color:#404040;text-align:justify;background-color:#FFFFFF;&quot;&gt;\r\n	苹果公司表示，翻新的MacBook Pro经过彻底检查，测试，清洁和重新包装，包括盒子中包含的手册和电缆。每个笔记本电脑都被给予一个新的序列号，并在被添加到苹果翻新店之前进行最终的质量保证检查。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;text-indent:2em;font-family:\'Microsoft Yahei\';color:#404040;text-align:justify;background-color:#FFFFFF;&quot;&gt;\r\n	除了美国，苹果加拿大也提供翻新版13吋Touch Bar MacBook Pro，相比新版便宜290美元到350美元之间。\r\n&lt;/p&gt;', 1493035134, 0),
(23, 23, '恩恩', 1493035448, 0),
(24, 24, '&lt;p style=&quot;font-size:16px;text-indent:2em;font-family:\'Microsoft Yahei\';color:#404040;text-align:justify;background-color:#FFFFFF;&quot;&gt;\r\n	微软近期为Surface Pro 3平板电脑设备推送了新的Win10固件更新，该更新为Surface Pro Embedded Controller Firmware提升了系统稳定性和性能，特别是当你切换电源状态时。\r\n&lt;/p&gt;\r\n&lt;p class=&quot;f_center&quot; style=&quot;font-size:16px;font-family:\'Microsoft Yahei\';color:#404040;text-align:center;background-color:#FFFFFF;&quot;&gt;\r\n	&lt;img alt=&quot;Surface Pro 3专属固件更新：提升系统稳定性&quot; src=&quot;http://cms-bucket.nosdn.127.net/catchpic/a/ac/aca5a161e0dd6103d0f8bb53ed0056f9.jpg?imageView&amp;amp;thumbnail=550x0&quot; class=&quot;lazy&quot; title=&quot;微软Surface Pro 3专属固件更新：提升系统稳定性和性能&quot; width=&quot;600&quot; height=&quot;390&quot; /&gt;\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;text-indent:2em;font-family:\'Microsoft Yahei\';color:#404040;text-align:justify;background-color:#FFFFFF;&quot;&gt;\r\n	下面是Surface Pro 3收到的更新在Windows Update历史页面描述：\r\n&lt;/p&gt;\r\n&lt;blockquote style=&quot;color:#404040;font-family:\'Microsoft Yahei\';font-size:16px;text-align:justify;background-color:#FFFFFF;&quot;&gt;\r\n	&lt;p style=&quot;text-indent:2em;&quot;&gt;\r\n		Surface–Firmware–38.12.70.0\r\n	&lt;/p&gt;\r\n&lt;/blockquote&gt;\r\n&lt;p style=&quot;font-size:16px;text-indent:2em;font-family:\'Microsoft Yahei\';color:#404040;text-align:justify;background-color:#FFFFFF;&quot;&gt;\r\n	你也可以手动下载Surface Pro 3的驱动和固件下载，虽然微软已经不再售卖Surface Pro 3设备，但目前微软官方商店内还存在翻新版的Surface Pro 3平板电脑，售价439美元（约合人民币3021元）。\r\n&lt;/p&gt;', 1493035574, 0),
(25, 25, '&lt;p class=&quot;otitle&quot; style=&quot;font-size:16px;text-indent:2em;font-family:\'Microsoft Yahei\';color:#404040;text-align:justify;background-color:#FFFFFF;&quot;&gt;\r\n	（原标题：微软首款ARM Win10 PC发布时间确认：搭载骁龙835）\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;text-indent:2em;font-family:\'Microsoft Yahei\';color:#404040;text-align:justify;background-color:#FFFFFF;&quot;&gt;\r\n	&lt;b&gt;摘要：&lt;/b&gt;早在去年12月，微软和高通就宣布将为ARM处理器提供x86应用程序的支持，该特性会在Windows 10 RS3版本推出后得到实现。 今天，高通CEO Steve Mollenkopf亲口透露了更多关于ARM PC的计划细节，其中就包括推出的具体时间点。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;text-indent:2em;font-family:\'Microsoft Yahei\';color:#404040;text-align:justify;background-color:#FFFFFF;&quot;&gt;\r\n	Steve Mollenkopf表示，目前正在对骁龙835进行深入的优化，使之能够更好的在Windows 10环境下运行，首款产品将在今年第四季度推出，可以完全运行x86软件。新设备将能够完全享受来自骁龙835的各种技术福利，比如低功耗、千兆LTE等等。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;text-indent:2em;font-family:\'Microsoft Yahei\';color:#404040;text-align:justify;background-color:#FFFFFF;&quot;&gt;\r\n	此外，在数据中心领域，我们也与微软达成了合作，未来运行Windows Server的服务器也可以搭载高通10nm Centriq处理器，这也是业内首款10nm服务器处理器。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;text-indent:2em;font-family:\'Microsoft Yahei\';color:#404040;text-align:justify;background-color:#FFFFFF;&quot;&gt;\r\n	Steve Mollenkopf强调，目前尚未有任何一家OEM厂商就推出ARM处理器PC与高通进行合作沟通，但未来微软可能会出面推动这一事情。因此，到了今年第四季度，我们可能会看到除了Surface以外的ARM PC推出。\r\n&lt;/p&gt;\r\n&lt;p class=&quot;f_center&quot; style=&quot;font-size:16px;font-family:\'Microsoft Yahei\';color:#404040;text-align:center;background-color:#FFFFFF;&quot;&gt;\r\n	&lt;img alt=&quot;微软首款ARM Windows 10 PC发布时间确认：搭载骁龙835&quot; src=&quot;http://cms-bucket.nosdn.127.net/catchpic/0/00/0080eebc7cf5ccc94037289d059a37e4.jpg?imageView&amp;amp;thumbnail=550x0&quot; /&gt;\r\n&lt;/p&gt;', 1493035671, 0);

-- --------------------------------------------------------

--
-- 表的结构 `cms_position`
--

CREATE TABLE `cms_position` (
  `id` smallint(8) UNSIGNED NOT NULL,
  `name` char(30) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `description` char(100) DEFAULT NULL,
  `create_time` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `update_time` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `cms_position`
--

INSERT INTO `cms_position` (`id`, `name`, `status`, `description`, `create_time`, `update_time`) VALUES
(1, '233', -1, 'ffggg', 44, 22),
(2, 'test', -1, 'no', 44, 44),
(3, '24', -1, NULL, 1492789580, 0),
(4, '首页大图', 1, NULL, 1492791143, 0),
(5, '三小图', 1, NULL, 1492791148, 0),
(6, '右下广告位', 1, NULL, 1492791154, 0),
(7, '蕾姆2', -1, NULL, 1492791321, 0),
(8, '2331', -1, NULL, 1492791517, 0),
(9, '2', -1, NULL, 1492791639, 0),
(10, '21', -1, NULL, 1492791888, 0),
(11, '23', -1, NULL, 1492792092, 0),
(12, '233', -1, NULL, 1492822610, 0),
(13, '2332', -1, NULL, 1492837799, 0),
(14, '艾米莉亚1', -1, NULL, 1492837861, 0),
(15, '蕾姆22', -1, NULL, 1492837941, 0),
(16, '233', -1, NULL, 1492838202, 0),
(17, '艾米莉亚', -1, NULL, 1492838371, 0),
(18, '蕾姆2', -1, NULL, 1492838521, 0),
(19, '蕾姆2', -1, NULL, 1492838521, 0),
(20, '蕾姆1', -1, NULL, 1492840400, 0),
(21, '1', -1, NULL, 1492840707, 0);

-- --------------------------------------------------------

--
-- 表的结构 `cms_position_content`
--

CREATE TABLE `cms_position_content` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `position_id` int(5) UNSIGNED NOT NULL,
  `title` varchar(30) NOT NULL DEFAULT '',
  `thumb` varchar(100) NOT NULL DEFAULT '',
  `url` varchar(100) DEFAULT NULL,
  `news_id` mediumint(8) UNSIGNED NOT NULL,
  `listorder` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `create_time` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `update_time` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `cms_position_content`
--

INSERT INTO `cms_position_content` (`id`, `position_id`, `title`, `thumb`, `url`, `news_id`, `listorder`, `status`, `create_time`, `update_time`) VALUES
(1, 1, '我打个电话是', '', NULL, 14, 0, -1, 1492574788, 0),
(2, 1, '我打个电话是', '', NULL, 14, 0, -1, 1492575066, 0),
(3, 1, '我打个电话是', '', NULL, 14, 0, -1, 1492575075, 0),
(4, 1, '我打个电话是', '', NULL, 14, 0, -1, 1492575120, 0),
(5, 1, '我打个电话是', '', NULL, 14, 0, -1, 1492575339, 0),
(6, 1, '宿舍', '', NULL, 7, 0, -1, 1492575398, 0),
(7, 1, '我打个电话是', '', NULL, 14, 0, -1, 1492575405, 0),
(8, 1, '我打个电话是', '', NULL, 14, 0, -1, 1492575419, 0),
(9, 1, '我打个电话是', '', NULL, 14, 0, -1, 1492575435, 0),
(10, 1, '我打个电话是', '', NULL, 14, 0, -1, 1492575509, 0),
(11, 1, '我打个电话是', '', NULL, 14, 0, -1, 1492575540, 0),
(12, 1, '委员会和地方', '', NULL, 16, 0, -1, 1492575692, 0),
(13, 1, '广东省', '', NULL, 15, 0, -1, 1492575730, 0),
(14, 1, '我是', 'upload/2017/04/20/58f83945b5f3b.jpg', NULL, 19, 0, -1, 1492662615, 0),
(15, 1, '我是', 'upload/2017/04/20/58f8d8928ad82.jpg', NULL, 19, 0, -1, 1492704923, 0),
(16, 1, '查莉娅', 'upload/2017/04/20/58f8d07f958cb.jpg', NULL, 6, 0, -1, 1492705020, 0),
(17, 1, 'test1', 'upload/2017/04/20/58f8d0065f39d.jpg', NULL, 1, 0, -1, 1492705029, 0),
(18, 1, '测试测试', 'upload/2017/04/21/58f9e06b46362.jpg', NULL, 20, 0, -1, 1492771397, 0),
(19, 1, 'test2', 'upload/2017/04/20/58f8d03b4d35b.jpg', NULL, 2, 0, -1, 1492784182, 0),
(20, 1, '我是', 'upload/2017/04/20/58f8d8928ad82.jpg', NULL, 19, 0, -1, 1492784211, 0),
(21, 1, '测试测试', 'upload/2017/04/21/58f9e06b46362.jpg', NULL, 20, 0, -1, 1492784316, 0),
(22, 1, '测试测试', 'upload/2017/04/21/58f9e06b46362.jpg', NULL, 20, 0, -1, 1492784337, 0),
(23, 1, '测试测试', 'upload/2017/04/21/58f9e06b46362.jpg', NULL, 20, 0, -1, 1492784412, 0),
(24, 1, '测试测试', 'upload/2017/04/21/58f9e06b46362.jpg', NULL, 20, 0, -1, 1492784429, 0),
(25, 2, '测试测试', 'upload/2017/04/21/58f9e06b46362.jpg', NULL, 20, 0, 1, 1492784511, 0),
(26, 2, '测试测试', 'upload/2017/04/21/58f9e06b46362.jpg', NULL, 20, 0, 1, 1492784516, 0),
(27, 2, '测试测试', 'upload/2017/04/21/58f9e06b46362.jpg', NULL, 20, 0, 1, 1492784534, 0),
(28, 1, '测试测试', 'upload/2017/04/21/58f9e06b46362.jpg', NULL, 20, 0, -1, 1492785590, 0),
(29, 1, 'test2', 'upload/2017/04/20/58f8d03b4d35b.jpg', NULL, 2, 0, -1, 1492785643, 0),
(30, 1, '测试测试', 'upload/2017/04/21/58f9e06b46362.jpg', NULL, 20, 0, -1, 1492785643, 0),
(31, 1, 'test2', 'upload/2017/04/20/58f8d03b4d35b.jpg', NULL, 2, 0, -1, 1492785653, 0),
(32, 1, '测试测试', 'upload/2017/04/21/58f9e06b46362.jpg', NULL, 20, 0, -1, 1492785653, 0),
(33, 1, 'test2', 'upload/2017/04/20/58f8d03b4d35b.jpg', NULL, 2, 0, -1, 1492785771, 0),
(34, 1, '测试测试', 'upload/2017/04/21/58f9e06b46362.jpg', NULL, 20, 0, -1, 1492785771, 0),
(35, 1, 'Dva', 'upload/2017/04/20/58f8d0876f839.jpg', NULL, 13, 0, -1, 1492785808, 0),
(36, 1, '我是', 'upload/2017/04/20/58f8d8928ad82.jpg', NULL, 19, 0, -1, 1492785808, 0),
(37, 4, '查莉娅', 'upload/2017/04/20/58f8d07f958cb.jpg', NULL, 6, 0, -1, 1492791172, 0),
(38, 4, '查莉娅', 'upload/2017/04/20/58f8d07f958cb.jpg', NULL, 6, 0, -1, 1493019269, 0),
(39, 4, '我是', 'upload/2017/04/20/58f8d8928ad82.jpg', NULL, 19, 0, -1, 1493019269, 0),
(40, 5, 'test3', 'upload/2017/04/20/58f8d0065f39d.jpg', NULL, 1, 0, -1, 1493019273, 0),
(41, 5, 'test1', 'upload/2017/04/20/58f8d03b4d35b.jpg', NULL, 2, 0, -1, 1493019273, 0),
(42, 5, '测试测试', 'upload/2017/04/21/58f9e06b46362.jpg', NULL, 20, 0, -1, 1493019273, 0),
(43, 6, 'test3', 'upload/2017/04/20/58f8d0065f39d.jpg', NULL, 1, 0, -1, 1493019277, 0),
(44, 6, 'test1', 'upload/2017/04/20/58f8d03b4d35b.jpg', NULL, 2, 0, -1, 1493019277, 0),
(45, 6, '测试测试', 'upload/2017/04/21/58f9e06b46362.jpg', NULL, 20, 0, -1, 1493019277, 0),
(46, 4, '我是', 'upload/2017/04/24/58fdbe6f4f769.png', NULL, 19, 0, -1, 1493026563, 0),
(47, 4, 'Win10全新界面流出', 'upload/2017/04/24/58fdcc394671d.jpg', NULL, 19, 0, -1, 1493028041, 0),
(48, 4, '纯白异类兼容日常 三星玄龙骑士游戏本体验', 'upload/2017/04/24/58fdcef052ed4.jpg', NULL, 20, 0, 1, 1493028965, 0),
(49, 6, '作者微信', 'upload/2017/04/24/58fde99996036.jpg', NULL, 23, 0, 1, 1493035460, 0),
(50, 5, '苹果开售翻新版13英寸MacBook Pro', 'upload/2017/04/24/58fde819433d9.jpg', NULL, 22, 0, 1, 1493035679, 0),
(51, 4, 'Surface Pro 3专属固件更新', 'upload/2017/04/24/58fdeb57f1ec3.jpg', '', 24, 0, -1, 1493035679, 0),
(52, 5, '首款ARM Win10 PC发布时间确认', 'upload/2017/04/24/58fdea64ae321.jpg', NULL, 25, 0, 1, 1493035679, 0),
(53, 5, 'Surface Pro 3专属固件更新', 'upload/2017/04/24/58fdeb7b1babe.jpg', NULL, 24, 0, 1, 1493035906, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cms_admin`
--
ALTER TABLE `cms_admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `cms_menu`
--
ALTER TABLE `cms_menu`
  ADD PRIMARY KEY (`menu_id`),
  ADD KEY `listorder` (`listorder`),
  ADD KEY `parentid` (`parentid`),
  ADD KEY `module` (`m`,`c`,`f`);

--
-- Indexes for table `cms_news`
--
ALTER TABLE `cms_news`
  ADD PRIMARY KEY (`news_id`),
  ADD KEY `listorder` (`listorder`),
  ADD KEY `catid` (`catid`);

--
-- Indexes for table `cms_news_content`
--
ALTER TABLE `cms_news_content`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_id` (`news_id`);

--
-- Indexes for table `cms_position`
--
ALTER TABLE `cms_position`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_position_content`
--
ALTER TABLE `cms_position_content`
  ADD PRIMARY KEY (`id`),
  ADD KEY `position_id` (`position_id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `cms_admin`
--
ALTER TABLE `cms_admin`
  MODIFY `admin_id` mediumint(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- 使用表AUTO_INCREMENT `cms_menu`
--
ALTER TABLE `cms_menu`
  MODIFY `menu_id` smallint(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- 使用表AUTO_INCREMENT `cms_news`
--
ALTER TABLE `cms_news`
  MODIFY `news_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- 使用表AUTO_INCREMENT `cms_news_content`
--
ALTER TABLE `cms_news_content`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- 使用表AUTO_INCREMENT `cms_position`
--
ALTER TABLE `cms_position`
  MODIFY `id` smallint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- 使用表AUTO_INCREMENT `cms_position_content`
--
ALTER TABLE `cms_position_content`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

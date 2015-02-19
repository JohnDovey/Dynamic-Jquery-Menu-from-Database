-- phpMyAdmin SQL Dump
-- version 2.11.10
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 07, 2010 at 02:29 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `d309002_menu`
--

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `menuid` bigint(10) unsigned NOT NULL auto_increment,
  `parentid` bigint(10) unsigned NOT NULL default '0',
  `sortid` bigint(10) unsigned NOT NULL default '0',
  `url` varchar(255) NOT NULL default '#',
  `name` varchar(255) NOT NULL default 'Unknown',
  `desc` varchar(255) NOT NULL default 'Unknown',
  `seclevel` bigint(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`menuid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menuid`, `parentid`, `sortid`, `url`, `name`, `desc`, `seclevel`) VALUES
(1, 0, 0, 'index.php', 'Home', 'Return to the website''s home page', 0),
(2, 0, 1, 'Search.php', 'Search', 'Search for what you need', 0),
(3, 0, 2, '#', 'About This Site', 'All you ever wanted to know about this site', 0),
(4, 3, 1, '#', 'FAQs', 'Frequently Asked Questions (and Frequently Questioned Answers)', 0),
(5, 4, 1, 'Advertising_FAQ.php', 'FAQ for advertisers', 'The Important Stuff for advertisers.', 0),
(6, 4, 2, 'User_FAQ.php', 'FAQ for users', 'Frequently Asked Questions (and Frequently Questioned Answers) for Users', 0),
(7, 3, 3, 'Add_Stuff.php', 'Add Stuff', 'Add Some Stuff', 0),
(8, 3, 4, 'Costs.php', 'Costs', 'What part of FREE didn''t you understand?', 0),
(9, 8, 2, 'test1.php', 'Test 1', 'This is the first test', 0),
(10, 8, 1, 'test2.php', 'Test 2', 'This is the second Test', 0),
(11, 0, 10, '#', 'Admin', 'The Admin Area', 10),
(12, 11, 1, '#', 'Reports', 'Various reports', 10),
(13, 16, 2, '#', 'Edit a Record', 'Admin can edit a record''s content here', 10),
(14, 12, 1, 'Admin_listall.php', 'List All ', 'List every little record that there is', 10),
(15, 16, 2, 'Admin_Delete.php', 'Delete a Record', 'Be Careful. Once it''s gone, it''s gone!', 1),
(16, 11, 2, '#', 'Manage Stuff', '', 10),
(17, 11, 5, '#', 'Edit Menu', 'Edit the Actual menu Items', 0),
(18, 17, 1, 'Admin_Edit_Menu.php', 'Edit Menu', 'Edit the Actual menu Items', 10),
(19, 0, 0, 'https://sourceforge.net/projects/dynamicjqueryme/', 'SourceForge Project', 'Source Forge Project Page', 0),
(20, 19, 1, 'https://sourceforge.net/projects/dynamicjqueryme/files/', 'Project Files', 'Project Files', 0),
(21, 19, 2, 'https://sourceforge.net/projects/dynamicjqueryme/support', 'Support', 'Support Page', 0);


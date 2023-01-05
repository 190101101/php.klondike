-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Янв 05 2023 г., 06:29
-- Версия сервера: 10.4.27-MariaDB
-- Версия PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `fsociety`
--

-- --------------------------------------------------------

--
-- Структура таблицы `ad`
--

CREATE TABLE `ad` (
  `ad_id` int(11) NOT NULL,
  `table_name` varchar(30) NOT NULL DEFAULT 'ad',
  `ad_title` varchar(50) NOT NULL,
  `ad_link` varchar(200) NOT NULL,
  `ad_content` varchar(200) NOT NULL,
  `ad_status` int(11) NOT NULL DEFAULT 1,
  `ad_created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `ad_updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `ad`
--

INSERT INTO `ad` (`ad_id`, `table_name`, `ad_title`, `ad_link`, `ad_content`, `ad_status`, `ad_created_at`, `ad_updated_at`) VALUES
(2, 'ad', 'Онлайн-курс «DevOps практики и инструменты»: пройд', 'https://www.youtube.com/', 'Онлайн-курс «DevOps практики и инструменты»: пройдите вступительный тест', 1, '2022-07-13 21:06:25', '2022-07-13 21:06:25'),
(3, 'ad', 'Хостинг Ukraine - Качественный хостинг, лучший в с', 'https://www.youtube.com/', 'Хостинг Ukraine - Качественный хостинг, лучший в соотношении цена/качество', 1, '2022-07-13 21:06:35', '2022-07-13 21:06:35'),
(4, 'ad', 'ТОП 70 программ для Windows за всё время!', 'https://www.youtube.com/', 'ТОП 70 программ для Windows за всё время!', 1, '2022-07-13 21:06:44', '2022-07-13 21:06:44'),
(5, 'ad', 'Как ускорить интернет до предела?', 'https://www.youtube.com/', 'Как ускорить интернет до предела?', 1, '2022-07-13 21:06:51', '2022-07-13 21:06:51'),
(6, 'ad', 'Как ускорить Windows в несколько раз?', 'https://www.youtube.com/', 'Как ускорить Windows в несколько раз?', 1, '2022-07-13 21:07:00', '2022-07-13 21:07:00');

-- --------------------------------------------------------

--
-- Структура таблицы `article`
--

CREATE TABLE `article` (
  `article_id` int(11) NOT NULL,
  `table_name` varchar(22) NOT NULL DEFAULT 'article',
  `category_id` int(11) NOT NULL,
  `article_imagesize` int(11) NOT NULL,
  `article_archivesize` varchar(50) DEFAULT NULL,
  `article_archive` varchar(100) DEFAULT NULL,
  `article_image` varchar(100) NOT NULL DEFAULT '',
  `article_color` varchar(50) NOT NULL DEFAULT '#8ac832',
  `article_title` varchar(120) NOT NULL,
  `article_slug` varchar(100) NOT NULL,
  `article_video` varchar(50) NOT NULL,
  `article_content` text NOT NULL,
  `article_download` int(11) NOT NULL,
  `article_view` int(11) NOT NULL,
  `article_status` int(11) NOT NULL DEFAULT 1,
  `article_created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `article_updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `article`
--

INSERT INTO `article` (`article_id`, `table_name`, `category_id`, `article_imagesize`, `article_archivesize`, `article_archive`, `article_image`, `article_color`, `article_title`, `article_slug`, `article_video`, `article_content`, `article_download`, `article_view`, `article_status`, `article_created_at`, `article_updated_at`) VALUES
(25, 'article', 3, 71430, '2.17 MB', '188iCOHQNxhQq2hDQqJlEZdfIk4krRA36', '62cda92820ab4.jpg', '#8ac832', 'Appetizer - Software for desktop organization', 'appetizer-software-for-desktop-organization', '', '<p>\r\nIn earlier versions of Windows, you could move programs and folders using the Control Panel interface by clicking on their icons. However, it was tedious to keep track of the items you want to move, right-click them, and then choose \"move\" or \"change\". Also, when you finally moved them, they were no longer in the same spot on the desktop or taskbar. That\'s why the latest version of the Windows XP Ultimate Display Control Panel introduced an Import Manager to simplify the desktop and minimize the time it takes to explore and select files and folders. With the Import Manager, all you have to do is choose from a wide variety of categories, click OK, and then Import.\r\n</p>\r\n\r\n<p>\r\nThe Import Manager allows you to save many more shortcuts than those available in the Windows sidebar. In addition, it allows you to drag shortcuts to your desktop or taskbar. Finally, there is no longer a need to use the Windows sidebar for snacks and launch applications directly from there. You can access your snack files from the Windows sidebar or desktop toolbars, creating a clutter-free environment that is quick and easy to use. The Windows sidebar and dock are also more useful than ever, making using a snack easier than ever before.\r\n</p>', 10, 0, 1, '2022-07-12 17:02:32', '2022-07-12 17:24:55'),
(26, 'article', 3, 33364, '64 MB', '1L64eJq_MKBOYw65eBppz-HosS9tR6K5l', '62cdaae82a0b1.jpg', '#8ac832', 'Hyper - Cross-platform command line terminal', 'hyper-cross-platform-command-line-terminal', '', '<p>\r\nHyper is a cross-platform command line terminal completely developed using open source tools and web standards. It runs on the Electron platform, much like Slack or Brave Browser. It also uses CSS, JavaScript and HTML technologies.\r\n</p>\r\n\r\n<p>\r\nThe terminal has a well-developed API for third-party developers to implement all sorts of extensions. These are generic modules built on Node.js that can provide a number of basic methods in a very flexible way.\r\n</p>', 4, 0, 1, '2022-07-12 17:10:00', '2022-07-12 17:24:52'),
(27, 'article', 3, 54586, '76.1 KB', '1A4t7ix7ol0l3MT_byxD-cYL2OkVlFDN2', '62cdaba55f3a5.jpg', '#8ac832', 'New Folder Wizard - Tool to create thousands of named folders and subfolders', 'new-folder-wizard-tool-to-create-thousands-of-named-folders-and-subfolders', '', '<p>\r\nOptions include file numbering, vault prelinking (creating the vault after deleting a folder), populating the folder root, using a plain text file as the naming source, and giving the folder a unique name for each person. file.\r\n</p>\r\n\r\n<p>\r\nThe most important part of this whole process is naming the folders. When you use a plain text file as the naming source, you have no flexibility. All folders will have the same name with the same extension. What you can do is change the folder name extension if you want to give each of them a unique name. This allows you to create unique folders for each document in Outlook Express or another program.\r\n</p>', 2, 0, 1, '2022-07-12 17:13:09', '2022-07-12 17:24:44'),
(28, 'article', 3, 63372, '37.7 MB', '1jbLHg8Z2kkDz4XdYmk9td033zZGt_BKp', '62cdac5447ce8.jpg', '#8ac832', 'Nexus - Docking Station for Windows', 'nexus-docking-station-for-windows', '', '<p>\r\nNexus can be configured to mimic an iOS-style home screen. In addition, using special effects, you can make your computer the way you want it to be.\r\n</p>\r\n\r\n<p>\r\nThe Start tab in Windows isn\'t as customizable as some would like it to be. Also, in some ways it can be limiting and inefficient. Another problem is that it sometimes moves at a snail\'s pace. Therefore, companies have created docks that can replace the standard menu.\r\n</p>\r\n\r\n<p>\r\niOS systems come with a built-in dock and that\'s how you get around on a Mac. Winstep took the same concept and made it available on Windows, improving it. One thing is that it is not available for Linux operating systems.\r\n</p>', 0, 0, 1, '2022-07-12 17:16:04', '2022-07-12 17:24:40'),
(30, 'article', 3, 63962, '6.16 MB', '16Nj5zNFqL0SS49mrkgxcFGBRnND5hyNa', '62cdb05a32804.jpg', '#8ac832', 'Ventoy - A tool that uses ISO images to create bootable USB devices', 'ventoy-a-tool-that-uses-iso-images-to-create-bootable-usb-devices', '', '<p>\r\nSeveral programs such as YUMI and Rufus exist as well-established tools to help create bootable USB drives. However, they use the traditional method of extracting the ISO file to USB to make it bootable, which reduces the number of possible device applications to just one.\r\n</p>\r\n<p>\r\nVentoy introduces a new approach that allows you to save files to a USB drive and boot directly from it. This way you can put multiple images on the same device and use them as needed.\r\n</p>', 0, 0, 1, '2022-07-12 17:32:55', '2022-07-12 17:33:14'),
(31, 'article', 3, 73223, '2.50 MB', '1JuYoWq_a2zm4xx0fePWfZK1mxJYPH7zG', '62cdb0dfc4123.jpg', '#8ac832', 'ShowMyPC - A tool to get remote access to another PC', 'showmypc-a-tool-to-get-remote-access-to-another-pc', '', '<p>\r\nShowMyPC allows you to take screenshots and chat with another user using a graphical interface on the program\'s web page. Another added benefit is that you can also save your work on a PC on another system, such as a CD/DVD drive, to share it with a friend using the program\'s web page.\r\n</p>\r\n\r\n<p>\r\nThe best part of showmypc is that you can use it anytime, like when you\'re not physically available on your workstation. And if you\'re sick or unwell, you won\'t have to miss work so easily. All you need to do is just click on the showmypc icon and you will be automatically connected to another user. You can get all the benefits of the paid version of showmypc. Take advantage of the free trial and feel the difference!\r\n</p>\r\n\r\n<p>\r\nThere are many benefits you can get from using ShowMyPC. This can help you keep your work safe even when you\'re not around. You can use the Windows desktop to browse online sites or communicate with people. And if you want, you can also securely access your home office service from a remote location using the same software.\r\n</p>', 0, 0, 1, '2022-07-12 17:35:28', '2022-07-12 17:35:50'),
(32, 'article', 3, 73223, '677 KB', '1Vmn0T6wsgrjYU38yYznJEjMTXHgk9jaP', '62cdb1651deb9.jpg', '#8ac832', 'RidNacs - Simple Registry Cleaner', 'ridnacs-simple-registry-cleaner', '', '<p>\r\nThe familiar graphical interface of the Windows file manager gives the user an easy way to quickly explore and recognize the largest and most numerous files on your computer. The software reports the size of each file, the file name, the location of the file, the number of kilobytes for each file, and the time for each file.\r\n</p>\r\n\r\n<p>\r\nRidNacs can be used to perform a variety of functions such as hard drive defragmentation, allocation tracking, performance monitoring, and security and application monitoring. These utilities will help you keep track of your programs and applications that are currently using a lot of resources such as memory, hard disk space, processing power, and other resources. The detailed report provides details on the following information: total space used by all applications, total space used by all folders, total size of all files, time spent opening each file, and the number of errors encountered. The program also reports boot time, Windows startup errors, total time required for a full boot, minimum memory allowed to run all programs, total hard disk space used, free hard disk space used, and average. the speed of all processes when loading. The utility can be launched from the control panel by going to \"Control Panel Settings\".\r\n</p>', 0, 0, 1, '2022-07-12 17:37:41', '2022-07-12 17:40:02'),
(33, 'article', 3, 66526, '554 KB', '1mnkd_lBSVeURRZgZ7M0fzq_5VCdf0Vk2', '62cdb1e17dd51.jpg', '#8ac832', 'PC Fixer - Software for data recovery', 'pc-fixer-software-for-data-recovery', '', '<p>\r\nThe enhanced version of PC Fixer has been updated with the latest version of Service Pack 1 for Windows XP. With this update, the application received support for various new features such as start menu, taskbar, desktop environment, task management, auto shutdown, support. for multiple installations and updates, etc. However, the biggest improvement is the digital support provided by this software utility. Digital support means you can get the full software without paying a cent for it. With the support of Windows XP, the application becomes more powerful as it supports scanning not only for corrupted files, but also for invalid shortcuts, missing files, corrupted folders, outdated drivers, etc. With this advanced feature, your computer will always be protected from any form of damage.\r\n</p>\r\n\r\n<p>\r\nThe enhanced version of PC Fixer has been updated with the latest version of Service Pack 1 for Windows XP. With this update, the application received support for various new features such as start menu, taskbar, desktop environment, task management, auto shutdown, support. for multiple installations and updates, etc. However, the biggest improvement is the digital support provided by this software utility. Digital support means you can get the full software without paying a cent for it. With the support of Windows XP, the application becomes more powerful as it supports scanning not only for corrupted files, but also for invalid shortcuts, missing files, corrupted folders, outdated drivers, etc. With this advanced feature, your computer will always be protected from any form of damage.\r\n</p>', 0, 0, 1, '2022-07-12 17:39:45', '2022-07-12 17:40:06'),
(34, 'article', 3, 52516, '51.2 KB', '1KAe03O06VUjlpNz7atxkY_A66mD2-21D', '62cdb2d8daeb3.jpg', '#8ac832', 'Zip Files Opener - A handy utility for working with zip files', 'zip-files-opener-a-handy-utility-for-working-with-zip-files', '', '<p>\r\nYou can quickly find and extract all the information on a computer or even on a remote server without the help of any program. With this utility, you can also manage multiple Zip files at the same time without any hiccups.\r\n</p>\r\n<p>\r\nThis Zip file opener is an extremely powerful program that will allow you to extract or create a Zip archive for any purpose. Before you can start using the Zip File Opener, you must create an empty Zip file. Just click \"Create\" and follow the wizard. After creating a Zip file, it is recommended to compress it to a certain size. It is generally recommended to compress a Zip file to at least one megabyte, especially if you are using it on a Windows computer.\r\n</p>', 0, 0, 1, '2022-07-12 17:43:53', '2022-07-12 17:43:53'),
(35, 'article', 3, 118411, '6.40 MB', '1Dvwprgwxmq0WAiu__4vY1Xz8r54lX1gV', '62cdb33c6612e.jpg', '#8ac832', 'RAR Password Cracker - Hacking Software', 'rar-password-cracker-hacking-software', '', '<p>\r\nThis is a small application that easily cracks the \"secrets\" and codes of all RAR files. And unlike some other programs, this one has a password up to 64Kbps. This means that even if someone manages to access your file containing one or more confidential passwords, they will have no way of knowing anything else about you other than your credit card number, which they can very easily steal.\r\n</p>\r\n<p>\r\nThis makes RAR password cracker the best way to securely extract all important information from your sensitive archive files without worrying about your data being compromised. In fact, the statistics-based approach requires only one instance of the cracking process to run, which means that you no longer have to worry about losing any data.\r\n</p>', 6, 0, 1, '2022-07-12 17:45:32', '2022-07-12 17:49:52'),
(36, 'article', 3, 67068, '133 KB', '1QAInhu7wj0rDD4V6M_Lw7emQok84v8iE', '62cdb40a61000.jpg', '#8ac832', 'FileASSASSIN - Malicious software for collecting personal data', 'fileassassin-malicious-software-for-collecting-personal-data', '', '<p>\r\nThe first goal is to try to get your personal details (name, address, phone number, etc.) off your hard drive and use that information to carry out other attacks. The second is to try to download itself into your Windows system as a Trojan and impersonate an operating system program. Thus, it can infect your system, remove any system files like dlls, settings, etc. and can spread to other computers on the network if you are not careful. The truly remarkable fact about this particular virus is that it can infect not only Windows PCs, but also Macs (via a fake email attachment) and even Linux computers. This means that if you want to get rid of this virus, you need to remove all parts of it, not just the symptoms that caused your problems.\r\n</p>\r\n<p>\r\nTo remove fileassassin you need to be able to use a program called \"MalwareBytes\" which can scan your computer and fix all infected parts of this virus. This virus works by installing itself on your Windows operating system, modifying some files and settings on your computer, and then infiltrating all major system files on your computer. From there, it will modify various components of your system (depending on the type of virus) and then perform the desired task. For example, it will delete various important system files that Windows needs to run. To make sure your computer is free from this infection, you should download a reliable anti-malware program like Malwarebytes and let it perform a full system scan.\r\n</p>\r\n<p>\r\nIf, after using the program, you find that it cannot remove the virus, then it is recommended that you use a \"registry cleaner\" to clean your PC and fix any corrupted settings left behind by the malicious application. One of the effective ways to remove fileassassin is to use a registry cleaner tool that can scan your PC and fix various settings that FileASSIN has placed on your system. You can use these programs by downloading one of them from the Internet and then letting it fix any corrupted files left behind by the virus. These tools are usually very effective and can guarantee the security and reliability of your PC.\r\n</p>', 0, 0, 1, '2022-07-12 17:48:58', '2022-07-12 17:48:58'),
(37, 'article', 3, 51270, '1.28 MB', '1LatD6sbgEFrxDE_K6MegYj4e1hkLr-1V', '62cdb4a3c24a3.jpg', '#8ac832', 'EasyCleaner - Software for viewing registry databases', 'easycleaner-software-for-viewing-registry-databases', '', '<p>\r\nHowever, as you may already know, deleting files from the Windows registry is extremely dangerous for the operating system, so you need to create a restore point in advance. It is recommended that you do this on a secondary operating system so that you can restore your system to an earlier date if necessary.\r\n</p>\r\n<p>\r\nWhen you first start EasyCleaner, it will scan your computer and should show you a list of all the files it finds. This list will then allow you to select all the files you wish to remove from your PC. Just highlight all the files you want to delete and then click \"Delete\". It should be noted that EasyCleaner does not always remove all files from windows and this often results in some files remaining. You can choose Save or Recycle Bin to restore these files to their original location.\r\n</p>', 0, 0, 1, '2022-07-12 17:51:32', '2022-07-12 17:51:32'),
(38, 'article', 3, 79335, '28.4 MB', '187shd_jUJJczosjLWK4IMMLG2CJDYyXu', '62cdb574a803b.jpg', '#8ac832', 'Porn Terminator - Cleaning the registry and removing pornographic files', 'porn-terminator-cleaning-the-registry-and-removing-pornographic-files', '', '<p>\r\nThis program is designed by an expert with many years of experience in the removal of pornography and other Internet addictions. The main task of this program is to identify pornographic files before they are deleted by the system, which will allow the computer to work normally again. It can remove not only pornography, but also the accompanying spyware that often accompanies it.\r\n</p>\r\n<p>\r\nThis software is available for both Windows and Mac users and has been designed in such a way that it has gained a lot of popularity in a short time. An advanced scanning engine ensures that your computer remains clean of all unwanted files and errors. Most computer systems are overloaded with unused registry files, which slows down Windows. This free registry cleaner is an effective and easy way to speed up your computer system and even fix minor software loading problems. This program is easy to use; all it takes is a few clicks to run a scan, after which the program will safely remove all junk files and fix registry errors.\r\n</p>', 0, 0, 1, '2022-07-12 17:55:00', '2022-07-12 17:55:00'),
(39, 'article', 3, 51906, '708 KB', '1CeSz0JUlb48ted_EhcjtTcyfIpkfVcLM', '62cdb6529ac83.jpg', '#8ac832', 'AppCleaner - Cleans the computer\'s registry and files', 'appcleaner-cleans-the-computer-s-registry-and-files', '', '<p>\r\nThe software can improve the performance of a sluggish computer system by freeing up hard drive space and system resources. The program can also remove malware, spyware, adware, trojans, cookies, spam, invalid numbers, viruses, and other malicious objects from your computer. \r\n</p>\r\n\r\n<p>\r\nUsers can set AppCleaner to periodically scan their computers. The program then finds and removes various unwanted programs, which reduces the size of the hard drive, improving its overall performance. By running AppCleaner, users free up more disk space that can be used to store data and additional applications. There are several important benefits of using AppCleaner that make it one of the most popular Windows and application registry cleaners.\r\n</p>\r\n\r\n<p>\r\nThere are many other similar programs that offer the same features as AppCleaner, such as Adaware or FixRedirects. However, they also have a number of disadvantages. Adaware is a much less reliable program that doesn\'t clean as well as AppCleaner, sometimes causing errors on your system. It also takes up a lot of free space on your computer. Another disadvantage of such programs is that they do not work in all types of operating systems.\r\n</p>', 0, 0, 1, '2022-07-12 17:58:42', '2022-07-12 17:58:42'),
(40, 'article', 3, 56548, '12.2 MB', '1hWCXw0KGMAo0PfC6gUMeadUjZBoUBXaD', '62cdb6d27d9a1.jpg', '#8ac832', 'Deep Freeze Standard - Reset PC to a certain point', 'deep-freeze-standard-reset-pc-to-a-certain-point', '', '<p>\r\n  Full protection against user errors\r\n</p>\r\n\r\n<p>\r\nMany companies, schools, and other institutions have computers that are used by multiple people over a period of time. These processes mean that sensitive information or corruption may remain on the computer during the process.\r\n</p>\r\n\r\n<p>\r\nThe purpose of this software is the long term health of the PC. The main problem here is protecting the computer from wear and tear.\r\n</p>\r\n\r\n<p>\r\nWhat is deep freeze?\r\n</p>\r\n\r\n<p>\r\nThis application will reset your computer to a certain point. This process is called freezing the system at a certain point. Whether it\'s a single computer or multiple connections in one operation, this program has it all.\r\n</p>', 2, 0, 1, '2022-07-12 18:00:50', '2022-07-12 18:01:04'),
(41, 'article', 3, 56435, '5.47 MB', '10hqrx7f4ph9n0qaTaMbTRrx1VuqsFPqm', '62cdb7579dfb4.jpg', '#8ac832', 'DriverMax - Safe driver installer', 'drivermax-safe-driver-installer', '', '<p>\r\nWhile Drivermax is an easy-to-use open source driver installer used by millions, you can also try Snappy Driver Installer Origin. This is another free and open source tool that can work well even without an internet connection. Another free source is DriversCloud, a cloud-based driver installer.\r\n</p>\r\n\r\n<p>\r\nMaximum security\r\n</p>\r\n\r\n<p>\r\nOne of the most important aspects of driver installation is security and stability. Before installing Drivermax on the device, the program carefully scans all controllers. This is done to check for viruses and any other threats that could cause long-term damage to your computer\r\n</p>', 0, 0, 1, '2022-07-12 18:03:04', '2022-07-12 18:03:20'),
(42, 'article', 3, 63307, '5.56 MB', '1McLucz_QfhVGwYje3SFTLFVD-Mzh8JyW', '62cdb7c45bcd9.jpg', '#8ac832', 'Free IP Tools - Powerful network monitoring tool', 'free-ip-tools-powerful-network-monitoring-tool', '', '<p>\r\nIt can provide the user with a complete logging and reporting solution with a range of advanced features and advanced options to choose from in order to monitor and control any traffic passing through a computer or router. Moreover, this tool is one of the most powerful network monitoring tools available for the Windows platform.\r\n</p>\r\n<p>\r\nWith Free IP Tools, network monitoring becomes not only simple, but also customizable, as there are many additional options for configuring DNS settings, as well as blocking certain ports.\r\n</p>', 2, 0, 1, '2022-07-12 18:04:52', '2022-07-12 18:04:52'),
(43, 'article', 3, 51627, '76.4 MB', '1JUqTAo2aDHCaRjtZ6uwC9O9XFPxNkmNt', '62cdb850b2c48.jpg', '#8ac832', '1.1.1.1 w/ WARP - Secure Internet connection with WireGuard', '1-1-1-1-w-warp-secure-internet-connection-with-wireguard', '', '<p> With WARP, everyone can have a private, secure and fast internet. BoringTun encrypts traffic from your device and sends it to Cloudflare Edge. Argo Smart Routing finds the fastest path through the global network of data centers to provide faster Internet access. </p> <p> Application features </p> <p> This app improves security by encrypting your device data so that cybercriminals cannot eavesdrop on you. You have the right to privacy and the developers of this application will never sell your data. You can expand the functionality by subscribing to WARP Plus to speed up your Internet. The WARP connection is fast, reliable and built on 1.1.1.1, the fastest DNS resolver. </p>', 0, 0, 1, '2022-07-12 18:07:12', '2022-07-12 18:07:12'),
(44, 'article', 3, 60635, '7.56 MB', '1d2iMy80Y2yY-6J-zuKK80qAAUO2CB0pt', '62cdb8f685493.jpg', '#8ac832', 'Aircrack-ng - Программа для взлома ключей', 'aircrack-ng-programma-dlya-vzloma-klyuchej', '', '<p>\r\nThe application works by implementing the standard FMS attack along with some optimizations such as the KoreK attacks as well as the PTW attack. This will greatly speed up the attack compared to other WEP cracking tools.\r\n</p>\r\n\r\n<p>\r\nAircrack-ng is a set of tools for auditing wireless networks. The interface is standard, and you will need some command usage skills to work with this application.\r\n</p>\r\n\r\n<p>\r\nKey new features include:\r\n</p>\r\n\r\n<p>\r\nThe best documentation and support.\r\n</p>\r\n\r\n<p>\r\nMore cards/drivers supported.\r\n</p>\r\n\r\n<p>\r\nMore OS and platforms supported.\r\n</p>\r\n\r\n<p>\r\nPTW attack.\r\n</p>\r\n\r\n<p>\r\nWEP dictionary attack.\r\n</p>\r\n\r\n<p>\r\nfragmentation attack.\r\n</p>\r\n\r\n<p>\r\nWPA migration mode.\r\n</p>\r\n\r\n<p>\r\nIncreased hack speed.\r\n</p>', 0, 0, 1, '2022-07-12 18:09:35', '2022-07-12 18:09:58'),
(45, 'article', 3, 93160, '411 MB', '1GqnBqyRMsd73myVwL10sa2tsMeKxEsvl', '62cdb9b59b2c5.jpg', '#8ac832', 'NetBeans IDE - Java Based Application Development', 'netbeans-ide-java-based-application-development', '', '<p>\r\nHowever, it also has extensions for C/C++, PHP, HTML5, and more. It allows users to develop applications using these languages in a single module program. The IDE also boasts a worldwide developer community.\r\n</p>\r\n\r\n<p>\r\nJava development package\r\n</p>\r\n\r\n<p>\r\nNetBeans features a robust, modular IDE architecture and is the leading environment for Java-based applications. It focuses on innovative solutions that reduce coding time and lifetime to improve audience experience.\r\n</p>\r\n\r\n<p>\r\nIn general, the assignment of packages, automated functions, and handy tools helps developers build applications more efficiently and quickly.\r\n</p>', 0, 0, 1, '2022-07-12 18:13:09', '2022-07-12 18:13:09'),
(46, 'article', 3, 56948, '1.06 MB', '16mOjrBxRhEENhqM7iJt9-DnJatbmLnGO', '62cdba3805809.jpg', '#8ac832', 'Trojan Killer Portable - Malware Removal Software', 'trojan-killer-portable-malware-removal-software', '', '<p>\r\nWith Trojan Killer Portable you can scan and disinfect computers wherever you are without installation. This helps you stay protected from cyber threats and keep your personal data safe, no matter what computer you use or where you use it.\r\n</p>\r\n\r\n<p>\r\nTrojan Killer Portable is a great tool that can automatically remove viruses, bots, spyware, keyloggers, trojans, malware and rootkits without having to manually edit system files or the Windows registry.\r\n</p>\r\n\r\n<p>\r\nIn addition, Trojan Killer Portable fixes sy\r\n</p>', 0, 0, 1, '2022-07-12 18:15:20', '2022-07-12 18:15:20'),
(47, 'article', 3, 59050, '596 KB', '1tsbYpBdFCRdAggdw2E8R7_WxbRqKywfI', '62cdbab1c3b17.jpg', '#8ac832', 'Whois - Finding information about a domain', 'whois-finding-information-about-a-domain', '', '<p>\r\nWhois records contain detailed information about a domain, such as its name, address, email address, phone number, etc. Recently, a new trend has emerged in the field of web marketing and web marketing, dubbed \"nslookup\".\r\n</p>\r\n<p>\r\nNsedo is a powerful Whois checker that supports searching multiple domains and domain names in one simple interface. With the Whois checker, you can find Whois details for any domain name, including ICANN, gTLDs, ccTLDs, TLDs, and DNS names. Nsedo works with various protocols and operating systems such as Windows, Linux, UNIX and MAC. It is written in the Java, C or Python programming languages and runs from the command line on the Win32 platform. Nsedo guarantees complete Whois integrity and unrestricted access to all Whois resources.\r\n</p>', 0, 0, 1, '2022-07-12 18:17:22', '2022-07-12 18:17:22'),
(48, 'article', 3, 54247, '41.6 KB', '1Ou335vP5-mQHF3VI6nju2-YIA6ssX4gm', '62cdbb4bc22f9.jpg', '#8ac832', 'Password Cracker - Password Cracking Software', 'password-cracker-password-cracking-software', '', '<p>\r\nOne of the main security measures that almost all websites and apps use is password protection, and while passwords usually do their job of protecting accounts, they can be a source of frustration when lost or forgotten. This is becoming especially common these days when websites require users to create passwords with capital letters as well as a combination of letters and numbers. Luckily, there are apps like Password Cracker by G and G Software that can help with this puzzle.\r\n</p>\r\n\r\n<p>\r\nThe tool is also portable. It comes as a ZIP file that only needs to be unpacked to run the program. You do not need to install the tool, you can even run it from a USB drive.\r\n</p>', 0, 0, 1, '2022-07-12 18:19:56', '2022-07-12 18:19:56'),
(49, 'article', 3, 64241, '4.14 MB', '15dpESUEVKkYvualIBvi1uDV6AA2N_MPp', '62cdbc56f26cf.jpg', '#8ac832', 'netcut - Software to determine who is in your wireless or wired network', 'netcut-software-to-determine-who-is-in-your-wireless-or-wired-network', '', '<p>\r\nNetcut works in office LAN, school LAN/ISP LAN or even Iphone/Xbox/Wii/PS3andriod/andriod network\r\n</p>\r\n\r\n<p>\r\nNetCut can find/export all MAC addresses on your network in seconds\r\n</p>\r\n\r\n<p>\r\nNetCut can turn the network off and on on any device, computer/phone/Xbox/Wi-Fi/router/switch on your local network.\r\n</p>\r\n\r\n<p>\r\nNetCut can protect the user from ARP SPOOF attacks\r\n</p>\r\n\r\n<p>\r\nMoreover, netCut can change the MAC address on any adapter.\r\n</p>\r\n\r\n<p>\r\nLast but not least, with Netcut you can clone the MAC address from any device on your network to your own adapter.\r\n</p>\r\n\r\n<p>\r\nNo network knowledge is required to use this tool, just run it and you will see all IP, MAC and device names in your network, then you can control/change MAC/turn on/off by pressing buttons. also just leave it running in the background to protect you from an ARP spoofing attack.\r\n</p>', 0, 0, 1, '2022-07-12 18:24:23', '2022-07-12 18:24:23'),
(50, 'article', 3, 39659, '17.3 MB', '1TsSvyCiDapEs-81Y82ZBE8b4MeOMDc7m', '62cdbcaf83081.jpg', '#8ac832', 'ownCloud - Own cloud server', 'owncloud-own-cloud-server', '', '<p>\r\nAccess to your data\r\n</p>\r\n<p>\r\nStore your files, folders, contacts, photo galleries, calendars and more on the server of your choice. Access this folder from a mobile device, desktop or web browser. Access your data wherever you are, when you need it.\r\n</p>\r\n<p>\r\nSynchronize your data\r\n</p>\r\n<p>\r\nSync your files, contacts, photo galleries, calendars and more between your devices. One folder, two folders and more - get the most up-to-date version of your files with the desktop and web client or mobile app of your choice at any time.\r\n</p>', 0, 0, 1, '2022-07-12 18:25:51', '2022-07-12 18:25:51'),
(51, 'article', 3, 74579, '112 MB', '1FxwJgZnzik1HD_c_95aGKiOcZaQsKOyX', '62cdbd0515bb5.jpg', '#8ac832', 'Audials Music - The app to store music and movies the way you want', 'audials-music-the-app-to-store-music-and-movies-the-way-you-want', '', '<p>\r\nRecording streaming music as individual pieces of music\r\n</p>\r\n<p>\r\nRecord all major streaming services\r\n</p>\r\n<p>\r\nOptimized for Spotify, Deezer, Napster, Tidal, YouTube, Dailymotion, Vimeo, Veoh, Soundcloud and more.\r\n</p>\r\n<p>\r\nFingerprint song recognition lets you record any source\r\n</p>\r\n<p>\r\nSupport recording via sound card and download\r\n</p>\r\n<p>\r\nRecords locally installed software or web player\r\n</p>\r\n<p>\r\nSaves individual songs with titles\r\n</p>', 2, 0, 1, '2022-07-12 18:27:17', '2022-07-12 18:29:31'),
(52, 'article', 3, 78532, '3.13 MB', '1KhyKbiKovjfISZ-6oLcCMmnFCeq37rNh', '62cdca4d5e9ca.jpg', '#8ac832', 'Startup Sentinel - Fast and secure startup of your PC', 'startup-sentinel-fast-and-secure-startup-of-your-pc', '', '<p>\r\nEach individual program added to your launch sequence is detected on the fly and can be approved, rejected or blacklisted (for further automatic rejection by SuS)\r\n</p>\r\n<p>\r\nFunctions:\r\n</p>\r\n<p>\r\nAutomatic detection of startup software\r\n</p>\r\n<p>\r\nWhitelisting Trusted Allowed Software\r\n</p>\r\n<p>\r\nBlacklisting Malicious or Unwanted Software\r\n</p>\r\n<p>\r\nInternationalization support.\r\n</p>', 2, 0, 1, '2022-07-12 19:23:57', '2022-07-12 19:26:32'),
(53, 'article', 3, 84407, '9.85 MB', '1_xhyjrymQ7l-5eZpwWKn9G58q20Azjj9', '62cdcb6faeb10.jpg', '#8ac832', 'PrivaZer - Clean up all privacy and traces from your PC', 'privazer-clean-up-all-privacy-and-traces-from-your-pc', '', '<p>\r\nPrivaZer can permanently erase all traces using secure deletion methods, as well as zero out your free disk sectors to remove all traces of previous deletions.\r\n</p>\r\n<p>\r\nThe initial scanning and cleaning process may take a little time (20-30 minutes), depending on the size of your disks and the number of traces found. Other features include scheduled cleanup, support for removable drives and USB keys, automatic registry backup, USB history deletion, and more.\r\n</p>\r\n\r\n', 0, 0, 1, '2022-07-12 19:28:47', '2022-07-12 19:28:47'),
(54, 'article', 3, 71745, '109 MB', '1EsjDJqbyt9YSIoG5RdKjg3SOaIypt44S', '62cdcc3c3e7bc.jpg', '#8ac832', 'FileOptimizer - File optimizer', 'fileoptimizer-file-optimizer', '', '<p>\r\nFileOptimizer is a lossless file size optimizer supporting BMP, DIB, DLL, BPL, DRV, LZL, SYS, CHM, CHS, CHW, DOC, DOT, FPX, MDB, MDT, MIX, MPD, MPP, MPT, MSI, MSP, MST, ONE, OST, PPS, PPT, PUB, PUZ STICKYNOTES, SNT THUMBS, DB, VSD, VST, VSS, XL, XLC, XLM, XLS, XLW, XSF, XSN, EXE, SCR, GIF, GZ, TGZ, SVGZ, JNG, JPG, JPEG, MNG, MP3, OBJ, O, LIB, A, OGG, OGV, DCX, PCC, PCX, EPDF, PDF, APNG, ICO, PNG, SWF, FAX, TIF, TIFF, PTIF, PTIFF, WEBP, AIR, APK, APPX, CBZ, DOCM, DOCX, DOTX, DOTM, DWFX, EPUB, IPA, JAR, MPP, ODT, OXPS, PPAM, POTM, POTX, PPSM, PPSX, PPTM, PPTX, PUB, SLDM, SLDX, VDX, VTX, VSX, XAP, XLAM, XLSM, XLSX, XLTM, XLTX, XPS, ZIP, AAI, AVS, FITS, JP2, JPC, HDR, HRZ, MIF, MIFF, MTV, OTB, P7, PALM, PDB, PBM, PCD, PCDS, PFM, PGM, PICON, PIC, PICT, PNM, PPM, PSB, PSD, SUN, VICAR, VIFF, WBMP, XBM, XPM and XWD among other file formats.\r\n</p>\r\n<p>\r\nIt keeps the behavior of the file unchanged, but its size is reduced through several recompression and optimization techniques.\r\n</p>', 0, 0, 1, '2022-07-12 19:32:12', '2022-07-12 19:33:22'),
(55, 'article', 3, 61775, '20.6 MB', '1o9sfo9yivadr6nIi3NSZzskVjgNWnYiF', '62cdcce5ca42c.jpg', '#8ac832', 'Clean Master - Clean up your PC from junk and speed up', 'clean-master-clean-up-your-pc-from-junk-and-speed-up', '', '<p>\r\nGarbage cleaning\r\n</p>\r\n<p>\r\nOur advanced system scans over 1000 programs. With just one click, you can clean up residual system junk files to completely free up your computer\'s memory!\r\n</p>\r\n<p>\r\nImprove PC performance\r\n</p>\r\n<p>\r\nSay goodbye to system lags! With one click, you can stop unnecessary startup programs, speed up boot times, and intelligently optimize system and network settings.\r\n</p>\r\n<p>\r\nConfidentiality\r\n</p>\r\n<p>\r\nWith one click, you can eliminate 6 types of privacy threats. Block intruders and remove dangerous browsing records with Tracking Protection.\r\n</p>', 0, 0, 1, '2022-07-12 19:35:02', '2022-07-12 19:35:02'),
(56, 'article', 3, 101383, '3.36 MB', '1Y84eg2OZD3EJCfQdCTVqEXTJD7zNi2hX', '62cdcd6bc5b3c.jpg', '#8ac832', 'Router Password Decryptor - Instant password recovery', 'router-password-decryptor-instant-password-recovery', '', '<p>\r\nIt currently supports password recovery from the following types of routers/modems:\r\n</p>\r\n\r\n<p>\r\nCisco\r\n</p>\r\n\r\n<p>\r\nJuniper\r\n</p>\r\n\r\n<p>\r\nDLink\r\n</p>\r\n<p>\r\nBSNL\r\n</p>\r\n<p>\r\nIn addition to this, the software also has a unique \"Smart Mode\" (experimental) feature to recover passwords from any type of router/modem configuration file. It detects various password fields from such a configuration file (XML only) and then automatically attempts to decrypt those passwords.\r\n</p>', 0, 0, 1, '2022-07-12 19:37:16', '2022-07-12 19:37:16'),
(57, 'article', 3, 54997, '6.16 MB', '1cDKV1YWeYsgnGgrie5hNTcLHx5yHZRqw', '62cdcddcc93cd.jpg', '#8ac832', 'Screenpresso - Create screenshots, videos and GIF animations', 'screenpresso-create-screenshots-videos-and-gif-animations', '', 'Capture: Automatically merge mp4 files if multiple files were created during video recording.\r\n\r\nCapture: Animated GIF video creation is now much faster, fixing animated GIF ghosting, ImageMagik dependency removed.\r\n\r\nCapture: updated to ffmpeg and adb\r\n\r\nAboutBox: The \"Check for Updates\" button now has the ability to choose between official or debug releases.\r\n\r\nEditor: element numbering can now be displayed in Latin (previously it could only be displayed as a number or letter)\r\n\r\nEditor: Added additional settings EditorSingleInstance, WorkspaceCloseOnEdit and ScreenshotHideCursor.\r\n\r\nPolicies: Administrators can now fine-tune which sharing features are enabled or disabled.\r\n\r\nAll web calls are based on the TLSv1.2 protocol for enhanced security.', 0, 0, 1, '2022-07-12 19:39:09', '2022-07-12 19:39:09'),
(58, 'article', 3, 81626, '2.33 MB', '1bsX-dv0sKK6OTBnoUkJUS_VvlyFLYowZ', '62cdce262ec16.jpg', '#8ac832', 'Advanced Disk Cleaner - Remove junk files and increase performance', 'advanced-disk-cleaner-remove-junk-files-and-increase-performance', '', 'Advanced Disk Cleaner is a program that will increase free disk space and improve the performance of your computer by finding and removing junk and temporary files.\r\n\r\nIt will search all hard drives of your computer for temporary files left by various applications and provide you with a list of junk files, which will save you a lot of disk space.', 0, 0, 1, '2022-07-12 19:40:22', '2022-07-12 19:41:36'),
(59, 'article', 3, 94095, '21.6 MB', '12H4_q4gkyWflfXI5iTibx37IfySPTmCS', '62cdcec3ee03e.jpg', '#8ac832', 'Balabolka - Text-to-speech software', 'balabolka-text-to-speech-software', '', 'Screen text can be saved as a WAV, MP3, MP4, OGG or WMA file. The program can read the contents of the clipboard, view text from AZW, CHM, DjVu, DOC, EPUB, FB2, HTML, LIT, MOBI, ODT, PRC, PDF and RTF files, adjust the font and background color, manage reading from the system tray or from using global hotkeys.\r\n\r\nThe program uses various versions of the Microsoft Speech API (SAPI); it allows you to change voice parameters, including speed and pitch. The user can apply a special list of substitutions to improve the quality of voice articulation. This feature is useful when you want to change the spelling of words. Pronunciation correction rules use regular expression syntax.', 0, 0, 1, '2022-07-12 19:43:00', '2022-07-12 19:43:00'),
(60, 'article', 3, 72418, '13.1 MB', '1zk2z2jWsH_4afm7ewHA1IEvrPxZ3S6Wc', '62cdcee7bf134.jpg', '#8ac832', 'CopyQ - Clipboard Manager', 'copyq-clipboard-manager', '', 'directly into any application later.\r\n\r\nFunctions\r\n\r\nSupport for Linux, Windows and OS X 10.9+\r\n\r\nStore text, HTML, images or any other custom format\r\n\r\nQuickly view and filter items in clipboard history\r\n\r\nSorting, creating, editing, deleting, copying/pasting, dragging and dropping items on tabs', 0, 0, 1, '2022-07-12 19:43:35', '2022-07-12 19:44:20'),
(61, 'article', 3, 61489, '389 MB', '17o_NTxNRU_qWMWEwOv3WMxdsl-mmINKk', '62cdcf69d9b3c.jpg', '#8ac832', 'VisualCron - Task Scheduler for Windows', 'visualcron-task-scheduler-for-windows', '', 'VisualCron is a task scheduler for Windows that works like cron on Linux/Unix. The main functionality is to execute programs/files at a given time or at a given interval. It has an easy to use interface with lots of features. It creates statistics like runtime etc. It can also log events and print a list of tasks.\r\n\r\nFunctions:\r\n\r\nno programming or scripting skills required\r\n\r\nbuilt-in tasks for all needs that allow you to automate everything in one application\r\n\r\nintuitive interface for creating tasks and tasks\r\n\r\nautomate tedious and repetitive tasks\r\n\r\neliminate human error\r\n\r\nprocess, respond and notify about system problems, data errors, etc.', 2, 0, 1, '2022-07-12 19:45:45', '2022-07-12 19:55:57'),
(62, 'article', 3, 88118, '22.1 MB', '1gpQe1n0NNgjTiBJEmt2LxyTkYVpEfOsH', '62cdd2135e65f.jpg', '#8ac832', 'WordWeb Free - Offline English Dictionary and Thesaurus', 'wordweb-free-offline-english-dictionary-and-thesaurus', '', 'WordWeb is really Word Web: each set of synonyms is associated with other related sets. Search for \"tree\", click on the \"Types\" tab and you will have a list of different types of trees. Click \"Part\" and WordWeb will tell you that the tree can be part of the \"forest\".\r\n\r\nWordWeb is a comprehensive English thesaurus and dictionary for Windows that can be launched with a single click. It can be used to search for words in almost any program, showing definitions, synonyms and related words. It includes pronunciation and usage examples, as well as useful links to spelling and sounds.', 0, 0, 1, '2022-07-12 19:57:07', '2022-07-12 19:57:07'),
(63, 'article', 3, 62056, '983 KB', '1XJU8N4tK3wulfRL6xp7acwBowFXYlKA1', '62cdd243322d0.jpg', '#8ac832', 'QTranslate - Translator for Windows', 'qtranslate-translator-for-windows', '', 'With this little utility, you simply select the text you want to translate and then press a hotkey (Ctrl+Q to display the translation in a popup window, or double Ctrl to display the translation in the main window).\r\n\r\nThe program also has the ability to speak the text (Ctrl + E) and perform a dictionary search (Win + Q). You can also open the main window and type text manually.', 0, 0, 1, '2022-07-12 19:57:55', '2022-07-12 20:01:22'),
(64, 'article', 3, 58910, '304 MB', '15emiz1csHKocZR-GmVRsUBP-11Z1o748', '62cdd2bd57a09.jpg', '#8ac832', 'Ashampoo PDF - Best PDF Editing Software', 'ashampoo-pdf-best-pdf-editing-software', '', 'Ashampoo PDF Free opens PDF files securely and supports all PDF standards. The program comes with a virtual printer driver that allows you to create PDF files from any Windows application that supports printing.\r\n\r\nAshampoo PDF Free also supports and helps users fill out forms. The integrated document search makes it easy and quick to find text content, and users can also rearrange, delete, or insert pages from other PDF documents to add additional content to existing PDF documents.', 0, 0, 1, '2022-07-12 19:59:57', '2022-07-12 20:02:51'),
(65, 'article', 3, 67394, '1.80 MB', '1Gq6a7p7uqJWHR765ZFekTrmoTRuBxjQI', '62cdd399c05b3.png', '#8ac832', 'Diagram Designer - Convenient vector graphics editor', 'diagram-designer-convenient-vector-graphics-editor', '', 'Customizable palette of template objects.\r\n\r\nSpell checker (see below for dictionaries).\r\n\r\nImport/export of WMF, EMF, BMP, JPEG, PNG, MNG, ICO, GIF and PCX images.\r\n\r\nSlideshow viewer.\r\n\r\nA simple graph plotter for constructing mathematical expressions.\r\n\r\nAdvanced \"pocket\" calculator with an equation solver.\r\n\r\nMeeSoft Image Analyzer integration for bitmap editing and extended file format support.\r\n\r\nUses a compressed file format to minimize drawing file size.', 0, 0, 1, '2022-07-12 20:03:32', '2022-07-12 20:04:12'),
(66, 'article', 3, 66984, '3.37 MB', '1wD9mX016JtQCgMKI4XieeO2-rnJz5f0d', '62cdd3d4ac9a7.jpg', '#8ac832', 'Spamihilator - Checks every email for spam', 'spamihilator-checks-every-email-for-spam', '', 'Spamihilator uses a number of different filters to achieve the highest possible level of spam detection.\r\n\r\nThe learning filter (Bayesian filter) uses the rules of Thomas Bayes (English mathematician, 18th century) and calculates a certain spam probability for each email. Thus, the learning filter already recognizes more than 98% of spam emails. You can even train this filter! So he will know your messages even better than you.', 0, 0, 1, '2022-07-12 20:04:36', '2022-07-12 20:06:09'),
(67, 'article', 3, 91302, '2.27 MB', '1wBxlqNqW75Wy5q6MJVz2zTLwFG7xyxEh', '62cdd47fb8b1e.jpg', '#8ac832', 'HijackThis - Virus Detection Software', 'hijackthis-virus-detection-software', '', 'HijackThis is a lightweight service for finding and cleaning the system from malicious objects, as well as providing reliable protection.\r\n\r\nThe utility creates detailed reports on registry settings and computer files. It reveals a list of unwanted intrusions, and the user makes their own decision to delete or save.', 0, 0, 1, '2022-07-12 20:07:27', '2022-07-12 23:10:20'),
(69, 'article', 3, 81078, '4.30 MB', '1K6Xblc2pSW93VtpEmpUwbftp8s3PQ29m', '62cdd4dd04464.jpg', '#8ac832', 'Punto Switcher - Автоматическое переключение раскладки клавиатуры', 'punto-switcher-avtomaticheskoe-pereklyuchenie-raskladki-klaviatury', '', 'This program is designed for Microsoft Windows and Mac OS X operating systems. When typing in the wrong language, the utility makes an automatic correction and changes it to English Russian and vice versa.\r\n\r\nAutomatic detection and switching to the required language.\r\n\r\nSound accompaniment of switching.\r\n\r\nAutocorrect expansion of given combinations, for example, the key combination \"cd\" can be replaced by \"How are you?\".\r\n\r\nA convertible clipboard with a list of the latest lines in it.\r\n\r\nDiary with all typed information. You can select the text and use the hot key to save this part of the text to the diary.\r\n\r\nPunto Switcher for Windows 7.8 and other versions of the family - x64 and 32-bit operating systems, as well as for Mac OS X.\r\n\r\nPlacement of the language indicator in the form of a flag anywhere on the screen.\r\n\r\nPossibility to write and translate text from Russian into transliteration and vice versa.\r\n\r\nSignals when finding language anomalies.\r\n\r\nStore up to 30 clipboards.\r\n\r\nHotkeys designed to search for a word or part of a text in Wikipedia, Yandex, Dictionary.\r\n\r\nSending text to Twitter.\r\n\r\nMaximum simple and user-friendly interface.\r\n\r\nDetermining the spelling of a password - the program recognizes the system for entering a password through mixed and capital letters, entering characters and numbers, and the layout changes to English.', 0, 0, 1, '2022-07-12 20:09:01', '2022-07-12 23:08:49'),
(70, 'article', 3, 67050, '929 MB', '17sl7ARvTPADsWAf3v73SRQd4uvOorRLg', '62cdd4fee8a1c.jpg', '#8ac832', 'Android Studio - Application development software', 'android-studio-application-development-software', '', 'Android Studio is constantly being developed and improved by developers. Thanks to this, the process of creating and launching mobile applications for the operating system of the same name has become even easier and more convenient.\r\n\r\nAdvanced WYSIWYG layout editor with real-time program rendering.\r\n\r\nProductivity, comfort of use, compatibility and much more are measured by special tools.\r\n\r\nA convenient console for the programmer with tips to simplify the process, a translator, control over referrals and promotion.\r\n\r\nLayer editor with Drag-and-Drop option for dragging interface elements.\r\n\r\nAbility to view layers with different screen settings.\r\n\r\nOwn ProGuard with a special utility for signing applications.\r\n\r\nImplemented support for builds based on Gradle.\r\n\r\nReliable data storage.\r\n\r\nEasy creation of a software project.\r\n\r\nAbility to create an apk file or generate multiple .apk files.\r\n\r\nCode refactoring.\r\n\r\nSupport for 32-bit, 64-bit systems.\r\n\r\nIntegration with programs such as Google Cloud Messaging and App Engine through the built-in Google Cloud Platform.', 2, 0, 1, '2022-07-12 20:09:34', '2022-07-12 23:07:44'),
(71, 'article', 3, 94744, '42.8 KB', '1us4DyJWMGg0c-A9EZeOS3enLZZBKIMmL', '62cdd51972b75.jpg', '#8ac832', 'PureText - Software for copying text without formatting it', 'puretext-software-for-copying-text-without-formatting-it', '', 'Once PureText.exe is launched, a \"PT\" icon will appear next to the clock on the taskbar. You can click this icon to remove formatting from the text currently on the clipboard. You can right-click on the icon to display a menu with more options.\r\n\r\nThe easiest way to use PureText is to simply use its hotkey to paste text instead of using the standard CTRL+V hotkey built into most Windows applications. To configure PureText, right-click on the system tray icon and select Options from the pop-up menu. The default hotkey is WINDOWS+V, but you can change it. In this Options window, you can also set PureText to launch every time you log on to Windows.', 0, 0, 1, '2022-07-12 20:10:01', '2022-07-12 23:07:11'),
(72, 'article', 3, 89137, '652 KB', '1U46EwLG4OzYLSBns6DJth0H0prje-rVI', '62cdd5336400e.jpg', '#8ac832', 'WinParrot - Software for reproducing actions in place of you', 'winparrot-software-for-reproducing-actions-in-place-of-you', '', 'With a very simple language (very close to the language of Excel), you can insert visual breakpoints, cycles, conditions, or data from Excel spreadsheets.\r\n\r\nYou can control the tolerance of image, shape or text recognition; change the speed of typing or moving the mouse. To avoid slowing down your computer, WinParrot is optimized to use the smallest amount of memory and processor possible. WinParrot does not require installation and administrator rights. He checks his signature. If a virus tries to get in, or if WinParrot is corrupted, it will warn you. You can find examples and videos on the official website. We hope that WinParrot will help you.', 0, 0, 1, '2022-07-12 20:10:27', '2022-07-12 23:06:34'),
(73, 'article', 3, 79196, '3.15 MB', '1PEqLBEmI4KJtucUFWM3zgUh_E8knAEdT', '62cdd566eccdd.jpg', '#8ac832', 'Anti-Porn - Online filtering of pornographic websites', 'anti-porn-online-filtering-of-pornographic-websites', '', 'The website\'s information is uploaded into a daily magazine, which is then sorted into different folders. You choose which folders contain unwanted pornography based on what your computer can handle.\r\n\r\nFor example, if your computer cannot recognize a pornographic website when browsing in Cityville, you will not be able to view adult entertainment. When you\'re done with the list of sites you want to block, you simply click on the \"block\" link that appears next to the site. This prevents your computer from accessing the site in question, while still allowing you to surf the Internet.', 0, 0, 1, '2022-07-12 20:11:18', '2022-07-12 23:05:51');
INSERT INTO `article` (`article_id`, `table_name`, `category_id`, `article_imagesize`, `article_archivesize`, `article_archive`, `article_image`, `article_color`, `article_title`, `article_slug`, `article_video`, `article_content`, `article_download`, `article_view`, `article_status`, `article_created_at`, `article_updated_at`) VALUES
(74, 'article', 3, 128166, '2.98 MB', '1DsdTza8erRewoHXerBdmR_3jpiOCZmEm', '62cdd5824a8f3.jpg', '#8ac832', 'Protected Folder - Store folders and files from loss or leakage', 'protected-folder-store-folders-and-files-from-loss-or-leakage', '', 'The application is easy to operate; To lock a folder and file, simply drag and drop them into the Secure Folder\'s security window, and you can hide and protect them from being changed.\r\n\r\nKey features include:\r\n\r\nHide From Viewing: Hide folders, files, images, and videos from anyone who wants to explore and find specific files on your computer. No one will see them except you.\r\n\r\nBlock Access: Easily block access to files, folders and programs of your choice. You can also password protect a folder and its files so that others can see them but cannot access, read, or view their contents.\r\n\r\nWrite Protection: You can protect your files from being modified by others. No one can change the contents of your files without your permission. Keep your files safe and sound.\r\n\r\nPrivacy protection: store your personal data, files, images or videos in a secure folder, the only way to access these files is to enter a password.\r\n\r\nSecure Folder minimizes the chance of data being stolen, lost, or leaked. Protect important files or data from being accidentally deleted, replaced or stolen by others with this simple tool.\r\n\r\nSecure Folder is an excellent folder locker if you are concerned about the security of your personal or important data. it\'s easy to use, takes up little space, and is a good way to keep your data private.', 0, 0, 1, '2022-07-12 20:11:46', '2022-07-12 23:05:09'),
(75, 'article', 3, 62929, '33.1 MB', '1yQy_UVP-WYcfxlWutbSySCS_WUREGEGU', '62cdd59da0a92.jpg', '#8ac832', 'LastPass - Online Password Manager', 'lastpass-online-password-manager', '', 'Store all your passwords and usernames in the cloud, then access them across multiple devices and platforms. LastPass is now available for Windows, Mac, Linux, Android, iPhone and iPad.\r\n\r\nBest Online Experience\r\n\r\nStop wasting time worrying about forgotten passwords and stop wasting time filling out forms; LastPass will do it for you.', 0, 0, 1, '2022-07-12 20:12:13', '2022-07-12 23:04:29'),
(76, 'article', 3, 42896, '2.20 MB', '1uKAszxy0_sQewiBlTzAAYNaCi_RZzBYP', '62cdd5b5aad30.jpg', '#8ac832', 'Fraps - Ability to set FPS video, take screenshots and record gameplay', 'fraps-ability-to-set-fps-video-take-screenshots-and-record-gameplay', '', 'Benchmarking Software See how many frames per second (FPS) you get in the corner of the screen. Run user tests and measure the frame rate between any two points. Save statistics to disk and use them for your reviews and applications.\r\n\r\nScreen Capture Software Take a screenshot with a single keystroke! No need to paste into a drawing program every time you want to take a screenshot. Your screenshots are also automatically named and timestamped.', 0, 0, 1, '2022-07-12 20:12:37', '2022-07-12 23:03:49'),
(77, 'article', 3, 40719, '621 KB', '1L-CjhaYsz2apVef85G1iOwQYyznZTNj0', '62cdd5cc944a1.jpg', '#8ac832', 'Betternet - Online Privacy', 'betternet-online-privacy', '', 'Betternet is a VPN for Windows, macOS, Android and iOS. Online privacy and security trusted by millions.\r\n\r\nUnblock any site\r\n\r\nBetternet helps you access blocked websites and bypass internet censorship and firewalls.\r\n\r\nProtect your security and privacy\r\n\r\nBetternet secures your connection by encrypting your data. It changes your IP address, hides your real location, and keeps you private and anonymous online.', 0, 0, 1, '2022-07-12 20:13:00', '2022-07-12 23:03:08'),
(78, 'article', 3, 101131, '70.1 KB', '1AgGmFcvcVcJ1M-cEn6txx3MssX-UWciV', '62cdd5e3f0b97.jpg', '#8ac832', 'DLL Export Viewer - Display all DLL files', 'dll-export-viewer-display-all-dll-files', '', 'For example: if you want to break every time a message box is displayed, just put breakpoints on the memory addresses of the message box functions: MessageBoxA, MessageBoxExA and MessageBoxIndirectA (or MessageBoxW, MessageBoxExW and MessageBoxIndirectW in Unicode-based Unicode). application) When one of the message box functions is called, the debugger should hack that function\'s entry point, and then you can walk through the call stack and return to the code that initiated that API call.\r\n\r\nThis utility does not require any installation process or additional DLLs to start using it, just run the executable - dllexp.exe\r\n\r\nWhen the DLL Export Viewer is loaded, you must select one of the following options:', 0, 0, 1, '2022-07-12 20:13:23', '2022-07-12 23:01:56'),
(79, 'article', 3, 81012, '306 KB', '1WDw-U4Ra6U51zELRgo_04afkm8zJ2wQ8', '62cdd5fbabe43.jpg', '#8ac832', 'Browser Password Decryptor - Password recovery software', 'browser-password-decryptor-password-recovery-software', '', 'BrowserPasswordDecryptor is a useful free program for Windows that belongs to the category of security software with subcategory \"Password\" (Revealers, to be exact) and was created by SecurityXploded.\r\n\r\nLearn more about BrowserPasswordDecryptor\r\n\r\nIn terms of download, BrowserPasswordDecryptor is a fairly lightweight program that doesn\'t require as much memory as the regular program in the Security Software section.', 0, 0, 1, '2022-07-12 20:13:47', '2022-07-12 23:01:10'),
(80, 'article', 3, 92346, '2.52 MB', '1NZqsemSMvDoUchmAqKQF2L4yx1KNvNqL', '62cdd61259107.jpg', '#8ac832', 'Smart Windows App Blocker - Software for blocking programs on PC', 'smart-windows-app-blocker-software-for-blocking-programs-on-pc', '', 'Do you want to prevent the use of certain programs installed on your computer? With Windows Smart App Blocker, you can do just that. Just select the executable file of the software you want to block and then click \"Block Application\".\r\n\r\nThrough the Windows Smart App Blocker interface, you can view the entire list of blocked programs and use the \"Check App\" button to check the actual status of the software.', 0, 0, 1, '2022-07-12 20:14:10', '2022-07-12 23:00:30'),
(81, 'article', 3, 86872, '44.4 KB', '1g45KgQb_TTPRysitBZgw_WVpaHa9ZWI2', '62cdd62a8b747.jpg', '#8ac832', 'Folder Firewall Blocker - Blocker of specified executable files and folders', 'folder-firewall-blocker-blocker-of-specified-executable-files-and-folders', '', 'FFB was created primarily to block incoming and outgoing internet connections for the file types you choose. This is achieved by creating several new rules in Windows Firewall with the click of a button. Previously, it could only block .EXE files, but now you can add as many custom file types as you like!\r\n\r\nThere is also the option to recursively scan subfolders of a directory. As well as the ability to enable, disable, add, and remove user-defined custom file types during application scanning.', 0, 0, 1, '2022-07-12 20:14:34', '2022-07-12 22:59:36'),
(82, 'article', 3, 57610, '5.52 MB', '1vSPKLeNr0sF81i7BNePIHaJmyO7dKiZh', '62cdd68c9d659.jpg', '#8ac832', 'Duplicate Cleaner - Great software for removing duplicates', 'duplicate-cleaner-great-software-for-removing-duplicates', '', 'Filtering options often make duplicate cleanup a little tricky, but you won\'t have that problem with Duplicate Cleaner. Options are self-explanatory and clearly displayed, and on the top menu bar you\'ll find a Selection Assistant that lets you get even more specific. The Duplicate Cleaner scan is fast and presents you with a quick overview of what it has found.\r\n\r\nRight-click on individual entries to get more information or perform batch actions, or view them manually if there aren\'t many. And don\'t make the mistake of thinking that you can only remove duplicates - use a file removal tool and you\'ll be able to move, rename, or hardlink files as well.', 0, 0, 1, '2022-07-12 20:16:12', '2022-07-12 22:58:51'),
(83, 'article', 3, 96055, '4.03 MB', '1wx3xQw0Fn68CjmzuOeCcfna07dd_c7x-', '62cdd6a3d3aaf.jpg', '#8ac832', 'Ruffle - Free Flash Player for Windows', 'ruffle-free-flash-player-for-windows', '', 'Ruffle is popular because it can automatically detect all types of Flash content and then accurately display it on the screen. This ensures that you can open websites and play games without problems. In addition, the open source emulator continues to be updated regularly and competes with other alternatives such as Flashpoint Ultimate, Shubus Viewer, and Binary Viewer.\r\n\r\nRuffle is a free and open source emulator application that allows you to play Flash content without problems. It was developed and written in the Rust programming language and supports SWF files. The Rust desktop app opens all Flash content on your PC. It also has a browser extension option to open Flash content on websites.', 0, 0, 1, '2022-07-12 20:16:35', '2022-07-12 22:58:11'),
(84, 'article', 3, 79419, '87.4 KB', '1IfV2PrNw4ZfPkZAKGw8MQKJx_5K3ja0b', '62cdd6b97307e.jpg', '#8ac832', 'Pocket KillBox - Remove files that prevent you from deleting them', 'pocket-killbox-remove-files-that-prevent-you-from-deleting-them', '', 'There are several modes of deletion: standard, delete on reboot (requires a restart of the computer for the changes to take effect), or replace on reboot (includes the option to use a dummy file).\r\n\r\nTo get more space on your computer, the application gives you the option to delete temporary files. As an added feature, you can also monitor processes and complete tasks. Shortcuts for Session Manager and hosts files are available from the Tools menu.', 0, 0, 1, '2022-07-12 20:16:57', '2022-07-12 22:57:26'),
(85, 'article', 3, 73927, '24.4 MB', '1xVaAytzw5oPSrj8Dqt_XFk4c7LXuTykn', '62cdd6d14151f.jpg', '#8ac832', 'Free PC Cleaner - Free and effective PC registry cleaner', 'free-pc-cleaner-free-and-effective-pc-registry-cleaner', '', 'Free PC Cleaner fixes any problems in the computer\'s registry. Because many files can be difficult to detect manually, this cleaner will take the guesswork out of you. Another interesting advantage is that the SafeClean technology is offered together with the standard software.\r\n\r\nThis is intended to work as an automatic optimizer, freeing up any space as it becomes available. Using this platform, you can successfully remove spyware and malware with disabled drivers. The main interface is very easy to work with. It will display basic user options, the status of any ongoing scans, and files that have been found along the way.', 0, 0, 1, '2022-07-12 20:17:21', '2022-07-12 22:56:45'),
(86, 'article', 3, 61655, '4.79 MB', '1cvarDpnPHUQc27BXTDxOpCPJGpLSfFsT', '62cdd6e66d5aa.jpg', '#8ac832', 'Norton Removal Tool - Remove Norton programs from your PC', 'norton-removal-tool-remove-norton-programs-from-your-pc', '', 'Norton Removal Tool, commonly known as Norton Remove and Reinstall Tool, is a powerful utility tool that allows you to remove various Norton programs, including Norton Internet Security, Norton SystemWorks 12.0, Norton AntiVirus, Norton 360, and Norton.\r\n\r\nIn fact, there is a possibility that the suggested uninstallation tools may vary from user to user depending on what program they have.', 0, 0, 1, '2022-07-12 20:17:42', '2022-07-12 22:56:05'),
(87, 'article', 3, 77918, '2.31 MB', '1rHLiCCJX5U0GFwjLKfHQeoW-5K_-r-G7', '62cdd7041022d.jpg', '#8ac832', 'Advanced Cleaner - Software for cleaning and improving PC performance', 'advanced-cleaner-software-for-cleaning-and-improving-pc-performance', '', 'Advanced Cleaner will clean your computer of useless files such as system temporary files, user temporary files, all data of installed browsers, preview files, recent files, log files and many other useless files.\r\n\r\nAdvanced Cleaner is equipped with a feature that allows the user to boost the speed of the computer and the Internet with one click. That\'s not all, because Advanced Cleaner can restore browsers and then remove all unnecessary search pages and toolbars added \"without our consent\" and clean them up. Advanced Cleaner can also speed up your computer as well as speed up games for a better gaming experience.', 0, 0, 1, '2022-07-12 20:18:12', '2022-07-12 22:55:28'),
(88, 'article', 3, 70308, '15.6 MB', '1p-N41W4qSG89gebeRKDX2Df4KsivKD9v', '62cdd71d08b58.jpg', '#8ac832', 'Free Screen Recorder - Create Screen Recordings Easily', 'free-screen-recorder-create-screen-recordings-easily', '', 'This program is a simple screen recorder for Windows. It\'s compact and does what it promises to capture the events happening on your screen. While the only limit to its use is the user\'s creativity, its most obvious feature is for creating presentations and tutorials.\r\n\r\nThe PC screen recorder is simple and, as the name suggests, 100% free. You get a program that can record sound and screen at the same time, as well as microphone recordings over the two. Thus, it is quite useful software.', 0, 0, 1, '2022-07-12 20:18:37', '2022-07-12 22:54:36'),
(89, 'article', 3, 90672, '166 KB', '1E2r0_af0vz1cwqHMMCmjNLi9OWyFVEsa', '62cdd75bbb056.jpg', '#8ac832', 'SnapShot - Screenshot Software', 'snapshot-screenshot-software', '', 'SnapShot offers an alternative, non-native way to take screenshots for computers. The usual native method is to click \"Print Screen\" and paste the captured image into an image editor.\r\n\r\nMeanwhile, this software captures the currently active screen and saves it. It has a simple user interface and an intuitive layout to get images easily. Anyone can get their own screenshots without using any external cameras.', 0, 0, 1, '2022-07-12 20:19:39', '2022-07-12 22:53:49'),
(90, 'article', 3, 74872, '7.97 MB', '1teLr3aln9L_LJF0q84gLa6hrzS3J6cye', '62cdd785af1eb.jpg', '#8ac832', 'IMLock - Blocker of porn sites with parental control', 'imlock-blocker-of-porn-sites-with-parental-control', '', 'IMLock is designed for home, business and corporate use.\r\n\r\nIMLock is an Android browser with a web filter.\r\n\r\nControl from any web browser\r\n\r\nSuitable for ISPs and large enterprises\r\n\r\nCloud, manage categories, schedules, exceptions, etc.\r\n\r\nManage from 1 to 1000 devices from one web access page\r\n\r\nAdd Windows devices to your account\r\n\r\nThe lock is configurable and can be changed remotely in real time.', 0, 0, 1, '2022-07-12 20:20:21', '2022-07-12 22:53:01'),
(91, 'article', 3, 71721, '2 MB', '1N7ZQMDuCQ7LFIWnvrtwhU_OaEFWeZ_d1', '62cdd7b0e713f.jpg', '#8ac832', 'Hidden Disk - Software for creating and hiding discs with information', 'hidden-disk-software-for-creating-and-hiding-discs-with-information', '', 'In addition, you can assign a specific drive letter to the created drive to make it easier to find. However, it shares its disk space with the system drive, which can limit the amount of data you can store.\r\n\r\nSecure data storage method\r\n\r\nOf course, you also have the option to encrypt the drive with a password. If you choose this additional security feature, you will be required to provide this key each time you launch the application.', 0, 0, 1, '2022-07-12 20:21:04', '2022-07-12 22:52:05'),
(92, 'article', 3, 106889, '2.08 MB', '1E1kW9wBKMv5DynVLHe8GJB8gq32kUnk5', '62cdd7e6d786b.jpg', '#8ac832', 'Secure Delete - An application for permanently deleting files in batch mode', 'secure-delete-an-application-for-permanently-deleting-files-in-batch-mode', '', 'Deleting files in a few steps\r\n\r\nThe wizard-based approach of this application makes it relatively easy to work with. The first step is to add files and folders to remove, either by viewing their locations and adding them one at a time, or by dragging and dropping them onto the main window.\r\n\r\nApart from selecting the files and directories to be erased, all you have to do is set up advanced options for secure file deletion, which is not a mandatory step.', 0, 0, 1, '2022-07-12 20:21:58', '2022-07-12 22:50:15'),
(93, 'article', 8, 53459, '234 MB', '1JZ6yE9cRsAvKAifh-EylKzUv3fZltuVd', '62cdd815587fb.jpg', '#8ac832', 'Passware Kit Basic - Program for recovering mail, internet and network passwords', 'passware-kit-basic-program-for-recovering-mail-internet-and-network-passwords', '', 'Passware Password Recovery Kit Basic is a versatile application that can decrypt password-protected documents and reveal passphrases stored on your network, browsers, and email clients.\r\n\r\nIn addition, it can also reset the Windows administrator password by creating a bootable CD image and searching for protected files located on your computer. All operations are intuitive and do not require extensive computer knowledge.\r\n\r\nPassware Password Recovery Kit Basic is part of a suite of similar products that also includes Standard and Professional editions, as well as Enterprise and Forensic suites for more complex operations. However, despite the fact that this is a stripped-down version of the package, the program manages to build in everything you need to recover your password.', 0, 0, 1, '2022-07-12 20:22:45', '2022-07-12 22:49:16'),
(94, 'article', 8, 72946, '17.7 MB', '1vNhMRqhao8lHOcZ7K_Uk9c1a-SWn-MFP', '62cdd85673bfd.jpg', '#8ac832', 'Passcovery Suite - Password Recovery', 'passcovery-suite-password-recovery', '', 'Passcovery Suite is a password recovery application that uses an unlimited number of combinations of given letters, numbers, and encryption types to find the password for a given password-protected file.\r\n\r\nOffers excellent CPU performance tuning\r\n\r\nUsers can tune their processor performance and potential processing power each time a new file, folder or zipped software is password protected. RAM and CPU resources are taken into account in the password cracking process.\r\n\r\nPasscovery Suite has a set of pre-installed attack scenarios, including office documents, ZIP and RAR archives. Once the desired attack scenario is selected, Passcovery Suite will ask if it should use a \'brute force\' or \'dictionary based\' approach. These password methods will change the time it takes to find the secret key combination.', 0, 0, 1, '2022-07-12 20:23:50', '2022-07-12 22:48:22'),
(95, 'article', 3, 66155, '109 MB', '1CbLf_AheaBSh_XfP0Hfbr4P4Aee4Gy5Q', '62cdd87d182d1.jpg', '#8ac832', 'EaseUS BitWiper - Total file deletion', 'easeus-bitwiper-total-file-deletion', '', 'You probably know this, but pressing the Delete button on your keyboard doesn\'t actually delete the file from your hard drive. Moreover, even after emptying the Recycle Bin, it is still possible to recover deleted data using the appropriate software tools. What you can do to make sure that the files you want to get rid of are gone for good is to use a secure wipe tool like EaseUS BitWiper.\r\n\r\nRemoving disks, partitions and files\r\n\r\nThis particular application allows you to shred files and wipe partitions or even entire drives from your computer without much hassle. Its wizard-based approach allows you to get the job done in just a few steps by simply following the on-screen instructions.', 0, 0, 1, '2022-07-12 20:24:29', '2022-07-12 22:46:17'),
(96, 'article', 3, 79657, '25.1 MB', '1ABj4UWtPGhYasK1SsW3w1HCW3OhUAkoH', '62cdd8d208219.jpg', '#8ac832', 'Spyrix Personal Monitor - Record all activities with your PC', 'spyrix-personal-monitor-record-all-activities-with-your-pc', '', 'Whether you\'re a concerned parent or employer, at some point you\'ll need to monitor your child\'s or employee\'s computer usage.\r\n\r\nAt home, the reason for this is to make sure that your child is not accessing potentially dangerous or restricted content, and at the office, you can check if an employee is using their work time and resources effectively, instead of idling around on various social networks.', 0, 0, 1, '2022-07-12 20:25:25', '2022-07-12 22:45:26'),
(97, 'article', 3, 89031, '50.8 MB', '1xDr0S4GKhky3xDRcOXzTWAM86uI_xl7L', '62cdd8e9ed12e.jpg', '#8ac832', 'abylon SHREDDER - Delete cache files, cookies and browser history', 'abylon-shredder-delete-cache-files-cookies-and-browser-history', '', 'If you just delete the files and even empty the Recycle Bin afterwards, they can still be recovered from the sectors of your hard drive, as long as it\'s not too damaged. On the other hand, it is also possible to ensure that they cannot be restored using applications such as abylon SHREDDER, which has much more.\r\n\r\nCan also be deployed on a flash drive\r\n\r\nOf course, the app will guide you through the installation process, but along the way, you can deploy it on a USB stick for use on other computers. The only thing you need to make sure is that the target PC is equipped with the .NET Framework for everything to work.', 0, 0, 1, '2022-07-12 20:26:17', '2022-07-12 22:44:45'),
(98, 'article', 7, 112219, '5.70 MB', '1p4xRpnv76RGoiN-_NcLHS7BRT9L_nrW9', '62cdd9616a998.jpg', '#8ac832', 'Process Blocker - Блокиратор определенных приложений', 'process-blocker-blokirator-opredelennyh-prilozhenij', '', 'Process Blocker is a lightweight software application designed specifically to help administrators block programs based on a user list.\r\n\r\nThis is especially handy when you want to prevent your kids from spending too much time chatting with their friends, using instant messaging utilities and playing games, or you need to prevent your employees from using some unwanted program.', 0, 0, 1, '2022-07-12 20:28:17', '2022-07-12 22:42:58'),
(99, 'article', 8, 134559, '212 KB', '1oHbMmUAzFVDaxv2vbgnApznxjQMM0PvE', '62cdd98a6aa47.jpg', '#8ac832', 'SnadBoy\'s Revelation - Software that shows passwords behind asterisks', 'snadboy-s-revelation-software-that-shows-passwords-behind-asterisks', '', 'SnadBoy\'s Revelation is an application designed to recover lost or forgotten passwords hidden behind masked fields. The software is small, simple and has only a couple of options.\r\n\r\nAfter a quick and hassle-free setup operation, you are faced with a user-friendly interface where all options are easily accessible and displayed prominently in the main window.\r\n\r\nReveal passwords behind an asterisk\r\n\r\nIt is worth noting that SnadBoy\'s Revelation can detect the asterisk keys in any program, be it a standalone application or a web browser, for example. The window has a button with a crosshair that must be dragged onto the box with asterisks to reveal the target password.', 0, 0, 1, '2022-07-12 20:28:58', '2022-07-12 22:41:51'),
(100, 'article', 8, 68137, '5 MB', '1H8As0FzLoT_9Q-s8e8J7PpOoWq7gtlmu', '62cdd9a58668b.jpg', '#8ac832', 'RdpGuard - Server security system and protection against brute-force attacks', 'rdpguard-server-security-system-and-protection-against-brute-force-attacks', '', 'Repeated failed login attempts from the same IP address to the server can be a sign that someone is trying to guess the password and access the server without consent. RdpGuard is specifically designed to handle these situations, acting as a layer of security for your server.\r\n\r\nWindows service to protect your server\r\n\r\nWhat this application actually does is constantly monitor the event log to detect successive connection attempts and immediately block the source IP address. This ensures that remote desktops are protected from brute-force attacks and that your server is harder to hack.', 0, 0, 1, '2022-07-12 20:29:25', '2022-07-12 22:40:55'),
(101, 'article', 6, 55174, '17.9 MB', '1_MIgTaPC5sr-WeSFnc46722FpDEaOh2d', '62cdd9de3e0d4.jpg', '#8ac832', 'ScreenToVideo - Software for capturing video from your desktop and webcam', 'screentovideo-software-for-capturing-video-from-your-desktop-and-webcam', '', 'ScreenToVideo is a program that works as a video player and editor. With a beautiful interface that seems relatively easy to use (or at least learn to master), as well as a plethora of features and configurations, it really makes you feel like a professional video designer.\r\n\r\nRecording\r\n\r\nRecording with this app is very easy. You just need to open your project and click on the big red button in the top left corner of the window. This will bring up a much smaller window that will serve as your recording tool.', 0, 0, 1, '2022-07-12 20:30:22', '2022-07-12 22:40:05'),
(102, 'article', 3, 73993, '2.68 MB', '1VnlEyzbT4Gu6jEAOgJlVfz5NKSuXuloE', '62cdda04eefde.jpg', '#8ac832', 'Product Key Explorer - Software to find forgotten keys on your PC', 'product-key-explorer-software-to-find-forgotten-keys-on-your-pc', '', 'Product Key Explorer is a very handy software solution that can scan your computer and get product keys for installed applications.\r\n\r\nThe program uses a very clean interface with a well organized list that displays the product name, data information and product data right in the main window.\r\n\r\nProduct Key Explorer can search for serial keys for almost any software installed on your system, including Windows and Microsoft Office. The scanning process only takes a few seconds, and the app provides several tools to help you manage your product keys conveniently.', 0, 0, 1, '2022-07-12 20:31:00', '2022-07-12 22:39:17'),
(103, 'article', 3, 77217, '2.73 MB', '1dMQnDaXDm1ObbhUnX3Q7aoSO4YjRsv_Z', '62cdda1fcfdec.jpg', '#8ac832', 'RAR Password Recovery - Software for password recovery', 'rar-password-recovery-software-for-password-recovery', '', 'The app is easy to install and run. Features: The program has a very user-friendly interface; it supports a simple custom brute force attack; password recovery is possible using both the built-in dictionary and an external dictionary; Rar files (all versions including Vista) are easy to extract; password recovery for Rar files (all versions including Vista) is possible using an external dictionary and SFX encryption.\r\n\r\nPassword recovery for compressed archive files (zip, rar) is possible using an external dictionary and SFX encryption; password recovery for sparse files and ZIP archives is also possible using an external dictionary and SFX encryption; external dictionary support for multiple languages - such as Norwegian, Danish, Japanese and Spanish; support for several types of compression (ZIP, EXF, BZIP, etc. ;) ; the ability to switch between different levels of compression in the parameters of files and folders; support for access to a specific device (for example, /proc/PID); online help, FAQs and tips are available upon request and free of charge. In case of any doubt, the customer service is ready to answer questions and make suggestions. The site is regularly updated to help users as much as possible. It\'s free!', 0, 0, 1, '2022-07-12 20:31:27', '2022-07-12 22:38:34'),
(104, 'article', 3, 61638, '456 KB', '1cdW3wDE9DTzWadOTkgozjOGCzlZY-1SB', '62cdda3ae6060.jpg', '#8ac832', 'Folder Icon Changer - Easy Folder Icon Changer', 'folder-icon-changer-easy-folder-icon-changer', '', 'However, the fact is that the software does not always work with all Windows operating systems. So, if your Windows system does not use the built-in folder icon features, you should download and install the latest File Folder Icons Tool from the above website. The latest software allows you to create and modify all kinds of icons, including on the desktop.\r\n\r\nSilvereaglesoft has created a great folder icon changer with a user-friendly interface. The main benefit is that it helps you make your folders dynamic. You can change the desktop wallpaper, create folders, rename them, change their color, apply transparency, and so on. You can also use this software to change the default folder icon so that you can change it to suit your needs. Windows Vista System Information: 8 /', 0, 0, 1, '2022-07-12 20:31:54', '2022-07-12 22:37:45'),
(105, 'article', 3, 55567, '6.37 MB', '1556Os3jPAsG68bsm2p2xkkXei0gRUQZo', '62cdda632a11f.jpg', '#8ac832', 'Folder Password Lock Pro - Software for hiding and protecting documents and folders', 'folder-password-lock-pro-software-for-hiding-and-protecting-documents-and-folders', '', 'Folder Lock Pro also protects your files and folders from any modifications or deletions made by mistake. Users can monitor and receive alerts when files are deleted, modified, or created in the specified folder. However, you may also consider using Folder Protect or Anvi Locker Free for your specific file protection needs.\r\n\r\nWhy should you use Folder Lock Pro?\r\n\r\nThis software has a very easy to use interface that allows you to easily switch between sections and access certain features. The installation process is simple once the purchase is completed. You will then receive a Folder Lock Pro registration code to activate the software. The download is about 7 megabytes in size and does not usually cause any memory issues on your operating system.', 0, 0, 1, '2022-07-12 20:32:35', '2022-07-12 22:36:49'),
(106, 'article', 3, 51830, '59.5 MB', '1g85k2raq5_nXgI-ghVL8kSBdzhDOlRI5', '62cdda8d85a00.jpg', '#8ac832', 'Outline - Software for creating your own private VPN server', 'outline-software-for-creating-your-own-private-vpn-server', '', 'To get schematics for Windows or Linux systems, you can get them for free through a third party vendor or from a Windows installation CD. However, I would recommend getting a free download of Outline from the Microsoft website as the instructions to install it are pretty straightforward.\r\n\r\nAfter downloading and installing the Outline program, you will be prompted to enter the IP address or domain name of the server you want to configure. You will then walk through the process of connecting to the Internet and configuring various settings. Once this is completed, you will be able to access various sections of the Outline app and be able to see your VPN server in action.', 0, 0, 1, '2022-07-12 20:33:17', '2022-07-12 22:36:01'),
(107, 'article', 3, 62656, '867 KB', '18ZWKAoAmEGLtXTZsibyuX6UIOLKmpXPw', '62cddab5856ff.jpg', '#8ac832', 'Free Hide Folder - Software to hide important folders', 'free-hide-folder-software-to-hide-important-folders', '', 'When you launch Free Hide Folder, a start menu is first created containing all the folders you have chosen to hide. This Start Menu is invisible until you click on it. And after you have used this Start Menu, you will be able to see all hidden files and folders in File Explorer by pressing Alt/Tab keys.\r\n\r\nFree Hide Folder can hide all folders and files in all versions of Windows since Windows 98 except for some hidden folders created by Windows XP Service Pack 2. But the most important fact about Free Hide Folder is that it doesn\'t change the actual desktop wallpaper layout even if you move or delete a folder. Therefore, you must be careful when using this program, as it can permanently change your desktop wallpaper. Therefore, it is recommended to use this software with the \"Task Manager\" feature in the Windows taskbar.', 0, 0, 1, '2022-07-12 20:33:57', '2022-07-12 22:35:09'),
(108, 'article', 1, 72764, '28.9', '1xentyOw84a0lYjsvZeU-aCr2LaKIvQCt', '62cddad06f5bd.jpg', '#8ac832', 'Urban VPN - Security &amp; Privacy', 'urban-vpn-security-amp-privacy', '', 'Is Urban VPN good for gaming?\r\n\r\nYes, Urban VPN is great for gaming. The ability to hide your IP address so it looks like you\'re in a different country means you can access any game server in the world without restrictions.\r\n\r\nThe developer also claims that their servers are fast enough to reduce latency on your internet connection, which ensures better reaction times while playing online games.\r\n\r\nYour Next VPN Experience\r\n\r\nWhile it\'s free, we\'re not sure if Urban VPN is the best free option.\r\n\r\nOur main concern is the equal aspect. If all users share computing power, then, apparently, everyone\'s Internet traffic goes through someone else\'s computer. We did not find any information on the developer\'s website confirming the confidentiality of this web traffic', 0, 0, 1, '2022-07-12 20:34:24', '2022-07-12 22:33:59'),
(110, 'article', 13, 67791, '38.4 MB', '1d5y-8l9S4dxtbQJdv4_Nut6gKTKSYux7', '62cddb1354af2.jpg', '#8ac832', 'PSD layout - Technology', 'psd-layout-technology', '', '<a href=\'https://www.freepik.com/psd/technology\'>Technology psd created by freepik - www.freepik.com</a>', 0, 0, 1, '2022-07-12 20:35:31', '2022-07-13 20:13:11'),
(111, 'article', 7, 82522, '16.7 MB', '1pBM48gXmpSZkC1JZS5LN7UQPwfDBiKg9', '62cddb47792cf.jpg', '#8ac832', 'Temp Cleaner GUI - Utility to clean up temporary files', 'temp-cleaner-gui-utility-to-clean-up-temporary-files', '', 'Although most of us tend to ignore them, the truth is that browser history, cookies, and cache take up quite a lot of disk space. Removing them will not only help you free up storage space, but it can also speed up your PC. Temp_Cleaner GUI is a simple and intuitive utility that allows you to clean your computer of unnecessary and obsolete files.\r\n\r\nProvides tons of options for junk files to delete\r\n\r\nWhile it doesn\'t have the most attractive interface, the program more than makes up for it with its functionality. The app comes with a single window interface with a huge list of options. As you\'ve probably hinted, all you have to do is select the areas where you\'d like the app to clean up temporary files.', 0, 0, 1, '2022-07-12 20:36:23', '2022-07-12 22:31:08'),
(113, 'article', 3, 90970, '622 KB', '1qgEcBdriGbZ1_ecc1ZepHLkZ6KY3ZkhT', '62cddb9058ce2.jpg', '#8ac832', 'Wireless Key Generator - Encryption Keys for Wi-Fi', 'wireless-key-generator-encryption-keys-for-wi-fi', '', 'The software application has a very user-friendly interface that only requires the user to specify the type of encryption they prefer, whether wired equivalent privacy (WEP) or Wi-Fi Protected Access (WPA/WPA2), depending on the security capabilities of the router.\r\n\r\nIt should be noted that choosing WEP is not recommended because there are many specialized applications that can be used to break the code and expose it within minutes.\r\n\r\nOn the other hand, if you select Wi-Fi Protected Access, you can specify the key strength in the range from 64 bits (8 characters) to 504 bits (63 characters).', 0, 0, 1, '2022-07-12 20:37:36', '2022-07-12 22:28:53'),
(114, 'article', 8, 91049, '55.6 MB', '1tvoXLzNCqqW6t7jQpaOxW9MXn-Nuf0CY', '62cddbb1c7a2e.jpg', '#8ac832', 'BlackFog Privacy - Identifying a Potential Security Leak', 'blackfog-privacy-identifying-a-potential-security-leak', '', 'Even if you think that your online activity is not worth tracking, the abundance of trackers contradicts you. What\'s more, your online life can reveal everything about you, from whether you prefer cats to dogs, to more sensitive information such as health and financial status.\r\n\r\nBlackFog Privacy is an application designed to help you monitor your network traffic in real time and block spyware, malware and other types of snooping from getting into your privacy.', 0, 0, 1, '2022-07-12 20:38:09', '2022-07-12 22:27:48'),
(115, 'article', 8, 58606, '74 MB', '1iqw4ZR4DVGcTKYJ6L_EF2Nx_NpjvCv3E', '62cddbd2e8c47.jpg', '#8ac832', 'Tor Browser - A web browser that will completely hide the pages you visit', 'tor-browser-a-web-browser-that-will-completely-hide-the-pages-you-visit', '', 'Going online exposes your system to a variety of malware that can cause significant damage. Installed antivirus does not provide complete protection, especially if you do not want to be tracked. Luckily, with apps like Tor Browser, you can securely access your favorite pages without risking attacks and protect your identity.\r\n\r\nGo online in a secure environment\r\n\r\nThe main purpose of the application is to provide you with a web browser with which you can not only enjoy a user-friendly interface, but also ensure the security of your system. All of the available features are presented as a custom-built version of Mozilla Firefox, which isn\'t necessarily a bad thing as it allows for quick adaptation.', 2, 0, 1, '2022-07-12 20:38:42', '2022-07-12 22:26:57'),
(116, 'article', 8, 74228, '124 MB', '1o5HYWFjOS2Zl-Uh9-ALvy_Bx9lB8oqBs', '62cddc0ba36fa.jpg', '#8ac832', 'Keeper Desktop - Password protection software', 'keeper-desktop-password-protection-software', '', 'If your job requires handling large amounts of sensitive data such as documents, passwords, and logins, you\'ve probably considered using a tool that will allow you to access them from the same place, as well as protect them.\r\n\r\nKeeper Desktop is one of the applications that can help you achieve satisfactory results in the above situation.\r\n\r\nConvenient interface\r\n\r\nThis app comes with a stylish layout that has clear controls, making it easy for many users to manage its features without much effort.\r\n\r\nHowever, caution is advised when using this application, as if you forget your master password, the content stored in the vault may become unusable.', 0, 0, 1, '2022-07-12 20:39:39', '2022-07-12 22:26:06'),
(117, 'article', 8, 124147, '14 MB', '1NTfqFL-Cu0Y9Fiwd9RxfkPDci7Fk9OX1', '62cddc2a5f30f.jpg', '#8ac832', 'SpamAssassin in a Box - Spam Protection', 'spamassassin-in-a-box-spam-protection', '', 'SpamAssassin in a Box is a spam filter designed for Windows. The application contains the SpamAssassin filter and a Windows system service that allows users to manage it from local services.\r\n\r\nThe service monitors the SpamD daemon from the spam filter and updates the anti-spam rules continuously. It uses a series of spam tests that evaluate emails.\r\n\r\nBased on the scoring system, the app notes the likelihood that an email is spam. This score can be used by your own email processing program (for example, MTA - Message Transfer Agent) and a spam filter can be configured.', 0, 0, 1, '2022-07-12 20:40:10', '2022-07-12 22:22:04'),
(118, 'article', 8, 71466, '11.9 MB', '1IBc17wvIqMpJ6yrxoq1yKy0o2V3x4eog', '62cddc8f08652.jpg', '#8ac832', 'Cyberlab - Remove spyware from browser and system', 'cyberlab-remove-spyware-from-browser-and-system', '', 'Cyberlab is a lightweight utility designed to improve the privacy and security of your computer by removing spyware, junk, trackers and cookies. An indirect benefit of removing these unwanted files and programs is that you may notice an increase in your system\'s performance at the same time.\r\n\r\nIt can speed up browsers and clean your computer from spyware and adware.\r\n\r\nThe application comes with a clean interface and has a dashboard where you can get an overview of the total number of cleanings done in a given period. The idea of this tool is to offer an easy solution to remove unwanted programs, spyware and similar obsolete data that cause slowdowns and possibly numerous error messages.', 0, 0, 1, '2022-07-12 20:41:51', '2022-07-12 22:21:04'),
(120, 'article', 8, 74862, '3.11 MB', '1e8DKeF_S2Wb_hH8AOo9tRyc9L6GYYKWL', '62cddcec2f3cf.jpg', '#8ac832', 'Clear DNS - Software to clear the DNS cache', 'clear-dns-software-to-clear-the-dns-cache', '', 'Clean_DNS, as the name suggests, can help you scan your DNS cache for erroneous entries as well as clean them up with the click of a button. At the end of the process, it also generates reports for you, depending on which course of action you prefer.\r\n\r\nTo access its features, you just need to click the \"Manage\" button if you want to perform a scan, or the \"Repair\" button if you want to fix erroneous entries.\r\n\r\nSimplified interface\r\n\r\nThe interface of this application is simple enough that even newcomers to computers can use it, regardless of their PC skills or previous experience with similar software.\r\n\r\nThe layout consists of a set of buttons to help you check DNS and fix bad entries, as well as a progress bar to let you know how much of the operation has been completed.', 0, 0, 1, '2022-07-12 20:43:24', '2022-07-12 22:19:12'),
(122, 'article', 8, 68301, '869 KB', '1Wt0CdeQO70sqzhb28jLigss-8AQMQ0lP', '62cddd314e92c.jpg', '#8ac832', 'Xreveal - Remove protection and do what we want', 'xreveal-remove-protection-and-do-what-we-want', '', 'While Xreveal\'s name doesn\'t clearly state what it\'s intended for, it\'s a bit of a reflection of what it\'s capable of. This program deals with the removal of protection from disk media. This interesting application is more like an interface for bypassing protection on disk media, as it requires users to upload decryption keys if they need additional functionality. Although disks are no longer widely used, the possibility of legal use of such an application should not be missed.\r\n\r\nRemoving Protection for Backup Reasons\r\n\r\nOne of the most important aspects for which any person would use such software, given the legal aspects we are talking about, would be to back up the content encrypted on a CD, DVD or BR disc. Let\'s imagine that you have a scratched version of a very important music album and you would like to save its contents before it goes down forever. You will need to load the CD and let Xreveal work its magic. It is worth noting that Xreveal will manage everything automatically. There is no point in wasting time trying to find a way to activate his powers.', 0, 0, 1, '2022-07-12 20:44:33', '2022-07-12 22:16:45'),
(123, 'article', 13, 86639, '111 MB', '14jWd_kJaSV-qJ5gLnJC_z2lsYwbU2_Pe', '62cddd4fca05b.jpg', '#8ac832', 'PSD layout - burger restaurant', 'psd-layout-burger-restaurant', '', '<a href=\'https://www.freepik.com/psd/food\'>Food psd created by freepik - www.freepik.com</a>', 0, 0, 1, '2022-07-12 20:45:03', '2022-07-12 22:15:55'),
(124, 'article', 6, 77332, '73.2 MB', '1AM3zfKhQt5ceTH0lf8I3aQvaC8_mCenP', '62cddd6d35acb.jpg', '#8ac832', 'Background Remover - The best photo background removal software', 'background-remover-the-best-photo-background-removal-software', '', 'Whether you\'re creating product photos for e-commerce websites, car images for dealerships, portraits, and more, the remove.bg desktop app is the fastest background removal tool on the market, delivering high-quality results for even the most complex tasks. pieces such as hair.\r\n\r\nHere\'s what the remove.bg desktop app can do for you right now:\r\n\r\nAmazing results: Thanks to the latest trends in AI technology, our algorithms are trained to handle even the most complex elements of a photo, like hair, exceptionally well.\r\n\r\nSpeed - our background remover will remove the background in seconds.\r\n\r\nUnlimited possibilities - want to remove a large number of backgrounds, but are afraid that it could take forever? With our desktop app, you can drag and drop an unlimited number of files and expect the job to be done in the blink of an eye.\r\n\r\nAssets tailored to your needs - with our background eraser for PC, you can easily customize your work: define once, then apply to all files. Choose a transparent or colored background, small or large image size, and your settings can be automatically applied to all files.', 0, 0, 1, '2022-07-12 20:45:33', '2022-07-12 22:14:51'),
(125, 'article', 3, 59852, '832 KB', '1aj6HPryF4urUwy5WcuDyESN1P4JI4Mfx', '62cddd8b425ac.jpg', '#8ac832', 'RegCool - Registry Editor', 'regcool-registry-editor', '', 'RegCool is an advanced registry editor and offline-hive file editor. In addition to all the features you can find in RegEdit and RegEdt32, RegCool adds many powerful features that allow you to work faster and more efficiently with registry related tasks.\r\n\r\nFunctions:\r\n\r\nReplacing the Windows Registry Editor - RegCool can replace the built-in Windows Registry Editor (regedit).\r\n\r\nOffline registry - RegCool can treat a number of registry hive files as a separate offline registry. Specify a folder with registry structure files and load certain files from this folder as structures. For more information, see the RegCool online help file.\r\n\r\nSearch and replace. Search and replace registry keys, values, and data with a super-fast search algorithm. You can search the entire registry in about ten seconds on a normal PC!\r\n\r\nMultiple Local Registry Windows - Allow multiple local registry windows to open.', 0, 0, 1, '2022-07-12 20:45:48', '2022-07-12 22:13:37'),
(126, 'article', 3, 62771, '47.3 MB', '1hL5UD5qQ2dC_MkqnAyswvkHn80VOuTdU', '62cddda473ba1.jpg', '#8ac832', 'KCleaner - An effective hard drive cleaner', 'kcleaner-an-effective-hard-drive-cleaner', '', 'KCleaner is designed to be the most efficient hard drive cleaner by keeping track of every junk byte to provide you with all the resources you might need for your documents, music, images, movies, and more. It is the first product of its kind with a fully automatic mode. , which runs in the background so you don\'t have to worry about when to run it. As proof of its effectiveness, it often finds up to many GB that its competitors have not even seen, so... try KCleaner! And if you\'re interested in data security, you\'ll love the secure file deletion methods offered by KCleaner, which make deleted files unrecoverable by any known means.\r\n\r\nFunctions:\r\n\r\nDetects and cleans temporary and useless files (cache, unused installation files...)\r\n\r\nAutomatic mode runs in the background\r\n\r\nProtected Method for Deleting Files\r\n\r\nExpert Mode: Let users control any file deletion performed by KCleaner.\r\n\r\nInternationalization support.', 0, 0, 1, '2022-07-12 20:46:28', '2022-07-12 22:12:36'),
(127, 'article', 3, 54266, '52.9 KB', '14uc1uiCJMd6KvFDav5XEM_fjzlC8VSZC', '62cddddbe2628.jpg', '#8ac832', 'Google Optimization Tools - Portable software for combinatorial optimization', 'google-optimization-tools-portable-software-for-combinatorial-optimization', '', 'Google Optimization Tools - Portable software for combinatorial optimization\r\n\r\nOnce you\'ve modeled a problem in your programming language of choice, you can use any of half a dozen solvers to solve it: commercial solvers like Gurobi or CPLEX, or open source solvers like SCIP, GLPK, or Google GLOP.\r\n\r\nWhat\'s new:\r\n\r\nWe announce the release of OR-Tools v7.1. We have released OR-Tools v7.1. To upgrade your version, see the appropriate OR-Tools installation section.', 0, 0, 1, '2022-07-12 20:47:23', '2022-07-12 22:11:46'),
(128, 'article', 3, 73231, '6.20 MB', '11sMciP-S-FUAFIFArpv4oKG1TlGTzBw-', '62cdddf91540b.jpg', '#8ac832', 'Absolute Uninstaller - Great Software for Uninstalling Applications and PC Efficiency', 'absolute-uninstaller-great-software-for-uninstalling-applications-and-pc-efficiency', '', 'The Absolute Uninstaller is similar to the standard Windows Add/Remove program, but more powerful. The standard Add/Remove program cannot completely remove applications, which often leaves corrupted registry keys and junk files on the hard drive. works slower.\r\n\r\n\r\nRemove completely\r\n\r\nThe standard installer and uninstaller often fails to completely remove applications. It often leaves files on the hard drive, their associated desktop icons, Start menu items, and keys in the registry. A large registry and a large number of unnecessary files make the system slower and slower. Uninstall Manager can clean them up in seconds!\r\n\r\nFast and convenient\r\n\r\nThe absolute uninstaller runs faster than the Add/Remove program with all the appropriate downloaded application icons and marks the newly installed program. so you can easily find the app you want to uninstall. You can also find the app you want with the handy search function.', 2, 0, 1, '2022-07-12 20:47:53', '2022-07-12 22:10:13'),
(129, 'article', 8, 70526, '14.1 MB', '1VcK2FVg9FfcfrsRSeiczlzt5p2Yfrjha', '62cdde23023ae.jpg', '#8ac832', 'Microsoft Security Essentials - Protecting Your PC', 'microsoft-security-essentials-protecting-your-pc', '', 'Microsoft Security Essentials is a free, downloadable Microsoft product that\'s easy to install, easy to use, and constantly updated so you can be sure your PC is protected with the latest technology.\r\n\r\nTo install Microsoft Security Essentials, your computer must be running genuine Windows. MSE requires Windows 7, Windows Vista or Windows XP.\r\n\r\nThere are many nasty intruders on the Internet, including viruses, trojans, worms, and spyware. Microsoft Security Essentials offers award-winning protection against these intruders without getting in your way. Microsoft Security Essentials is made for individuals and small businesses, but it\'s based on the same technology that Microsoft uses to protect large businesses (security products like Microsoft Forefront, the Malicious Software Removal Tool, and Windows Defender).', 0, 0, 1, '2022-07-12 20:48:35', '2022-07-12 22:09:20'),
(130, 'article', 1, 53547, '3.56 MB', '1AA77A-ZQmINKrgRFy09iK0yr6NuwJKE7', '62cdde40f1381.jpg', '#8ac832', 'Driver Fusion - Легкое удаление старых драйверов', 'driver-fusion-legkoe-udalenie-staryh-drajverov', '', 'Driver Fusion keeps your PC running efficiently and effectively with advanced system driver removal that removes even the files, directories, and registry entries left behind by conventional vendor uninstallers. By uninstalling old device drivers before installing new drivers, you ensure that your computer reaches peak performance.\r\n\r\n\r\nA clear, concise user interface guides the user step by step to uninstall various types of device drivers such as sound drivers, keyboard drivers, mouse drivers, and graphics card drivers. Driver Fusion automatically updates the cleanup process with Treexy\'s cloud-based driver database to provide the best possible Windows device driver removal, particularly unused, conflicting, and unwanted drivers. Device Management is an advanced Windows Device Manager that allows the user to restart, enable, or disable any installed device, as well as easily remove, backup, or restore device drivers.\r\n\r\nhttps://howdyho.net/windows-software/driver-fusion-legkoe-udalenie-staryh-drajverov', 0, 0, 1, '2022-07-12 20:49:04', '2022-07-12 22:08:28');
INSERT INTO `article` (`article_id`, `table_name`, `category_id`, `article_imagesize`, `article_archivesize`, `article_archive`, `article_image`, `article_color`, `article_title`, `article_slug`, `article_video`, `article_content`, `article_download`, `article_view`, `article_status`, `article_created_at`, `article_updated_at`) VALUES
(131, 'article', 3, 81713, '810 KB', '14dbsMK13skNa7q_xqQptFzZN4agYZkR0', '62cdde6ec6032.jpg', '#8ac832', 'Black Bird Cleaner - Speed up the system and remove junk files', 'black-bird-cleaner-speed-up-the-system-and-remove-junk-files', '', 'Clears cache, junk, temporary files and cookies in over 50 browsers.\r\n\r\nFinds all unnecessary temporary files and log files on your PC.\r\n\r\nCompress unused directories\r\n\r\nFinds and removes memory dumps.\r\n\r\nClears the thumbnail cache, font cache, and icon cache.\r\n\r\nCleans Chkdsk file fragments, recent documents, and Windows error warnings.\r\n\r\nCleans up files in the old operating system.\r\n\r\nClears the Windows search cache.\r\n\r\nClears GPU cache directories.\r\n\r\nAnd many more features...', 0, 0, 1, '2022-07-12 20:49:33', '2022-07-12 22:07:14'),
(132, 'article', 3, 48094, '40.5 MB', '1013n40-xwPBb-j5qsInlHNJz3sk05UCc', '62cdde92246c4.jpg', '#8ac832', 'PaperScan Free - Software for scanning documents', 'paperscan-free-software-for-scanning-documents', '', 'PaperScan is simply universal, while most scanning applications are designed for one scanner or one protocol.\r\n\r\nWith PaperScan, you can manage any scanner (TWAIN or WIA), including network scanners, cameras or data collection cards, with one simple click: all possibilities are automatically handled and matched by PaperScan.\r\n\r\nFunctions:\r\n\r\nUniversal scanning application\r\n\r\nAutomatic color detection\r\n\r\nImport images and PDF documents\r\n\r\nAnnotations\r\n\r\nImage settings and enhancements\r\n\r\nSave different file formats\r\n\r\nBatch scan support\r\n\r\nQuick scan mode\r\n\r\nLimited batch of TWAIN and WIA scan/import (10 pages).\r\n\r\nSave as single page PDF/A, TIFF, JPEG, JPEG 2000, PNG, JBIG2.\r\n\r\nPost-image processing: color correction, color space conversion, effects, filters, cropping and more...\r\n\r\nPDF encryption support (read and write).', 0, 0, 1, '2022-07-12 20:50:26', '2022-07-12 22:06:01'),
(133, 'article', 3, 85141, '1.01 MB', '1bHrSR9esTcPciUWWPQ_mdKxPj1mLzTe2', '62cddecd41cd1.jpg', '#8ac832', 'DiskFresh - A tool that reports the status of your disks', 'diskfresh-a-tool-that-reports-the-status-of-your-disks', '', 'The software also informs you about bad/bad sectors so you know when to replace the drive. The best part is that, unlike other tools, it does all this while Windows is running and does not affect the speed of your work at all.\r\n\r\nFunctions:\r\n\r\nA very simple interface with an extremely powerful engine.\r\n\r\nCan update individual partitions or the entire physical disk.\r\n\r\nYou can also update only a selected area of the disk.\r\n\r\nIt can also work in read-only mode to simply report bad sectors.\r\n\r\nSupports command line for advanced usage.\r\n\r\nCan update the system drive while Windows is running.', 0, 0, 1, '2022-07-12 20:51:25', '2022-07-12 22:05:09'),
(134, 'article', 3, 69912, '656 KB', '1gMiRUOZrfDt2nAkpTFgwbsfYdlKmOpUo', '62cddeef4f486.jpg', '#8ac832', 'WinAudit - Utility to create a report on hardware and software', 'winaudit-utility-to-create-a-report-on-hardware-and-software', '', 'WinAudit is free and open source and can be used or redistributed by anyone. IT professionals in academia, government, industry, and security professionals in the military, defense contractors, power generators, and police use WinAudit.\r\n\r\nThe program reports on almost every aspect of the inventory and configuration of computers. The results are displayed in a web page format, categorized for easy viewing and text search. Whether you\'re interested in software compliance, hardware inventory, tech support, security, or just plain curiosity, WinAudit has it all. The program has advanced features such as service tag detection, hard disk failure diagnostics, network port to process mapping, network connection speed, system availability statistics, and Windows update and firewall settings.\r\n\r\nFunctions:\r\n\r\nEasy to use\r\n\r\nNo customization\r\n\r\nText/html/csv/pdf\r\n\r\nEmail\r\n\r\nDatabase export\r\n\r\nBatch mode\r\n\r\nFully Documented', 0, 0, 1, '2022-07-12 20:51:59', '2022-07-12 22:03:33'),
(135, 'article', 3, 53909, '3.59 MB', '1M3Rh-jJHTbx1Lf7mdf9pLV08NckKJRsr', '62cddf09a1953.jpg', '#8ac832', 'JetClean - Remove system junk files', 'jetclean-remove-system-junk-files', '', 'Cleaning and tuning in one click\r\n\r\nCleans junk files and unnecessary registry entries to improve your PC\'s performance with one simple click.\r\n\r\nLightweight, easy to use and reliable\r\n\r\nTakes up very little space on your computer, but offers great computer cleaning and solid functionality customization.\r\n\r\nFast and Powerful Windows Cleanup\r\n\r\nQuickly finds and removes any junk files that may exist in Recycle Bin, Recent Documents, Temporary Files, Log Files, Clipboard, DNS Cache, Error Reports, Memory Dumps, Jump Lists.\r\n\r\nImproves PC performance\r\n\r\nBoost PC performance for work or play. Gives you the feeling of a new computer again.\r\n\r\nMore stable Windows system, fewer crashes\r\n\r\nReduces system errors and crashes by safely removing all unused and old registry entries.\r\n\r\nFaster PC startup and program launch', 0, 0, 1, '2022-07-12 20:52:25', '2022-07-12 22:02:27'),
(136, 'article', 3, 58601, '6.28 MB', '11HgpdWGec2bQdy_aRQM2KRb3awjxfraJ', '62cddf3551a5b.jpg', '#8ac832', 'NoClone Free Edition - Find and remove duplicates', 'noclone-free-edition-find-and-remove-duplicates', '', 'So, it\'s time to recover more disk space by removing duplicate files. And the duplicate file finder can help you find and remove duplicate files efficiently.\r\n\r\nToo often you back up important data by making a copy of a directory you don\'t want to delete. Undoubtedly, you will find a large amount of data in the search results. You may be confused by the search result because you don\'t have time to check these duplicate files one by one. Now you can easily find your backup folder and remove those real duplicate files or duplicate folders that you don\'t want to keep with NoClone\'s new Find Duplicate Folder feature.\r\n\r\nFind and remove duplicate folders\r\n\r\nIt takes less than 20 minutes to detect duplicate files and folders from a 25 GB date folder.\r\n\r\nVery often there are many duplicate files in one folder. NoClone 2013 can find duplicate folders. Check the Exact Duplicate Files checkbox to allow NoClone to scan for duplicates, then duplicate files and duplicate folders will be displayed in the search results panel so you can manage duplicates more effectively by managing duplicate folders.', 0, 0, 1, '2022-07-12 20:53:09', '2022-07-12 22:00:57'),
(137, 'article', 7, 57921, '3.83 MB', '17kaHGbyOKdNW4gdFqP57rKvPPI2rt7tC', '62cddf4ca1e56.jpg', '#8ac832', 'Windows Inspection Tool Set - Windows Component Check Tool', 'windows-inspection-tool-set-windows-component-check-tool', '', '<p>\r\nCustom list views display the properties of objects in a table format.\r\n</p>\r\n\r\n<p>\r\nFlexible custom filters and sorting modes allow you to focus on specific objects.\r\n</p>\r\n<p>\r\nChange tracking, which allows you to highlight changes or limit the display to only those objects whose properties have changed.\r\n</p>\r\n<p>\r\nProperty page views provide detailed information about objects.\r\n</p>\r\n<p>\r\nSupported object types include processes, services, CPUs, modules, drivers, network connections and interfaces, drives, shares, users, groups, logon sessions, and the Windows Event Log.\r\n</p>\r\n<p>\r\nThe Event Monitor displays user-selectable events such as process startups, new network connections, system resource levels, and more.\r\n</p>\r\n<p>\r\nOptional logging of all events to a file.\r\n</p>\r\n<p>\r\nLinking all objects, including events, for easy point-and-click navigation.\r\n</p>\r\n<p>\r\nCustom command line to run both external and internal commands.\r\n</p>\r\n<p>\r\nA complete Tcl console with access to the Tcl Windows API for advanced users.\r\n</p>\r\n<p>\r\nAutomatic launch and multi-function hotkey support for quick access.\r\n</p>', 0, 0, 1, '2022-07-12 20:53:32', '2022-07-12 22:00:04'),
(138, 'article', 3, 65485, '11.4 MB', '1uQ-LomR6noI94Cgb3wmBLFF7-l1WhBzW', '62cde00c8eeb9.jpg', '#8ac832', 'AppRemover - Software to remove any software', 'appremover-software-to-remove-any-software', '', '<p>\r\nThe free AppRemover utility allows you to completely remove security software such as anti-virus and anti-spyware applications from your computer. AppRemover is a free utility developed by OPSWAT that allows you to completely and easily remove security applications from your computer. Once downloaded, simply double-click the AppRemover icon. AppRemover will detect and let you easily choose which antivirus application to remove from your computer.\r\n</p>\r\n\r\n<p>\r\nFunctions:\r\n</p>\r\n<p>\r\nEfficient removal\r\n</p>\r\n<p>\r\nNo installation required\r\n</p>\r\n<p>\r\nSupport for McAfee, Symantec, ESET, AVG, Avira, Trend Micro and more.\r\n</p>\r\n<p>\r\nFree and easy to use\r\n</p>', 0, 0, 1, '2022-07-12 20:56:44', '2022-07-12 21:57:57'),
(139, 'article', 3, 75933, '19.9 MB', 'Ulj6iZrYM4jQaPVdd0Hlbo1DIxncJYj', '62cde04192be3.jpg', '#8ac832', 'Cloud System Booster - System maintenance and optimization', 'cloud-system-booster-system-maintenance-and-optimization', '', '<p>\r\nRepair: Smart find and fix PC errors. Application Cleaner and Optimization: Analyze installed applications on your PC to clean and optimize them to keep your PC running at peak performance.\r\n</p>\r\n<p>\r\nIt is designed for both novice and professional PC users, with one click a day to easily improve computer performance and the typical expert mode for professional PC repair.\r\n</p>\r\n<p>\r\nCloud optimization engine and online database\r\n</p>\r\n<p>\r\nWe get the latest profiles for all new software and use an online database in the cloud. Our cloud technology is user-defined, which means it evaluates programs based on thousands of ratings, some from technicians and others from users who have used the apps and want to share them with others.\r\n</p>', 0, 0, 1, '2022-07-12 20:57:37', '2022-07-12 21:56:33'),
(140, 'article', 3, 100915, '2.14 MB', '1BORvr4y7sax5YBHlxDFucy52AFT0vbWa', '62cde067ddb17.jpg', '#8ac832', 'HD Tune is a hard disk utility with the following features:', 'hd-tune-is-a-hard-disk-utility-with-the-following-features', '', '<pre>\r\nBenchmark: measures performance\r\n\r\nInformation: shows detailed information\r\n\r\nHealth: Checks health status using SMART.\r\n\r\nError Scan: Scans the surface for errors.\r\n\r\nTemperature display\r\n\r\nHD Tune can also work with other storage devices such as memory cards, USB sticks, iPods, etc.\r\n\r\nWhat\'s new:\r\n\r\nImproved temperature detection\r\n\r\nSave options:\r\n\r\nAdded the ability to export a screenshot in jpg format.\r\n\r\nYou can specify the time and date format\r\n\r\nAdded a command line option to display a list of all available drives.\r\n\r\nInfo: Improved volume detection\r\n\r\nFolder usage: improved volume detection\r\n</pre>\r\n', 1, 0, 1, '2022-07-12 20:58:15', '2022-07-12 21:55:21'),
(141, 'article', 3, 83717, '2.54 MB', '12pKPGRbJ4IoX-H6dFumwzDY-wrPoDEqs', '62cde09ea2063.jpg', '#8ac832', 'Auslogics System Information - Information about your system', 'auslogics-system-information-information-about-your-system', '', '<pre>\r\nAuslogics System Information provides comprehensive and easy to understand information about your system configuration. It can display hardware configuration, graphics card information, OS information, list of running processes and other \r\ninformation. Information can be saved as a file and sent to technical support. And it\'s absolutely free.\r\n\r\ndetailed information\r\n\r\nExplore detailed information about your hardware, hard drives, graphics card, processor, and memory. Learn more about memory and CPU usage and examine the processes running on your system.\r\n\r\nEase of use\r\n\r\nSystem Information is much easier to use and understand than the built-in Windows System Information tool. Visual graphs and charts will help you assess the condition of your computer.\r\n</pre>\r\n', 0, 0, 1, '2022-07-12 20:59:10', '2022-07-12 21:54:16'),
(142, 'article', 6, 96182, '94.3 MB', '1j8qbzw7KHHPpBrZXBu0hFH3RLWI_7_K9', '62cde0cd734d9.jpg', '#8ac832', 'Shotcut - Отличный видеоредактор', 'shotcut-otlichnyj-videoredaktor', '', '<pre>\r\nShotcut supports a wide range of formats and codecs thanks to FFmpeg. No import required, which means native timeline editing, Blackmagic Design support for input monitoring and previews, and resolution support up to 4k.\r\n\r\nOther features include a screen, webcam, and audio capture. Playback network stream. Supports capture from SDI, HDMI, webcam, JACK & Pulse audio, IP stream, X11 screen and Windows DirectShow devices. Multiple dockable and detachable panels including detailed media properties, searchable recent files, thumbnail playlist, filter panel, history view, encoding panel, job queue, and melted server and playlist. Also supports drag and drop of resources from the file manager.\r\n\r\nFunctions:\r\n\r\nno import required - own editing\r\n\r\nframe-accurate search for many formats\r\n\r\nmulti-format timeline: mix and match resolutions and frame rates within a project\r\n\r\nscreen capture (Linux only) including background capture for Shotcut session capture\r\n\r\nwebcam capture (Linux only)\r\n\r\naudio capture (Linux only; PulseAudio, JACK or ALSA)\r\n\r\nnetwork stream playback (HTTP, HLS, RTMP, RTSP, MMS, UDP)\r\n\r\nfree video creation plugins (like color bars and plasma)\r\n\r\nBlackmagic Design SDI and HDMI input and preview\r\n\r\nJACK Transport Synchronization\r\n\r\ndeinterlacing\r\n\r\ndetailed media properties panel\r\n\r\nrecent files panel\r\n</pre>\r\n', 2, 0, 1, '2022-07-12 20:59:57', '2022-07-12 21:52:32'),
(143, 'article', 3, 91736, '27 MB', '1ptcOwaZ4aQk2jZ-i3gxt6BOm9EcApJ7u', '62cde0fa0b305.jpg', '#8ac832', 'FireAlpaca - Light and handy image editor', 'firealpaca-light-and-handy-image-editor', '', '<p>\r\nFireAlpaca has many of the features you would expect from a paid program, but for free.\r\n\r\nFunctions:\r\n\r\nImage Rotation\r\n\r\nsomersault\r\n\r\nResize\r\n\r\nLayers\r\n\r\nEffects\r\n\r\nVarious brushes\r\n\r\nMagic wand\r\n\r\ngradients\r\n\r\nwide range of tools\r\n\r\nFireAlpaca opens a window on startup. This window shows advertisements and information generating income from the development/operation of this program, which is available to you free of charge. This window also displays notifications, top tips, and update reports.\r\n\r\nWhat\'s new:\r\n\r\nAdded \"Split\" to grid settings.\r\n\r\nImproved display of transform anchor in high resolution desktop environment.\r\n\r\nFixed a bug when specifying a layer color.\r\n\r\nFixed a bug when using a dropper containing translucent pixels.\r\n\r\nAllow canvas uncropping.\r\n</p>\r\n', 0, 0, 1, '2022-07-12 21:00:31', '2022-07-12 23:20:20'),
(144, 'article', 6, 119548, '32.7 MB', '1TBfTEVFLOdEA144ZwsCbzyP3pRQDLbEX', '62cde129d6fa7.jpg', '#8ac832', 'Zortam Mp3 Media Studio - Органайзер и музыкальный инструмент', 'zortam-mp3-media-studio-organajzer-i-muzykalnyj-instrument', '', '<pre>\r\nZortam Mp3 Media Studio - Organizer and musical instrument\r\n\r\nРазный софт\r\n\r\nОн содержит органайзер тегов Mp3 ID3 для поиска и каталогизации файлов Mp3 в библиотеку Mp3, редактирования тегов ID3v1 и ID3v2.4 (редактор тегов ID3 ​​- редактор тегов Mp3), CD Ripper с поддержкой обложек альбомов / текстов песен, который использует CDDB (Internet Compact Disc).\r\n\r\nбазы данных) и автоматически записывает теги ID3v1 и ID3v2.4. CD Ripper загружает обложки альбомов и тексты песен из Интернета по мере того, как вы копируете свой компакт-диск (CD Ripper с поддержкой текстов/обложек), нормализатор Mp3 с настраиваемым уровнем громкости позволяет Интернет (Batch Lyric Finder), поиск обложек альбомов (альбомов) обложек (изображений) в Интернете (Batch Cover Finder), пакетный поиск текстов песен и обложек в Интернете (Batch Lyric-Cover Finder).\r\n\r\nНа данный момент Zortam — единственное приложение, которое может автоматически помечать музыкальную коллекцию в формате Mp3 с помощью музыкальной интернет-базы данных Zortam (ZMLIMD), включая все теги Id3v2 (обложки с текстами песен, жанры и т. д.), а файлы Mp3 готовы к передаче на iPod с скрытым оформлением. и тексты вместе, которые можно показывать на iPod, мобильных телефонах и т. д.\r\n\r\nФункции:\r\n\r\nАвтоматически помечайте свою музыкальную коллекцию в формате Mp3 с помощью музыкальной интернет-базы данных Zortam (ZMLIMD).\r\n\r\nMp3 Tagger и MP3 Manager и iPod Manager\r\n\r\nПеренос файлов MP3 с iPod обратно на компьютер и в библиотеку Zortam Mp3\r\n\r\nВоспроизводите, нормализуйте и записывайте Mp3 прямо с вашего iPod\r\n\r\nZortam Mp3 Player с обложками и поддержкой текстов песен\r\n\r\nУпорядочивайте музыку в формате MP3 и редактируйте теги в своей аудиобиблиотеке с помощью мощного интерфейса.\r\n\r\nЗагрузите 50000 MP3 и более со скоростью света\r\n\r\nРедактор тегов ID3 - (Mp3 Tagger) с отдельными представлениями для тегов ID3v1 и ID3v2.4\r\n\r\nСкачать текст песни и скачать обложку\r\n</pre>\r\n', 0, 0, 1, '2022-07-12 21:01:29', '2022-07-12 21:50:47'),
(145, 'article', 1, 73809, '161 MB', '1VQVcprHsSzpjBKnMfbsziYwXegDxEMoV', '62cde15b73090.jpg', '#8ac832', 'GitKraken - The Legendary Developer Tool', 'gitkraken-the-legendary-developer-tool', '', '<pre>\r\n\r\nGitKraken is a cross-platform, user-friendly and highly efficient GUI git client for Linux, Windows and macOS. It supports GitHub, Bitbucket and Gitlab, and of course allows you to work with corporate source code repositories.\r\n\r\nWorking with repositories using GitKraken really makes things easier, and it\'s not just for novice developers. It allows you to quickly perform both basic operations and something more complex: resolve merge conflicts, merge, rearrange commits, rewrite history if necessary.\r\n\r\nOf course, all this can be done in the console, but it is not always possible to remember the correct command syntax and you have to spend time looking for a solution. In the case of complex branching, in any case, you have to use some kind of graphical representation of the tree. Figures 1 and 2 show a comparison of the graphical display of the repository graph in GitKraken and Git Cli.\r\n\r\nCross-platform\r\n\r\nRepo management\r\n\r\nFull integration\r\n\r\ndrag and drop\r\n\r\nGit LFS\r\n\r\nUndo and redo in 1 click\r\n\r\nGit hook support\r\n\r\nFuzzy Search\r\n\r\nGitflow support\r\n\r\nResizable Commit Graph\r\n\r\nHotkeys\r\n\r\nFile and wine history\r\n\r\nSubmodules\r\n\r\nLight and dark themes\r\n\r\nIn-App Merge Tool\r\n\r\nVisual Interactions\r\n\r\nProfessions\r\n\r\nMerge Conflict Editor\r\n\r\nMultiple profiles\r\n\r\nAdditional Integrations\r\n</pre>\r\n', 0, 0, 1, '2022-07-12 21:02:19', '2022-07-12 21:49:23'),
(146, 'article', 3, 71913, '18.7 MB', '1MC85MFfMuhP3ir1MxeUOIdJ0aP-Fnuo3', '62cde18546bb9.jpg', '#8ac832', 'Sublime Merge - Great text editor', 'sublime-merge-great-text-editor', '', '<p>\r\n\r\nWith a fast, cross-platform GUI toolchain, an unrivaled syntax highlighting engine, and a highly customizable, high-performance Git reader library, Sublime Merge sets the bar for performance.\r\n\r\nPrecise and flexible\r\n\r\nCapture exactly what you want with line-by-line and step-by-step staging. Select one or more lines to split snippets into multiple changes.\r\n\r\nWith Sublime Text\'s powerful syntax highlighting, you can understand exactly what has changed in a commit. With over 40 supported languages ​​and automatic loading of installed third-party syntaxes, we\'ve got you covered.\r\n\r\nWhen you use Sublime Merge, you are using Git. View the exact Git commands you use and seamlessly switch between the command line and Sublime Merge.\r\n\r\nPowerful search\r\n\r\nLooking for a commit? Use search as you type to find the exact commit you\'re looking for.\r\n\r\nYour Git Client\r\n\r\nMake it yours with a customizable layout and powerful theme system.\r\n\r\nWhat\'s new:\r\n\r\nNew features\r\n\r\nCherry Pick multiple commits via commit graph and context menu\r\n\r\nCherry Pick: added -x flag support\r\n\r\nRevert multiple commits via commit graph and context menu\r\n\r\nSet commit templates with the Git config variable commit.template (see here for more info)\r\n\r\nHardware acceleration: several performance improvements\r\n</p>\r\n', 0, 0, 1, '2022-07-12 21:03:01', '2022-07-12 23:20:02'),
(147, 'article', 3, 56700, '197 MB', '1p_IsyQfBToIDC-h1tgeKPmab0EVPyg6G', '62cde1adde34a.jpg', '#8ac832', 'Atom Beta - Free Text Editor', 'atom-beta-free-text-editor', '', '<p>\r\n\r\nDo you want to be at the forefront? The beta channel contains new features and bug fixes before they hit the stable channel. It is intended for developers and early adopters. Keep your current Atom configuration when using Atom beta. New beta versions are available regularly and are installed automatically.\r\n\r\n</p>\r\n\r\n<p>\r\n\r\nAt GitHub, we\'re building the text editor we\'ve always wanted. A tool that you can set up for just about anything, but also be productive on your first day without even touching a config file. Atom is modern, accessible, and hacked to the core. We can\'t wait to see what you build with it.\r\n</p>\r\n\r\n<small>\r\nNote. You can download the latest stable version of Atom here.\r\n</small>\r\n<hr>\r\n\r\n<p>\r\nNative Web Adoption\r\n</p>\r\n\r\n<p>\r\nAtom is a web-based desktop application. Like other desktop applications, it has its own dock icon, native menus and dialogs, and full access to the file system.\r\n</p>\r\n\r\n<p>\r\nHowever, open developer tools and Atom Web Core shines through. Whether you\'re customizing the look and feel of Atom\'s interface with CSS or adding core functionality with HTML and JavaScript, managing the editor has never been easier.\r\n</p>\r\n\r\n<p>\r\nIntegration with Node.js\r\n</p>\r\n\r\n<p>\r\nNode.js support makes it easy to access the file system, create subprocesses, and even start servers directly from your editor. Need a library? Choose from over 50,000 Node. Need to call C or C++? This is also possible.\r\n</p>\r\n\r\n<p>\r\nSeamless integration allows you to freely mix and match the use of Node and browser APIs. Manage the file system and write to the DOM with a single JavaScript function.\r\n</p>\r\n\r\n<p>\r\nModular design\r\n</p>\r\n<p>\r\nAtom consists of over 50 open source packages that integrate around a minimal core. Our goal is a deeply extensible system that blurs the distinction between \"user\" and \"developer\".\r\n</p>\r\n', 2, 0, 1, '2022-07-12 21:03:41', '2022-07-12 23:56:26');

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `table_name` varchar(22) NOT NULL DEFAULT 'category',
  `category` varchar(255) NOT NULL,
  `section_id` int(11) NOT NULL,
  `category_title` varchar(255) NOT NULL DEFAULT 'null',
  `category_slug` varchar(100) NOT NULL,
  `category_subtitle` varchar(255) NOT NULL DEFAULT 'null',
  `category_content` varchar(300) NOT NULL,
  `category_imagesize` int(11) NOT NULL,
  `category_image` varchar(100) NOT NULL,
  `category_icon` varchar(50) NOT NULL,
  `category_status` int(11) NOT NULL DEFAULT 1,
  `category_created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `category_updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`category_id`, `table_name`, `category`, `section_id`, `category_title`, `category_slug`, `category_subtitle`, `category_content`, `category_imagesize`, `category_image`, `category_icon`, `category_status`, `category_created_at`, `category_updated_at`) VALUES
(1, 'category', 'software', 1, 'software', 'software', 'Взлом/обходи', 'https://github.com/iranianpep/ajax-live-searchhttps://www.sitepoint.com/14-jquery-live-search-plugins/', 39264, '62cd85224c243.jpg', 'flame.svg', 1, '2020-10-26 13:00:38', '2022-07-12 14:28:50'),
(2, 'category', 'database', 1, 'database', 'database', 'Брут/спам/подборки', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iste unde eligendi nulla, accusantium, pariatur neque! Distinctio ea, nulla adipisci esse, quas cupiditate nobis. Omnis, maiores atque modi blanditiis perspiciatis commodi neque nesciunt voluptas sequi eum ducimus id ratione corrupti tenet', 267771, '62cd83e87379f.jpg', 'flame.svg', 1, '2020-07-03 02:16:19', '2022-07-12 14:23:36'),
(3, 'category', 'windows software', 2, 'windows software', 'windows-software', 'software for windows', 'Lorem ipsum, dolor sit amet, consectetur adipisicing elit. Sed sapiente cumque dolorem, quo ipsa quasi, distinctio quisquam quod, suscipit aliquam nulla perspiciatis dolorum, accusantium rerum voluptates reiciendis. Sit, soluta eum.', 82883, '62cdad6c98f87.jpg', 'windows.svg', 1, '2022-07-12 17:20:17', '2022-07-12 17:23:19'),
(5, 'category', 'appearance', 2, 'appearance', 'appearance', 'Рабочий стол', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iste unde eligendi nulla, accusantium, pariatur neque! Distinctio ea, nulla adipisci esse, quas cupiditate nobis. Omnis, maiores atque modi blanditiis perspiciatis commodi neque nesciunt voluptas sequi eum ducimus id ratione corrupti tenet', 34585, '62cd850f6e5cd.jpg', 'windows.svg', 1, '2020-07-03 02:16:19', '2022-07-12 14:28:31'),
(6, 'category', 'media', 2, 'media', 'media', 'Аудио/видео/фото', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iste unde eligendi nulla, accusantium, pariatur neque! Distinctio ea, nulla adipisci esse, quas cupiditate nobis. Omnis, maiores atque modi blanditiis perspiciatis commodi neque nesciunt voluptas sequi eum ducimus id ratione corrupti tenet', 62947, '62cd85073779a.jpg', 'windows.svg', 1, '2020-07-03 02:16:19', '2022-07-12 14:28:23'),
(7, 'category', 'system', 2, 'system', 'system', 'Ускорители/Оптимизаторы', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iste unde eligendi nulla, accusantium, pariatur neque! Distinctio ea, nulla adipisci esse, quas cupiditate nobis. Omnis, maiores atque modi blanditiis perspiciatis commodi neque nesciunt voluptas sequi eum ducimus id ratione corrupti tenet', 524913, '62cd85000c51a.jpg', 'windows.svg', 1, '2020-07-03 02:16:20', '2022-07-12 14:28:16'),
(8, 'category', 'Security', 2, 'Security', 'security', 'Антивирусы/сканеры', '«Бума́жный дом» — испанский телесериал в жанре криминальной драмы. Премьерный показ состоялся 2 мая 2017 года на телеканале Antena 3. После его успеха в своей стране сериал заинтересовал американский стриминговый сервис Netflix, который купил права на международный показLore', 246566, '62cd84a30a9ba.jpg', 'windows.svg', 1, '2020-07-03 02:16:20', '2022-07-12 14:26:43'),
(9, 'category', 'developer', 2, 'developer', 'developer', 'Редакторы/Эмуляторы', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iste unde eligendi nulla, accusantium, pariatur neque! Distinctio ea, nulla adipisci esse, quas cupiditate nobis. Omnis, maiores atque modi blanditiis perspiciatis commodi neque nesciunt voluptas sequi eum ducimus id ratione corrupti tenet', 257098, '62cd84f91734d.jpg', 'windows.svg', 1, '2020-07-03 02:16:20', '2022-07-12 14:28:09'),
(10, 'category', 'templates', 3, 'html/css', 'html-css', 'Шаблоны', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iste unde eligendi nulla, accusantium, pariatur neque! Distinctio ea, nulla adipisci esse, quas cupiditate nobis. Omnis, maiores atque modi blanditiis perspiciatis commodi neque nesciunt voluptas sequi eum ducimus id ratione corrupti tenet', 5945, '62cd83a427280.png', 'react.svg', 1, '2020-07-03 02:16:21', '2022-07-12 14:22:28'),
(11, 'category', 'php', 3, 'php/mysql', 'php-mysql', 'скрипты', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia itaque illum maiores deleniti doloribus suscipit sunt eaque accusantium alias sint atque ab placeat ullam error perferendis cupiditate porro, fugiat est voluptatum corporis reiciendis consequatur recusandae. Omnis odit iste conseq', 34531, '62cc91c05c6e7.png', 'react.svg', 1, '2020-07-03 02:16:21', '2022-07-11 21:10:24'),
(12, 'category', 'javascript', 3, 'JavaScript', 'javascript', 'Скрипты/эффекты', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia itaque illum maiores deleniti doloribus suscipit sunt eaque accusantium alias sint atque ab placeat ullam error perferendis cupiditate porro, fugiat est voluptatum corporis reiciendis consequatur recusandae. Omnis odit iste conseq', 174773, '62cc91bb0553f.jpg', 'react.svg', 1, '2020-07-03 02:16:21', '2022-07-11 21:10:19'),
(13, 'category', 'psd', 3, 'PSD Layouts', 'psd-layouts', 'Для тренировки', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia itaque illum maiores deleniti doloribus suscipit sunt eaque accusantium alias sint atque ab placeat ullam error perferendis cupiditate porro, fugiat est voluptatum corporis reiciendis consequatur recusandae. Omnis odit iste conseq', 569673, '62cd832e3d7c3.png', 'react.svg', 1, '2020-07-03 02:16:21', '2022-07-12 14:20:30'),
(14, 'category', 'images', 3, 'images', 'images', 'Паки', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia itaque illum maiores deleniti doloribus suscipit sunt eaque accusantium alias sint atque ab placeat ullam error perferendis cupiditate porro, fugiat est voluptatum corporis reiciendis consequatur recusandae. Omnis odit iste conseq', 201522, '62cd83147a3b0.jpg', 'react.svg', 1, '2020-07-03 02:16:21', '2022-07-12 14:20:04'),
(15, 'category', 'icons', 3, 'icons', 'icons', 'Подборки', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia itaque illum maiores deleniti doloribus suscipit sunt eaque accusantium alias sint atque ab placeat ullam error perferendis cupiditate porro, fugiat est voluptatum corporis reiciendis consequatur recusandae. Omnis odit iste conseq', 116116, '62cc91c9ce570.jpg', 'react.svg', 1, '2020-07-03 02:16:21', '2022-07-11 21:10:33'),
(16, 'category', 'fonts', 3, 'Fonts', 'fonts', 'Лучшие', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia itaque illum maiores deleniti doloribus suscipit sunt eaque accusantium alias sint atque ab placeat ullam error perferendis cupiditate porro, fugiat est voluptatum corporis reiciendis consequatur recusandae. Omnis odit iste conseq', 49080, '62cc91d12631c.jpg', 'react.svg', 1, '2020-07-03 02:16:21', '2022-07-11 21:10:41'),
(17, 'category', 'mockups', 3, 'Mockups', 'mockups', 'для/PHOTOSHOP', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia itaque illum maiores deleniti doloribus suscipit sunt eaque accusantium alias sint atque ab placeat ullam error perferendis cupiditate porro, fugiat est voluptatum corporis reiciendis consequatur recusandae. Omnis odit iste conseq', 115863, '62cd82b7e9fed.jpg', 'react.svg', 1, '2020-07-03 02:16:21', '2022-07-12 14:18:31'),
(18, 'category', 'gfx', 3, 'GFX', 'gfx', 'для/PHOTOSHOP', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia itaque illum maiores deleniti doloribus suscipit sunt eaque accusantium alias sint atque ab placeat ullam error perferendis cupiditate porro, fugiat est voluptatum corporis reiciendis consequatur recusandae. Omnis odit iste conseq', 82123, '62cd823548bd4.jpg', 'react.svg', 1, '2020-07-03 02:16:22', '2022-07-12 14:16:21'),
(19, 'category', 'other', 4, 'other', 'other', 'other', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iste unde eligendi nulla, accusantium, pariatur neque! Distinctio ea, nulla adipisci esse, quas cupiditate nobis. Omnis, maiores atque modi blanditiis perspiciatis commodi neque nesciunt voluptas sequi eum ducimus id ratione corrupti tenets', 267229, '62cc912c2d406.png', 'proton.svg', 1, '2020-07-03 02:16:20', '2022-07-11 21:07:56');

-- --------------------------------------------------------

--
-- Структура таблицы `chat`
--

CREATE TABLE `chat` (
  `chat_id` int(11) NOT NULL,
  `table_name` varchar(20) NOT NULL DEFAULT 'chat',
  `user_id` int(11) NOT NULL,
  `chat_text` text NOT NULL,
  `chat_status` int(11) NOT NULL DEFAULT 1,
  `chat_date` varchar(50) NOT NULL,
  `chat_created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `chat`
--

INSERT INTO `chat` (`chat_id`, `table_name`, `user_id`, `chat_text`, `chat_status`, `chat_date`, `chat_created_at`) VALUES
(2, 'chat', 1, 'hello everyone', 1, '', '2022-07-11 20:29:07'),
(6, 'chat', 1, 'very hard day', 1, '13.07.22', '2022-07-12 23:25:43'),
(7, 'chat', 101, 'hello cookie', 1, '13.07.22', '2022-07-13 16:14:17');

-- --------------------------------------------------------

--
-- Структура таблицы `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `table_name` varchar(20) NOT NULL DEFAULT 'comment',
  `article_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment_text` text NOT NULL,
  `comment_like` int(11) NOT NULL DEFAULT 0,
  `comment_dislike` int(11) NOT NULL DEFAULT 0,
  `comment_status` int(11) NOT NULL DEFAULT 1,
  `comment_date` varchar(50) NOT NULL,
  `comment_created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `comment_updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `comment_rating`
--

CREATE TABLE `comment_rating` (
  `comment_rating_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `download`
--

CREATE TABLE `download` (
  `download_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `ip_address` varchar(100) NOT NULL,
  `download_created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `download`
--

INSERT INTO `download` (`download_id`, `article_id`, `user_id`, `ip_address`, `download_created_at`) VALUES
(1, 2, 1, '192.168.44.1', '2022-07-11 20:50:29');

-- --------------------------------------------------------

--
-- Структура таблицы `guest`
--

CREATE TABLE `guest` (
  `guest_id` int(11) NOT NULL,
  `guest_last_visit` int(11) NOT NULL,
  `guest_ip` varchar(15) NOT NULL,
  `guest_status` int(11) NOT NULL DEFAULT 0,
  `guest_country` varchar(50) NOT NULL DEFAULT 'unknown',
  `guest_country_code` varchar(50) NOT NULL DEFAULT 'unknown',
  `guest_city` varchar(50) NOT NULL DEFAULT 'unknown',
  `guest_lat` varchar(50) NOT NULL DEFAULT 'unknown',
  `guest_lon` varchar(50) NOT NULL DEFAULT 'unknown',
  `guest_isp` varchar(50) NOT NULL DEFAULT 'unknown',
  `guest_as` varchar(50) NOT NULL DEFAULT 'unknown',
  `guest_query` varchar(50) NOT NULL DEFAULT 'unknown',
  `guest_type` varchar(22) NOT NULL DEFAULT 'unknown',
  `guest_mode` varchar(20) NOT NULL DEFAULT 'new',
  `guest_created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `guest`
--

INSERT INTO `guest` (`guest_id`, `guest_last_visit`, `guest_ip`, `guest_status`, `guest_country`, `guest_country_code`, `guest_city`, `guest_lat`, `guest_lon`, `guest_isp`, `guest_as`, `guest_query`, `guest_type`, `guest_mode`, `guest_created_at`) VALUES
(640, 1657750356, '192.168.44.1', 0, 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unreliable', 'old', '2022-07-10 23:09:27'),
(641, 1672895821, '2400:cb00:70:10', 0, 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'new', '2023-01-05 05:17:01'),
(642, 1672895821, '2400:cb00:70:10', 0, 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'new', '2023-01-05 05:17:01'),
(643, 1672895822, '2400:cb00:70:10', 0, 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'new', '2023-01-05 05:17:02'),
(644, 1672895823, '2400:cb00:70:10', 0, 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'new', '2023-01-05 05:17:03'),
(645, 1672895825, '2400:cb00:70:10', 0, 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'new', '2023-01-05 05:17:05'),
(646, 1672895825, '2400:cb00:70:10', 0, 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'new', '2023-01-05 05:17:05'),
(647, 1672895825, '2400:cb00:70:10', 0, 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'new', '2023-01-05 05:17:05'),
(648, 1672895825, '2400:cb00:70:10', 0, 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'new', '2023-01-05 05:17:05'),
(649, 1672895825, '2400:cb00:70:10', 0, 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'new', '2023-01-05 05:17:05'),
(650, 1672895825, '2400:cb00:70:10', 0, 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'new', '2023-01-05 05:17:05'),
(651, 1672895826, '2400:cb00:70:10', 0, 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'new', '2023-01-05 05:17:06'),
(652, 1672895826, '2400:cb00:70:10', 0, 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'new', '2023-01-05 05:17:06'),
(653, 1672895827, '2400:cb00:70:10', 0, 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'new', '2023-01-05 05:17:07'),
(654, 1672895827, '2400:cb00:70:10', 0, 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'new', '2023-01-05 05:17:07'),
(655, 1672895828, '2400:cb00:70:10', 0, 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'new', '2023-01-05 05:17:08'),
(656, 1672895828, '2400:cb00:70:10', 0, 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'new', '2023-01-05 05:17:08'),
(657, 1672895829, '2400:cb00:70:10', 0, 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'new', '2023-01-05 05:17:09'),
(658, 1672895829, '2400:cb00:70:10', 0, 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'new', '2023-01-05 05:17:09'),
(659, 1672895830, '2400:cb00:70:10', 0, 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'new', '2023-01-05 05:17:10'),
(660, 1672895830, '2400:cb00:70:10', 0, 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'new', '2023-01-05 05:17:10'),
(661, 1672895831, '2400:cb00:70:10', 0, 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'new', '2023-01-05 05:17:11'),
(662, 1672895831, '2400:cb00:70:10', 0, 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'new', '2023-01-05 05:17:11'),
(663, 1672895876, '2400:cb00:70:10', 0, 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'new', '2023-01-05 05:17:56'),
(664, 1672895876, '2400:cb00:70:10', 0, 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'new', '2023-01-05 05:17:56'),
(665, 1672895877, '2400:cb00:70:10', 0, 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'new', '2023-01-05 05:17:57'),
(666, 1672895877, '2400:cb00:70:10', 0, 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'new', '2023-01-05 05:17:57'),
(667, 1672895882, '2400:cb00:70:10', 0, 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'new', '2023-01-05 05:18:02'),
(668, 1672895882, '2400:cb00:70:10', 0, 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'new', '2023-01-05 05:18:02'),
(669, 1672895883, '2400:cb00:70:10', 0, 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'new', '2023-01-05 05:18:03'),
(670, 1672895883, '2400:cb00:70:10', 0, 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'new', '2023-01-05 05:18:03'),
(671, 1672895884, '2400:cb00:70:10', 0, 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'new', '2023-01-05 05:18:04'),
(672, 1672895884, '2400:cb00:70:10', 0, 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'new', '2023-01-05 05:18:04'),
(673, 1672895884, '2400:cb00:70:10', 0, 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'new', '2023-01-05 05:18:04'),
(674, 1672895889, '2400:cb00:70:10', 0, 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'new', '2023-01-05 05:18:09'),
(675, 1672895889, '2400:cb00:70:10', 0, 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'new', '2023-01-05 05:18:09'),
(676, 1672895889, '2400:cb00:70:10', 0, 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'new', '2023-01-05 05:18:09'),
(677, 1672895890, '2400:cb00:70:10', 0, 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'new', '2023-01-05 05:18:10'),
(678, 1672895890, '2400:cb00:70:10', 0, 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'new', '2023-01-05 05:18:10'),
(679, 1672895890, '2400:cb00:70:10', 0, 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'new', '2023-01-05 05:18:10'),
(680, 1672895908, '2400:cb00:70:10', 0, 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'new', '2023-01-05 05:18:28'),
(681, 1672895908, '2400:cb00:70:10', 0, 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'new', '2023-01-05 05:18:28'),
(682, 1672895908, '2400:cb00:70:10', 0, 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'new', '2023-01-05 05:18:28'),
(683, 1672896156, '2400:cb00:70:10', 0, 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'new', '2023-01-05 05:22:36'),
(684, 1672896157, '2400:cb00:70:10', 0, 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'new', '2023-01-05 05:22:37'),
(685, 1672896157, '2400:cb00:70:10', 0, 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'new', '2023-01-05 05:22:37'),
(686, 1672896175, '2400:cb00:70:10', 0, 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'new', '2023-01-05 05:22:55'),
(687, 1672896175, '2400:cb00:70:10', 0, 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'new', '2023-01-05 05:22:55'),
(688, 1672896175, '2400:cb00:70:10', 0, 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'new', '2023-01-05 05:22:55'),
(689, 1672896182, '2400:cb00:70:10', 0, 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'new', '2023-01-05 05:23:02');

-- --------------------------------------------------------

--
-- Структура таблицы `image`
--

CREATE TABLE `image` (
  `image_id` int(11) NOT NULL,
  `table_name` varchar(22) NOT NULL DEFAULT 'image',
  `article_id` int(11) NOT NULL,
  `image_image` varchar(50) NOT NULL,
  `image_size` int(11) NOT NULL,
  `image_created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `image_updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `image`
--

INSERT INTO `image` (`image_id`, `table_name`, `article_id`, `image_image`, `image_size`, `image_created_at`, `image_updated_at`) VALUES
(3, 'image', 25, '62cdab1b9ede9.png', 0, '2022-07-12 17:10:51', '2022-07-12 17:10:51'),
(4, 'image', 25, '62cdab1bb26f3.png', 0, '2022-07-12 17:10:51', '2022-07-12 17:10:51'),
(5, 'image', 26, '62cdab2439ef5.jpg', 0, '2022-07-12 17:11:00', '2022-07-12 17:11:00'),
(6, 'image', 26, '62cdab2450431.jpg', 0, '2022-07-12 17:11:00', '2022-07-12 17:11:00'),
(7, 'image', 27, '62cdabd9c9833.png', 0, '2022-07-12 17:14:01', '2022-07-12 17:14:01'),
(8, 'image', 27, '62cdabd9f010d.jpg', 0, '2022-07-12 17:14:01', '2022-07-12 17:14:01'),
(9, 'image', 28, '62cdac5fde440.jpg', 0, '2022-07-12 17:16:15', '2022-07-12 17:16:15'),
(10, 'image', 28, '62cdac60069a6.jpg', 0, '2022-07-12 17:16:16', '2022-07-12 17:16:16'),
(11, 'image', 30, '62cdb06067f5a.png', 0, '2022-07-12 17:33:20', '2022-07-12 17:33:20'),
(12, 'image', 30, '62cdb0607a48d.png', 0, '2022-07-12 17:33:20', '2022-07-12 17:33:20'),
(13, 'image', 31, '62cdb0ebc704a.jpg', 0, '2022-07-12 17:35:39', '2022-07-12 17:35:39'),
(14, 'image', 31, '62cdb0ebebb06.jpg', 0, '2022-07-12 17:35:39', '2022-07-12 17:35:39'),
(15, 'image', 32, '62cdb16cd45cb.png', 0, '2022-07-12 17:37:48', '2022-07-12 17:37:48'),
(16, 'image', 32, '62cdb16d02802.png', 0, '2022-07-12 17:37:49', '2022-07-12 17:37:49'),
(17, 'image', 33, '62cdb1eb011d5.png', 0, '2022-07-12 17:39:55', '2022-07-12 17:39:55'),
(18, 'image', 33, '62cdb1eb3a5d4.jpg', 0, '2022-07-12 17:39:55', '2022-07-12 17:39:55'),
(19, 'image', 36, '62cdb415d1c6c.png', 0, '2022-07-12 17:49:09', '2022-07-12 17:49:09'),
(20, 'image', 35, '62cdb4206b0c4.png', 0, '2022-07-12 17:49:20', '2022-07-12 17:49:20'),
(21, 'image', 35, '62cdb4209632e.png', 0, '2022-07-12 17:49:20', '2022-07-12 17:49:20'),
(22, 'image', 34, '62cdb42c341ca.jpg', 0, '2022-07-12 17:49:32', '2022-07-12 17:49:32'),
(23, 'image', 37, '62cdb4ade8090.jpg', 0, '2022-07-12 17:51:41', '2022-07-12 17:51:41'),
(24, 'image', 37, '62cdb4ae19e62.png', 0, '2022-07-12 17:51:42', '2022-07-12 17:51:42'),
(25, 'image', 38, '62cdb57b901da.jpg', 0, '2022-07-12 17:55:07', '2022-07-12 17:55:07'),
(26, 'image', 38, '62cdb57bb1f4c.jpg', 0, '2022-07-12 17:55:07', '2022-07-12 17:55:07'),
(27, 'image', 39, '62cdb659602a4.jpg', 0, '2022-07-12 17:58:49', '2022-07-12 17:58:49'),
(28, 'image', 39, '62cdb6598cb1d.png', 0, '2022-07-12 17:58:49', '2022-07-12 17:58:49'),
(29, 'image', 40, '62cdb6d9e198f.jpg', 0, '2022-07-12 18:00:57', '2022-07-12 18:00:57'),
(30, 'image', 40, '62cdb6da13d71.png', 0, '2022-07-12 18:00:58', '2022-07-12 18:00:58'),
(31, 'image', 41, '62cdb75d9a54b.jpg', 0, '2022-07-12 18:03:09', '2022-07-12 18:03:09'),
(32, 'image', 41, '62cdb75db8bd1.jpg', 0, '2022-07-12 18:03:09', '2022-07-12 18:03:09'),
(33, 'image', 43, '62cdb85955c48.png', 0, '2022-07-12 18:07:21', '2022-07-12 18:07:21'),
(34, 'image', 43, '62cdb859a6691.jpg', 0, '2022-07-12 18:07:21', '2022-07-12 18:07:21'),
(35, 'image', 44, '62cdb8fc4775e.jpg', 0, '2022-07-12 18:10:04', '2022-07-12 18:10:04'),
(36, 'image', 44, '62cdb8fc63f81.png', 0, '2022-07-12 18:10:04', '2022-07-12 18:10:04'),
(37, 'image', 45, '62cdb9bf1f8b8.png', 0, '2022-07-12 18:13:19', '2022-07-12 18:13:19'),
(38, 'image', 45, '62cdb9bf8bc28.png', 0, '2022-07-12 18:13:19', '2022-07-12 18:13:19'),
(39, 'image', 46, '62cdba42776c8.jpg', 0, '2022-07-12 18:15:30', '2022-07-12 18:15:30'),
(40, 'image', 47, '62cdbabb2d178.jpg', 0, '2022-07-12 18:17:31', '2022-07-12 18:17:31'),
(41, 'image', 47, '62cdbabbe455e.jpg', 0, '2022-07-12 18:17:31', '2022-07-12 18:17:31'),
(42, 'image', 48, '62cdbb5cf1f39.gif', 0, '2022-07-12 18:20:12', '2022-07-12 18:20:12'),
(43, 'image', 48, '62cdbb5d22c6d.png', 0, '2022-07-12 18:20:13', '2022-07-12 18:20:13'),
(44, 'image', 49, '62cdbc5c4609e.jpg', 0, '2022-07-12 18:24:28', '2022-07-12 18:24:28'),
(45, 'image', 49, '62cdbc5c633cc.png', 0, '2022-07-12 18:24:28', '2022-07-12 18:24:28'),
(46, 'image', 50, '62cdbcbcb8f19.png', 0, '2022-07-12 18:26:04', '2022-07-12 18:26:04'),
(47, 'image', 50, '62cdbcbcd1b47.jpg', 0, '2022-07-12 18:26:04', '2022-07-12 18:26:04'),
(48, 'image', 52, '62cdca77c6d1a.jpg', 0, '2022-07-12 19:24:39', '2022-07-12 19:24:39'),
(49, 'image', 52, '62cdca77e59fa.jpg', 0, '2022-07-12 19:24:39', '2022-07-12 19:24:39'),
(50, 'image', 53, '62cdcb7b37fed.jpg', 0, '2022-07-12 19:28:59', '2022-07-12 19:28:59'),
(51, 'image', 53, '62cdcb7b58330.png', 0, '2022-07-12 19:28:59', '2022-07-12 19:28:59'),
(52, 'image', 54, '62cdcc40ee352.png', 0, '2022-07-12 19:32:16', '2022-07-12 19:32:16'),
(53, 'image', 54, '62cdcc410eb04.png', 0, '2022-07-12 19:32:17', '2022-07-12 19:32:17'),
(54, 'image', 55, '62cdccf291183.jpg', 0, '2022-07-12 19:35:14', '2022-07-12 19:35:14'),
(55, 'image', 55, '62cdccf2d6349.jpg', 0, '2022-07-12 19:35:14', '2022-07-12 19:35:14'),
(56, 'image', 56, '62cdcd754dc79.jpg', 0, '2022-07-12 19:37:25', '2022-07-12 19:37:25'),
(57, 'image', 56, '62cdcd75770c4.jpg', 0, '2022-07-12 19:37:25', '2022-07-12 19:37:25'),
(58, 'image', 57, '62cdcde2d5915.jpg', 0, '2022-07-12 19:39:14', '2022-07-12 19:39:14'),
(59, 'image', 57, '62cdcde2ed902.png', 0, '2022-07-12 19:39:14', '2022-07-12 19:39:14'),
(60, 'image', 58, '62cdce76630de.jpg', 0, '2022-07-12 19:41:42', '2022-07-12 19:41:42'),
(61, 'image', 58, '62cdce7685b31.jpg', 0, '2022-07-12 19:41:42', '2022-07-12 19:41:42'),
(62, 'image', 59, '62cdcecf9d6ad.png', 0, '2022-07-12 19:43:11', '2022-07-12 19:43:11'),
(63, 'image', 59, '62cdcecfc1a8d.jpg', 0, '2022-07-12 19:43:11', '2022-07-12 19:43:11'),
(64, 'image', 60, '62cdcf1a2a320.png', 0, '2022-07-12 19:44:26', '2022-07-12 19:44:26'),
(65, 'image', 60, '62cdcf1a4ec02.png', 0, '2022-07-12 19:44:26', '2022-07-12 19:44:26'),
(66, 'image', 61, '62cdcf7a13873.png', 0, '2022-07-12 19:46:02', '2022-07-12 19:46:02'),
(67, 'image', 61, '62cdcf7a222a3.png', 0, '2022-07-12 19:46:02', '2022-07-12 19:46:02'),
(68, 'image', 62, '62cdd219379d8.png', 0, '2022-07-12 19:57:13', '2022-07-12 19:57:13'),
(69, 'image', 62, '62cdd219539ee.png', 0, '2022-07-12 19:57:13', '2022-07-12 19:57:13'),
(70, 'image', 63, '62cdd28ebe7c5.jpg', 0, '2022-07-12 19:59:10', '2022-07-12 19:59:10'),
(71, 'image', 64, '62cdd2e208781.jpg', 0, '2022-07-12 20:00:34', '2022-07-12 20:00:34'),
(72, 'image', 64, '62cdd2e231b31.png', 0, '2022-07-12 20:00:34', '2022-07-12 20:00:34'),
(73, 'image', 66, '62cdd3da87109.jpg', 0, '2022-07-12 20:04:42', '2022-07-12 20:04:42'),
(74, 'image', 66, '62cdd3daa7fdf.jpg', 0, '2022-07-12 20:04:42', '2022-07-12 20:04:42'),
(77, 'image', 67, '62cdd4ad1dc8e.png', 0, '2022-07-12 20:08:13', '2022-07-12 20:08:13'),
(78, 'image', 67, '62cdd4ad3af8c.jpg', 0, '2022-07-12 20:08:13', '2022-07-12 20:08:13'),
(79, 'image', 69, '62cdd4e1eb0eb.jpg', 0, '2022-07-12 20:09:05', '2022-07-12 20:09:05'),
(80, 'image', 69, '62cdd4e211837.png', 0, '2022-07-12 20:09:06', '2022-07-12 20:09:06'),
(81, 'image', 70, '62cdd5058c23a.jpg', 0, '2022-07-12 20:09:41', '2022-07-12 20:09:41'),
(82, 'image', 70, '62cdd505b21f5.jpg', 0, '2022-07-12 20:09:41', '2022-07-12 20:09:41'),
(83, 'image', 71, '62cdd5222e02b.jpg', 0, '2022-07-12 20:10:10', '2022-07-12 20:10:10'),
(84, 'image', 71, '62cdd522456ce.png', 0, '2022-07-12 20:10:10', '2022-07-12 20:10:10'),
(85, 'image', 72, '62cdd53860fa4.jpg', 0, '2022-07-12 20:10:32', '2022-07-12 20:10:32'),
(86, 'image', 72, '62cdd538794d4.png', 0, '2022-07-12 20:10:32', '2022-07-12 20:10:32'),
(87, 'image', 73, '62cdd56b55eed.jpg', 0, '2022-07-12 20:11:23', '2022-07-12 20:11:23'),
(88, 'image', 73, '62cdd56b78ac8.jpg', 0, '2022-07-12 20:11:23', '2022-07-12 20:11:23'),
(89, 'image', 74, '62cdd588d1733.jpg', 0, '2022-07-12 20:11:52', '2022-07-12 20:11:52'),
(90, 'image', 74, '62cdd588ea6cf.jpg', 0, '2022-07-12 20:11:52', '2022-07-12 20:11:52'),
(91, 'image', 75, '62cdd5a2ee411.png', 0, '2022-07-12 20:12:18', '2022-07-12 20:12:18'),
(92, 'image', 75, '62cdd5a312862.png', 0, '2022-07-12 20:12:19', '2022-07-12 20:12:19'),
(93, 'image', 76, '62cdd5ba8cba9.jpg', 0, '2022-07-12 20:12:42', '2022-07-12 20:12:42'),
(94, 'image', 76, '62cdd5bab4966.jpg', 0, '2022-07-12 20:12:42', '2022-07-12 20:12:42'),
(95, 'image', 77, '62cdd5d2d4e75.png', 0, '2022-07-12 20:13:06', '2022-07-12 20:13:06'),
(96, 'image', 77, '62cdd5d30e230.jpg', 0, '2022-07-12 20:13:07', '2022-07-12 20:13:07'),
(97, 'image', 78, '62cdd5e8cf253.jpg', 0, '2022-07-12 20:13:28', '2022-07-12 20:13:28'),
(98, 'image', 79, '62cdd6014c003.jpg', 0, '2022-07-12 20:13:53', '2022-07-12 20:13:53'),
(99, 'image', 79, '62cdd601ad483.jpg', 0, '2022-07-12 20:13:53', '2022-07-12 20:13:53'),
(100, 'image', 80, '62cdd619b7662.jpg', 0, '2022-07-12 20:14:17', '2022-07-12 20:14:17'),
(101, 'image', 81, '62cdd62fd3b12.jpeg', 0, '2022-07-12 20:14:39', '2022-07-12 20:14:39'),
(102, 'image', 81, '62cdd63019c1b.jpeg', 0, '2022-07-12 20:14:40', '2022-07-12 20:14:40'),
(103, 'image', 82, '62cdd69112520.jpg', 0, '2022-07-12 20:16:17', '2022-07-12 20:16:17'),
(104, 'image', 82, '62cdd69130f67.png', 0, '2022-07-12 20:16:17', '2022-07-12 20:16:17'),
(105, 'image', 83, '62cdd6a923f3c.jpg', 0, '2022-07-12 20:16:41', '2022-07-12 20:16:41'),
(106, 'image', 83, '62cdd6a981a82.jpg', 0, '2022-07-12 20:16:41', '2022-07-12 20:16:41'),
(107, 'image', 84, '62cdd6beadfa9.png', 0, '2022-07-12 20:17:02', '2022-07-12 20:17:02'),
(108, 'image', 85, '62cdd6d56fab8.jpg', 0, '2022-07-12 20:17:25', '2022-07-12 20:17:25'),
(109, 'image', 85, '62cdd6d591588.jpg', 0, '2022-07-12 20:17:25', '2022-07-12 20:17:25'),
(110, 'image', 86, '62cdd6eb169cc.png', 0, '2022-07-12 20:17:47', '2022-07-12 20:17:47'),
(111, 'image', 86, '62cdd6eb34fbf.jpeg', 0, '2022-07-12 20:17:47', '2022-07-12 20:17:47'),
(112, 'image', 87, '62cdd7098008b.jpeg', 0, '2022-07-12 20:18:17', '2022-07-12 20:18:17'),
(113, 'image', 87, '62cdd709a0c6d.jpeg', 0, '2022-07-12 20:18:17', '2022-07-12 20:18:17'),
(114, 'image', 88, '62cdd72323ce8.png', 0, '2022-07-12 20:18:43', '2022-07-12 20:18:43'),
(115, 'image', 88, '62cdd72340c15.jpeg', 0, '2022-07-12 20:18:43', '2022-07-12 20:18:43'),
(116, 'image', 89, '62cdd771b7b9b.jpg', 0, '2022-07-12 20:20:01', '2022-07-12 20:20:01'),
(117, 'image', 89, '62cdd77267432.png', 0, '2022-07-12 20:20:02', '2022-07-12 20:20:02'),
(118, 'image', 90, '62cdd78b5c515.jpeg', 0, '2022-07-12 20:20:27', '2022-07-12 20:20:27'),
(119, 'image', 90, '62cdd78b76408.jpg', 0, '2022-07-12 20:20:27', '2022-07-12 20:20:27'),
(120, 'image', 91, '62cdd7b68abb4.png', 0, '2022-07-12 20:21:10', '2022-07-12 20:21:10'),
(121, 'image', 91, '62cdd7b6c4fd3.jpg', 0, '2022-07-12 20:21:10', '2022-07-12 20:21:10'),
(122, 'image', 92, '62cdd7ec14e3b.jpg', 0, '2022-07-12 20:22:04', '2022-07-12 20:22:04'),
(123, 'image', 92, '62cdd7ec36a60.jpg', 0, '2022-07-12 20:22:04', '2022-07-12 20:22:04'),
(124, 'image', 93, '62cdd81d1a24c.jpg', 0, '2022-07-12 20:22:53', '2022-07-12 20:22:53'),
(125, 'image', 93, '62cdd81d2f553.png', 0, '2022-07-12 20:22:53', '2022-07-12 20:22:53'),
(126, 'image', 94, '62cdd85b9e49f.png', 0, '2022-07-12 20:23:55', '2022-07-12 20:23:55'),
(127, 'image', 94, '62cdd85bb7c54.png', 0, '2022-07-12 20:23:55', '2022-07-12 20:23:55'),
(128, 'image', 95, '62cdd88231aec.jpg', 0, '2022-07-12 20:24:34', '2022-07-12 20:24:34'),
(129, 'image', 95, '62cdd8824d81f.png', 0, '2022-07-12 20:24:34', '2022-07-12 20:24:34'),
(130, 'image', 96, '62cdd8beda91f.jpg', 0, '2022-07-12 20:25:34', '2022-07-12 20:25:34'),
(131, 'image', 96, '62cdd8bf05adb.jpg', 0, '2022-07-12 20:25:35', '2022-07-12 20:25:35'),
(132, 'image', 97, '62cdd8efc7ac1.png', 0, '2022-07-12 20:26:23', '2022-07-12 20:26:23'),
(133, 'image', 97, '62cdd8f044c9f.jpg', 0, '2022-07-12 20:26:24', '2022-07-12 20:26:24'),
(134, 'image', 98, '62cdd967752e2.jpg', 0, '2022-07-12 20:28:23', '2022-07-12 20:28:23'),
(135, 'image', 99, '62cdd98eb51c1.jpg', 0, '2022-07-12 20:29:02', '2022-07-12 20:29:02'),
(136, 'image', 100, '62cdd9aa8e4c8.jpg', 0, '2022-07-12 20:29:30', '2022-07-12 20:29:30'),
(137, 'image', 100, '62cdd9aaaed9d.jpg', 0, '2022-07-12 20:29:30', '2022-07-12 20:29:30'),
(138, 'image', 101, '62cdd9e3cea8b.jpg', 0, '2022-07-12 20:30:27', '2022-07-12 20:30:27'),
(139, 'image', 101, '62cdd9e3f0694.jpg', 0, '2022-07-12 20:30:27', '2022-07-12 20:30:27'),
(140, 'image', 102, '62cdda0a6f472.jpg', 0, '2022-07-12 20:31:06', '2022-07-12 20:31:06'),
(141, 'image', 102, '62cdda0ac0ce7.jpg', 0, '2022-07-12 20:31:06', '2022-07-12 20:31:06'),
(142, 'image', 103, '62cdda23d27f6.jpg', 0, '2022-07-12 20:31:31', '2022-07-12 20:31:31'),
(143, 'image', 104, '62cdda3e518d7.jpg', 0, '2022-07-12 20:31:58', '2022-07-12 20:31:58'),
(144, 'image', 105, '62cdda688e5c3.png', 0, '2022-07-12 20:32:40', '2022-07-12 20:32:40'),
(145, 'image', 105, '62cdda68a906f.png', 0, '2022-07-12 20:32:40', '2022-07-12 20:32:40'),
(146, 'image', 106, '62cdda932f04f.jpg', 0, '2022-07-12 20:33:23', '2022-07-12 20:33:23'),
(147, 'image', 106, '62cdda93cef61.jpg', 0, '2022-07-12 20:33:23', '2022-07-12 20:33:23'),
(148, 'image', 107, '62cddabc666fa.png', 0, '2022-07-12 20:34:04', '2022-07-12 20:34:04'),
(149, 'image', 107, '62cddabc7ecbf.jpg', 0, '2022-07-12 20:34:04', '2022-07-12 20:34:04'),
(150, 'image', 108, '62cddad6091d9.jpg', 0, '2022-07-12 20:34:30', '2022-07-12 20:34:30'),
(151, 'image', 108, '62cddad63f03e.jpg', 0, '2022-07-12 20:34:30', '2022-07-12 20:34:30'),
(152, 'image', 109, '62cddaf4cb12c.jpg', 0, '2022-07-12 20:35:00', '2022-07-12 20:35:00'),
(153, 'image', 109, '62cddaf4e9e2e.png', 0, '2022-07-12 20:35:00', '2022-07-12 20:35:00'),
(154, 'image', 111, '62cddb4e892d3.jpg', 0, '2022-07-12 20:36:30', '2022-07-12 20:36:30'),
(155, 'image', 111, '62cddb4eafdef.jpg', 0, '2022-07-12 20:36:30', '2022-07-12 20:36:30'),
(156, 'image', 112, '62cddb71dea3c.jpg', 0, '2022-07-12 20:37:05', '2022-07-12 20:37:05'),
(157, 'image', 112, '62cddb7256a6a.png', 0, '2022-07-12 20:37:06', '2022-07-12 20:37:06'),
(158, 'image', 113, '62cddb95c1405.jpg', 0, '2022-07-12 20:37:41', '2022-07-12 20:37:41'),
(159, 'image', 113, '62cddb95e3ce0.png', 0, '2022-07-12 20:37:41', '2022-07-12 20:37:41'),
(160, 'image', 114, '62cddbb654afb.jpg', 0, '2022-07-12 20:38:14', '2022-07-12 20:38:14'),
(161, 'image', 114, '62cddbb670a6e.jpg', 0, '2022-07-12 20:38:14', '2022-07-12 20:38:14'),
(162, 'image', 115, '62cddbdc0aad5.jpg', 0, '2022-07-12 20:38:52', '2022-07-12 20:38:52'),
(163, 'image', 115, '62cddbdc2efc5.jpg', 0, '2022-07-12 20:38:52', '2022-07-12 20:38:52'),
(164, 'image', 116, '62cddc101f7e5.jpg', 0, '2022-07-12 20:39:44', '2022-07-12 20:39:44'),
(165, 'image', 116, '62cddc10409cd.jpg', 0, '2022-07-12 20:39:44', '2022-07-12 20:39:44'),
(166, 'image', 117, '62cddc30a59fc.png', 0, '2022-07-12 20:40:16', '2022-07-12 20:40:16'),
(167, 'image', 117, '62cddc30c52d2.png', 0, '2022-07-12 20:40:16', '2022-07-12 20:40:16'),
(168, 'image', 119, '62cddcd444afa.png', 0, '2022-07-12 20:43:00', '2022-07-12 20:43:00'),
(169, 'image', 119, '62cddcd464982.png', 0, '2022-07-12 20:43:00', '2022-07-12 20:43:00'),
(170, 'image', 120, '62cddcf19c67b.jpg', 0, '2022-07-12 20:43:29', '2022-07-12 20:43:29'),
(171, 'image', 120, '62cddcf1c36a3.png', 0, '2022-07-12 20:43:29', '2022-07-12 20:43:29'),
(172, 'image', 121, '62cddd0f2e6cd.png', 0, '2022-07-12 20:43:59', '2022-07-12 20:43:59'),
(173, 'image', 121, '62cddd0f45ff9.jpg', 0, '2022-07-12 20:43:59', '2022-07-12 20:43:59'),
(174, 'image', 122, '62cddd37ceb1f.jpg', 0, '2022-07-12 20:44:39', '2022-07-12 20:44:39'),
(175, 'image', 122, '62cddd380092e.jpg', 0, '2022-07-12 20:44:40', '2022-07-12 20:44:40'),
(176, 'image', 123, '62cddd55015fa.png', 0, '2022-07-12 20:45:09', '2022-07-12 20:45:09'),
(177, 'image', 125, '62cddd84eacdf.jpg', 0, '2022-07-12 20:45:56', '2022-07-12 20:45:56'),
(178, 'image', 125, '62cddd8517b51.jpg', 0, '2022-07-12 20:45:57', '2022-07-12 20:45:57'),
(179, 'image', 126, '62cddda8e8bd7.png', 0, '2022-07-12 20:46:32', '2022-07-12 20:46:32'),
(180, 'image', 127, '62cddde2f047a.jpg', 0, '2022-07-12 20:47:30', '2022-07-12 20:47:30'),
(181, 'image', 127, '62cddde361919.png', 0, '2022-07-12 20:47:31', '2022-07-12 20:47:31'),
(182, 'image', 128, '62cdddfe1b0ad.gif', 0, '2022-07-12 20:47:58', '2022-07-12 20:47:58'),
(183, 'image', 129, '62cdde283dad1.jpg', 0, '2022-07-12 20:48:40', '2022-07-12 20:48:40'),
(184, 'image', 130, '62cdde46a7f02.jpg', 0, '2022-07-12 20:49:10', '2022-07-12 20:49:10'),
(185, 'image', 130, '62cdde46c0d41.jpg', 0, '2022-07-12 20:49:10', '2022-07-12 20:49:10'),
(187, 'image', 131, '62cdde7468dac.jpg', 0, '2022-07-12 20:49:56', '2022-07-12 20:49:56'),
(188, 'image', 131, '62cdde748450b.jpg', 0, '2022-07-12 20:49:56', '2022-07-12 20:49:56'),
(189, 'image', 132, '62cdde99b656f.jpg', 0, '2022-07-12 20:50:33', '2022-07-12 20:50:33'),
(191, 'image', 132, '62cddea242853.png', 0, '2022-07-12 20:50:42', '2022-07-12 20:50:42'),
(192, 'image', 133, '62cdded1d2fd4.png', 0, '2022-07-12 20:51:29', '2022-07-12 20:51:29'),
(193, 'image', 133, '62cdded24c1fb.png', 0, '2022-07-12 20:51:30', '2022-07-12 20:51:30'),
(194, 'image', 134, '62cddef416ae3.jpg', 0, '2022-07-12 20:52:04', '2022-07-12 20:52:04'),
(195, 'image', 134, '62cddef438e45.jpg', 0, '2022-07-12 20:52:04', '2022-07-12 20:52:04'),
(196, 'image', 135, '62cddf0fb140e.jpg', 0, '2022-07-12 20:52:31', '2022-07-12 20:52:31'),
(197, 'image', 135, '62cddf0fc9bd9.jpg', 0, '2022-07-12 20:52:31', '2022-07-12 20:52:31'),
(198, 'image', 136, '62cddf39b2e49.jpg', 0, '2022-07-12 20:53:13', '2022-07-12 20:53:13'),
(199, 'image', 137, '62cddf51cbb33.png', 0, '2022-07-12 20:53:37', '2022-07-12 20:53:37'),
(200, 'image', 137, '62cddf51ec8dc.jpg', 0, '2022-07-12 20:53:37', '2022-07-12 20:53:37'),
(201, 'image', 138, '62cde012bb95a.jpg', 0, '2022-07-12 20:56:50', '2022-07-12 20:56:50'),
(202, 'image', 138, '62cde012d8048.jpeg', 0, '2022-07-12 20:56:50', '2022-07-12 20:56:50'),
(203, 'image', 139, '62cde04582793.png', 0, '2022-07-12 20:57:41', '2022-07-12 20:57:41'),
(204, 'image', 139, '62cde045a451c.jpg', 0, '2022-07-12 20:57:41', '2022-07-12 20:57:41'),
(205, 'image', 140, '62cde07916d7d.jpg', 0, '2022-07-12 20:58:33', '2022-07-12 20:58:33'),
(206, 'image', 140, '62cde0792f660.jpg', 0, '2022-07-12 20:58:33', '2022-07-12 20:58:33'),
(207, 'image', 141, '62cde0a457106.jpg', 0, '2022-07-12 20:59:16', '2022-07-12 20:59:16'),
(208, 'image', 141, '62cde0a4833fd.png', 0, '2022-07-12 20:59:16', '2022-07-12 20:59:16'),
(209, 'image', 142, '62cde0d0b6abc.png', 0, '2022-07-12 21:00:00', '2022-07-12 21:00:00'),
(210, 'image', 143, '62cde0fee224c.jpg', 0, '2022-07-12 21:00:46', '2022-07-12 21:00:46'),
(211, 'image', 143, '62cde0ff104d3.jpg', 0, '2022-07-12 21:00:47', '2022-07-12 21:00:47'),
(212, 'image', 144, '62cde13082b71.jpg', 0, '2022-07-12 21:01:36', '2022-07-12 21:01:36'),
(213, 'image', 144, '62cde1309b382.png', 0, '2022-07-12 21:01:36', '2022-07-12 21:01:36'),
(214, 'image', 145, '62cde16219484.jpg', 0, '2022-07-12 21:02:26', '2022-07-12 21:02:26'),
(215, 'image', 145, '62cde16230fc8.png', 0, '2022-07-12 21:02:26', '2022-07-12 21:02:26'),
(216, 'image', 146, '62cde18ce1e0a.jpg', 0, '2022-07-12 21:03:08', '2022-07-12 21:03:08'),
(217, 'image', 146, '62cde18d1076b.png', 0, '2022-07-12 21:03:09', '2022-07-12 21:03:09'),
(218, 'image', 147, '62cde1b322038.jpg', 0, '2022-07-12 21:03:47', '2022-07-12 21:03:47');

-- --------------------------------------------------------

--
-- Структура таблицы `notice`
--

CREATE TABLE `notice` (
  `notice_id` int(11) NOT NULL,
  `table_name` varchar(22) NOT NULL DEFAULT 'notice',
  `notice` varchar(50) NOT NULL,
  `notice_title` varchar(100) NOT NULL,
  `notice_subtitle` varchar(100) NOT NULL,
  `notice_slug` varchar(50) NOT NULL,
  `notice_imagesize` int(11) NOT NULL,
  `notice_image` varchar(100) NOT NULL,
  `notice_status` int(11) NOT NULL DEFAULT 1,
  `notice_created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `notice_updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `notice`
--

INSERT INTO `notice` (`notice_id`, `table_name`, `notice`, `notice_title`, `notice_subtitle`, `notice_slug`, `notice_imagesize`, `notice_image`, `notice_status`, `notice_created_at`, `notice_updated_at`) VALUES
(1, 'notice', '190101101', '190101101', 'echo@190101101.com', '190101101', 201522, '62ccbd560bbe4.jpg', 1, '2021-10-16 14:41:12', '2022-07-12 00:15:04');

-- --------------------------------------------------------

--
-- Структура таблицы `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `table_name` varchar(22) NOT NULL DEFAULT 'post',
  `notice_id` int(11) NOT NULL,
  `post_title` varchar(100) NOT NULL,
  `post_content` varchar(119) NOT NULL,
  `post_link` varchar(500) DEFAULT NULL,
  `post_status` int(11) NOT NULL DEFAULT 1,
  `post_image` varchar(100) NOT NULL,
  `post_imagesize` int(11) NOT NULL,
  `post_created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `post_updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `post`
--

INSERT INTO `post` (`post_id`, `table_name`, `notice_id`, `post_title`, `post_content`, `post_link`, `post_status`, `post_image`, `post_imagesize`, `post_created_at`, `post_updated_at`) VALUES
(3, 'post', 1, 'old days', 'miss the old days', '', 1, '62ce0119b43ca.jpg', 34585, '2022-07-12 23:17:45', '2022-07-12 23:17:45');

-- --------------------------------------------------------

--
-- Структура таблицы `section`
--

CREATE TABLE `section` (
  `section_id` int(11) NOT NULL,
  `table_name` varchar(22) NOT NULL DEFAULT 'section',
  `section` varchar(50) NOT NULL,
  `section_title` varchar(100) NOT NULL,
  `section_slug` varchar(50) NOT NULL,
  `section_icon` varchar(50) NOT NULL,
  `section_status` int(11) NOT NULL DEFAULT 1,
  `section_created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `section_updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `section`
--

INSERT INTO `section` (`section_id`, `table_name`, `section`, `section_title`, `section_slug`, `section_icon`, `section_status`, `section_created_at`, `section_updated_at`) VALUES
(1, 'section', 'CyberSecurity', 'cyber security', 'cyber-security', 'flame.svg', 1, '2021-10-16 12:36:22', '2022-07-11 01:23:14'),
(2, 'section', 'Software', 'software windows', 'software-windows', 'windows.svg', 1, '2021-10-16 12:36:22', '2022-07-11 01:23:12'),
(3, 'section', 'Freebies', 'developer', 'developer', 'code.svg', 1, '2021-10-16 12:36:22', '2022-07-11 01:23:10'),
(4, 'section', 'Other', 'other', 'other', 'proton.svg', 1, '2021-10-16 12:36:22', '2022-07-11 23:22:15');

-- --------------------------------------------------------

--
-- Структура таблицы `setting`
--

CREATE TABLE `setting` (
  `setting_id` int(11) NOT NULL,
  `setting_description` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `setting_key` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `setting_value` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `setting_updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Дамп данных таблицы `setting`
--

INSERT INTO `setting` (`setting_id`, `setting_description`, `setting_key`, `setting_value`, `setting_updated_at`) VALUES
(1, 'Site Owner', 'author', '190101101', '2022-07-11 17:46:39'),
(2, 'Site url', 'Site_url', 'https://www.190101101.com/', '2022-07-11 17:48:12'),
(3, 'meta description', 'meta_description', 'KLONDIKE PROGRAMMER', '2022-07-11 17:48:12'),
(4, 'meta keywords', 'meta_keywords', 'blog', '2022-07-11 17:48:12'),
(5, 'meta author', 'meta_author', '190101101', '2022-07-11 17:49:07'),
(6, 'Phone number', 'phone', '+994 51 988 66 99', '2022-07-11 17:49:07'),
(7, 'email address', 'email', 'echo@190101101@.com', '2022-07-13 00:13:13'),
(11, 'youtube account', 'youtube', 'https://www.youtube.com/channel/UCXj-ksNh-FcQsMSJ0MGN87w', '2022-07-11 17:52:52'),
(12, 'instagram account', 'instagram', 'https://www.instagram.com/o190101101/', '2022-07-11 17:52:31'),
(17, 'github Account', 'github', 'https://github.com/190101101', '2022-07-11 17:52:11'),
(24, 'about us', 'about', '<p>hi my name is 0rxan i am a php web developer. I want to tell you about myself. I live in Azerbaijan, I am 30 years old, web development is my hobby and what I love to do I do all day. With extensive experience in software development, I provide a wide range of consulting services, conducting a comprehensive analysis of your existing system, scheduling your plan to introduce new components, and guiding you through the world of complex software. It is important for me to find the right solution that is flexible and cost effective and ideally aligned with your business goals and IT strategy. I take into account the size of your business, your industry, the goals you are pursuing, the tasks you want to accomplish, the challenges you face, and will help you save money, make money and optimize your business operations with intelligent software solutions. I am a mid-level software engineer with over 4 years of experience and 1 years of freelance work.</p><p>My main development tool is php. I know php better than neo kung fu.<br />I prefer to work with people who know what they need and can explain it.<br />I am always looking for the best and most optimal way to implement features with minimal risk and better performance.<br />I am crazy about interesting and non-trivial tasks.<br />My coding style is simple, which means that anyone else can easily understand and support the code in the future.</p><p>I know how to create a clean and maintainable project architecture, and I also know how to optimize queries and project performance.</p><p>I always adhere to all MVC / SOLID / PSR coding standards where possible.<br />I love working with various APIs, parsers, big data, interesting architectural solutions.</p><p>I always try to improve my skills from task to task in order to find more and more optimal ways for some tasks, solutions, architecture, etc.<br />:: My technology stack ::<br />✔ :: PHP / Laravel<br />✔ :: MySQL / SQL<br />✔ :: VCS: / Composer / Git / Github / packagist<br />✔ :: MVC / SOLID / OOP<br />✔ :: REST API<br />✔ :: Html5 / XML<br />✔ :: CSS3 / Bootstrap5 / LESS<br />✔ :: JavaScript / jQuery / JSON</p><p>I am mainly a backend developer, but I can do both web development and backend development;<br />I&#39;ve worked a lot with the Instagram API (smm services, parsers, etc.).<br />Also I have experience with big data projects, troubleshooting, etc.</p>', '2022-07-11 17:32:49'),
(25, 'file count', 'file', '117', '2022-07-12 14:14:05'),
(26, 'downloads', 'download', '43', '2022-07-12 17:17:10'),
(30, 'Copyright', 'copyright', 'Copyright © Echo 2022', '2022-07-11 17:46:08');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `table_name` varchar(30) NOT NULL DEFAULT 'user',
  `user_ip` varchar(50) NOT NULL,
  `user_login` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_color` varchar(20) NOT NULL DEFAULT '#28a745',
  `user_status` int(11) NOT NULL DEFAULT 1,
  `user_level` int(11) NOT NULL DEFAULT 1,
  `user_created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`user_id`, `table_name`, `user_ip`, `user_login`, `user_password`, `user_color`, `user_status`, `user_level`, `user_created_at`, `user_updated_at`) VALUES
(1, 'user', '990.567.798.782', 'cookie', 'jksdhalkdasd', '#eeff00', 1, 1, '2022-06-25 17:18:05', '2022-07-12 13:29:57'),
(2, 'user', '289.901.981.885', 'apsi', '222', '#FF4040', 1, 1, '2022-06-25 17:18:26', '2022-07-07 20:21:11'),
(3, 'user', '683.276.306.370', 'caiser', '333', '#ff00ea', 1, 1, '2022-06-25 17:18:32', '2022-07-04 14:36:15'),
(4, 'user', '', 'ketty', '444', '#0091ff', 1, 1, '2022-07-04 18:33:08', '2022-07-04 18:33:08'),
(5, 'user', '', 'pepi', '555', '#8A2BE2', 1, 1, '2022-07-04 18:33:08', '2022-07-04 18:33:08'),
(93, 'user', '651.492.543.815', 'syph', '666', '#ffffff', 1, 1, '2022-07-04 18:33:08', '2022-07-07 17:38:45'),
(101, 'user', '127.0.0.1', 'echo', 'jksdhalkdasd', '#FF1493', 1, 99, '2022-07-13 00:14:26', '2023-01-05 05:18:02');

-- --------------------------------------------------------

--
-- Структура таблицы `vote`
--

CREATE TABLE `vote` (
  `vote_id` int(11) NOT NULL,
  `voting_id` int(11) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `vote_created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `vote`
--

INSERT INTO `vote` (`vote_id`, `voting_id`, `ip_address`, `vote_created_at`) VALUES
(1, 1, '192.168.44.1', '2022-07-12 14:13:25'),
(2, 1, '283.625.268.263', '2022-07-13 00:19:09'),
(3, 1, '127.0.0.1', '2023-01-05 05:17:55');

-- --------------------------------------------------------

--
-- Структура таблицы `voting`
--

CREATE TABLE `voting` (
  `voting_id` int(11) NOT NULL,
  `table_name` varchar(22) NOT NULL DEFAULT 'voting',
  `voting_content` varchar(500) NOT NULL,
  `voting_color` varchar(50) NOT NULL,
  `voting_vote_count_a` int(11) NOT NULL DEFAULT 1,
  `voting_vote_count_b` int(11) NOT NULL DEFAULT 1,
  `voting_vote_percent_a` float NOT NULL DEFAULT 50,
  `voting_vote_percent_b` float NOT NULL DEFAULT 50,
  `voting_vote_count_total` int(11) NOT NULL DEFAULT 2,
  `voting_option_a` varchar(50) NOT NULL DEFAULT '',
  `voting_option_b` varchar(50) NOT NULL DEFAULT '',
  `voting_type` varchar(10) NOT NULL DEFAULT 'simple',
  `voting_status` int(11) NOT NULL DEFAULT 1,
  `voting_updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `voting_created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `voting`
--

INSERT INTO `voting` (`voting_id`, `table_name`, `voting_content`, `voting_color`, `voting_vote_count_a`, `voting_vote_count_b`, `voting_vote_percent_a`, `voting_vote_percent_b`, `voting_vote_count_total`, `voting_option_a`, `voting_option_b`, `voting_type`, `voting_status`, `voting_updated_at`, `voting_created_at`) VALUES
(1, 'voting', 'how do you like my site?', '#ff1493', 4, 1, 80, 20, 5, 'Good', 'poorly', 'main', 1, '2022-07-11 19:37:23', '2020-10-24 03:42:27');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `ad`
--
ALTER TABLE `ad`
  ADD PRIMARY KEY (`ad_id`),
  ADD KEY `ad_url` (`ad_link`),
  ADD KEY `ad_content` (`ad_content`),
  ADD KEY `ad_status` (`ad_status`),
  ADD KEY `ad_title` (`ad_title`);

--
-- Индексы таблицы `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`article_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `article_imagesize` (`article_imagesize`),
  ADD KEY `article_archivesize` (`article_archivesize`),
  ADD KEY `article_archive` (`article_archive`),
  ADD KEY `article_image` (`article_image`),
  ADD KEY `article_color` (`article_color`),
  ADD KEY `article_title` (`article_title`),
  ADD KEY `article_slug` (`article_slug`),
  ADD KEY `article_download` (`article_download`),
  ADD KEY `article_view` (`article_view`),
  ADD KEY `article_status` (`article_status`),
  ADD KEY `article_status_2` (`article_status`),
  ADD KEY `article_video` (`article_video`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`),
  ADD KEY `category` (`category`),
  ADD KEY `section_id` (`section_id`),
  ADD KEY `category_title` (`category_title`),
  ADD KEY `category_slug` (`category_slug`),
  ADD KEY `category_subtitle` (`category_subtitle`),
  ADD KEY `category_imagesize` (`category_imagesize`),
  ADD KEY `category_content` (`category_content`),
  ADD KEY `category_image` (`category_image`),
  ADD KEY `category_icon` (`category_icon`),
  ADD KEY `category_status` (`category_status`);

--
-- Индексы таблицы `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`chat_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `chat_status` (`chat_status`);

--
-- Индексы таблицы `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `article_id` (`article_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `comment_status` (`comment_status`),
  ADD KEY `comment_like` (`comment_like`),
  ADD KEY `comment_dislike` (`comment_dislike`);

--
-- Индексы таблицы `comment_rating`
--
ALTER TABLE `comment_rating`
  ADD PRIMARY KEY (`comment_rating_id`),
  ADD KEY `comment_id` (`comment_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `download`
--
ALTER TABLE `download`
  ADD PRIMARY KEY (`download_id`),
  ADD KEY `article_id` (`article_id`),
  ADD KEY `ip_address` (`ip_address`);

--
-- Индексы таблицы `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`guest_id`),
  ADD KEY `guest_ip` (`guest_ip`),
  ADD KEY `guest_last_visit` (`guest_last_visit`);

--
-- Индексы таблицы `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `article_id` (`article_id`),
  ADD KEY `image_image` (`image_image`);

--
-- Индексы таблицы `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`notice_id`),
  ADD KEY `notice` (`notice`),
  ADD KEY `notice_title` (`notice_title`),
  ADD KEY `notice_subtitle` (`notice_subtitle`),
  ADD KEY `notice_slug` (`notice_slug`),
  ADD KEY `notice_imagesize` (`notice_imagesize`),
  ADD KEY `notice_image` (`notice_image`),
  ADD KEY `notice_status` (`notice_status`);

--
-- Индексы таблицы `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `notice_id` (`notice_id`),
  ADD KEY `post_title` (`post_title`),
  ADD KEY `post_status` (`post_status`),
  ADD KEY `post_image` (`post_image`),
  ADD KEY `post_link` (`post_link`),
  ADD KEY `post_content` (`post_content`),
  ADD KEY `post_imagesize` (`post_imagesize`);

--
-- Индексы таблицы `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`section_id`),
  ADD KEY `section` (`section`),
  ADD KEY `section_title` (`section_title`),
  ADD KEY `section_slug` (`section_slug`),
  ADD KEY `section_icon` (`section_icon`),
  ADD KEY `section_status` (`section_status`);

--
-- Индексы таблицы `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`setting_id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_ip` (`user_ip`),
  ADD KEY `user_login` (`user_login`),
  ADD KEY `user_color` (`user_color`),
  ADD KEY `user_status` (`user_status`),
  ADD KEY `user_level` (`user_level`),
  ADD KEY `user_password` (`user_password`);

--
-- Индексы таблицы `vote`
--
ALTER TABLE `vote`
  ADD PRIMARY KEY (`vote_id`),
  ADD KEY `voting_id` (`voting_id`),
  ADD KEY `user_ip` (`ip_address`);

--
-- Индексы таблицы `voting`
--
ALTER TABLE `voting`
  ADD PRIMARY KEY (`voting_id`),
  ADD KEY `voting_color` (`voting_color`),
  ADD KEY `voting_vote_a` (`voting_vote_count_a`),
  ADD KEY `voting_vote_b` (`voting_vote_count_b`),
  ADD KEY `voting_option_a` (`voting_option_a`),
  ADD KEY `voting_status` (`voting_status`),
  ADD KEY `voting_option_b` (`voting_option_b`),
  ADD KEY `voting_vote_percent_a` (`voting_vote_percent_a`),
  ADD KEY `voting_vote_percent_b` (`voting_vote_percent_b`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `ad`
--
ALTER TABLE `ad`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `article`
--
ALTER TABLE `article`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `category_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT для таблицы `chat`
--
ALTER TABLE `chat`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `comment_rating`
--
ALTER TABLE `comment_rating`
  MODIFY `comment_rating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `download`
--
ALTER TABLE `download`
  MODIFY `download_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `guest`
--
ALTER TABLE `guest`
  MODIFY `guest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=690;

--
-- AUTO_INCREMENT для таблицы `image`
--
ALTER TABLE `image`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=219;

--
-- AUTO_INCREMENT для таблицы `notice`
--
ALTER TABLE `notice`
  MODIFY `notice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `section`
--
ALTER TABLE `section`
  MODIFY `section_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `setting`
--
ALTER TABLE `setting`
  MODIFY `setting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT для таблицы `vote`
--
ALTER TABLE `vote`
  MODIFY `vote_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `voting`
--
ALTER TABLE `voting`
  MODIFY `voting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

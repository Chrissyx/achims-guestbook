# Achims Guestbook
This is a **fork** of Achim Winkler's Guestbook picking up the latest release 2.53 from 2006 with many fixes and PHP 8 compatibility.  
Description, installation, help and FAQ texts are unearthed from http://www.lkcc.org:8500/ and provided "as is" (typos have been fixed + additional formatting).

[![GitHub release (latest SemVer)](https://img.shields.io/github/v/release/Chrissyx/achims-guestbook)](https://github.com/Chrissyx/achims-guestbook/releases/latest)
[![GitHub Release Date](https://img.shields.io/github/release-date/Chrissyx/achims-guestbook)](https://github.com/Chrissyx/achims-guestbook/releases/latest)
[![GitHub](https://img.shields.io/github/license/Chrissyx/achims-guestbook)](License)

## Modified by Chrissyx
- PHP 8 compatibility (minimum required version is now 5.5)
- Reformatted whole source code
- Fixed a lot of HTML entities (e.g. `&amp;` instead of `&`)
- Fixed redirection headers with parameters (`&` instead of `&amp;`)
- Added missing HTML tags like `<html>`
- Updated JavaScript `<script>` environments
- Added missing `global` visibility and variables declarations
- Fixed mail addresses during CSV import
- Fixed second part phrase during search
- Support for `https://` URLs
- Working help pop-up window
- Updated ICQ links and fixed MSN mail links
- Fixed cookie based moderator login
- Use bCrypt instead of MD5 for password hashing
- Added new CAPTCHA feature
- Optional UTF-8 encoded output

## Description
> A powerful multilanguage php guestbook which can handle really much data without the help of any known database like mySQL. You can configure the layout and some other options to adapt it to your needs. I included also an admin modul to remove or change special entries, to configure the whole script and do other important stuff. The speed is unbeatable fast and is compared to other databases just as fast or faster.

## Requirements
- ![php](https://img.shields.io/badge/php-%3E%3D5.5-blue)
- ![webspace](https://img.shields.io/badge/webspace-chmod--able-lightgrey)

## Installation
> Overwrite your old guestbook with the new files to get it working! Be sure that you make a backup of your data directory first!

## Help
### Installation
1. Open a ftp connection to your webserver and create a directory e.g. `/guestbook`.
2. Go into the created directory!
3. Unzip the guestbook on your local harddisk. Do not forget to extract the files inclusive the directory structure!
4. Copy all unpacked files and directories to your webserver with your ftp program.
5. Now check the filepermissions from the `/data` and `/temp` directory and the files:
   - `data/wordfilter.dat`
   - `data/ipfilter.dat`
   - `config.php`

   If they are not writetable, change the permissions with `chmod 700 [file or directory]` (you should do that with a telnet program).
6. Load your website with a browser and see what happens. I will describe some error possibilities in the following lines (go to point 9 if you started the script succesfully).
7. Some servers are very restrictive and they do not need `700` but `777` to get working. Connect your webserver with a telnet program again and set the directories: `/data` and `/temp` as well as the files `data/wordfilter.dat`, `data/ipfilter` and `config.php` to `777` with `chmod` (you get a help for this command with `man chmod`).
8. Now it should work for everybody without any errors! If it do not do what you want, replace the line `error_reporting(0);` from `guestbook.php` with `#error_reporting(0);` and run the script again. If you get an error message report it to me per mail.  
   If you are experienced create a new file with the filename `test.php` (on some servers is only the extension `.php3` active) and fill it with:
```
<?php
    phpinfo();
?>
```
   Now run this script with your browser and send me the results so that i can help.

9. Please run the script `admin/admin.php` and use "admin" (without "") as first password!!! You can setup all possible options inclusive the admin password now.

### Configuration
- `Language`  
  Choose your preferred language: "eng" = english, "ger" = german, "fre" = french, "ita" = italian, "por" = portuguese, "dut" = dutch, "spa" = spanish, "rus" = russian, "cze" = czech, "fin" = finnish, "chi" = chinese, "dan" = danish, "hug" = hungarian or "swe" = swedish.
- `IndexSize`  
  You can create huge databases with this feature in the cost of space on your webserver. The indexfile is used to address and to find the entries within the database. The higher you choose the value the more entries you can store. The indexsize defines the maximum addressable space. Here are 3 examples to make it clear:
  - Indexsize = 4 -> max. Datafilesize = 9.999 Byte
  - Indexsize = 8 -> max. Datafilesize = 99.999.999 Byte
  - Indexsize = 16 -> max. Datafilesize = 9.999.999.999.999.999 Byte

  It can only be changed if you create a new database. The database gets destroyed if you change it on a running database! I included an extra tool (administration menu) to enhance or reduce the indexsize for a running guestbook. Do it always with this tool and never manually!
- `EntriesPerPage`  
  This value specify the visible entries per page which can be changed all the time so that you can adapt it to your needs.
- `PageIndex`  
  On every guestbook page is a pageindex visible. You can increase or reduce the index by any odd number bigger than 3!
- `HTML_Filter`  
  1 = On / 0 = Off  
  The guestbook filters all HTML or other tags from user inputs if this switch is on. But you can use some special tags like you can see in the help of the input screen, if you put it on.
- `Word_Filter`  
  1 = On / 0 = Off  
  Unwanted words like "shit" or something else can be replaced by "*" in the size of the unwanted word if this switch is on. If you do not like it, put it off.
- `SmileyPics`  
  1 = On / 0 = Off  
  The administrator can force the smiley translation from ascii to gif (`Smileypics` = on), but he can not prevent it if the user want to use this feature. So the user has the last word.
- `LimitShownSmileylist`  
  Limit the visible smileys for the new entry page, so that the browser do not load tons of smileys every time a user want to add a new entry. You can make the rest available on the help page.
- `MaxSmileys`  
  Specify the maximum amount of smileys per entry.
- `MaxChars`  
  This value specify the maximum wordlength. Longer words are splitted by spaces.
- `MaxText`  
  This value reduces every entry to a specific length.
- `MaxLines`  
  Is the maximum amount of lines for one entry.
- `MaxPictures`  
  This value is the number of allowed pictures for an entry.
- `FloodWait`  
  This is the time the user has to wait between 2 posts from the same ip.
- `LogIP`  
  1 = On / 0 = Off  
  This feature enable or disable ip logging for paranoid people. The IP's are visible in the administration view only!
- `Messengers`  
  1 = On / 0 = Off  
  Some people dislike the messenger feature, therefore it is the possibility to disable it.
- `ShortMessengerFormat`  
  1 = On / 0 = Off  
  Shows the messengers in a short format where only the pictures are visible or in a long format where you can see the usernames behind the pictures. Try it to see how it looks.
- `Pictures`  
  1 = On / 0 = Off  
  You can put this switch on if you want to offer a picture support. This feature is risky, because users could post really huge images, so that the guestbook looks stretched in any direction (You can prevent from doing it, if you use the parameter `MaxXsize` and `MaxYsize`!).
- `CheckPic`  
  1 = On / 0 = Off  
  If you want to check the picturesize from included images, put this switch on. It can be that the user has to wait until your server downloaded the image and checked the size!
- `ShrinkImages`  
  1 = On / 0 = Off  
  Bigger images than `MaxXsize` or `MaxYsize` are shrinked if you enable this feature. They get ignored if not (the shrinkprocess does not prevent the user from long download times for big images!).
- `MaxXsize`  
  Maximum possible imagewidth.
- `MaxYsize`  
  The same like above, only for the height.
- `ShowSmileys`  
  1 = On / 0 = Off  
  Activate/Deactivate the smiley on click function from the new entry dialog.
- `ShowOptions`  
  1 = On / 0 = Off  
  Activate/Deactivate the options from the new entry dialog.
- `ShowHelp`  
  1 = On / 0 = Off  
  Activate/Deactivate the help screen from the new entry dialog.
- `ShortHelpFormat`  
  1 = On / 0 = Off  
  The help is available as little link if you enable this feature. You can see it in the right upper corner of the new entry page.
- `ShowLocation`  
  1 = On / 0 = Off  
  Activate/Deactivate the location selection from the new entry dialog.
- `PreviewChecked`  
  1 = On / 0 = Off  
  Enable/Disable the preview button from the new entry dialog.
- `EmotionChecked`  
  1 = On / 0 = Off  
  Enable/Disable the emotion button from the new entry dialog.
- `NewDateOnEdit`  
  1 = On / 0 = Off  
  Normaly the date from an edited (admin) entry becomes a new date, but you can disable it with this switch.
- `FixedTime`  
  Value between -24 and 24  
  Adds or removes some hours from the servertime if your server reports the false time for your timezone.
- `DateFormat`  
  0 = DD.MM.YY / 1 = MM.DD.YY  
  Changes the dateformat.
- `AdminPass`  
  Just the administration password. BE SURE THAT YOU CHANGE IT!!! The default password is "admin" without "".
- `ModeratorPass`  
  You can delegate some administration tasks like delete and edit entries to a moderator if you enter a password here. Be sure that you do not use administrator and moderator privileges on the same computer! If you want to do it anyway, set the parameter `cookielifetime` = 0!
- `AdminMail`  
  Set your email address to get a mail if someone posts a new entry to your guestbook.
- `ModeratorMail`  
  Same above just for the moderator.
- `PassForNewEntries`  
  Some people want to use this guestbook like a newsbook, but it should not possible for everybody to create new entries. Therefore the new entry section is password protected if you enable this feature.
- `Cookielifetime`  
  Sets the time in seconds the cookie with the admin password should be valid.
- `DataPath`  
  Change this path to specify a new location for the guestbook data files. Be sure that the path really exists!

### Administration
#### Colors
To change the colors of the guestbook just rename any `guestbook_xxxxx.css` file into `guestbook.css`.

#### Layout
Change the layout with the help of the Cascading Style Sheet file (`guestbook.css`). I'm to lazy to explain how, so you have to try it or to read a little HTML book.  
Are you interested in a complete new skin? Ok, all you have to do is to copy all files from `layout/grey/*.*` into the guestbook maindirectory and overwrite the existing files. (I do not give any support for this skin, because it comes not from me!)  
If you want to change the whole guestbook structur, be sure that you replace the line `error_reporting(0);` in guestbook.php by `#error_reporting(0);` to see all php error messages like parse errors. Now it is easier for you to fix little errors. Another fact you should know is, that `header.html.inc`, `body.html.inc` and `foot.html.inc` are ONE html file. They get merged at runtime. If you want to be sure that you edited it right, just copy the three files all together and check if the result is a normal html file that would work with every standard browser. I say that, because i saw that some people created 3 standalone html files. May be this works with some browsers, but not with all.

#### Languages
Some people have a multilanguage homepage and want to use their guestbook in a multilanguage version too. They can do that if they add `?lang=xxx` (where xxx is the abbreviation for the language) to the normal guestbook link.

Example: `<A HREF="http://www.yourdomain.com/guestbook/guestbook.php?lang=ger">Guestbook</A>`

#### IP-Filter
Sometimes it is needed to lock the guestbook/newsbook with an IP-Filter. You can edit the filter in the administration menu. Be sure that you enter all IP's seperated by spaces (no newlines!)! 3 different possibilities are available:
- 127.0.0.1
- 127.0.0.???
- 127.0.0.0?0
- 127.0.0.*

#### Database cleaning/compressing
If your database is REALLY huge and you changed or deleted entries VERY often, start a database rebuild to clean and compress the database. Be sure that you have enough storage on your account (databasesize * 2) and make a backup of the /data directory!

#### Indexfile rebuild
If your indexfile got destroyed you can rebuild it to save the datafile. Be sure that you make a backup first, because it can not do wonders! After rebuilding you can see some double entries if you edited them as admin and do not cleaned the database very often. But it should be no problem to delete them with the direct admin delete feature again...

#### Import CSV-files
CSV-files are ascii files which can be imported now. You can find an example within the admin directory (`example.csv`) to see how such a file is structured. But do not ask me how you can get a CSV-file from any data source!!! I do not know how and i do not have the time to do it for you...

#### Signatures:
If you want to create a signature file which will be integrated into every administrator or moderator reply message, change `signature.adm` (administrator)/`signature.mod` (moderator) or create a new `signature.adm`/`signature.mod` file. Just delete `signature.adm` and `signature.mod`, to disable this feature.

#### Smileys
There is the possibility to add smileys by yourself. All you have to do is to open `smileys.php` with an editor and add little pictures like you can see it in the file. An easier way is to copy all smileys into the `/gif` directory and to start the `smileyfilegenerator.php` script. It generates a standard smiley file which can be adapted on your needs.

## FAQ
- My guestbook does not work and i don't know why.  
  Open the file guestbook.php with your standard editor and replace the line `error_reporting(0);` with `#error_reporting(0);`. The `#` in front of the line makes all errors visible. The same procedure works for the admin part too.
- I want to change the background color from my guestbook, but it is always grey.  
  Just open the file `guestbook.css` with your standard editor and search the part:
```
BODY {
  COLOR: #FFFFFF;
  BACKGROUND-COLOR: #333333;
  BACKGROUND-IMAGE:URL(gif/bg.gif);
}
```
  Here your can enter any color you want, but DON'T forget to remove the background image or your background is always grey!!! To remove colors of other parts too, check the `guestbook.css` file and change what you want.
- I integrated the guestbook in my html pages, but if i post a new entry, i get always blank white pages.  
  Open your html file where you integrated the file guestbook.php with your standard editor and put the following line in front of your html page: `<?php ob_start(); ?>`. Be sure that it is really the first line, because it has to be there before `<html>`! Now go to the end of your html file and insert the following line too (after `</html>`: `<?php ob_end_flush(); ?>`. At the last delete the lines `ob_start();` and `ob_end_flush();` from `guestbook.php` and it works.
- The guestbook tells me that a file is locked.  
  Check your `/data` directory and delete all `*.lck` files. Don't delete the `*.dat` files or you lose your guestbook entries! Now check the `/temp` directory and delete all files there (really all). Test the guestbook and it should work again.
- I can't get logged in as admin.  
  Use "admin" as first login (without "").
- I use the guestbook and see the possibilities to edit or delete entries. Can really every normal user delete or edit the entries?  
  No! This is not a bug, it is a feature. The guestbook creates a cookie on your personal harddisk so that you get identified as admin every time you open your guestbook page. It is really useful that you can easy delete or edit entries, but if you dislike it, set the option `cookielifetime` to 0 and the option does not appear.
- I forgot my admin password, what should i do now?  
  You have two possibilities. The first one is to copy the original `config.php` into your guestbook directory (overwrite the existing file). Now you can login again with "admin" (without ""). BUT BE SURE THAT YOU CHANGED THE INDEXSIZE TO THE SIZE YOU ACTUALLY USED BEFORE OR YOUR GUESTBOOK GETS DESTROYED!  
  The second possibility is to copy the `adminpass` line from the original `config.php` and overwrite your `adminpass` line from your `config.php` with it. Now you can also use the standard login "admin".
- New posts do not appear if i write more than one entry.  
  This is a feature and no bug and it is called flood protection. You have to wait 2 minutes by default, before you can post a new entry with the same ip. You can reduce or enhance the time in your admin menu.
- I tried to load a `*.csv` file but it does not work.  
  Copy the `*.csv` file into the `/admin` directory of your guestbook on your webserver and try to load it from there. It does not work if you try to load it from your local harddisk!
- I added some badwords and my guestbook do not work anymore.  
  Check your `/data/wordfiler.dat` file and remove all special chars like: `( ) / \ ' "`  
  Such special chars need a backspace `\` in front of it, e.g. `\(`.
- I get 2 mails on new guestbook entries.  
  You set the `adminmail` and `moderatormail` to the same mail address and get two mails now. One for the admin and one for the moderator. Change or delete one of the mail adresses.
- How can i add my own language?  
  Open the file `language.php` and replace e.g. all lines which starts with `$english=` with you own language. Now activate the language in the admin menu and you are ready.
- How can i add more smileys?  
  Just have a look into the `smileys.php` file and insert as much smileys as you want to have.
- I changed the `dateformat` but nothing happens.  
  This feature works only for new created entries.
- Why is the page index not visible?  
  The page index needs at least 3 pages to be visible.

## Credits
© 2001 Achim Winkler  
http://www.lkcc.org/achim  
Modified by Chrissyx
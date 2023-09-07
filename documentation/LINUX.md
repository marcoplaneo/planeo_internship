# LINUX

* open source operating system

## Terminal navigation

* pwd (print working directory): shows directory you are currently in
```
marco@marco-ThinkCentre-M720q:/var/www/html$ pwd
/var/www/html
```
* ls (list): shows what is in the (current) directory
  * -a shows entries with '.' too
  * -A does not show '.' and '..'
  * --author shows the file and the author
  * -c sorts by time of last modification
  * -d lists directories
  * -i shows index number of files
  * -l lists with more information
  * -t sorts list by time
* cd (change directory): changes the current directory
  * cd: changes to root
  * cd ..: leaves the current file/directory
  * cd /var/www: changes into directory '/var/www'
  * cd html: changes into '/var/www/html', if in '/var/www'

## Files and directories

* mkdir (make directory): makes one or multiple new directories
```
mkdir test
-> makes directory test in current directory
```
* touch: edit timestamps of a file
```
touch test.html
-> creates test.html in current directory if it does not already exist
```
* vi (visual editor): allows you to take action in files with command; it is also possible to edit
```
vi test.html
-> opens test.html

1. ESC-key
2. :w
3. ENTER-key
-> saves made changes without exiting

1. ESC-key
2. :q
3. ENTER-key
-> exits vi

1. i
-> enters insert/editing mode
2. ESC-key
-> leaves insert/editing mode
```
* nano: command line editor
```
nano test.html
-> opens test.html

CTRL-key + O-key
-> saves changes without exiting

CTRL-key + X-key
-> exits file
```
* rm (remove): removes files or directories
```
rm test
-> removes directory test in current directory

rm test.html
-> removes file test.html in current directory

rm /var/www/test
rm /var/www/test.html
-> removes test in directory /var/www
```
* rmdir (remove directory): removes empty directories
* cat (concatenate): reads data from text files and gives them as output
  * good for small files
* more: view text files in the terminal
  * good for big files
* less: 'more' with more features as going back
  * good for big files, when wanting to go backwards in the file
* tail: outputs end of a file
  * good for log files
```
cat /var/www/test
more /var/www/test
less /var/www/test
tail /var/www/test
-> opens file test in /var/www
```
* cp (copy): copies files or directories
```
cp /var/www/test /var/test2
-> copies test in /var/www and saves the copy as test2 in /var
```
* mv (move): moves files or directories
```
mv /var/www/test /var/test
-> moves test form /var/www to /var
mv /var/www/test /var/test2
-> moves the file and renames it
```

## Groups

* groupadd: create a group
* groupdel: delete a group
* usermod: modify properties of the user
* gpasswd: define password for a group
* groups: all groups of the user will be shown

## Permissions

* chmod: give users permission
  * r = read, w = write, x = execute
    * rwx
    * rw-
    * r-x
    * r--
    * -wx
    * -w-
    * --x
    * \---
  * to protect files against unwanted changes
  * some users do not need to see certain files
* chown: change owner/group of file
```
chown testuser test.html
-> testuser is now the owner of test.hmtl
```

## Other common commands

* clear: clear terminal
* history: shows last commands used
```
history 50
-> shows the last 50 commands

!2
-> runs the second command in your history

history | grep test
-> shows all commands where test was used in

CTRL-key + R-key
-> can type something; automatically searches for it in past commands
```
* help: shows help for some commands
* grep (global search for regular expression and print out): search for words/patterns in all files
```
grep "test" /var/www/test.html
-> searches for "test" in /var/www/test.html

grep -r "test" *
-> searches in current directory and subdirectories in all files for "test"
```
* man (manual): shows manuel for requested command
* find: search for files by data as date
```
find /var/www -name test.html
-> searches for test.html in /var/www

find /var/www -name test
-> searches for directory test in /var/www
```
* alias: nickname for command(s) created by user
```
alias test = "mkdir test"
-> creates alias

test
-> runs "mkdir test"
```

## .bashrc

* bashrc: create new user specific commands
  * save them in bashrc to make it permanent
```
nano bashrc

in the file:
alias test = "mkdir test"
```
* PS1: what will show up before typing

package: can be software; there are thousands of packages
- can be installed online
- can be managed with packet manager
root directory: every directory is in here
- directories in root
- files or directories in these directories
.bashrc
- configuration file for Bash shell
- to customize edit the file
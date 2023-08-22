# LINUX
LINUX is an open source operating system. It can be used on devices like desktops, server and smartphones. This operating system can be customized and is used by individuals and companies.
## Terminal navigation
There are a few commands with which you can navigate within the terminal. One of them is 'pwd'. This is short for 'print working directory' and shows the directory you are currently in.\
Another command is 'ls' (short for list) and shows what is in the current directory or the directory given with the command. There is also a more detailed version which is 'll' or 'ls -l'\
It is also possible to open a folder with 'cd' (change directory). By doing that the current folder will be the one you opened. To go to the home you just have to write the command 'cd' without anything behind that.
## Files and directories
To make directories in the terminal you can use the command 'mkdir'. With this command it is also possible to set permissions or create multiple folders at once by typing the folder names in curly brackets.\
With the 'touch' command it is possible to edit the timestamps of a file. But if you create a file with this command it will be empty.\
Vi is a visual editor. With it, you can enter the command mode, which is used to take action in a file with commands and enter the insert mode, which is used to insert text into a file.\
Nano is a command line text editor. It is simple and has all the basic functions without making it confusing.
If a file is not needed anymore you can remove it with 'rm'. In fact, it does not remove the file itself but its references. Once this command has run, there is no way of recover the file. This command can also be used to delete directories.\
The 'rmdir' command or the 'remove directory' command can be used to delete empty directories.\
'Cat' is a command to read data from text files to give them as output. 'Cat' is short for 'concatenate'.\
With 'more' you can view text files in the console.\
'Less' is the same as 'more' but with more features. To name one of them: it is possible to navigate in both directions instead of only forward. Additionally, this command does not read the entire file rather a portion which results in a faster loading speed. This is why it is used for opening relatively large files.\
Another command to output a text file if 'tail'. But it only outputs the end of the file or the part limited by the user.\
To copy files or directories there is the command 'cp'.\
To move files or directories to a different directory there is the command 'mv'.
## Groups
It is possible to have groups for example to manage permissions. To create a group the command 'groupadd' is used. You can also add a password to the group.\
If a group is not needed anymore it can be deleted with the command 'groupdel'.\
The 'usermod' command allows you to modify properties of users. This means it is possible to change a users password or group the user is in.\
With the command 'gpasswd' you can define a password for a group, and you can also manage the admins and members with it.\
With the 'groups' command all groups of the current user will be listed. You can also show the group list of another user by adding his username. The first group is always the primary group and everyone is in one primary group.
## Permissions
Every file has a permission which allows some users to view, others to edit and others to execute the file. To give these permissions the command 'chmod' is used.\
To change the owner and/or the group of a file/group you can use the command 'chown'.
## Other common commands
With 'clear' it is possible to clear the terminal. This command is also accessible with the shortcut 'CTRL+L'.
With the 'history' command it is possible to see the last executed commands. You can limit the shown commands by putting a number after the history command.\
If you need help because you forgot or do not know a command you can use the command 'help'. This will show you information about the commands.\
If you want to search for something in the files you can use the command 'grep' which means 'global search for regular expression and print out'. You can choose which results should be printed out in the terminal. That means if it should search for the word or for the exact pattern in the word.\
'Man' gives the complete manuel of the command.\
With the 'find' command you can search for files or directories by any data for example dates.\
Instead of writing long commands over and over again you can give the command an alias. This is still the same command but shorter.
## .bashrc
Bashrc is a command to create new user specific commands.\
I created my own command with a combination of aliases. The first one I named friday which echoes: 'it is wednesday my dudes'. The second one I named trojaner which will echo: 'trojaner.exe found. Beginning to delete the computer'. Lastly I made a custom command with the name halp (because help is already a command) which will do 'friday', then open firefox and then do 'trojaner'.\
On Linux it is not uncommon for software to be built as a package. A package can be downloaded from a variety of thousands.\
A root directory is a directory which stores all other directories in Linux. You can not go farther back than the root directory.
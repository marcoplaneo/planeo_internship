# GIT
GIT is a programme to work on projects while giving the opportunity to work alone or with others on them. In order to have the newest version you have to 'pull' it. This only works if someone has 'pushed' another version. By 'fetching' you will always be up-to-date if there was made a change.\
It is also possible to create a branch to work on. Everything that is changed here will not change in the main branch. The branches can be merged at any time. But if the versions of the branches or pulled version differ on existing lines of the code there will be a merge conflict. To resolve one you have to know what is the correct version of the code and pick it. After that the false code will be deleted.\
With GIT you can also revert your changes by going to an earlier version of your project.\
.gitignore ignores files that are not necessary as computer generated files or build artifacts. These files can be derived or should not be committed.
## Commands
The first command is 'status'. This command shows the difference between the file that is worked on and the index file.\
'Add' adds a change in the working directory to the staging area. It only tells git that you want to include the changes in the next commit but changes nothing in the repository.\
'Commit' makes a snapshot or a 'safe' version of the current changes. In git's history you can go back to every commit that has been made.\
'Push' uploads the local changes in a repository to a remote repository.\
'Pull' fetches and downloads changes from the remote repository to the local repository.\
The 'log' command shows the history of the commits, that have been made, with additional info as commit messages.\
With the 'rm' command it is possible to remove files or a collection of files. They can be removed from the index and the working directory.\
'Mv' moves or renames files or a collection of files without deleting their history.
CS147-Group-Github
==================

*************************************************
access the live version of our app at this url
*************************************************
http://stanford.io/PZvxPE
*************************************************


I've set up the github group repository at https://github.com/simonzheng/CS147-Group-Github.git and added both of you as collaborators. Github will be used for version control and group collaborations and anytime you both want to get the latest version of the work, pull from our repository.

For now, please clone the folder now so we can all have one local version of the repository. Do this with:

git clone https://github.com/simonzheng/CS147-Group-Github.git



Whenever you want to make edits to any of our files, please cd into your local repository and:

$ git pull https://github.com/simonzheng/CS147-Group-Github.git (to have updated everything) (can be done at any time)
make your changes locally

$ git add -u <filename> (any time you edit a file that already exists), add that file so git can track it) (-u flag stands for update)
        - if you are just adding a new file, then same command but without '-u'

$ git commit -m "your commit message"    - to commit your changes

$ git push https://github.com/simonzheng/CS147-Group-Github.git (to push/upload your new changed version to the group github repository)


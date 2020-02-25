# kanzan
Rapid Software Development Framework

## Initiate Project
1. Download or Clone
2. Setting .gitignore
```
$:/> git rm --cache composer.lock
$:/> git rm -r --cache app/Controllers
$:/> git rm -r --cache app/Models
$:/> git rm -r --cache app/Modules
$:/> git rm -r --cache logs

$:/> touch .gitignore
```
3. Copy & Paste default `.gitignore`
```
# Composer Package #
####################
vendor/

# Compiled source #
###################
*.com
*.class
*.dll
*.exe
*.o
*.so

# Packages #
############
# it's better to unpack these files and commit the raw source
# git has its own built in compression methods
*.7z
*.dmg
*.gz
*.iso
*.jar
*.rar
*.tar
*.zip

# Logs and databases #
######################
# Compiled source #
###################
*.com
*.class
*.dll
*.exe
*.o
*.so

# Packages #
############
# it's better to unpack these files and commit the raw source
# git has its own built in compression methods
*.7z
*.dmg
*.gz
*.iso
*.jar
*.rar
*.tar
*.zip

# Logs and databases #
######################
logs/
*.log
*.sql
*.sqlite

# OS generated files #
######################
.DS_Store
.DS_Store?
._*
.Spotlight-V100
.Trashes
ehthumbs.db
Thumbs.db
*.log
*.sql
*.sqlite

# OS generated files #
######################
.DS_Store
.DS_Store?
._*
.Spotlight-V100
.Trashes
ehthumbs.db
Thumbs.db
```
4. execute `composer update`

## Test Run
```
$:/> cd public
$:/> php -S localhost:8080
```

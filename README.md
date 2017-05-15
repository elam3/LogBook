# Assignment 5 Group 2 - MVC
LogBook is an example that applies the MVC framework to implement a logbook that keeps track of visitors coming in and out of a building. Logbook will track the timestamps of when the visitor checks-in, and when the visitor checks-out.

# Getting Started

## Download the repo to hills under public_html
`git clone https://github.com/elam3/LogBook`

`cd LogBook`

## Database Credentials
* Inside the `includes` directory, make a copy of the `dbvars.inc.sample`, and rename it to `dbvars.inc`
  * `cd includes; cp dbvars.inc.sample dbvars.inc; nano dbvars.inc;`
* Edit `dbvars.inc` to use your mysql database credentials
* May need to set files & directory permissions
* `cd ..`

## Setting File permissions
`find . -type d ! -path '*.git*' -exec chmod 0700 {} \;`

`find . -type f ! -path '*.git*' -exec chmod 0600 {} \;`

`chmod 0711 . assets assets/img`

`chmod 0644 index.php assets/{style.css,img/iconmonstr-time-10-240.png,img/iconmonstr-user-29-240.png}`

# Contributors
Timothy Flaherty Jr, Rebecca Johnson, Edison Lam, Huiling Liu

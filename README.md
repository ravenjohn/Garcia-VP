CMSC 128 AB-5L Group 1 Project - Garcia's Photo and Video Coverage
=======

A website for reserving services offered by the business.

Developers
--------------------

1. Lagrimas, Raven John M. (Group Leader)
2. Almonte, Joseph Conrad N.
3. Bundalian, Mariane
4. Cordova, Jom Marie
5. Palevino, Karla

Setting up the project
--------------------
This section must always be updated depending on new setup requirements need.

1. Clone the project: <tt>git clone git@github.com:ravenjohn/VERSION_AB5L_GROUP1.git</tt>
2. Set up MySQL (~> 5.5), and import db/build.sql to build the database.
3. Go to the bin directory of the project and open RConfig.php.
4. Change database credentials and urls.
5. Do your magic.

Running the project
--------------------

This section must always be updated depending on new requirements need.

1. Run your webserver.
2. Run mysql.
3. visit <tt>http://localhost/VERSION_AB5L_GROUP1</tt> on your beloved browser.

Coding Guidelines
--------------------

This section should always be updated.

1. Use <tt>1 tab (4 spaces)</tt> indention
2. No trailing <tt>white spaces</tt>. Specially on newline spacers.

Repo Guidelines
--------------------

1. Our base branch is <tt>master</tt>
2. Development branch is called <tt>next</tt>
3. Branch out of <tt>next</tt> when doing a new module / feature
4. Branch names should be min of 2 words max of 3 delimited by <tt>-</tt>
e.g. 
login-module
sign-up-module
5. For bug fixes add prefix <tt>fix</tt> to the branch name
e.g.
fix-add-package
fix-view-quotation
No need to add 'bug' to the branch name
6. For commit messages please avoid being ambiguous and always sign off. e.g.
	(BAD)
	Added modules.
	(GOOD)
	Added view quotation modules.
	No need for periods '.'
7. Avoid commiting large chucks of code. Segregate.
8. When done with branch push it to remote: <tt>git push origin branch-name</tt>
9. Create a <tt>Pull Request</tt> for that branch merging to <tt>next</tt> branch. (not <tt>master</tt>)

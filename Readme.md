Run phpunit test using this command.
`./vendor/bin/phpunit --version`
added the alias with above command 
`alias phpunit="./vendor/bin/phpunit"`
so whenever you want to run the php unit test just used the above alias.

PhpUnit has two kind of test convention with function name aka test cases.
1. put test prefix in front of function name.
2. if you don't want to put the test prefix in function name then add the document comment @test annotation in it that way you can add the it is also consider as test case.